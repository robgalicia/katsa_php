<div class="ui form" id="formGenerales">

    <div class="fields">
        <div class="three wide field">
            <label>Marca:</label>                    
        </div>
        <div class="five wide field">
            <select id="marca" validate="true" tabindex="1"></select>
        </div>

         <div class="three wide field">
            <label>Número Económico:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="num_economico" class="number" maxlength="10" tabindex="13">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Submarca:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="sub_marca" maxlength="50" tabindex="2" validate="true">
        </div>

         <div class="three wide field">
            <label>Region Actual:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="region" tabindex="14" disabled>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Año Modelo:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="anio_modelo" class="number" maxlength="4" tabindex="3" validate="true">
        </div>

         <div class="three wide field">
            <label>Adscripción Actual:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="adscripcion" tabindex="15" disabled>            
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Placas:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="placas" maxlength="8" tabindex="4">
        </div>

         <div class="three wide field">
            <label>Cliente Actual:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="cliente" tabindex="16" disabled>            
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Color:</label>                    
        </div>
        <div class="five wide field">            
            <select id="color" tabindex="5">
            </select>

        </div>
    
         <div class="three wide field">
            <label>Empleado Resguardo:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="empleadoresguardo" tabindex="17" disabled>            
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Cilindros:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="cilindros" class="number money" maxlength="2" tabindex="6">
        </div>
    
         <div class="three wide field">
            <label>¿Es Arrendado?:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="arrendado" id="arrendado_si" tabindex="18">
                <label>SI</label>
            </div>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="arrendado" id="arrendado_no" checked="checked">
                <label>NO</label>
            </div>
        </div>
        <div class="one wide field">        
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Número de Serie:</label>                    
        </div>
        <div class="five wide field">
            <input type="text" id="num_serie" maxlength="20" tabindex="7">
        </div>
    
         <div class="three wide field">
            <label>Propietario:</label>
        </div>
        <div class="five wide field">
            <select id="propietario" tabindex="19"></select>
        </div>
    </div>


    <div class="fields">
        <div class="three wide field">
            <label>Número de Motor:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="num_motor" maxlength="10" tabindex="8">
        </div>
    
         <div class="three wide field">
            <label>Kilometraje Actual:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="km_actual" tabindex="20" disabled>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Tipo de Transmisión:</label>
        </div>
        <div class="five wide field">
            <select id="tipo_transmision" validate="true" tabindex="9">
                <option value="AUT">AUTOMATICA</option>
                <option value="STD">ESTANDARD</option>
            </select>
        </div>
    
         <div class="three wide field">
            <label>Fecha Kilometraje:</label>
        </div>
        <div class="five wide field">
            <input type="date" id="fecha_km" tabindex="21" disabled>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Tipo de Combustible:</label>
        </div>
        <div class="five wide field">
            <select id="tipo_combustible" validate="true" tabindex="10">                
            </select>
        </div>
    
         <div class="three wide field">
            <label>Kilometraje Mantenimiento:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="km_mantenimiento" tabindex="22" disabled>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Capacidad Tanque (lts):</label>
        </div>
        <div class="five wide field">
            <input type="text" id="capacidad_tanque" class="number" maxlength="6" validate="true" tabindex="11">
        </div>
    
         <div class="three wide field">
            <label>Fecha Ult. Mantenimiento:</label>
        </div>
        <div class="five wide field">
            <input type="date" id="utlimo_mantenimiento" tabindex="23" disabled>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Tarjeta Combustible:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="tarjeta_combustible" class="number" tabindex="12">
        </div>
    
         <div class="three wide field">
            <label>Estatus:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="estatus" tabindex="24" disabled>            
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Fecha de Baja:</label>
        </div>
        <div class="five wide field">
            <input type="date" id="fecha_baja" tabindex="13">
        </div>
    
         <div class="three wide field">
            <label>Observaciones:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="observaciones" maxlength="100" tabindex="25">
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
            <label>Motivo de Baja:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="motivo_baja" maxlength="100" tabindex="14">
        </div>
    
         <div class="three wide field">
            <label>Tiene GPS:</label>
        </div>
        <div class="two wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="tiene_gps" id="tiene_gps_si">
                <label>SI</label>
            </div>
        </div>
        <div class="three wide field">
            <div class="ui slider checkbox">
                <input type="radio" name="tiene_gps" id="tiene_gps_no" checked>
                <label>NO</label>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="three wide field">
        
        </div>
        <div class="five wide field">
        
        </div>
    
         <div class="three wide field">
            <label>Proveedor de GPS:</label>
        </div>
        <div class="five wide field">
            <input type="text" id="proveedor_gps" maxlength="50" tabindex="27">
        </div>
    </div>



</div>