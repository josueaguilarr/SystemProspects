// Create new section for upload documents
function newSectionFile() {
    // Contener general de documentos
    const containerFiles = document.getElementById("containerFiles");

    // Contener padre de los inputs
    const divPattern = document.createElement("div");
    divPattern.classList.add("row", "mb-2");

    // Contenedor del input nombre del documento
    const divNameDocument = document.createElement("div");
    divNameDocument.classList.add("col-4");

    // Creacion del input nombre del documento
    const inputNameDocument = document.createElement("input");
    inputNameDocument.type = "text";
    inputNameDocument.classList.add("form-control");
    inputNameDocument.name = "name_document[]";
    inputNameDocument.placeholder = "Nombre del documento";

    // Introducimos los elementos a su contenedor
    divNameDocument.appendChild(inputNameDocument);
    divPattern.appendChild(divNameDocument);

    // Contenedor del input file del documento
    const divFileDocument = document.createElement("div");
    divFileDocument.classList.add("col-8");

    // Creacion del input file del documento
    const inputFileDocument = document.createElement("input");
    inputFileDocument.type = "file";
    inputFileDocument.classList.add("form-control");
    inputFileDocument.name = "file[]";

    // Introducimos los elementos a su contenedor
    divFileDocument.appendChild(inputFileDocument);
    divPattern.appendChild(divFileDocument);

    // Introducimos el contener padre de files al contenedor general
    containerFiles.appendChild(divPattern);
}


// Create new section for observations textarea
function newSectionObservations() {
    // Contenedor general de observaciones
    const containerObservations = document.getElementById("observationBox");
    
    if (containerObservations.childElementCount > 0) {
        
    } else {
        // Creacion de label para la caja de observaciones
        const labelObservations = document.createElement("label");
        labelObservations.textContent = 'Observaciones sobre la evaluacion: '
        labelObservations.for = "box";
        labelObservations.classList.add("form-label","m-1");

        // Creacion de la caja de observaciones
        const boxObservations = document.createElement("textarea");
        boxObservations.classList.add("form-control");
        boxObservations.id = "box";
        boxObservations.rows = "3";
        boxObservations.setAttribute("required", true);
        boxObservations.name = "observations";

        // Introducimos los elementos al contenedor general
        containerObservations.appendChild(labelObservations);
        containerObservations.appendChild(boxObservations);
    }
}


// Delete section observations textarea
function deleteSectionObservations() {
    const containerObservations = document.getElementById("observationBox");

    if (containerObservations.childElementCount > 0) {
        while (containerObservations.lastElementChild) {
            let getLatestChild = containerObservations.lastElementChild;
            containerObservations.removeChild(getLatestChild);
        }
    }
}
