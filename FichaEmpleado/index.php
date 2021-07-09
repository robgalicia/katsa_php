<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

<style>
    .flotarDerecha{
        float : right!important;
    }

    @media print {
        .menu_ocultar {
            display: none;
            visibility: hidden;
        }

        .form {
            display: none;
            visibility: hidden;
        }
        
        body {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui gray icon button" onclick="histBack();">
                    <i class="icon reply"></i>
                </button>
                <button class="ui blue icon button" onclick='window.print();'>
                    <i class="print icon"></i>
                </button>
            </div>            
        </div>
    </div>
    
    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Datos del Empleado
    </h4>
    <div class="scroll">
        <table class="ui celled structured compact table" id="tabla_datos_empleado">
            <thead>
                <tr>            
                    <th colspan="2" class="eight wide center aligned">GENERALES</th>
                    <th colspan="2" class="eight wide center aligned">DOMICILIO</th>            
                </tr>
            </thead>
            <tbody id="tbody_datos_empleado">
                <tr>
                    <td>Nombre</td>
                    <td id="nombre_datos_empleado"></td>
                    <td>Calle</td>
                    <td id="calle_datos_empleado"></td>
                </tr>
                <tr>
                    <td>Fecha de Nac</td>
                    <td id="nacimiento_datos_empleado"></td>
                    <td>No.Ext</td>
                    <td id="ext_datos_empleado"></td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td id="sexo_datos_empleado"></td>
                    <td>No. Int</td>
                    <td id="int_datos_empleado"></td>
                </tr>
                <tr>
                    <td>Edad</td>
                    <td id="edad_datos_empleado"></td>
                    <td>Mcipio</td>
                    <td id="municipio_datos_empleado"></td>
                </tr>
                <tr>
                    <td>Edo. Civil</td>
                    <td id="edocivil_datos_empleado"></td>
                    <td>Entidad</td>
                    <td id="entidad_datos_empleado"></td>
                </tr>
                <tr>
                    <td>RFC</td>
                    <td id="rfc_datos_empleado"></td>
                    <td>Colonia</td>
                    <td id="colonia_datos_empleado"></td>
                </tr>
                <tr>
                    <td>CURP</td>
                    <td id="curp_datos_empleado"></td>
                    <td>C.P.</td>
                    <td id="cp_datos_empleado"></td>
                </tr>
                <tr>
                    <td>NSS</td>
                    <td id="nss_datos_empleado"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CUIP</td>
                    <td id="cuip_datos_empleado"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tipo de Sangre</td>
                    <td id="tiposangre_datos_empleado"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    </div>

    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Contacto
    </h4>
    <div class="scroll">
        <table class="ui celled structured compact table" id="tabla_contacto">
            <thead>
                <tr>            
                    <th colspan="2" class="eight wide center aligned">DATOS DE CONTACTO DEL EMPLEADO</th>
                    <th colspan="2" class="eight wide center aligned">CONTACTO DE EMERGENCIA</th>
                </tr>
            </thead>
            <tbody id="tbody_contacto">
                <tr>
                    <td>Teléfono 1</td>
                    <td id="telefono1_contacto"></td>
                    <td>Nombre</td>
                    <td id="nombre_contacto"></td>
                </tr>
                <tr>
                    <td>Teléfono 2</td>
                    <td id="telefono2_contacto"></td>
                    <td>Teléfono</td>
                    <td id="telefono_contacto"></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td id="correo_contacto"></td>
                    <td>Correo</td>
                    <td id="correoemer_contacto"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Datos Bancarios
    </h4>
    <div class="scroll">
        <table class="ui celled structured compact table" id="tabla_datos_bancarios">
            <thead>
                <tr>
                    <th colspan="2" class="eight wide center aligned">DATOS BANCARIOS</th>
                    <th colspan="2" class="eight wide center aligned"></th>
                </tr>
            </thead>
            <tbody id="tbody_datos_bancarios">
                <tr>
                    <td>Banco</td>
                    <td id="banco_bancarios"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>No. Cuenta</td>
                    <td id="cuenta_bancarios"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CLABE</td>
                    <td id="clabe_bancarios"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tarjeta de Débito</td>
                    <td id="tarjeta_bancarios"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Infonavit
    </h4>
    <div class="scroll">
        <table class="ui celled structured compact table" id="tabla_infonavit">
            <thead>
                <tr>
                    <th colspan="4" class="sixteen wide center aligned">INFONAVIT/FONACOT</th>            
                </tr>
            </thead>
            <tbody id="tbody_infonavit">
                <tr>
                    <td>¿Tiene Crédito?</td>
                    <td id="tienecredito_infonavit"></td>
                    <td>Tipo de Crédito</td>
                    <td id="tipo_infonavit"></td>
                </tr>
                <tr>
                    <td>Número de Crédito</td>
                    <td id="numero_infonavit"></td>
                    <td>% de Dscto</td>
                    <td id="descuento_infonavit"></td>
                </tr>
                <tr>
                    <td>Fecha de Contrato</td>
                    <td id="fecha_infonavit"></td>
                    <td>No. de S.M.</td>
                    <td id="nosm_infonavit"></td>
                </tr>        
            </tbody>
        </table>
    </div>

    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Beneficiarios
    </h4>
    <div class="scroll">
        <table class="ui compact table" id="tabla_beneficiarios">
            <thead>
                <tr>
                    <!-- Generales -->
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Parentesco</th>
                    <th>Teléfono</th>
                    <th>Correo</th>                    
                    
                </tr>
            </thead>
            <tbody id="tbody_beneficiarios">
            </tbody>
        </table>
    </div>


    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Documentos
    </h4>
    <table class="ui compact table" id="tabla_documentos">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Documento</th>
                <th>Entregado</th>
                <th>Es Obligatorio</th>
                <th>Num. Folio</th>
                <th>Fec. Emisión</th>
                <th>Inicio Vigencia</th>
                <th>Final Vigencia</th>
            </tr>
        </thead>
        <tbody id="tbody_documentos">
            
        </tbody>
    </table>

<?php include('../Comun/footer_fourteen.php');?>