<div class="ui form" id="formDatosLab">

    <div class="fields">
        <div class="three wide field">
            <label>Fecha Ingreso:</label>                    
        </div>
        <div class="five wide field">
            <input type="date" id="fechaIngreso" validate="true" tabindex="1">
        </div>

        <div class="three wide field">
            <label>Número IMSS:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="numIMSS" class="number" maxlength="11" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Fecha Reingreso:</label>                    
        </div>
        <div class="five wide field">
            <input type="date" id="fechaReingreso" tabindex="1">
        </div>

        <div class="three wide field">
            <label>Sueldo Diario IMSS:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="sueldoDiaIMSS" class="number money" maxlength="20" validate="true" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Departamento:</label>                    
        </div>
        <div class="five wide field">
            <select id="departamento" validate="true" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Sueldo Neto Mensual:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="sueldoNetoMes" class="number money" maxlength="20" validate="true" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Puesto Tabulador:</label>                    
        </div>
        <div class="five wide field">
            <select id="puestoTab" validate="true" maxlength="30" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Banco de Pago:</label>
        </div>
        <div class="five wide field">
            <select id="bancoDePago" tabindex="7"></select>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Puesto Organigrama:</label>                    
        </div>
        <div class="five wide field">
            <select id="puestoOrgani" validate="true" maxlength="30" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Número de Cuenta:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="numCuenta" class="number" maxlength="10" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Puesto Registro SNSP:</label>                    
        </div>
        <div class="five wide field">
            <select id="puestoSNSP" validate="true" maxlength="30" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>CLABE Interbancaria:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="CLABE" class="number" maxlength="18" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Región:</label>                    
        </div>
        <div class="five wide field">
            <select id="region" validate="true" maxlength="30" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Tarjeta de Débito:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tarjetaDebito" class="number" maxlength="16" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Lugar de Adscripción:</label>                    
        </div>
        <div class="five wide field">
            <select id="lugarAds" validate="true" maxlength="30" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Num. Crédito Infonavit:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="numInfonavit" class="number" maxlength="10" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Cliente:</label>
        </div>
        <div class="five wide field">
            <select id="cliente" validate="true" tabindex="1"></select>
        </div>

        <div class="three wide field">
            <label>Fecha Otorgamiento:</label>
        </div>
        <div class="five wide field">
            <input type="date" id="fechaOtorgamiento" tabindex="7">
        </div>
    </div>

    <div class="fields">        

        <div class="three wide field">
            <label>Fecha Baja:</label>
        </div>
        <div class="five wide field">
            <input type="date" id="fechaBaja" tabindex="1">
        </div>

        <div class="three wide field">
            <label>Tipo de Crédito:</label>
        </div>
        <div class="five wide field">
            <select id="tipoCredito" tabindex="7">
                <option value="">Seleccione</option>
                <option value="P">Porcentaje</option>
                <option value="S">Salarios Minimos</option>
                <option value="C">Costo Fijo</option>
            </select>
        </div>
    </div>

    <div class="fields">
        
        <div class="three wide field">
            <label>Motivo Baja:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="motivoBaja" maxlength="100" tabindex="1">
        </div>

        <div class="three wide field">
            <label>Valor de Descuento:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="valorDesc" class="number money" maxlength="20" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="two wide field">
            <label>Empleado Outsourcing:</label>                    
        </div>
        <div class="one wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="empleadoOut" id="empleadoOut_si">
                <label>SI</label>
            </div>
        </div>
        <div class="one wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="empleadoOut" id="empleadoOut_no" checked="checked">
                <label>NO</label>
            </div>
        </div>
        <div class="one wide field">            
        </div>
        <div class="three wide field">
            <select id="empresaOut" maxlength="30" tabindex="1"></select>
        </div>

        <!-- AQUI FALTAN 8 wide -->
    </div>

    <div class="ui divider"></div>

    <div class="fields">
        <div class="three wide field">
            <label>Talla Camisa:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tallaCamisa" maxlength="5" tabindex="7">
        </div>

        <div class="three wide field">
            <label>Talla Pantalon:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tallaPantalon" maxlength="5" tabindex="7">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Talla Zapatos:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tallaZapatos" maxlength="5" tabindex="7">
        </div>

        <div class="three wide field">
            <label>Talla Chamarra:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tallaChamarra" maxlength="5" tabindex="7">
        </div>
    </div>
    
    <div class="fields">
        <div class="three wide field">
            <label>Capacitación Básica:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capaBasica" id="capaBasica_si">
                <label>SI</label>
            </div>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capaBasica" id="capaBasica_no" checked="checked">
                <label>NO</label>
            </div>
        </div>

        <div class="one wide field">
            <!--<select id="capaBasica" maxlength="30" tabindex="1">
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>-->
        </div>

        <div class="three wide field">
            <label>Cap. Seguridad Bienes:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capBienes" id="capBienes_si">
                <label>SI</label>
            </div>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capBienes" id="capBienes_no" checked="checked">
                <label>NO</label>
            </div>
        </div>
        <div class="one wide field">
            <!--<select id="capBienes" maxlength="30" tabindex="1">
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>-->
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Cap. Manejo Defensivo:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capDefensivo" id="capDefensivo_si">
                <label>SI</label>
            </div>
            <!--<select id="capDefensivo" maxlength="30" tabindex="1">
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>-->
        </div>

        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capDefensivo" id="capDefensivo_no" checked="checked">
                <label>NO</label>
            </div>
        </div>

        <div class="one wide field"></div>

        <div class="three wide field">
            <label>Cap. Primeros Auxilios:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capAuxilios" id="capAuxilios_si">
                <label>SI</label>
            </div>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="capAuxilios" id="capAuxilios_no" checked="checked">
                <label>NO</label>
            </div>
        </div>
        <div class="one wide field">
            <!--<select id="capAuxilios" maxlength="30" tabindex="1">
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>-->
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Requiere Registro SNSP:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="reqSNSP" id="reqSNSP_si">
                <label>SI</label>
            </div>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="reqSNSP" id="reqSNSP_no" checked="checked">
                <label>NO</label>
            </div>
        </div>
        <div class="one wide field">
            <!--<select id="reqSNSP" maxlength="30" tabindex="1">
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>-->
        </div>

        <div class="three wide field">
            <label>Estatus Registro SNSP:</label>
        </div>
        <div class="five wide field">
            <select id="estatusSNSP" maxlength="30" tabindex="1">                
            </select>
        </div>
    </div>

</div>