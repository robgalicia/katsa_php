<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Cotización de Servicios</h3>
            </div>
            <div class="four wide field">
                
            </div>
            <div class="three wide field">
                <label>Ejercicio:</label>                
                <input id="ejercicio" class="number" maxlength="4">
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
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue basic icon button" onclick='redirect("agregar_orden.php?id_orden_G=0")'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                                
                <th>Clave</th>
                <th>Folio Orden Compra</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Folio Cotización</th>
                <th>Lugar de Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>    

<?php include('modal_agregar.php');?>
<?php include('../Comun/footer_fourteen.php');?>