<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="six wide field">
                <h3>Artículo</h3>
            </div>
            <div class="four wide field"></div>
            <div class="inline fields">                    
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" id="tipo_articulo_nombre">
                        <label>NOMBRE</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" id="tipo_articulo_descripcion">
                        <label>DESCRIPCIÓN</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="tipo_articulo" checked="checked" id="tipo_articulo_ambos">
                        <label>AMBOS</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="nine wide field">
            
            </div>
            <div class="one wide field">
                <label class="ui right aligned">Descripción:</label>
                <!--<label>Tipo:</label>
                <select id="tipo_articulo">
                    <option value="N">NOMBRE</option>
                    <option value="D">DESCRIPCION</option>
                    <option value="A">AMBOS</option>
                </select>-->
            </div>
            <div class="four wide field">                
                <input id="desc_articulo">                  
            </div>
            <div class="two wide field">                
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
                <th>Código</th>
                <th>Nombre Artículo</th>
                <th>Descripción Proveedor</th>
                <th>Proveedor</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>

<?php include('../Comun/footer_fourteen.php');?>