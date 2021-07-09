<div class="ui modal" id="modal_traslado">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="five wide field">
                    <label>Folio Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="folio" class="number" maxlength="8" disabled>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha Servcio:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_servicio" validate="true" tabindex="1" disabled>
                </div>
            </div>

            <!-- <div class="fields">
                <div class="five wide field">
                    <label>Solicitante:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="solicitante" maxlength="50">
                </div> 
            </div>                                                    

            <div class="fields">
                <div class="five wide field">
                    <label>Empresa:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="empresa" maxlength="50">
                </div> 
            </div> 

            <div class="fields">
                <div class="five wide field">
                    <label>Ruta de traslado:</label>
                </div>
                <div class="eleven wide field">
                    <select id="ruta_traslado" validate="true"></select>
                </div> 
            </div> -->
            
            <div class="fields">
                <div class="five wide field">
                    <label>Tipo de Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipo_servicio" validate="true" disabled>
                        <option value="P">Personal</option>
                        <option value="M">Material</option>
                    </select>
                </div> 
            </div> 
        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Cancelar
        </div>
        <div class="ui positive button" onclick="agregar_ajax();">
            Aceptar            
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">BORRAR TRASLADO</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>

<div class="ui modal" id="modal_visitantes">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formVisitantes">

            <div class="fields">
                <div class="five wide field">
                    <label>Nombre:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="nombre_visitante" maxlength="100" tabindex="1">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Empresa:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="empresa_visitante" maxlength="50" tabindex="2">
                </div> 
            </div> 
        </div>

        <div class="actions">
            <div class="ui positive button" onclick="agregar_visitante();">
                Agregar            
            </div>
        </div>
    
        <div class="sixteen wide column">
            <table class="ui table" id="tableVisitantes">
                <thead>
                    <tr style="border-width:0 !important;">
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th id="eliminar">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyV">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="ui modal" id="modal_recorridos">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formRecorridos">

            <div class="fields">
                <div class="four wide field">
                    <label>Fecha Recorrido:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_recorrido" maxlength="100" tabindex="1">
                </div>
                <div class="four wide field">
                    <label>Vehiculo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="vehiculo" maxlength="50" tabindex="4">
                </div> 
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Hora Salida:</label>
                </div>
                <div class="five wide field">
                    <input type="time" id="hora_salida" maxlength="50" tabindex="2"> 
                </div>
                <div class="four wide field">
                    <label>Empresa Vehiculo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empresa_vehiculo" maxlength="50" tabindex="5">
                </div> 
            </div> 

            
            <div class="fields">
                <div class="four wide field">
                    <label>Hora Llegada:</label>
                </div>
                <div class="five wide field">
                    <input type="time" id="hora_llegada" maxlength="100" tabindex="3">
                </div>
                <div class="four wide field">
                    <label>Operador:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="operador" maxlength="50" tabindex="6">
                </div>
            </div> 

            
            <div class="fields">
                <div class="four wide field">
                    <label>Placas:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="placas" maxlength="8" tabindex="4">
                </div>
                <div class="four wide field">
                </div>
                <div class="five wide field">
                </div>
            </div> 

            <div class="fields">
                <div class="four wide field">
                    <label>Recorrido:</label>
                </div>
                <div class="fourteens wide field">
                    <input type="text" id="recorrido" maxlength="150" tabindex="7">
                </div> 
            </div> 

            <div class="fields">
                <div class="four wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="fourteen wide field">
                    <input type="text" id="observaciones" maxlength="100" tabindex="8">
                </div>
            </div> 
        </div>

        <div class="actions">
            <div class="ui positive button" onclick="agregar_recorrido();">
                Agregar            
            </div>
        </div>
    
        <div class="sixteen wide column">
            <table class="ui table" id="tableRecorridos">
                <thead>
                    <tr style="border-width:0 !important;">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Fecha Recorrido</th>
                        <th>Hora Salida</th>
                        <th>Hora Llegada</th>
                        <th>Operador</th>
                        <th>Vehiculo</th>
                        <th>Placas</th>
                        <th id="eliminar">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyR">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="ui modal" id="modal_hojatraslado">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="five wide field">
                    <label>Núm Hoja de Traslado:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="num_hoja_traslado" class="number" maxlength="8" disabled>
                </div>
            </div>
            
            <div class="fields">
                <div class="five wide field">
                    <label>Tipo de Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipo_servicio_ht" validate="true">
                        <option value="P">Personal</option>
                        <option value="M">Material</option>
                    </select>
                </div> 
            </div> 
        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Cancelar
        </div>
        <div class="ui positive button" onclick="hojaInsert();">
            Aceptar            
        </div>
    </div>
</div>