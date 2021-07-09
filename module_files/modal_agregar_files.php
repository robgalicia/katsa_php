<script src="../js_css/dropzone.js"></script>
<script src="../js_css/moment.min.js"></script>

<div class="ui mini modal" id="modal_borrar_file_gen">
    <div class="header">ELIMINAR ARCHIVO</div>
    <div class="content">
        <p>¿Esta seguro que desea eliminar este archivo?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete_file_gen">Aceptar</div>
    </div>
</div>

<style>
.dropzoneBorder {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<div class="ui modal" id="modal_ver_documento_gen">
    <div class="header">Ver Documentos</div>
    <div class="content">

    <div class="ui grid" id="ver_documentos_gen">
    </div>
              
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
    </div>
</div>

<div class="ui modal" id="modal_documento_gen">
    <div class="header">Subir Documento</div>
    <div class="content">

        <!--<div class="ui form" id="formDocumento">
            <div class="fields">
                <div class="three wide field">
                    <label>Justificación:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="justificacion" validate="true">
                </div>
            </div>
        </div>-->
        

        <div id="dropzone" class="ui placeholder segment">
            <div class='dz-default dz-message'>
                <div class="ui icon center aligned header">
                    <i class="file alternate outline icon"></i>
                    <div class="content">
                        Arrastre los archivos hasta aqui
                        <div class="sub header">o de clic en cualquier parte</div>
                    </div>
                </div>                
            </div>                
        </div>        
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>        
    </div>
</div>

<script>

    var myDropzone = -1;
    var iddoctotipodocumento_G = -1;
    var idcampollave_G = -1;
    var clavedoctomodulo_G = -1;

    function subir_archivo_gen(iddoctotipodocumento){
        iddoctotipodocumento_G = iddoctotipodocumento;        

        dropzone();

        $('#modal_documento_gen').modal('show');

    }

    function files_gen_ajax(clavedoctomodulo,idcampollave){
        idcampollave_G = idcampollave;
        clavedoctomodulo_G = clavedoctomodulo;

        $('.modal').modal({allowMultiple: true});

        $('#ver_documentos_gen').html('');

        var json = {
            'clavedoctomodulo' : clavedoctomodulo,
            'idcampollave' : idcampollave
        };

        ajaxPost("../module_files/files_all.php", files_gen, json);
    }

    function files_gen(json){
        var string = '';        
        var dis = '';

        //console.log(json);
        
        for (let i in json) {
            var ob = json[i];

            if (ob.iddoctoarchivodocumento > 0) dis = '';
            else dis = 'disabled';            

            string += '<div class="four wide column">';

            string += '<div class="ui placeholder segment">';
            string += '    <div class="ui icon header">';
            string += '        <i class="pdf file outline icon"></i>';
            string +=          ob.descdoctotipodocumento;
            string += '    </div>';
            string += '    <div class="ui icon buttons">';
            string += '        <button class="ui green basic button" ' + dis + ' data-tooltip="Ver PDF" onclick="verPDF(\'' + ob.nombrearchivouuid + '\');"><i class="file pdf icon"></i></button>';
            string += '        <button class="ui grey basic button" data-tooltip="Subir PDF" onclick="subir_archivo_gen(' + ob.iddoctotipodocumento + ');"><i class="cloud upload icon"></i></button>';
            string += '        <button class="ui red basic button" ' + dis + ' data-tooltip="Eliminar PDF" onclick="modalBorrarFilesGenFN(' + ob.iddoctoarchivodocumento + ');"><i class="close icon"></i></button>';
            string += '    </div>';            
            string += '</div>';

            string += '</div>';
        }
        $('#ver_documentos_gen').html(string);
        
        $('#modal_ver_documento_gen').modal('show');

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
            url: "../module_files/documentos_up2server.php",
            createImageThumbnails: false,
            acceptedFiles: 'application/pdf,image/jpeg,image/png,image/gif,text/xml',        
            params: {
                'iddoctotipodocumento':iddoctotipodocumento_G,
                'idcampollave':idcampollave_G
            },
            sending:function(file, xhr, formData) {

                /*var justificacion = $('#justificacion').val();

                formData.append("id_incidencia_G", id_incidencia_G);
                formData.append("justificacion", justificacion);*/
            },
            accept: function(file, done) {
                
                done();                

                /*if (file_name.length > 0 || !formValido('formDocumento')) { //Poner que si no ha pasado las validaciones
                    done("Naha, you don't.");
                    modalEstatus('i', 'Ya subio algún documento o tiene campos sin rellenar.','','modal_documento');
                    $('.dz-preview').html('');
                }
                else {
                    rename_label(file.name)
                    done();
                }*/
            },
            success: function (file, response) {            
                //file.previewElement.classList.add("dz-success");
                //console.log("Successfully uploaded :" + response);
                try{
                    console.log(response);
                    jsonData = JSON.parse(response);

                    files_gen_ajax(clavedoctomodulo_G,idcampollave_G);

                    
                    $('#modal_documento_gen').modal('hide');
                    
                    $('.dz-preview').html('');
                }catch(ex){
                    console.log(ex)
                }                
            },
            error: function (file, response) {
                //correctoTabla(0);
                console.log('error: ' + response);
                file.previewElement.classList.add("dz-error");
            }
        } // FIN myAwesomeDropzone

        myDropzone = new Dropzone("#dropzone", myAwesomeDropzone); 
            myDropzone.on("complete", function(file,response) {
        
            });
    }

    function verPDF(ruta){
        console.log(ruta);
        var pdf = '../module_files/' + ruta;
            
        console.log(ruta);
        console.log(pdf);

        window.open(pdf, '_blank');
    }

    function modalBorrarFilesGenFN(iddoctoarchivodocumento){
        $('#btn_delete_file_gen').attr('onclick', 'delete_file_gen(' + iddoctoarchivodocumento + ')');

        $('#modal_borrar_file_gen').modal('show');
    }

    function delete_file_gen(id){
        $('#modal_borrar_file_gen').modal('hide');
        ajaxPost("../module_files/file_delete.php", nada, {'id' : id});

        files_gen_ajax(clavedoctomodulo_G,idcampollave_G);
    }

</script>