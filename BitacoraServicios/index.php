<?php include('../Comun/header_fourteen.php');?>

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
                <h3>Bitácora de Servicios</h3>
            </div>            
            <div class="three wide field">
                <label>Estatus:</label>
                <select id="estatus"></select>
            </div>
            <div class="three wide field">
                <label>Fecha Inicial:</label>
                <input id="fecha_ini" type="date">
            </div>
            <div class="three wide field">
                <label>Fecha Final:</label>
                <input type="date" id="fecha_fin">
            </div>
            <div class="three wide field">
                <label>Folio de Servicio:</label>
                <input id="orden_servicio" maxlength="12"></select>
            </div>            
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue icon button" onclick='redireccionar(0,-1,-1);'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table" id="tablePrinc">
        <thead>
            <tr>                
                <th>Folio Servicio</th>
                <th>Fecha Inicio</th>
                <th>Región</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Lugar de Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../BitacoraServicios/modal_borrar.php');?>
<?php include('../BitacoraServicios/agregar_acta.php');?>
    
<?php include('../Comun/footer_fourteen.php');?>