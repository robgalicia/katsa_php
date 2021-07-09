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
        <div class="fields">
            <div class="two wide field">
                <h3>Reporte de Aniversarios</h3>
            </div>  
            <div class="four wide field">
                <!-- <label>Puesto:</label>
                <select id="puesto"></select> -->
            </div>                     
            <div class="four wide field"> 
                <!-- <label>Categoria:</label>
                <select id="categoria"></select>-->
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
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>         
        </div>
    </div>

    <table class="ui table">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>rfc</th>
            <th>Curp</th>
            <th>Departamento</th>
            <th>Puesto</th>
            <th>Region</th>
            <th>Adscripcion</th> 
            <th>Fecha Nacimiento</th>            
            <th>Edad</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../Comun/footer_six.php');?>