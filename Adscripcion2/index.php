<?php include('../Comun/header_fourteen.php');?>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<style>
    .flotarDerecha{​​​​​
        float : right!important;
    }​​​​​
</style>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="../Comun/funciones.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3> Adscripcion </h3>
            </div>            
            <div class="ten wide field">                
            </div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue icon button" onclick='redirect("adscripcion_agregar.php?id_ad_g=0");'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Clave</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Baja</th>
                <th>Ciudad</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../Adscripcion2/modal_agregar.php');?>

<?php include('../Comun/footer_fourteen.php');?>