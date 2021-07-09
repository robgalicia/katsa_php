<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Agenda de Entregables</h3>
            </div>  
            <div class="four wide field">
                <label>Puesto:</label>
                <select id="puesto"></select>
            </div>                     
            <div class="four wide field"> 
                <label>Categoria:</label>
                <select id="categoria"></select>              
            </div>
            <div class="two wide field"> 
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
                <label>Año:</label>
                <input id="anio"></input>              
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue basic icon button" onclick='mostrarModal(0);'>
                    <i class="plus icon"></i>
                </button>
            </div>         
        </div>
        <div class="fields">
            <div class="six wide field"> 
                <label>Entregable:</label>
                <select id="entregable"></select>              
            </div>
        </div>
    </div>

    <table class="ui table">
        <thead>
            <tr>
                <th>Fecha</th>        
                <th>Entregable</th>
                <th>Cantidad</th>
                <th>Cumplidos</th>       
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>
<?php include('modal_upd.php');?>

<?php include('../Comun/footer_six.php');?>