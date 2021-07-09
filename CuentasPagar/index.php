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
            <div class="two wide field">
                <h3>Cuentas por Pagar</h3>
            </div>
        </div>
        <div class="fields">            
            <div class="six wide field">
                <div class="inline fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_reporte" id="factura_vencida" checked="checked" onclick="mostrarInicio(false);">
                            <label>Facturas Vencidas y por Vencer</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_reporte" id="pagos_programados" onclick="mostrarInicio(true);">
                            <label>Pagos Programados</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="tipo_reporte" id="pagos_realizados" onclick="mostrarInicio(true);">
                            <label>Pagos Realizados</label>
                        </div>
                    </div>    
                </div>                
            </div>            
            <div class="three wide field">
                <label>Region:</label>
                <select id="region"></select>
            </div>
            <div class="three wide field" id="panel_ini">
                <label>Fecha Inicial:</label>
                <input type="date" id="fecha_ini">
            </div>
            <div class="three wide field">
                <label>Fecha Final:</label>
                <input type="date" id="fecha_fin">
            </div>
            <div class="one wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>        
        </div>
    </div>

    <div>
        <table class="ui table">
            <thead id="thead">
                <tr>
                    <th>Folio</th>
                    <th>Fecha Orden</th>
                    <th>Proveedor</th>
                    <th>Importe</th>
                    <th>Fecha Factura</th>
                    <th>Fecha Vence</th>
                    <th>Fecha Pago Programado</th>
                    <th id="th_pago">Fecha Pago</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

<?php include('modal_agregar.php');?>
<?php include('../Comun/footer_fourteen.php');?>