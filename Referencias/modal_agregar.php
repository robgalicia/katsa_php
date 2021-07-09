<div class="ui large modal" id="modal_referencia">
    <i class="close icon"></i>
    <div class="header">
        Nueva Referencia
    </div>
    <div class="content">
        
        <div class="ui form" id="formReferencia">

            <div class="fields">
                <div class="three wide field">
                    <label>Parentesco:</label>
                </div>
                <div class="five wide field">
                    <select id="parentesco" tabindex="1" validate="true"></select>
                </div>

                <div class="three wide field">
                    <label>Estado</label>
                </div>
                <div class="five wide field">
                    <select id="estado" tabindex="8"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Nombre:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nombre" validate="true" maxlength="50" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Teléfono</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="telefono" maxlength="20" tabindex="9">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Domicilio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="domicilio" maxlength="50" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Correo Electrónico</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="email" maxlength="50" tabindex="10">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Colonia:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="colonia" maxlength="50" tabindex="4">
                </div>

                <div class="three wide field">
                    <label>Fecha Nacimiento:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="nacimiento" tabindex="11">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="ciudad" maxlength="50" tabindex="5">
                </div>

                <div class="three wide field">
                    <label>¿Es Beneficiario?:</label>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="beneficiario" id="beneficiario_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="beneficiario" id="beneficiario_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
                <div class="one wide field">
                    <!--<select id="beneficiario">
                        <option value="S">SI</option>
                        <option value="N">NO</option>
                    </select>-->
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>RFC:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="rfc" maxlength="13" validate="true" tabindex="6">
                </div>

                <div class="three wide field">
                    <label>Porcentaje:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="porcentaje" maxlength="6" class="number money" tabindex="12">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>CURP:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="curp" maxlength="18" tabindex="7">
                </div>

                <div class="three wide field">
                    
                </div>
                <div class="five wide field">
                    
                </div>
            </div>

        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="agregar_ajax();">
            Aceptar            
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">ELIMINAR REFERENCIA</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>