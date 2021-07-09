var idempleadoG = -1;
var idempleadoDocG = -1;
var nombreG = -1;
var myDropzone;

var file_name = '';

var valid_file;

$(document).ready(function() {
    idempleadoG = $.get("idempleadoG");

    nombreG = $.get("nombre");
    
    dpd_tipodocumento('tipoDoc');

    $('#tipoDoc').change(function(){
        var vigen = $("#tipoDoc option:selected" ).attr('vigencia');

        if(vigen == 'S'){
            $('#vigenciaIni').attr('validate','true');
            $('#vigenciaFin').attr('validate','true');
        }else{
            $('#vigenciaIni').attr('validate','false');
            $('#vigenciaFin').attr('validate','false');
        }

        validarInit('formDocumento');
    });

    validarInit('formDocumento');

    dropzone();

    llenar_tabla_ajax();

    rename_label();
});

function rename_label(file = ''){
    if (file.length == 0){
        $('#name_label').text("No ha subido ningun documento");
        $('#name_label').attr("href","");
    }else{
        $('#name_label').text(file);
    }
}

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    ajaxPost("documentos_all.php", llenar_tabla,{'idempleado':idempleadoG});
}

function llenar_tabla(json){
    var string = '';

    for (let i in json) {
        var ob = json[i];
        string += '<tr>';

        string += '<td>';
        string += ob.idtipodocumento;
        string += '</td>';

        string += '<td>';
        string += ob.desctipodocumento;
        string += '</td>';

        string += '<td>';
        if(ob.idempleadodocumento > 0){
            string += 'SI';
        }else{
            string += 'NO';
        }        
        string += '</td>';

        string += '<td>';
        string += ob.obligatorioempleado;
        string += '</td>';

        string += '<td>';
        string += ob.folio;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaemision);
        string += '</td>';        

        string += '<td>';
        string += fechaEspanol(ob.iniciovigencia);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.finalvigencia);
        string += '</td>';

        string += '<td>';

        if(ob.idempleadodocumento > 0){
            if(ob.nombrearchivo.length > 0){
                string += '<a href="' + ob.nombrearchivo + '" target="_blank" data-tooltip="Ver Documento" class="ui icon basic blue button"><i class="file alternate outline icon"></i></a>';
            }            
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idempleadodocumento + ');"><i class="close icon"></i></button>';
        }else{
            string += '<button class="ui basic blue icon button" data-tooltip="Agregar" onclick="nuevoDocumento(' + ob.idtipodocumento + ',\'' + ob.solicitararchivo + '\');"><i class="plus icon"></i></button>';
        }
            
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalBorrarFN(iddocumento){
    $('#btn_delete').attr('onclick', 'deleteDocumento(' + iddocumento + ')');

    $('#modal_borrar').modal('show');
}

function deleteDocumento(iddocumento){
    $('#modal_borrar').modal('hide');
    ajaxPost("documentos_delete_all.php", correctoTabla, {'iddocumento' : iddocumento});    
}

function nuevoDocumento(idtipodoc,ocupafile){
    //idempleadoDocG = iddocumento;    

    clearForm('formDocumento');

    $('#original_no').prop('checked',true);
    
    $('#empleado').val(nombreG);

    valid_file = ocupafile;

    $('#tipoDoc').val(idtipodoc).change();

    $('#modal_documento').modal('show');
}

function agregar_ajax(){

    if (!formValido('formDocumento')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.','','modal_documento');
        return false;
    }

    if (valid_file == 'S' && file_name.length == 0){
        modalEstatus('i', 'Favor de subir el documento.','','modal_documento');
        return false;
    }

    var original = 'N';
    if( $('#original_si').prop('checked') ){
        original = 'S';
    }

    var json = {
        'idempleado' : idempleadoG,
        'idtipodocumento' : $('#tipoDoc').val(),        
        'esoriginal' : original,
        'folio' : $('#folio').val(),
        'fechaemision' : $('#emision').val(),
        'iniciovigencia' : $('#vigenciaIni').val(),
        'finalvigencia' : $('#vigenciaFin').val(),
        'nombrearchivo' : file_name
    };

    ajaxPost("documentos_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        file_name = '';
        llenar_tabla_ajax();
        rename_label();
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function dropzone(){
    try{
        myDropzone.off(); //removes all listeners attached with Emitter.on()
        myDropzone.destroy()
    }catch(err){
        console.log('err: ' + err.toString());
    }

    myAwesomeDropzone = {
        url: "documentos_up2server.php",
        createImageThumbnails: true,
        acceptedFiles: 'image/*,application/pdf',        
        params: {
            
        },
        accept: function(file, done) {  
            
            if (file_name.length > 0 || !formValido('formDocumento')) { //Poner que si no ha pasado las validaciones
                done("Naha, you don't.");
                modalEstatus('i', 'Ya subio algún documento o tiene campos sin rellenar.','','modal_documento');
                $('.dz-preview').html('');
            }
            else {
                rename_label(file.name)
                done();
            }
        },
        success: function (file, response) {            
            //file.previewElement.classList.add("dz-success");
            //console.log("Successfully uploaded :" + response);
            var jsonData = JSON.parse(response);
            //console.log(response);
            console.log(jsonData);
            file_name = jsonData.nombre
            $('#name_label').attr("href",jsonData.nombre);
            /*
            if(jsonData.status == 'true'){                
                //<a href='img/<?php echo $_FILES['imagen']['name']; ?>' target="_blank">
                //cargarDocumentosAjax();                
            }else{
                modalEstatus('e', 'Ocurrio un error.');
            }*/
            $('.dz-preview').html('');
        },
        error: function (file, response) {
            console.log('error: ' + response);
            file.previewElement.classList.add("dz-error");
        }
    } // FIN myAwesomeDropzone

    myDropzone = new Dropzone("#dropzone", myAwesomeDropzone); 
        myDropzone.on("complete", function(file,response) {
    
        });
}
