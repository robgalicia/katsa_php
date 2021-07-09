var idUsuario = -1;

$(document).ready(function() {
    //dpd_empleado_all('idempleado');
    FormFieldsRulesUsuario();
    
    idUsuario = $.get("idUsuario");

    dpd_empleado('idempleado');

    if (idUsuario > 0){//Si viene a editar
        cargarDatos_ajax();
        $('#password').prop('disabled', true);
    }else{
        console.log("Entre");
        $('#fechaAlta').val(obtenerFechaCampo());
        $('#panel_nuevo_pass').hide();        
    }

});

function FormFieldsRulesUsuario(){
    var rules = {
        nombre: {
            identifier: 'nombre',
            rules: [
                {
                    type   : 'empty'
                }
            ]
        },
        login: {
            identifier: 'login',
            rules: [
                {
                    type   : 'empty'
                }
            ]
        },
        password: {
            identifier: 'password',
            rules: [
                {
                    type   : 'empty'
                }
            ]
        },
        fechaAlta: {
            identifier: 'fechaalta',
            rules: [
                {
                    type   : 'empty'
                }
            ]
        }
    };

    validarFormFields('formUsuario',rules);
}

function validateForms(){    
    var bool3;

    if(formValido('formUsuario')){
        bool3 = true;
    }else{
        bool3 = false;
    }    

    if(bool3){
        return true;
    }else{
        return false;
    }
}

function agregar_usuario_ajax(){

    if(!validateForms()){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }


    var idusuario = idUsuario;
    var login = $('#login').val();
    var password = $('#password').val();
    var nombre = $('#nombre').val();
    var fechaalta = $('#fechaalta').val();
    var fechabaja = $('#fechabaja').val();
    var idempleado = $('#idempleado').val();
    
    var password_nuevo = $('#nuevo_password').val();

    var json = {
        'idusuario':idusuario,
        'login' : login,
        'password' : password,        
        'password_nuevo' : password_nuevo,
        'nombre' : nombre,
        'fechaalta' : fechaalta,
        'fechabaja' : fechabaja,
        'idempleado' : idempleado
    };

    ajaxPost("usuario_insert.php", agregar_usuario, json);
    
}

function agregar_usuario(result){
    
    if(result.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','index.php');
    }else{
        modalEstatus('e', 'Debe seleccionar un empleado');
    }

    NProgress.done();
}

function cargarDatos_ajax(){
    var json = {
        'idusuario': idUsuario
    };

    ajaxPost("agregar_usuario_sel_upd.php", cargarDatos, json);
}

function cargarDatos(json){

    var ob = json;
    ob = ob[0];                        

    $('#login').val(ob.login);
    $('#password').val(ob.password);
    $('#nombre').val(ob.nombre);
    $('#fechaalta').val(fechaSinHora(ob.fechaalta));
    $('#fechabaja').val(fechaSinHora(ob.fechabaja));
    $('#idempleado').val(ob.idempleado).change();

    NProgress.done();
    
}
