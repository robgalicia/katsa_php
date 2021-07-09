<?php include('../Comun/header_ten.php');?>

<!-- Include quill js -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/katex.min.css" integrity="sha384-zB1R0rpPzHqg7Kpt0Aljp8JPLqbXI3bhnPWROx27a9N0Ll6ZP/+DiW/UqRcLbRjq" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/katex.min.js" integrity="sha384-y23I5Q6l+B6vatafAwxRu/0oK/79VlbSz7Q9aiSZUvyWYIYsd+qj+o24G5ZU2zJz" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/contrib/auto-render.min.js" integrity="sha384-kWPLUVMOks5AQFrykwIup5lo0m3iMkkHrD0uJ4H5cjeGihAutqP0yW0J6dpFiVkI" crossorigin="anonymous"
	onload="renderMathInElement(document.body);"></script>

<script src="../js_css/xepOnline.jqPlugin.js"></script>
<script src="../Comun/dropdown.js"></script>
<script src="../Comun/validacion.js"></script>

<script src="editarformatoLegal.js"></script>

<style>
	#toolbar-container .ql-font span[data-label="Sans Serif"]::before {
		font-family: "Sans Serif";
	}
	
	#toolbar-container .ql-font span[data-label="Inconsolata"]::before {
		font-family: "Inconsolata";
	}
	
	#toolbar-container .ql-font span[data-label="Roboto"]::before {
		font-family: "Roboto";
	}
	
	#toolbar-container .ql-font span[data-label="Mirza"]::before {
		font-family: "Mirza";
	}
	
	#toolbar-container .ql-font span[data-label="Arial"]::before {
		font-family: "Arial";
	}
	/* Set content font-families */
	
	.ql-font-inconsolata {
		font-family: "Inconsolata";
	}
	
	.ql-font-roboto {
		font-family: "Roboto";
	}
	
	.ql-font-mirza {
		font-family: "Mirza";
	}
	
	.ql-font-arial {
		font-family: "Arial";
	}
</style>

<!--<a href="#" class="ui blue button" onclick="return xepOnline.Formatter.Format('editor',
                {pageWidth:'216mm', pageHeight:'279mm'});">
    PDF
</a>-->
<div class="ui form" id="formReporte">
	<div class="fields">
		<div class="three wide field">
			<label>Clave</label>
			<input type="text" id="clave" maxlength="3" tabindex="5">
		</div>
		<div class="five wide field">
			<label>Nombre</label>
			<input type="text" id="nombre" maxlength="50" tabindex="5">
		</div>
		<div class="five wide field">
			<label>Nombre Generico</label>
			<input type="text" id="nombreGen" maxlength="50" tabindex="5">
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
</div>

<div class="hidden divider"></div>

<!-- Create the editor container -->
<div id="editor" style="background-color: white;">  
</div>

<div class="ui hidden divider"></div>
<div class="ui hidden divider"></div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
	

	$(document).ready(function() {
	
		
	});
</script>


<?php include('../Comun/footer_ten.php');?>