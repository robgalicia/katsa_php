<div class="ui mini modal" id="cambiar_pass">
    <div class="header">Cambiar Contraseña</div>
    <div class="content">
        <div class="ui grid container">
            <div class="row">
                <div class="one wide column">
                </div>
                <div class="fourteen wide column">
                    
                    <div class="ui form" id="formGenerico">
                        <div class="fields">                            
                            <div class="sixteen wide field">
                                <label>Contraseña Actual</label>
                                <input type="text" id="conf_pass" maxlength="100">
                            </div>
                        </div>
                    </div>

                    <div class="ui form" id="formGenerico">
                        <div class="fields">                            
                            <div class="sixteen wide field">
                                <label>Nueva Contraseña</label>
                                <input type="text" id="new_pass" maxlength="100">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="one wide column">
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui green button" onclick="verificar_pass_ajax();">Aceptar</div>        
        <div class="ui cancel red button">Cancelar</div>
    </div>
</div>

<script>

function abrir_modal_cambiar_pass(){
    $('#conf_pass').val('')
    $('#new_pass').val('')

    $('#cambiar_pass')
    .modal({autofocus: false})
    .modal('setting', 'closable', false)
    .modal('show')
    ;
}

function verificar_pass_ajax(){
    var user = '<?php echo $_SESSION["nombre"]?>';    

    var json = {
        'user': user,
        'pass':$('#conf_pass').val()
    }; 
    ajaxPost("../Login/login_code.php", verificar_pass,json);
}

function verificar_pass(json){
    if(json.mensaje == 'Ok'){

        var json = {            
            'new_pass':$('#new_pass').val()
        }; 
        ajaxPost("../Comun/cambiar_pass.php", cambiar_pass,json);

    }else{
        modalEstatus('i', 'Su contraseña no coincide con la actual.');
        NProgress.done();
    }
}

function cambiar_pass(json){
    modalEstatus('o', 'La operación se realizó de manera correcta.');
    $('#cambiar_pass').modal('hide');
    NProgress.done();
}
</script>