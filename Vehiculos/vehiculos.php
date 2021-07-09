<?php include('../Comun/header_fourteen.php');?>

<script src="../Comun/dropdown.js"></script>
<script src="../Comun/funciones.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="vehiculos.js"></script>
<!-- Include stylesheet -->    

<style type="text/css">
    .dropzoneBorder {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .tabular.menu{
        border-bottom-color: #4abdac !important;        
    }

    .tabular.menu .active.item{
        background-color: #b6e8f5 !important;
        color: #4abdac !important;
        border-color: #4abdac !important;
    }

    .tabular.menu .item{
        background-color: #dfeff5 !important;        
    }

    .tabular.menu .right.menu .item{
        background-color: white !important;        
    }

    .tab.segment.active{
        border-color: #4abdac !important;
    }

    .vermillion{
        color: #fc4a1a !important;
    }

    .footer.segment {
        padding: 5em 0em;
    }

    @media only screen and (max-width: 700px) {}
</style>
<script>    
    $(document).ready(function() {
        $('.menu .item').tab();
    });
</script>


<h3>Vehículos</h3>

<div class="ui top attached tabular menu">
    <a class="item active" data-tab="tabGenerales">Generales</a>
    <a class="item tabocultar" data-tab="tabResguardos">Resguardos</a>
    <a class="item tabocultar" data-tab="tabMantenimimento">Mantenimiento</a>
    <a class="item tabocultar" data-tab="tabCombustible">Combustible</a>
    <a class="item tabocultar" data-tab="tabIncidencias">Incidencias</a>
    <a class="item tabocultar" data-tab="tabSeguros">Seguros</a>
    <a class="item tabocultar" data-tab="tabTenencias">Tarjetas de Circulación</a>
    <div class="right menu">
        <div class="item">
            <div class="ui buttons">
                <button class="ui gray icon button" onclick="histBack();">
                    <i class="icon reply"></i>
                </button>
                <button class="ui blue icon button" onclick="agregar_vehiculo_ajax();" id="boton_registrar">
                    <i class="icon plus"></i>
                    Registrar
                </button>
            </div>
        </div>
    </div>
</div>

<div class="ui bottom attached tab segment active" data-tab="tabGenerales">
    <?php include('tabs/tabGenerales.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabResguardos">
    <?php include('tabs/tabResguardo.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabMantenimimento">
    <?php include('tabs/tabMantenimiento.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabCombustible">
    <?php include('tabs/tabCombustible.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabIncidencias">
    <?php include('tabs/tabIncidencias.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabSeguros">
    <?php include('tabs/tabSeguros.php');?>
</div>

<div class="ui bottom attached tab segment" data-tab="tabTenencias">
    <?php include('tabs/tabTenencias.php');?>
</div>

<?php include('../module_files/modal_agregar_files.php');?>

<?php include('../Comun/footer_fourteen.php');?>