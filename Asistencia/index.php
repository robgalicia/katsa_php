<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

<style>
    .flotarDerecha{
        float : right!important;
    }
</style>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

    <div class="ui form">
        <div class="two wide fields">
            <div class="two wide field">
                <h3>Asistencia</h3>
            </div>  
            <div class="two wide field">
                <label>Region:</label>
                <select id="region"></select>
            </div>
                        
            <div class="two wide field">
                <label>Lugar de Adscripción:</label>
                <select id="adscripcion"></select>
            </div>

            <div class="two wide field">
                <label>Cliente:</label>
                <select id="cliente"></select>
            </div>

            <div class="two wide field">
                <label>Fecha:</label>
                <input type="date" id="fecha">
            </div>

            <div class="two wide field">
                <label>Tipo de Lista:</label>
                <select id="lista">
                    <option value="S">SUBIDA</option>
                    <option value="B">BAJADA</option>
                </select>
            </div>
        
            <div class="two wide field">
                <label># Grupo:</label>
                <input type="text" class="number" id="grupo" value="1">
            </div>
        
            <div class="two wide field">                
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="ui table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo Vehiculo</th>
                <th>Ingeniero</th>
                <th># Economico</th>
                <th>Grupo</th>
                <th>Tipo Lista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>



<?php include('../Comun/footer_fourteen.php');?>