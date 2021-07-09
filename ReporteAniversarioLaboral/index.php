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
            <div class="four wide field">
                <h3>Reporte de Aniversarios Laborales</h3>
            </div>  
            <div class="two wide field">
                <!-- <label>Puesto:</label>
                <select id="puesto"></select> -->
            </div>                     
            <div class="four wide field"> 
                <!-- <label>Categoria:</label>
                <select id="categoria"></select>-->
            </div>
            <div class="four wide field">                
            </div>
            <div class="four wide field">
                <label>Mes:</label>
                <select id="mes">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
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
            <th>Fecha Ingreso</th>
            <th>outsourcing</th>
            <th>Empresa</th>
            <th>años</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../Comun/footer_six.php');?>