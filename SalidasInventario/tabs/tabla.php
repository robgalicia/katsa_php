
<table class="ui table" id="tablePrin">
    <thead>
        <tr style="border-width:0 !important;" id="tr_add_art">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Agregar Articulo:</th>
            <th>
                <button class="ui blue basic icon button" onclick='mostrarModal();' id="btn_add">
                    <i class="plus icon"></i>
                </button>
            </th>
        </tr>
        <tr>
            <th>Artículo</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th class="right aligned">Costo Unitario</th>
            <th class="right aligned">Costo Total</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody id="tbodyPrin">
        
    </tbody>
    <tfoot id="tfootPrin">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th class="right aligned">Total:</th>
            <th class="right aligned" id="totalPrin"></th>
            <th></th>
        </tr>
    </tfoot>
</table>

<div class="ui large modal" id="modal_articulo">
    <i class="close icon"></i>
    <div class="header">
        Agregar Artículo
    </div>
    <div class="scrolling content">
        <h4 class="ui horizontal divider header">
            <i class="search icon"></i>
            Buscar por:
        </h4>

        <div class="ui form" id="formArticulo">

            <div class="fields">
                <div class="five wide field">
                    <label>Partida Contable:</label>
                    <select id="partida"></select>
                </div>
                <div class="three wide field"></div>
                <div class="inline fields">                    
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_articulo" id="tipo_articulo_nombre">
                            <label>NOMBRE</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_articulo" id="tipo_articulo_descripcion">
                            <label>DESCRIPCIÓN</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_articulo" checked="checked" id="tipo_articulo_ambos">
                            <label>AMBOS</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fields">

                <div class="eight wide field"></div>

                <div class="two wide field">
                    <label>Descripción:</label>
                </div>

                <div class="four wide field">                    
                    <input id="desc_articulo">
                </div>

                <div class="two wide field">                    
                    <button class="ui blue icon button" onclick='elegir_articulo_ajax();'>
                        <i class="search icon"></i>
                    </button>                
                </div>
                
            </div>
            
            <table class="ui table" id="tableArt">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre Artículo</th>   
                        <th>Existencia</th>                        
                        <th>Cantidad</th>
                        <th class="right aligned">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyArt">
                </tbody>
            </table>

        </div>

    </div>
    <div class="actions">        
        <div class="ui positive button" onclick="">
            Aceptar            
        </div>
    </div>
</div>