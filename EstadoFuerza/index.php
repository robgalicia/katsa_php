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
            <div class="eleven wide field">
                <h3>Estado de Fuerza</h3>
            </div>
            <div class="four wide field">
                <div class="ui radio checkbox">
                    <input type="radio" name="radioact" checked="true" value="1" id="activo">
                    <label>Activo</label>
                </div>
                <div class="ui radio checkbox">
                    <input type="radio" name="radioact" value="2" id="inactivo">
                    <label>Inactivo</label>
                </div>
            </div>                   
            <div class="three wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>         
        </div>
    </div>

    <div class="scroll">
        <table class="ui table">
            <thead>
                <tr>               
                    <th>Num</th>
                    <th>Estatus</th>
                    <th>Empresa</th>
                    <th>Entidad</th>                
                    <th>Municipio</th>
                    <th>Cliente</th>
                    <th>Adscripción</th>
                    <th>Conclusión de servicio</th>
                    <th>Nombre Empleado</th>                
                    <th>Sueldo Neto</th>
                    <th>Puesto Tabulador</th>
                    <th>Puesto Según Organigrama</th>
                    <th>Funciones</th>
                    <th>Tipo de puesto según registro</th>                
                    <th>¿REQUIERE REGISTRO?</th>
                    <th>ESTATUS DEL REGISTRO</th>
                    <th>Básic</th>
                    <th>Seg Inmueb</th>
                    <th>Manejo Def</th>  
                    <th>los aux</th>               
                    <th>CUIP</th>
                    <th>CURP</th>
                    <th>RFC</th>
                    <th>NSS</th>                
                    <th>Grupo Sanguineo</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Baja</th>
                    <th>Vehiculo Asignado</th>                
                    <th>Marca y Submarca</th>
                    <th>Placas</th>
                    <th>Gasolina</th>
                    <th>Diesel</th>
                    <th>Consumo al mes</th>                
                    <th>Modalidad Asignada</th>
                    <th>Propietario</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

<?php include('../Comun/footer_fourteen.php');?>