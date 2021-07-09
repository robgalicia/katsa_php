<?php include('../Comun/header_fourteen.php');?>

<style>
    .flotarDerecha{
        float : right!important;
    }
</style>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="five wide field">
                <h3>Inventario</h3>                
            </div>
        </div>
        <div class="fields">
            <div class="five wide field">
                <label>Almacen:</label>
                <select id="almacen"></select>
            </div>
            <div class="three wide field"></div>
            <div class="inline fields">                    
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" id="factura_vencida" checked="nombre">
                        <label>NOMBRE</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" id="descripcion">
                        <label>DESCRIPCIÓN</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" checked="checked" id="ambos">
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
                <input id="desc">
            </div>

            <div class="two wide field">                    
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>                
            </div>
            
        </div>
    </div>

    <div>
        <table class="ui table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre Artículo</th>
                    <th>Proveedor</th>
                    <th>Precio Compra</th>
                    <th>Unidad de Medida</th>
                    <th>Fecha Ultima Compra</th>
                    <th>Existencias</th>
                    <th>Kardex</th> 
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>



<?php include('../Comun/footer_fourteen.php');?>