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
                <h3>Consumo de Gasolina</h3>
            </div>
            <div class="four wide field">                
            </div>
            <div class="four wide field">
                <label>Semana</label>
                <input type="text" id="semana" maxlength="2">
            </div>  
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
            </div>        
        </div>
    </div>

    <div class="scroll">
        <table class="ui table">
            <thead>
                <tr>               
                    <th>Semana</th>                    
                    <th>Número de Tarjeta</th>
                    <th>Responsable</th>                
                    <th>Litros</th>
                    <th>Importe</th>                    
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

<?php include('../Comun/footer_fourteen.php');?>