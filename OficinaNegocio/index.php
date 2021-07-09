<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>
    
    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Datos de la Empresa</h3>
            </div>
            <div class="ten wide field">
            </div>
            <div class="two wide field">
                <div class="ui buttons">
                    <button class="ui gray icon button" onclick="redirect('../Inicio/');">
                        <i class="icon reply"></i>
                    </button>
                    <button class="ui blue icon button" onclick="agregar_ajax();">
                        <i class="icon plus"></i>
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>  

    <div class="ui segment">

        <div class="ui form" id="formOficina">

            <div class="fields">
                <div class="three wide field">
                    <label>Nombre Comercial:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nombrecomercial" class="" maxlength="100" tabindex="1">
                </div>

                <div class="three wide field">
                    <label>Código Postal:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="codigopostal" class="number" maxlength="5" tabindex="9">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Giro del Negocio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="gironegocio" class="" maxlength="100" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Estado:</label>
                </div>
                <div class="five wide field">
                    <select id="estado" tabindex="10">
                    </select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Calle:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="calle" class="" maxlength="100" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Municipio:</label>
                </div>
                <div class="five wide field">
                    <select id="municipio" tabindex="11">
                    </select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Número Exterior:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="numeroext" class="" maxlength="10" tabindex="4">
                </div>

                <div class="three wide field">
                    <label>Telefono:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="telefono" class="" maxlength="50" tabindex="12">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Número Interior:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="numeroint" class="" maxlength="10" tabindex="5">
                </div>

                <div class="three wide field">
                    <label>Nombre de la Oficina:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nombreoficina" class="" maxlength="50" tabindex="13">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Entre Calles:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="entrecalles" class="" maxlength="100" tabindex="6">
                </div>

                <div class="three wide field">
                    <label>Correo Electronico:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="correoelectronico" class="" maxlength="50" tabindex="14">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Colonia:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="colonia" class="" maxlength="50" tabindex="7">
                </div>

                <div class="three wide field">
                    <label>Representante Legal:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="representantelegal" class="r" maxlength="50" tabindex="15">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="ciudad" class="" maxlength="50" tabindex="8">
                </div>

                <div class="three wide field">
                    <label>Sexo Representante Legal:</label>
                </div>
                <div class="five wide field">
                    <select id="sexorepresentantelegal" tabindex="16">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            
        </div>

    </div>

<?php include('../Comun/footer_fourteen.php');?>