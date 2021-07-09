<?php include('../Comun/header_fourteen.php');?>

<script src="adscripcion_agregar.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="../Comun/funciones.js"></script>

<div class="ui form">

    <div class="fields">

        <div class="four wide field">

            <h3>Registro de Convenio</h3>

        </div>

        <div class="ten wide field">

        </div>

        <div class="two wide field">

            <div class="ui buttons">

                <button class="ui gray icon button" onclick="redirect('index.php');">

                    <i class="icon reply"></i>

                </button>

                <button class="ui blue icon button" onclick="agregar_ajax();">

                    <i class="icon plus"></i>

                    Registrar

                </button>

            </div>

        </div>

    </div>

</div>

<div class="ui segment">

	<div class="ui form" id="formAdscripcion">
	    <div class="fields">
	        <div class="three wide field">
	            <label>Descripción:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="descripcion_adscripcion" validate="true" maxlength="50">
	        </div>

	        <div class="three wide field">
	            <label>y Calle:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="y_calle_adscripcion" validate="true" maxlength="50">
	        </div>
	    </div>






	    <div class="fields">
	        <div class="three wide field">
	            <label>Region:</label>
	        </div>
	        <div class="five wide field">
	            <select id="region_adscripcion">
	            	
	            </select> 
	        </div>
	        <div class="three wide field">
	            <label>Colonia:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="colonia_adscripcion" validate="true" maxlength="50">
	        </div>
	    </div>




	    <div class="fields">
	        <div class="three wide field">
	            <label>Ubicación:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="ubicacion_adscripcion" validate="true" maxlength="100">
	        </div>
	        <div class="three wide field">
	            <label>Código Postal:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" class="number" id="postal_adscripcion" validate="true" maxlength="5">
	        </div>
	    </div>




	    <div class="fields">
	        <div class="three wide field">
	            <label>Fecha Inicio:</label>
	        </div>
	        <div class="five wide field">
	            <input type="date" id="fecha_adscripcion" validate="true" maxlength="50">
	        </div>
	        <div class="three wide field">
	            <label>Ciudad:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="ciudad_adscripcion" validate="true" maxlength="30">
	        </div>
	    </div>






	    <div class="fields">
	        <div class="three wide field">
	            <label>Fecha Baja:</label>
	        </div>
	        <div class="five wide field">
	            <input type="date" id="fecha_baja_adscripcion" validate="true" maxlength="50">
	        </div>
	        <div class="three wide field">
	            <label>Municipio:</label>
	        </div>
	        <div class="five wide field">
	            <select id="municipio_adscripcion">
	            	
	            </select> 
	        </div>
	    </div>






	    <div class="fields">
	        <div class="three wide field">
	            <label>Calle:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="calle_adscripcion" validate="true" maxlength="50">
	        </div>
	        <div class="three wide field">
	            <label>Estado:</label>
	        </div>
	        <div class="five wide field">
	            <select id="estado_adscripcion">
	            	
	            </select> 
	        </div>
	    </div>






	    <div class="fields">
	        <div class="three wide field">
	            <label>Número Exterior:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" class="number" id="num_ext_adscripcion" validate="true" maxlength="20">
	        </div>
	        <div class="three wide field">
	            <label>Persona Contacto:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="persona_contacto_adscripcion" validate="true" maxlength="50">
	        </div>
	    </div>






	    <div class="fields">
	        <div class="three wide field">
	            <label>Número Interior:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" class="number" id="num_int_adscripcion" validate="true" maxlength="20">
	        </div>
	        <div class="three wide field">
	            <label>Teléfono Contacto:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" Class="number" id="telefono_contacto_adscripcion" validate="true" maxlength="30">
	        </div>
	    </div>









	    <div class="fields">
	        <div class="three wide field">
	            <label>Entre Calle:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="entre_calle_adscripcion" validate="true" maxlength="50">
	        </div>
	        <div class="three wide field">
	            <label>Correo Electrónico:</label>
	        </div>
	        <div class="five wide field">
	            <input type="text" id="correo_adscripcion" validate="true" maxlength="50">
	        </div>
	    </div>

	</div>
</div>
<?php include('../Comun/footer_fourteen.php');?>