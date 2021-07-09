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
            <div class="six wide field">
                <h3>Tenencia de Vehiculo</h3>
            </div>
            <div class="four wide field">
                <label>Fecha Inicial:</label>
                <input type="date" id="fecha_ini">
            </div>
            <div class="four wide field">
                <label>Fecha Final:</label>
                <input type="date" id="fecha_fin">
            </div>  
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>        
        </div>
    </div>

    <div class="scroll">
        <table class="ui table">
            <thead>
                <tr>               
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Número</th>                
                    <th>Fecha Pago</th>
                    <th>Importe</th>
                    <th>Vigencia</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

<?php include('../Comun/footer_fourteen.php');?>