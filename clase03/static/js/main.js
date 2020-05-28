
// para seleccionar solo un checkbox
function selectOnlyThis(id){
    document.querySelectorAll('.checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });

    document.getElementById(id).checked = true;

}

// cuando se cargue el documento
document.addEventListener('DOMContentLoaded', ()=> {
    document.querySelectorAll('.checkbox').forEach(checkbox => {
        checkbox.onclick = () =>{
            selectOnlyThis(checkbox.id);
        };
    });
});