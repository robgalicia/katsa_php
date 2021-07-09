var totalLlamadas ='';

function dpd_tipomoneda(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_moneda_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';            

            //string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipomoneda + '">' + ob.desctipomoneda + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_subcontrata(id){
    $.ajax({
        type: "POST",
        url: "../Comun/subcontrata_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idsubcontrata + '">' + ob.nombreempresa + '</option>';
                
            }
            $('#'+id).html(string);            

        }catch(err){
            var string = '';
            string += '<option value="">SELECCIONE</option>';                        
            $('#'+id).html(string);
            console.log(err);
        }
        
    });
}

function dpd_unidadmedida(id){
    $.ajax({
        type: "POST",
        url: "../Comun/unidad_medida_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';

            //string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idunidadmedida + '">' + ob.descunidadmedida + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_aseguradora(id){
    $.ajax({
        type: "POST",
        url: "../Comun/aseguradora_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idaseguradora + '">' + ob.descaseguradora + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tarjeta(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tarjeta_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtarjetacombustible + '">' + ob.numtarjeta + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option placas="' + ob.placas + '" value="' + ob.idvehiculo + '">' + ob.descvehiculo + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_marca_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/marca_vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idmarcavehiculo + '">' + ob.descmarcavehiculo + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_combustible(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_combustible_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipocombustible + '">' + ob.desctipocombustible + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_arrendadora(id){
    $.ajax({
        type: "POST",
        url: "../Comun/arrendadora_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            string += '<option value="">SELECCIONE</option>';

            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idarrendadora + '">' + ob.nombre + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_incidencia(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_incidencia_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipoincidenciaemp + '">' + ob.desctipoincidenciaemp + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_forma_pago(id){
    $.ajax({
        type: "POST",
        url: "../Comun/formapago_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idformapago + '">' + ob.descformapago + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_incidencia_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_incidencia_vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipoincidenciaveh + '">' + ob.desctipoincidenciaveh + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_sangre(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_sangre_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idtiposangre == 1){
                    string += '<option value="' + ob.idtiposangre + '" selected>' + ob.desctiposangre + '</option>';
                }else{
                    string += '<option value="' + ob.idtiposangre + '">' + ob.desctiposangre + '</option>';
                }                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_estado_civil(id){
    $.ajax({
        type: "POST",
        url: "../Comun/estado_civil_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idestadocivil == 1){
                    string += '<option value="' + ob.idestadocivil + '" selected>' + ob.descestadocivil + '</option>';
                }else{
                    string += '<option value="' + ob.idestadocivil + '">' + ob.descestadocivil + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipodocumento(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipodocumento_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(json);
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option vigencia="' + ob.solicitarvigencia + '" value="' + ob.idtipodocumento + '">' + ob.desctipodocumento + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){            
            console.log(err);
        }
        
    });
}

function dpd_banco(id,idcuenta="",ponerCuenta = true){
    $.ajax({
        type: "POST",
        url: "../Comun/banco_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idbanco + '">' + ob.descbanco + '</option>';
            }
            $('#'+id).html(string);
            
            if(idcuenta.length > 0){
                $('#'+id).val(idcuenta).change();
            } 
            
            if(ponerCuenta){
                var a = $('#'+id).val();
                dpd_cuenta_bancaria('cuenta_bancaria', $('#'+id).val());
                $('#'+id).change(function(){
                    dpd_cuenta_bancaria('cuenta_bancaria', $('#'+id).val());
                });
            }
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_cliente_domicilio(id,idcliente){
    $.ajax({
        type: "POST",
        url: "../Comun/cliente_domicilio_lst.php",
        async:true,
        data:{'id':idcliente}
    }).done(function (data) {        
        try{            
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idclientedomiciliofiscal + '">' + ob.nombrecomercial + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            var string = '';
            $('#'+id).html(string);
            console.log(data);
            console.log(err);
        }
        
    });
}

function dpd_cotizacion(id,idcliente){
    console.log(id);
    console.log(idcliente);
    $.ajax({
        type: "POST",
        url: "../Comun/cotizacion_lst.php",
        async:true,
        data:{'id':idcliente}
    }).done(function (data) {      
        try{             
            var json = JSON.parse(data);      
            
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idcotizacion + '">' + ob.folio + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            var string = '';
            $('#'+id).html(string);
            console.log(data);
            console.log(err);
        }
        
    });
}

function dpd_cuenta_bancaria(id,idbanco){
    $.ajax({
        type: "POST",
        url: "../Comun/cuenta_bancaria_lst.php",
        async:true,
        data:{'idbanco':idbanco}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idcuentabancaria + '">' + ob.numerocuenta + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_profesion(id){
    $.ajax({
        type: "POST",
        url: "../Comun/profesion_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if (ob.idprofesion == '14') {
                    string += '<option value="' + ob.idprofesion + '" selected >' + ob.descprofesion + '</option>';
                } else {
                    string += '<option value="' + ob.idprofesion + '">' + ob.descprofesion + '</option>';   
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_grado_escolaridad(id){
    $.ajax({
        type: "POST",
        url: "../Comun/grado_escolaridad_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idgradoescolaridad == 1){
                    string += '<option value="' + ob.idgradoescolaridad + '" selected>' + ob.descgradoescolaridad + '</option>';
                }else{
                    string += '<option value="' + ob.idgradoescolaridad + '">' + ob.descgradoescolaridad + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_cliente(id,value="",ponerCot = true){
    $.ajax({
        type: "POST",
        url: "../Comun/cliente_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idcliente == 1){
                    string += '<option value="' + ob.idcliente + '" selected>' + ob.nombre + '</option>';
                }else{
                    string += '<option value="' + ob.idcliente + '">' + ob.nombre + '</option>';
                }                
            }
            $('#'+id).html(string);    

            if(value.length > 0){
                $('#'+id).val(value).change();
            }

            if(ponerCot){
                dpd_cotizacion('folio',$('#'+id).val());
                $('#'+id).change(function(){
                    dpd_cotizacion('folio',$('#'+id).val());
                });
            }

            
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_empresaout(id){
    $.ajax({
        type: "POST",
        url: "../Comun/empresaout_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="">SELECCIONE</option>';
                string += '<option value="' + ob.idempresaoutsourcing + '">' + ob.nombrecorto + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

/*function dpd_adscripcion(id, region){
    $.ajax({
        type: "POST",
        url: "../Comun/adscripcion_lst.php",
        async:true,
        data:{'idregion':region}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idadscripcion == 3){
                    string += '<option value="' + ob.idadscripcion + '" selected>' + ob.descadscripcion + '</option>';
                }else{
                    string += '<option value="' + ob.idadscripcion + '">' + ob.descadscripcion + '</option>';
                }
                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}*/

function dpd_estatus_mod(id, modulo){
    $.ajax({
        type: "POST",
        url: "../Comun/estatus_lst_mod.php",
        async:true,
        data:{'modulo':modulo}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idestatus + '">' + ob.descestatus + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_puesto(id, puesto){
    //<T>abulador, <O>rganigrama, <R>egistro
    $.ajax({
        type: "POST",
        url: "../Comun/puesto_lst_tipo.php",
        async:true,
        data:{'tipopuesto':puesto}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(puesto == 'T' && ob.idpuesto == 5){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }else if(puesto == 'O' && ob.idpuesto == 18){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }else if(puesto == 'R' && ob.idpuesto == 37){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }
                else{
                    string += '<option value="' + ob.idpuesto + '">' + ob.descpuesto + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

/*function dpd_region(id,adscripcion="",value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/region_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idregion == 1){
                    string += '<option value="' + ob.idregion + '" selected>' + ob.descregion + '</option>';
                }else{
                    string += '<option value="' + ob.idregion + '">' + ob.descregion + '</option>';
                }                
            }

            $('#'+id).html(string);

            if(!adscripcion==""){

                dpd_adscripcion(adscripcion, $('#'+id).val());

                $('#'+id).change(function(){
                    dpd_adscripcion(adscripcion, $('#'+id).val());
                });
            }

            if(value.length > 0){
                $('#'+id).val(value).change();
            }
            
        }catch(err){
            console.log(err);
        }
        
    });
}*/

function dpd_departamento(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/departamento_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.iddepartamento == 3){
                    string += '<option value="' + ob.iddepartamento + '" selected>' + ob.descdepartamento + '</option>';
                }else{
                    string += '<option value="' + ob.iddepartamento + '">' + ob.descdepartamento + '</option>';
                }
                
            }
            $('#'+id).html(string);
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_parentesco(id){
    $.ajax({
        type: "POST",
        url: "../Comun/parentesco_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idnacionalidad == 1){
                    string += '<option value="' + ob.idtipoparentesco + '" selected>' + ob.desctipoparentesco + '</option>';
                }else{
                    string += '<option value="' + ob.idtipoparentesco + '">' + ob.desctipoparentesco + '</option>';
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_nacionalidad(id){
    $.ajax({
        type: "POST",
        url: "../Comun/nacionalidad_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idnacionalidad == 1){
                    string += '<option value="' + ob.idnacionalidad + '" selected>' + ob.descnacionalidad + '</option>';
                }else{
                    string += '<option value="' + ob.idnacionalidad + '">' + ob.descnacionalidad + '</option>';
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_estado(id,idCiudad,ponerCiudad = true){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/estado_lst.php",
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];

                if(ob.idestado == 28){                    
                    string += '<option value="' + ob.idestado + '">' + ob.descestado + '</option>';
                }else{
                    string += '<option value="' + ob.idestado + '">' + ob.descestado + '</option>';
                }            
            }
            
            $('#'+id).html(string);            

            if(ponerCiudad){
                dpd_ciudad(idCiudad, $('#'+id).val());
                $('#'+id).change(function(){
                    dpd_ciudad(idCiudad, $('#'+id).val());
                });
            }
            
        }catch(err){
            console.log('dpd_estado: ' + err);
        }
        
    });
}

function dpd_ciudad(id, idEstado){
    try{
        $.ajax({
            type: "POST",
            async: false,
            url: "../Comun/municipio_lst.php",
            data:{'idEstado':idEstado}
        }).done(function (data) {            
            totalLlamadas += 1;
            var json = JSON.parse(data);
            var string = '';
            for (let i in json) {
                var ob = json[i];
                
                if(ob.idmunicipio == 41){
                    string += '<option value="' + ob.idmunicipio + '" selected>' + ob.descmunicipio + '</option>';
                }else{
                    string += '<option value="' + ob.idmunicipio + '">' + ob.descmunicipio + '</option>';
                }
                
            }        
            $('#'+id).html(string);                
        });
    }catch(ex){
        console.log('Error: ' + ex.toString());
    }    
}

function dpd_empleado(id, value = ''){
    $.ajax({
        type: "POST",
        url: "../Comun/empleado_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            //console.log(data);
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            string += '<option value=""></option>';
            string += '<option value="0">SELECCIONE</option>';
            for (let i in json) {
                var ob = json[i];
                string += '<option correo="' + ob.correoelectronico + '" value="' + ob.idempleado + '">' + ob.nombrecompleto + '</option>';
            }

            $('#'+id).html(string);
            
            if(value > 0){                
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_empleado_search(id){
    $.ajax({
        type: "POST",
        url: "../Comun/empleado_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];                
                string += '<div class="item" fecha_ingreso="' + ob.fechaingreso + '" data-value="' + ob.idempleado + '">' + ob.nombrecompleto + '</div>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_proveedor(id, value = 0){
    $.ajax({
        type: "POST",
        url: "../Comun/proveedor_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];                
                string += '<option value="' + ob.idproveedor + '">' + ob.nombre + '</option>';
            }
            $('#'+id).html(string);
            
            if(value > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_partida(id, tipopartida){
    $.ajax({
        type: "POST",
        url: "../Comun/partida_lst.php",
        async:true,
        data:{'tipopartida':tipopartida}
    }).done(function (data) {
        console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idpartida + '">' + ob.descpartida + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_partida_detalle(id, idgastoscomprobar){
    $.ajax({
        type: "POST",
        url: "../Comun/partida_detalle_lst.php",
        async:true,
        data:{'pidgastoscomprobar':idgastoscomprobar}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idgastoscomprobardetalle + '">' + ob.descpartida + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_almacen(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/almacen_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idalmacen + '">' + ob.descalmacen + '</option>';
            }
            $('#'+id).html(string);   
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_salida_inventario(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_salida_inventario.php",
        async:true,
        data:{}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idtiposalidainventario + '">' + ob.desctiposalidainventario + '</option>';
            }
            $('#'+id).html(string);   
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_unidadmedida(id){
    $.ajax({
        type: "POST",
        url: "../Comun/unidad_medida_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);
            var string = '';

            //string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idunidadmedida + '">' + ob.descunidadmedida + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_aseguradora(id){
    $.ajax({
        type: "POST",
        url: "../Comun/aseguradora_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idaseguradora + '">' + ob.descaseguradora + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tarjeta(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tarjeta_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtarjetacombustible + '">' + ob.numtarjeta + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option placas="' + ob.placas + '" value="' + ob.idvehiculo + '">' + ob.descvehiculo + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_marca_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/marca_vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idmarcavehiculo + '">' + ob.descmarcavehiculo + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_combustible(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_combustible_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipocombustible + '">' + ob.desctipocombustible + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_arrendadora(id){
    $.ajax({
        type: "POST",
        url: "../Comun/arrendadora_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            string += '<option value="">SELECCIONE</option>';

            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idarrendadora + '">' + ob.nombre + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_incidencia(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_incidencia_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipoincidenciaemp + '">' + ob.desctipoincidenciaemp + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_forma_pago(id){
    $.ajax({
        type: "POST",
        url: "../Comun/formapago_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idformapago + '">' + ob.descformapago + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_incidencia_vehiculo(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_incidencia_vehiculo_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                
                string += '<option value="' + ob.idtipoincidenciaveh + '">' + ob.desctipoincidenciaveh + '</option>';
                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_sangre(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipo_sangre_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idtiposangre == 1){
                    string += '<option value="' + ob.idtiposangre + '" selected>' + ob.desctiposangre + '</option>';
                }else{
                    string += '<option value="' + ob.idtiposangre + '">' + ob.desctiposangre + '</option>';
                }                
            }
            $('#'+id).html(string);

            

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_estado_civil(id){
    $.ajax({
        type: "POST",
        url: "../Comun/estado_civil_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idestadocivil == 1){
                    string += '<option value="' + ob.idestadocivil + '" selected>' + ob.descestadocivil + '</option>';
                }else{
                    string += '<option value="' + ob.idestadocivil + '">' + ob.descestadocivil + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipodocumento(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipodocumento_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(json);
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option vigencia="' + ob.solicitarvigencia + '" value="' + ob.idtipodocumento + '">' + ob.desctipodocumento + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){            
            console.log(err);
        }
        
    });
}


function dpd_cuenta_bancaria(id,idbanco){
    console.log(idbanco);
    $.ajax({
        type: "POST",
        url: "../Comun/cuenta_bancaria_lst.php",
        async:true,
        data:{'idbanco':idbanco}
    }).done(function (data) {
        console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idcuentabancaria + '">' + ob.numerocuenta + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_profesion(id){
    $.ajax({
        type: "POST",
        url: "../Comun/profesion_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if (ob.idprofesion == '14') {
                    string += '<option value="' + ob.idprofesion + '" selected >' + ob.descprofesion + '</option>';
                } else {
                    string += '<option value="' + ob.idprofesion + '">' + ob.descprofesion + '</option>';   
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_grado_escolaridad(id){
    $.ajax({
        type: "POST",
        url: "../Comun/grado_escolaridad_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idgradoescolaridad == 1){
                    string += '<option value="' + ob.idgradoescolaridad + '" selected>' + ob.descgradoescolaridad + '</option>';
                }else{
                    string += '<option value="' + ob.idgradoescolaridad + '">' + ob.descgradoescolaridad + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

/*function dpd_cliente(id){
    $.ajax({
        type: "POST",
        url: "../Comun/cliente_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONE</option>';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idcliente == 1){
                    string += '<option value="' + ob.idcliente + '" selected>' + ob.nombre + '</option>';
                }else{
                    string += '<option value="' + ob.idcliente + '">' + ob.nombre + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}*/

function dpd_empresaout(id){
    $.ajax({
        type: "POST",
        url: "../Comun/empresaout_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="">SELECCIONE</option>';
                string += '<option value="' + ob.idempresaoutsourcing + '">' + ob.nombrecorto + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_adscripcion(id, region, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/adscripcion_lst.php",
        async:true,
        data:{'idregion':region}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idadscripcion == 3){
                    string += '<option kms="' +  ob.distanciakms  + '" value="' + ob.idadscripcion + '" selected>' + ob.descadscripcion + '</option>';
                }else{
                    string += '<option kms="' +  ob.distanciakms  + '" value="' + ob.idadscripcion + '">' + ob.descadscripcion + '</option>';
                }
                
            }
            $('#'+id).html(string);
            if(value.length > 0){
                $('#'+id).val(value).change();
            }    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_estatus_mod(id, modulo){
    $.ajax({
        type: "POST",
        url: "../Comun/estatus_lst_mod.php",
        async:true,
        data:{'modulo':modulo}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idestatus + '">' + ob.descestatus + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_puesto(id, puesto){
    //<T>abulador, <O>rganigrama, <R>egistro
    $.ajax({
        type: "POST",
        url: "../Comun/puesto_lst_tipo.php",
        async:true,
        data:{'tipopuesto':puesto}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(puesto == 'T' && ob.idpuesto == 5){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }else if(puesto == 'O' && ob.idpuesto == 18){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }else if(puesto == 'R' && ob.idpuesto == 37){
                    string += '<option value="' + ob.idpuesto + '" selected>' + ob.descpuesto + '</option>';
                }
                else{
                    string += '<option value="' + ob.idpuesto + '">' + ob.descpuesto + '</option>';
                }                
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_region(id,adscripcion="",value="",value_ads = ''){
    $.ajax({
        type: "POST",
        url: "../Comun/region_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idregion == 1){
                    string += '<option value="' + ob.idregion + '" selected>' + ob.descregion + '</option>';
                }else{
                    string += '<option value="' + ob.idregion + '">' + ob.descregion + '</option>';
                }                
            }

            $('#'+id).html(string);

            if(!adscripcion==""){

                dpd_adscripcion(adscripcion, $('#'+id).val(),value_ads);

                $('#'+id).change(function(){
                    dpd_adscripcion(adscripcion, $('#'+id).val(),value_ads);
                });
            }

            if(value.length > 0){
                $('#'+id).val(value).change();
            }
            
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_departamento(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/departamento_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.iddepartamento == 3){
                    string += '<option value="' + ob.iddepartamento + '" selected>' + ob.descdepartamento + '</option>';
                }else{
                    string += '<option value="' + ob.iddepartamento + '">' + ob.descdepartamento + '</option>';
                }
                
            }
            $('#'+id).html(string);
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_viaje(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/viaje_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idtipoviaje + '">' + ob.desctipoviaje + '</option>';
            }
            $('#'+id).html(string);
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_color(id, value=""){
    $.ajax({
        type: "POST",
        url: "../Comun/color_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idcolor + '">' + ob.desccolor + '</option>';
            }
            $('#'+id).html(string);
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_parentesco(id){
    $.ajax({
        type: "POST",
        url: "../Comun/parentesco_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idnacionalidad == 1){
                    string += '<option value="' + ob.idtipoparentesco + '" selected>' + ob.desctipoparentesco + '</option>';
                }else{
                    string += '<option value="' + ob.idtipoparentesco + '">' + ob.desctipoparentesco + '</option>';
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_nacionalidad(id){
    $.ajax({
        type: "POST",
        url: "../Comun/nacionalidad_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                if(ob.idnacionalidad == 1){
                    string += '<option value="' + ob.idnacionalidad + '" selected>' + ob.descnacionalidad + '</option>';
                }else{
                    string += '<option value="' + ob.idnacionalidad + '">' + ob.descnacionalidad + '</option>';
                }
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_estado(id,idCiudad,ponerCiudad = true){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/estado_lst.php",
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];

                if(ob.idestado == 28){                    
                    string += '<option value="' + ob.idestado + '">' + ob.descestado + '</option>';
                }else{
                    string += '<option value="' + ob.idestado + '">' + ob.descestado + '</option>';
                }            
            }
            
            $('#'+id).html(string);            

            if(ponerCiudad){
                dpd_ciudad(idCiudad, $('#'+id).val());
                $('#'+id).change(function(){
                    dpd_ciudad(idCiudad, $('#'+id).val());
                });
            }
            
        }catch(err){
            console.log('dpd_estado: ' + err);
        }
        
    });
}

function dpd_ciudad(id, idEstado){
    try{
        $.ajax({
            type: "POST",
            async: false,
            url: "../Comun/municipio_lst.php",
            data:{'idEstado':idEstado}
        }).done(function (data) {            
            totalLlamadas += 1;
            var json = JSON.parse(data);
            var string = '';
            for (let i in json) {
                var ob = json[i];
                
                if(ob.idmunicipio == 41){
                    string += '<option value="' + ob.idmunicipio + '" selected>' + ob.descmunicipio + '</option>';
                }else{
                    string += '<option value="' + ob.idmunicipio + '">' + ob.descmunicipio + '</option>';
                }
                
            }        
            $('#'+id).html(string);                
        });
    }catch(ex){
        console.log('Error: ' + ex.toString());
    }    
}

function dpd_empleado(id, value = ''){
    $.ajax({
        type: "POST",
        url: "../Comun/empleado_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            //console.log(data);
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            string += '<option value=""></option>';
            string += '<option value="0">SELECCIONE</option>';
            for (let i in json) {
                var ob = json[i];
                string += '<option correo="' + ob.correoelectronico + '" value="' + ob.idempleado + '">' + ob.nombrecompleto + '</option>';
            }

            $('#'+id).html(string);
            
            if(value > 0){                
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_empleado_search(id){
    $.ajax({
        type: "POST",
        url: "../Comun/empleado_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];                
                string += '<div class="item" fecha_ingreso="' + ob.fechaingreso + '" data-value="' + ob.idempleado + '">' + ob.nombrecompleto + '</div>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_proveedor(id, value = 0){
    $.ajax({
        type: "POST",
        url: "../Comun/proveedor_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];                
                string += '<option value="' + ob.idproveedor + '">' + ob.nombre + '</option>';
            }
            $('#'+id).html(string);
            
            if(value > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_partida(id, tipopartida){
    $.ajax({
        type: "POST",
        url: "../Comun/partida_lst.php",
        async:true,
        data:{'tipopartida':tipopartida}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idpartida + '">' + ob.descpartida + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);

            var string = '';
            string += '<option value="">SELECCIONAR</option>';
            $('#'+id).html(string);
        }
        
    });
}

function dpd_partida_detalle(id, idgastoscomprobar){
    $.ajax({
        type: "POST",
        url: "../Comun/partida_detalle_lst.php",
        async:true,
        data:{'pidgastoscomprobar':idgastoscomprobar}
    }).done(function (data) {
        //console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idgastoscomprobardetalle + '">' + ob.descpartida + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_viaticos(id, value = 0){
    $.ajax({
        type: "POST",
        url: "../Comun/partidaViaticos_lst.php",
        async:false,
        data:{}
    }).done(function (data) {
        console.log(data);
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';

            string += '<option value="">SELECCIONAR</option>';
            
            for (let i in json) {
                var ob = json[i];                
                string += '<option importe="' + ob.importeunitario + '" value="' + ob.idpartida + '">' + ob.descpartida + '</option>';
            }
            $('#'+id).html(string);
            
            if(value > 0){
                $('#'+id).val(value).change();
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_tipo_ajuste(id){
    $.ajax({
        type: "POST",
        url: "../Comun/tipoajusteinventario_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            console.log(data);
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="">SELECCIONE</option>';
                string += '<option value="' + ob.idtipoajusteinventario + '">' + ob.desctipomovimiento + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_puesto_depto(id){
    $.ajax({
        type: "POST",
        url: "../Comun/puestodpto_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idpuesto + '">' + ob.descpuesto + '</option>';
            }
            $('#'+id).html(string);    
        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_categoria(id, value="",ponerPuesto = true){
    $.ajax({
        type: "POST",
        url: "../Comun/categoria_lst.php",
        async:true,
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idcategoria + '">' + ob.desccategoria + '</option>';
            }
            $('#'+id).html(string);
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }

            if(ponerPuesto){
                var a = $('#'+id).val();
                dpd_entregable('entregable', $('#'+id).val());
                $('#'+id).change(function(){
                    dpd_entregable('entregable', $('#'+id).val());
                });
            }

        }catch(err){
            console.log(err);
        }
        
    });
}

function dpd_entregable(id,value){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/entregable_lst.php",
        data:{'idcategoria':value}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.identregable + '">' + ob.descentregable + '</option>';
            }
            
            $('#'+id).html(string);            
            
        }catch(err){
            console.log('dpd_entregable: ' + err);
        }
        
    });
}

function dpd_traslado(id,value=""){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/traslado_lst.php",
        data:{}
    }).done(function (data) {
        try{
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idrutatraslado + '">' + ob.descrutatraslado + '</option>';
            }
            
            $('#'+id).html(string);      
            
            if(value.length > 0){
                $('#'+id).val(value).change();
            }
            
        }catch(err){
            console.log('dpd_tipomoneda: ' + err);
        }
        
    });
}

function dpd_traslado_folio(id,anio,mes){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/traslado_folio_lst.php",
        data:{'anio':anio,'mes':mes}
    }).done(function (data) {
        try{
            console.log(data);
            totalLlamadas += 1;
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idtraslado + '">' + ob.folio +'</option>';
            }
            
            $('#'+id).html(string);            
            
        }catch(err){
            console.log('dpd_traslado_folio: ' + err);
        }
        
    });
}

function dpd_servicios(id){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/servicio_lst.php",
        data:{}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idservicio + '" descservicio="' + ob.descservicio + '" preciounitario="' + ob.preciounitario + '" idtipomoneda="' + ob.idtipomoneda + '">' + ob.descripcioncorta + '</option>';
            }
            
            $('#'+id).html(string);            
            
        }catch(err){
            console.log('dpd_traslado_folio: ' + err);
        }
        
    });
}

function dpd_servicios_cliente(id,cliente){
    $.ajax({
        type: "POST",
        async: false,
        url: "../Comun/cliente_servicios_lst.php",
        data:{'idcliente':cliente}
    }).done(function (data) {
        try{            
            var json = JSON.parse(data);        
            var string = '';
            for (let i in json) {
                var ob = json[i];
                string += '<option value="' + ob.idservicio + '" descservicio="' + ob.descservicio + '" preciounitario="' + ob.preciounitario + '" idtipomoneda="' + ob.idtipomoneda + '">' + ob.descripcioncorta + '</option>';
            }
            
            $('#'+id).html(string);            
            
        }catch(err){
            console.log(err);
        }
        
    });
}