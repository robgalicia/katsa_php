<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Solicitud de Traslado</h3>
            </div>            
            <div class="three wide field">
                <label>Ejercicio:</label>
                <input type="text" maxlength="4" class="number" id="anio">
            </div>
            <div class="three wide field">
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
                <label>Agregar:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue icon button" onclick='mostrarModal(0);'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Folio</th>
                <th>Fecha Servicio</th>
                <th>Solicitante</th>
                <th>Empresa</th>
                <th>Tipo Servicio</th>
                <th>Ruta Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>


<?php include('../SolicitudTraslado/modal_agregar.php');?>
    
<?php include('../Comun/footer_fourteen.php');?>