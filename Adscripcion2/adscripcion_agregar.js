
var id_ad_g=-1;

$(document).ready(function() {
	validarInit("formAdscripcion");
	dpd_region("region_adscripcion");
	dpd_estado("estado_adscripcion", "municipio_adscripcion");
	id_ad_g = $.get("id_ad_g");
	
	if(id_ad_g > 0){
		cargarDatos_ajax();
	}
});

function cargarDatos_ajax(){
	var json={
		"id_ad_g": id_ad_g
	}
	ajaxPost("adscripcion_all_edit.php", cargarDatos, json);
}

function cargarDatos(json){
	var a = json[0]
	$("#descripcion_adscripcion").val(a.desadscripcion)
	$("#region_adscripcion").val(a.idregion).change()
	$("#ubicacion_adscripcion").val(a.ubicacion)
	$("#fecha_adscripcion").val(fechaSinHora(a.fechainicio))
	$("#fecha_baja_adscripcion").val(fechaSinHora(a.fechabaja))
	$("#calle_adscripcion").val(a.calle)
	$("#num_ext_adscripcion").val(a.numexterior)
	$("#num_int_adscripcion").val(a.numinterior)
	$("#entre_calle_adscripcion").val(a.entrecalle)
	$("#y_calle_adscripcion").val(a.ylacalle)
	$("#colonia_adscripcion").val(a.colonia)
	$("#postal_adscripcion").val(a.codigopostal)
	$("#ciudad_adscripcion").val(a.ciudad)
	$("#estado_adscripcion").val(a.idestado).change()
	$("#municipio_adscripcion").val(a.idmunicipio).change()
	$("#persona_contacto_adscripcion").val(a.personacontacto)
	$("#telefono_contacto_adscripcion").val(a.telefonocontacto)
	$("#correo_adscripcion").val(a.correoelectronico)
	NProgress.done();
}

function agregar_ajax(){
    if(!formValido("formAdscripcion")){
        modalEstatus("i", "Favor de revisar los campos marcados en rojo.", "", "modal_adscripcion");
        return false
    }
    var json={
    	"idadscripcion": id_ad_g,
        "descadscripcion": $("#descripcion_adscripcion").val(),
        "idregion": $("#region_adscripcion").val(),
        "ubicacion": $("#ubicacion_adscripcion").val(),
        "fechainicio": $("#fecha_adscripcion").val(),
        "fechabaja": $("#fecha_baja_adscripcion").val(),
        "calle": $("#calle_adscripcion").val(),
        "numexterior": $("#num_ext_adscripcion").val(),
        "numinterior": $("#num_int_adscripcion").val(),
        "entrecalle": $("#entre_calle_adscripcion").val(),
        "ylacalle": $("#y_calle_adscripcion").val(),
        "colonia": $("#colonia_adscripcion").val(),
        "codigopostal": $("#postal_adscripcion").val(),
        "ciudad": $("#ciudad_adscripcion").val(),
        "idmunicipio": $("#municipio_adscripcion").val(),
        "idestado": $("#estado_adscripcion").val(),
        "personacontacto": $("#persona_contacto_adscripcion").val(),
        "telefonocontacto": $("#telefono_contacto_adscripcion").val(),
        "correoelectronico": $("#correo_adscripcion").val()
    }
    ajaxPost("adscripcion_insert.php", correcto, json);

}