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
                <h3>Altas de Empleados</h3>
            </div>
            <div class="two wide field">
                <label>Tipo Alta:</label>
                <select id="tipo_alta">
                    <option value="N">NOMIPAQ</option>
                    <option value="S">SUA</option>
                </select>
            </div>
            <div class="three wide field">
                <label>Fecha Inicial:</label>
                <input type="date" id="fecha_ini">
            </div>
            <div class="three wide field">
                <label>Fecha Final:</label>
                <input type="date" id="fecha_fin">
            </div>  
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='buscar();'>
                    <i class="search icon"></i>
                </button>
            </div>        
        </div>
    </div>

    <div class="scroll">
        <div id="sua_div">
            <table class="ui table" id="sua">
                <thead>
                    <tr>
                        <th>Datos Empleado</th>
                    </tr>
                </thead>
                <tbody id="tbody_sua">
                    
                </tbody>
            </table>
        </div>
        <div id="nomipaq_div">
            <table class="ui table" id="nomipaq">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha de Alta</th>
                        <th>Fecha de Baja</th>
                        <th>Fecha de Reingreso</th>
                        <th>Tipo de Contrato</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th>Tipo de Periodo</th>
                        <th>Salario Diario</th>
                        <th>SBC Parte Fija</th>
                        <th>Base de Cotización</th>
                        <th>Estatus Empleado</th>
                        <th>Departamento</th>
                        <th>Sindicalizado</th>
                        <th>Base de Pago</th>
                        <th>Metodo de Pago</th>
                        <th>Turno de Trabajo</th>
                        <th>Zona de Salario</th>
                        <th>Campo Extra 1</th>
                        <th>Campo Extra 2</th>
                        <th>Campo Extra 3</th>
                        <th>Afore</th>
                        <th>Expediente</th>
                        <th>Num Seguridad Social</th>
                        <th>rfc</th>
                        <th>curp</th>
                        <th>sexo</th>
                        <th>Ciudad de Nacimiento</th>
                        <th>Fecha de Nacimiento</th>
                        <th>UMF</th>
                        <th>Nombre del Padre</th>
                        <th>Nombre de la Madre</th>
                        <th>Direccion</th>
                        <th>Puesto</th>
                        <th>Poblacion</th>
                        <th>Entidad Federativa de Domicilio</th>
                        <th>CP</th>
                        <th>Estado Civil</th>
                        <th>Telefono</th>
                        <th>Aviso pendiente modificación SBC</th>
                        <th>Aviso Pendiente Reingreso imss</th>
                        <th>Aviso Pendiente Baja imss</th>
                        <th>Aviso pendiente cambio base cotización</th>
                        <th>Fecha del Salario Diario</th>
                        <th>Fecha SBC parte fija</th>
                        <th>Salario Variable</th>
                        <th>Fecha Salario Variable</th>
                        <th>Salario Promedio</th>
                        <th>Fecha Salario Promedio</th>
                        <th>Salario Base Liquidacion</th>
                        <th>Saldo del ajuste al neto</th>
                        <th>Calculo ptu</th>
                        <th>Calculo Aguinaldo</th>
                        <th>Banco para Pago Electronico</th>
                        <th>Numero de Cuenta Para Pago Electronico</th>
                        <th>Sucursal para Pago Electronico</th>
                        <th>Causa de la Ultima Baja</th>
                        <th>Campo Extra Numerico 1</th>
                        <th>Campo Extra Numerico 2</th>
                        <th>Campo Extra Numerico 3</th>
                        <th>Campo Extra Numerico 4</th>
                        <th>Campo Extra Numerico 5</th>
                        <th>Fecha Salario Mixto</th>
                        <th>Salario Mixto</th>
                        <th>Registro Patronal del imss</th>
                        <th>Numero Fonacot</th>
                        <th>Correo Electronico</th>
                        <th>Tipo de régimen</th>
                        <th>Clabe Interbancaria</th>
                        <th>Entidad Federativa de Nacimiento</th>
                        <th>Tipo de Prestacion</th>
                        <th>Extranjero sin CURP</th>
                    </tr>
                </thead>
                <tbody id="tbody_nomipaq">
                    
                </tbody>
            </table>
        </div>
    </div>

<?php include('../Comun/footer_fourteen.php');?>