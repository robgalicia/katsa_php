<?php include('../Comun/header_ten.php');?>


<script src="../Comun/dropdown.js"></script>
<script src="../Comun/validacion.js"></script>


<link href="../js_css/editor/summernote-lite.css" rel="stylesheet">
<script src="../js_css/editor/summernote-lite.js"></script>
<script src="../js_css/editor/lang/summernote-es-ES.js"></script>

<script src="editarformatoLegal.js"></script>

<style>
.note-editor .note-editable {
    line-height: 5 !important;
}	
</style>

<div class="ui form" id="formReporte">
	<div class="fields">
		<div class="three wide field">
			<label>Clave</label>
			<input type="text" id="clave" maxlength="2" tabindex="5">
		</div>
		<div class="five wide field">
			<label>Nombre</label>
			<input type="text" id="nombre" maxlength="50" tabindex="5">
		</div>
		<div class="five wide field">
			
		</div>
		<div class="three wide field">
			<label>Acciones</label>
			<div class="ui buttons">
				<button class="ui gray icon button" onclick="redirect('index.php');">
					<i class="icon reply"></i>
				</button>
				<button class="ui blue icon button" onclick="insertarReporte_ajax();"><i class="save icon"></i>Guardar</button>
			</div>
		</div>
	</div>
	<div class="fields">
		<div class="two wide field">
			<label>Margen Derecho</label>
			<input type="text" id="marDer" maxlength="5">
		</div>
		<div class="two wide field">
			<label>Margen Izquierdo</label>
			<input type="text" id="marIzq" maxlength="5">
		</div>
		<div class="two wide field">
			<label>Margen Superior</label>
			<input type="text" id="marAl" maxlength="5">
		</div>
		<div class="two wide field">
			<label>Margen Inferior</label>
			<input type="text" id="MarBa" maxlength="5">
		</div>
		<div class="eight wide field">
			<label>Store Procedure</label>
			<input type="text" id="disparador" maxlength="50">
		</div>
	</div>
</div>

<div class="hidden divider"></div>

<!-- Create the editor container -->
<div id="summernote"></div>

<div class="ui hidden divider"></div>
<div class="ui hidden divider"></div>

<script>

</script>


<?php include('../Comun/footer_ten.php');?>