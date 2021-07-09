<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Reporte de Entregables</h3>
            </div>  
            <div class="four wide field">
                <label>Puesto:</label>
                <select id="puesto"></select>
            </div>                     
            <div class="four wide field"> 
                <label>Categoria:</label>
                <select id="categoria"></select>              
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
                <th></th>        
                <th>Responsable</th>
                <th>Entregable</th>
                <th>Cantidad</th>       
                <th>Cumplidos</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../Comun/footer_six.php');?>