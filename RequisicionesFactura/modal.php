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

<div class="ui modal" id="modal_editar">
    <div class="header">Subir Documento</div>
    <div class="content">
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
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button">Aceptar</div>
    </div>
</div>

<div class="ui modal" id="modal_editar_pdf">
    <div class="header">Subir Documento</div>
    <div class="content">
        <div id="dropzone_pdf" class="ui placeholder segment">
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
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button">Aceptar</div>
    </div>
</div>

<div class="ui mini modal" id="modal_revisar">
    <div class="header">AUTORIZAR SOLICITUD</div>
    <div class="content">
        <p>¿Esta seguro que desea terminar la comprobación?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_terminar">Aceptar</div>
    </div>
</div>