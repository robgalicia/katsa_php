<?php include('../Comun/header_ten.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Permisos del Sistema</h3>    
            </div>
            <div class="ten wide field"></div>
            <div class="two wide field">                
            </div>
        </div>
    </div>


    <table class="ui table" id="tableP">
        <thead>
            <tr>                
                <th>Nombre</th>                
                <th>Empleado</th>
                <th>Acciones</th>            
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>


    <div class="ui mini modal" id="modal_paginas">
        <i class="close icon"></i>
        <div class="header">
            Permisos de Página
        </div>
        <div class="content">
            <table class="ui selectable celled definition table">
                <thead>
                    <th></th>
                    <th>Paginas</th>
                </thead>
                <tbody id="bodyPag"></tbody>
            </table>
        </div>
        <div class="actions">
            <a class="ui blue left labeled icon cancel button" id="btn_cancelar_dep">
                <i class="reply icon"></i>
                Aceptar
            </a>        
        </div>
    </div>
    
<?php include('../Comun/footer_ten.php');?>