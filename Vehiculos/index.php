<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Vehiculos</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">                
            </div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue icon button" onclick='redirect("vehiculos.php?idvehiculoG=0");'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Placas</th>
                <th>Marca y Submarca</th>
                <th>Modelo</th>
                <th>Num. Economico</th>
                <th>Cliente</th>
                <th>Lugar de Ads.</th>
                <th>Empresa</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    
<?php include('../Comun/footer_fourteen.php');?>