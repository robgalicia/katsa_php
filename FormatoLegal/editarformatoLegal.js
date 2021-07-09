var idReporte = -1;


$(document).ready(function() {        

    idReporte = $.get("idReporte");    

    FormFieldsRules();

    editorInit();

    if (idReporte > 0){//Si viene a editar        
        cargarDatos_ajax();
    }    
        
});

function editorInit(){
    
    $('#summernote').summernote({
        lang: 'es-ES',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontsize', ['fontsize']],                
            ['fontname', ['fontname']],,
            ['height', ['height']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
        lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0']
    });
    /*set
    var markupStr = 'hello world';
    $('#summernote').summernote('code', markupStr);
    */

    /*get
    var markupStr = $('#summernote').summernote('code');
    */
    
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
    var contenido = $('#summernote').summernote('code');
    var marDer = $('#marDer').val();
    var marIzq = $('#marIzq').val();
    var marAl = $('#marAl').val();
    var MarBa = $('#MarBa').val();
    var disparador = $('#disparador').val();

    var json = {
        'idReporte' : idReporte,        
        'clave' : clave,        
        'nombre' : nombre,
        'contenido' : contenido,
        'marDer' : marDer,
        'marIzq' : marIzq,
        'marAl' : marAl,
        'MarBa' : MarBa,
        'disparador' : disparador
    };

    console.log(contenido);

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

    $('#clave').val(ob.claveformato);
    $('#nombre').val(ob.nombreformatolegal);
    
    $('#marDer').val(ob.margenderecho);
    $('#marIzq').val(ob.margenizquierdo);
    $('#marAl').val(ob.margensuperior);
    $('#MarBa').val(ob.margeninferior);
    $('#disparador').val(ob.storeprocedure);

    var markupStr = ob.contenido;
    
    $('#summernote').summernote('code', markupStr);    

    editorInit();
    NProgress.done();
}