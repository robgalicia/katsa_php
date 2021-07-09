<div class="ui large modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="two wide field">
                    <label>Descripción:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="desc" validate="true" tabindex="1" maxlength="50">
                </div>
                <div class="two wide field">
                    <label>Ubicación:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="ubicacion" tabindex="10" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Región:</label>
                </div>
                <div class="six wide field">
                    <select id="region" validate="true" tabindex="2"></select>
                </div>
                <div class="two wide field">
                    <label>Calle:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="calle" tabindex="11" maxlength="50">
                </div>
                
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Fecha Baja:</label>
                </div>
                <div class="six wide field">
                    <input type="date" id="fechabaj" tabindex="3" maxlength="50">
                </div>
                <div class="two wide field">
                    <label>Num. Interior:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="numint" tabindex="12" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Fecha Inicio:</label>
                </div>
                <div class="six wide field">
                    <input type="date" id="fechaini" validate="true" tabindex="4" maxlength="50">
                </div>
                
                
                <div class="two wide field">
                    <label>Num. Exterior:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="numext" tabindex="13" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Contacto:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="contacto" tabindex="5" maxlength="50">
                </div>
                <div class="two wide field">
                    <label>Entre calle:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="entrecalle" tabindex="14" maxlength="50">
                </div>
                
                
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Correo Electrónico:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="correo" tabindex="6" maxlength="50">
                </div>
                <div class="two wide field">
                    <label>Y calle:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="ycalle" tabindex="15" maxlength="50">
                </div>
                
                
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="ciudad" tabindex="7" maxlength="50">
                </div>
                <div class="two wide field">
                    <label>CP:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="cp" tabindex="16" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Municipio:</label>
                </div>
                <div class="six wide field">
                    <select id="municipio" validate="true" tabindex="8"></select>
                </div>
                <div class="two wide field">
                    <label>Colonia:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="colonia" tabindex="17" maxlength="50">
                </div>  
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Estado:</label>
                </div>
                <div class="six wide field">
                    <select id="estado" validate="true" tabindex="9"></select>
                </div>
                <div class="two wide field">
                    <label>Teléfono:</label>
                </div>
                <div class="six wide field">
                    <input type="text" id="telefono" tabindex="18" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    
                </div>
                <div class="six wide field">
                    
                </div>
                <div class="two wide field">
                    <label>Distancia en Kms. a Cd. Victoria:</label>
                </div>
                <div class="six wide field">
                    <input type="number" id="kms" tabindex="19" maxlength="50">
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
    <div class="header">ELIMINAR REGISTRO</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>