<table class="ui table" id="tablePrin">
    <thead>
        <tr style="border-width:0 !important;" id="agregar_tabla_articulo">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="right aligned">Agregar Articulo:</th>
            <th>
                <button class="ui blue basic icon button" onclick='mostrarModal();' id="btn_add">
                    <i class="plus icon"></i>
                </button>
            </th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th class="right aligned">Importe</th>
            <th class="right aligned">Total</th>
            <th>Especificaciones</th>
            <th>Proveedor</th>
            <th>Acciones</th>
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
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>


<div class="ui mini modal" id="modal_admin">
    <div class="header">Actualizar Articulo</div>
    <div class="content">
        <div class="ui form">
            <div class="fields">
                <div class="four wide field">
                    <label>Precio:</label>
                </div>
                <div class="twelve wide field">
                    <input type="text" class="number" id="precio">
                </div>
            </div>
            <div class="fields">
                <div class="four wide field">
                    <label>Proveedor:</label>
                </div>
                <div class="twelve wide field">
                    <select id="proveedor">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" onclick="cambiar_articulo();">Aceptar</div>
    </div>
</div>

<div class="ui large modal" id="modal_articulo">
    <i class="close icon"></i>
    <div class="header">
        Agregar Articulo
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
                        <th class="two wide">Código</th>
                        <th class="four wide">Nombre Artículo</th>
                        <th class="four wide">Especificaciones</th>
                        <th class="four wide">Cantidad</th>
                        <th class="two wide right aligned">Acciones</th>
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