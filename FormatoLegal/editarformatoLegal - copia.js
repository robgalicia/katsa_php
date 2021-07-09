var idReporte = -1;
var quill;
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [ 'link', 'image', 'video', 'formula' ],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
];

$(document).ready(function() {        

    idReporte = $.get("idReporte");    

    FormFieldsRules();

    editorInit();

    if (idReporte > 0){//Si viene a editar        
        cargarDatos_ajax();
    }    
        
});

function editorInit(){
    
    quill = new Quill('#editor', {	
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'	
    });
    
}

function FormFieldsRules(){
    var rules = {
        clave: {
            identifier: 'clave',
            rules: [
                {
                    type   : 'empty'                    
                },
                {
                    type   : 'integer[0..99]'                    
                  }
            ]
        },
        nombre: {
            identifier: 'nombre',
            rules: [
                {
                    type   : 'empty'                    
                }
            ]
        }
    };

    validarFormFields('formReporte',rules);
}

function validateForms(){    
    var bool3;

    if(formValido('formReporte')){
        bool3 = true;
    }else{
        bool3 = false;
    }    

    if(bool3){
        return true;
    }else{
        return false;
    }
}

function insertarReporte_ajax(){

    if(!validateForms()){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }

    var clave = $('#clave').val();
    var nombre = $('#nombre').val();
    var nombreGen = $('#nombreGen').val();
    var contenido = quill.container.innerHTML;

    var json = {
        'idReporte' : idReporte,        
        'clave' : clave,
        'nombreGen' : nombreGen,
        'nombre' : nombre,
        'contenido' : contenido
    };

    ajaxPost("formatoLegal_insert.php", insertarReporte, json);

}

function insertarReporte(result){    

    if(result.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','index.php');
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function cargarDatos_ajax(){
    var json = {
        'idReporte': idReporte 
    };

    ajaxPost("agregar_formatoLegal_sel_upd.php", cargarDatos, json, false);        
}

function cargarDatos(ob){    
    ob = ob[0];

    $('.ql-snow').html('');

    $('#clave').val(ob.claveformato);
    $('#nombre').val(ob.nombreformatolegal);
    $('#nombreGen').val(ob.nombregenerico);    
    
    quill.container.innerHTML = ob.contenido;

    editorInit();
    NProgress.done();
}