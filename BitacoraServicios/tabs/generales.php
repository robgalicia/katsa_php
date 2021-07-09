<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Región:</label>
            </div>
            <div class="five wide field">
                <select id="region" tabindex="1">
                </select>
            </div>

            <div class="three wide field">
                <label>Número de Acta:</label>
            </div>
            <div class="five wide field">
                <input id="num_acta" tabindex="2" type="number" validate="true">
            </div>
            
        </div>
        <div class="fields">
            <div class="three wide field">
                <label>Cliente (prestatario):</label>
            </div>
            <div class="five wide field">
                <select id="cliente" tabindex="3" validate="true"></select>
            </div>

            <div class="three wide field">
                <label>Fecha Inicio Servicio:</label>
            </div>
            <div class="five wide field">
                <input id="fecha_ini_servicio" tabindex="4" type="date" validate="true">
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Folio Cotización:</label>
            </div>
            <div class="five wide field">
                <select type="text" id="folio" tabindex="5" validate="true"></select>
            </div>
            <div class="three wide field">
                <label>Servicio Habilitado:</label>
            </div>
            <div class="five wide field">
                <select id="servicio" tabindex="6"></select>
            </div> 
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>No. orden de compra (PO):</label>
            </div>
            <div class="five wide field">
                <input id="orden_compra" tabindex="7" maxlength="10">
            </div>
            <div class="three wide field">
                <label>Lugar del Servicio:</label>
            </div>
            <div class="five wide field">
                <input id="lugar_servicio" tabindex="8" validate="true" maxlength="100">
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Emisión de la PO:</label>
            </div>
            <div class="five wide field">
                <input id="fecha_emision" tabindex="9" type="date"></input>
            </div>
            <div class="three wide field">
                <label>No. Elementos Asignados:</label>
            </div>
            <div class="five wide field">
                <input id="elementos" tabindex="10" validate="true" type="number">
            </div>  
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Turno:</label>
            </div>
            <div class="five wide field">
                <select id="turno" tabindex="11" validate="true">
                    <option value="12x12">12x12</option>
                    <option value="12x24">12x24</option>
                    <option value="12x36">12x36</option>
                    <option value="12x24">24x24</option>
                    <option value="24x48">24x48</option>
                </select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Recursos Habilitados</label>
            </div>
            <div class="two wide field">
                <label>Prestador</label>
            </div>
            <div class="two wide field">
                <label>Prestatario</label>
            </div>
        </div>

        <div class="fields" id="panel_vehiculo">
            <div class="three wide field">
                <label>Vehículo:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capVehiculo" id="capVehiculo_Prestador" tabindex="12">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capVehiculo" id="capVehiculo_Prestario" tabindex="12"> 
                    <label></label>
                </div>
            </div>
            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vehiculo" id="tipo_vehiculo_p4" tabindex="13">
                        <label>Pick up 4x4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vehiculo" id="tipo_vehiculo_p2" tabindex="14">
                        <label>Pick up 4x2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vehiculo" id="tipo_vehiculo_sedan" tabindex="15">
                        <label>Sedan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vehiculo"  id="tipo_vehiculo_otro" tabindex="15">
                        <label>Otros</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="fields">
            <div class="three wide field">
                <label>Equipo de comunicación:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capComunicacion" id="capComunicacion_Prestador" tabindex="16">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capComunicacion" id="capComunicacion_Prestario" tabindex="17">
                    <label></label>
                </div>
            </div>

            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_comunicacion" id="tipo_comunicacion_telefono" tabindex="18">
                        <label>Telefono celular</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_comunicacion" id="tipo_comunicacion_radio" tabindex="19">
                        <label>Radio de frecuencia</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>GPS:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capGps" id="capGps_Prestador" tabindex="20">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capGps" id="capGps_Prestario" tabindex="21">
                    <label></label>
                </div>
            </div>

            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_gps" id="tipo_gps_vehicular" tabindex="22">
                        <label>Vehicular</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_gps" id="tipo_gps_app" tabindex="23">
                        <label>App</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_gps" id="tipo_gps_personal" tabindex="24">
                        <label>Personal</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Caseta de Vigilancia:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capVigilancia" id="capVigilancia_Prestador" tabindex="25">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capVigilancia" id="capVigilancia_Prestario" tabindex="26">
                    <label></label>
                </div>
            </div>

            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vigilancia" id="tipo_vigilancia_1" tabindex="27">
                        <label>2.42x2.42</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vigilancia" id="tipo_vigilancia_2" tabindex="28">
                        <label>2.44x3.66</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_vigilancia" id="tipo_vigilancia_3" tabindex="29">
                        <label>2.44x4.88</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Generador Eléctrico:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capGenerador" id="capGenerador_Prestador" tabindex="30">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capGenerador" id="capGenerador_Prestario" tabindex="31">
                    <label></label>
                </div>
            </div>

            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_generador" id="tipo_generador_mecanico" tabindex="32">
                        <label>Mecánico</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_generador" id="tipo_generador_fotovoltaico" tabindex="33">
                        <label>Fotovoltaico</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Medio de Restricción:</label>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capRestriccion" id="capRestriccion_Prestador" tabindex="34">
                    <label></label>
                </div>
            </div>
            <div class="two wide field">
                <div class="ui checkbox">
                    <input type="checkbox" name="capRestriccion" id="capRestriccion_Prestario" tabindex="35">
                    <label></label>
                </div>
            </div>

            <div class="inline fields">                    
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_restriccion" id="tipo_restriccion_plumas" tabindex="36">
                        <label>Pluma</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_restriccion" id="tipo_restriccion_conos" tabindex="37">
                        <label>Conos</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="tipo_restriccion" id="tipo_restriccion_porton" tabindex="38">
                        <label>Portón</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="fields">
           
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="fifteen wide field">
                <input type="text" id="observaciones" tabindex="39" maxlength="200">
            </div>
        </div>
    </div>

    
<?php include('../BitacoraServicios/tabs/articulos.php');?>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>