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

<script src="kardex.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Incidencias</h3>
            </div>            
            <div class="three wide field">
                <label>Nombre del Artículo:</label>
                <input id="art" disabled>
            </div>
            <div class="three wide field">
                <label>Almacen:</label>
                <select id="almacen" disabled></select>
            </div>
            <div class="three wide field">
                <label>Fecha Inicial:</label>
                <input type="date" id="fecha_ini">
            </div>
            <div class="three wide field">
                <label>Fecha Final:</label>
                <input type="date" id="fecha_fin">
            </div>

            <div class="three wide field">
            <label>Acciones:</label>
                <div class="ui buttons">
                    <button class="ui gray icon button" onclick="redirect('index.php');">
                        <i class="icon reply"></i>
                    </button>
                    
                    <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                        <i class="search icon"></i>
                    </button>
                </div>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Fecha del Movimiento</th>
                <th>Documento Referencia</th>
                <th>Folio de Referencia</th>
                <th>Tipo de Movimiento</th>                
                <th>Cantidad</th>
                <th>Existencia Actual</th>
                <th>Costo Unitario</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>



<?php include('../Comun/footer_fourteen.php');?>