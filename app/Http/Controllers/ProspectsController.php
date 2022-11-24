<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Prospects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Block\Document;

class ProspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Validation of role user logged
        if (Auth::user()->role_id == 1) {
            // Data for Promoter
            $idUserAuthenticated = Auth::user()->id; // Get 'id' of user logged
            $prospects = Prospects::orderBy('created_at','DESC') 
                ->where('user_id', '=', $idUserAuthenticated)
                ->get(); // Get filtered information
            return view('catProspects.index')->with(compact('prospects'));
        } else {
            // Data for Evaluator
            $prospects = Prospects::orderBy('created_at','DESC')
                ->get(); // Get filtered information
            return view('catProspects.index')->with(compact('prospects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create new prospect
        return view('catProspects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate information received
        $validator = Validator::make($request->post(), [
            'name' => 'required|string|min:3|max:45',
            'surname' => 'required|string|min:1|max:45',
            'second_surname' => 'min:1|max:45',
            'street' => 'required|string|min:1|max:45',
            'house_number' => 'required|string|min:1|max:45',
            'colony' => 'required|string|min:1|max:45',
            'postal_code' => 'required|string|max:5',
            'phone_number' => 'required|string|max:10',
            'rfc' => 'required|string|max:13'
        ]);

        // Action when validation fails
        if ($validator->fails()) {
            return redirect()->route('prospects.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Get 'id' of user logged
        $idUserAuthenticated = Auth::user()->id;

        // Create a new Prospect
        $prospect = new Prospects();
        $prospect->name = $request->name;
        $prospect->surname = $request->surname;
        $prospect->second_surname = $request->second_surname;
        $prospect->status = 1;
        $prospect->street = $request->street;
        $prospect->house_number = $request->house_number;
        $prospect->colony = $request->colony;
        $prospect->postal_code = $request->postal_code;
        $prospect->phone_number = $request->phone_number;
        $prospect->rfc = $request->rfc;
        $prospect->user_id = $idUserAuthenticated;
        $prospect->save();

        // Iterate received documents and save
        for ($i = 0; $i < count($request->file); $i++) {
            $prospect_document = new Documents();
            $prospect_document->name_document = $request->name_document[$i];
            $prospect_document->prospect_id = Prospects::latest('id')->first()->id;

            $destionationPath = 'docs/'; // Destination directory
            // Put name our documents
            $filename = str_replace(' ', '_', $request->name_document[$i]) . '.' . $request->file[$i]->getClientOriginalExtension();
            $uploadSuccess = $request->file[$i]->move($destionationPath, $filename); // Move document
            $prospect_document->document = $destionationPath . $filename; // Data for column document

            $prospect_document->save();
        }

        return redirect()->route('prospects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function show($prospects)
    {
        $prospect = Prospects::find($prospects); // Search prospect by id
        $documents = Documents::where('prospect_id', '=', $prospects)->get(); // Get filtered information
        return view('catProspects.show')->with(compact('prospect', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospects $prospects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prospects)
    {
        $prospect = Prospects::find($prospects); // Search prospect by id
        $prospect->status = $request->status; // Put request information
        $prospect->observations = $request->observations; // Put request information

        if ($prospect->save()) {
            return redirect()->route('prospects');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospects $prospects)
    {
        //
    }

    /**
     * Download documents for each prospect
     * 
     */
    public function downloadFiles($file)
    {
        // Response display of the document
        return response()->download(public_path($file));
    }
}
