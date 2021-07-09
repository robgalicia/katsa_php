<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="six wide field">
                <h3>Partidas</h3>
            </div>  
            <div class="four wide field">
                <label>Tipo de Partida:</label>                
                <select id="tipo_partida">
                    <option value="G">GASTOS</option>
                    <option value="C">COSTOS</option>
                    <option value="I">INVERSIONES</option>
                </select>                    
            </div>                     
            <div class="four wide field">
                <label>Partidas:</label>                
                <input id="partidas_mdl">                  
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue basic icon button" onclick='mostrarModal(0);'>
                    <i class="plus icon"></i>
                </button>
            </div>         
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Clave</th>
                <th>Descripción Partida</th>
                <th>Cuenta Contable</th>
                <th>Tipo Partida</th> 
                <th>Importe Unitario</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>

<?php include('../Comun/footer_fourteen.php');?>