var nombre_pagina_G = '';
$(function() {
    armar_menu();
    $('.ui.dropdown').dropdown();
    $('.cancel').text('Regresar');
    $('.deny').text('Regresar');
    // create sidebar and attach to menu open
    $('.ui.sidebar').sidebar('attach events', '#sidebarMenu');

          
    (function($) {  
        $.get = function(key)   {  
            key = key.replace(/[\[]/, '\\[');  
            key = key.replace(/[\]]/, '\\]');  
            var pattern = "[\\?&]" + key + "=([^&#]*)";  
            var regex = new RegExp(pattern);  
            var url = unescape(window.location.href);  
            var results = regex.exec(url);  
            if (results === null) {  
                return null;  
            } else {  
                return results[1];  
            }  
        }  
    })(jQuery);
});

function redirect(page){
    window.location.href = page;
}

function cargando(bool){
    if(bool){
        $('#modal_loading').modal('show');
    }else{
        $('#modal_loading').modal('hide');
    }
}

function modalEstatus(estatus, mensaje, redirectPage = "", otroModal = "") {
    if (estatus == 'o') {
        var icono = '<i class="green check icon"></i><div class="content">' + mensaje + '</div>';
    } else if (estatus == 'e') {
        var icono = '<i class="red times icon"></i><div class="content">' + mensaje + '</div>';
    } else if (estatus == 'i') {
        var icono = '<i class="yellow info icon"></i><div class="content">' + mensaje + '</div>';
    }

    $('#modal_estatus_mensaje').html(icono);

    if(otroModal.length > 0) $('#' + otroModal).modal('hide');

    $('#modal_estatus').modal('setting', 'closable', false).modal('show');

    setTimeout(function () {
        $('#modal_estatus').modal('hide');        
        if(redirectPage.length > 0){
            redirect(redirectPage);
        }
        if(otroModal.length > 0) $('#' + otroModal).modal('show');
    }, 2000);

}

function logOut(){

    $.ajax({
        type: "POST",
        url: "../Login/logout.php",
        data:{}
    }).done(function (data) {        
        redirect("../Inicio/");
    });

}

function obtenerFechaCampo(){
    var f = new Date();
    var mes;
    var dia;

    if((f.getMonth() +1) < 10){
        mes = '0' + (f.getMonth() +1);
    }else{
        mes = (f.getMonth() +1);
    }

    if(f.getDate() < 10){
        dia = '0' + (f.getDate());
    }else{
        dia = (f.getDate());
    }

    return f.getFullYear() + "-" + mes + "-" + dia;
}

function fechaMinimaActual(fechaC, mayor = false){
    var hoy = new Date();
    fechaC = fechaC.split('-');

    var dia = parseInt(fechaC[2]);
    var mes = parseInt(fechaC[1]) - 1;
    var anio = parseInt(fechaC[0]);

    var fecha = new Date(anio,mes,dia);

    bandera = "";

    // Comparamos solo las fechas => no las horas!!
    hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas    

    if (mayor){
        if (fecha > hoy) {            
            bandera = true;
        }else {            
            bandera = false;
        }
    }else{
        if (fecha >= hoy) {            
            bandera = true;
        }else {            
            bandera = false;
        }
    }

    return bandera;
    
}

function obtenerFechaCampoHora(){
    var f = new Date();
    var mes;
    var hora;
    var min;
    var dia;

    if((f.getMonth() +1) < 10){
        mes = '0' + (f.getMonth() +1);
    }else{
        mes = (f.getMonth() +1);
    }

    if(f.getDate() < 10){
        dia = '0' + (f.getDate());
    }else{
        dia = (f.getDate());
    }

    if(f.getHours() < 10){hora = '0' + f.getHours();}
    else{hora = f.getHours();}

    if(f.getMinutes() < 10){min = '0' + f.getMinutes();}
    else{min = f.getMinutes();}

    return f.getFullYear() + "-" + mes + "-" + dia + "T" + hora + ":" + min;
}

function ajaxPost(url, funcion, json = {}, async = true){
    $.ajax({
        beforeSend: function(){
            NProgress.start();
        },
        type: "POST",
        async: async,
        url: url,
        data:json
    }).done(function (data) {
        try{
            var jsonData = JSON.parse(data);
            var sql = 'Select'

            if (jsonData.query != undefined) sql = jsonData.query

            nombre_pagina_G = localStorage.getItem('nombre_pagina_G');

            //ajaxAuditoria(nombre_pagina_G, url, sql, json);

            funcion(jsonData);

        }catch(err){
            console.log(url);
            console.log(data);
            console.log(err);
            NProgress.done();
        }     
    });
}

function ajaxAuditoria(opcionsistema, opcionpantalla, query, detalleaccion = {}){

    detalleaccion = JSON.stringify(detalleaccion);

    var json = {
        'opcionsistema' : opcionsistema,
        'opcionpantalla' : opcionpantalla,
        'query' : query,
        'detalleaccion' : detalleaccion
    };    

    $.ajax({
        beforeSend: function(){
            NProgress.start();
        },
        type: "POST",
        async: true,
        url: "../Comun/auditoria.php",
        data:json
    }).done(function (data) {
        try{
            
        }catch(err){
            console.log(url);
            console.log(data);
            console.log(err);
            NProgress.done();
        }     
    });
}

function nada(json){
    console.log(json);
}

function ajaxXML(url, funcion, json = {}, async = true){

    if(!url.includes(".xml")){ //Si no es un xml se manda error
        //modalEstatus('e', 'Debe ser un archivo XML.');
        return false;
    }    

    $.ajax({
        beforeSend: function(){
            NProgress.start();
        },
        type: "POST",
        dataType: "xml",
        async: async,
        url: url,
        data:json
    }).done(function (data) {
        try{
            var jsonData = xmlToJson(data);
            jsonData = getDataXML(jsonData)
            funcion(jsonData);
        }catch(err){
            console.log(url);
            console.log(data);
            console.log(err);
            NProgress.done();
        }     
    });
}

function xmlToJson(xml) {
	
	// Create the return object
	var obj = {};

	if (xml.nodeType == 1) { // element
		// do attributes
		if (xml.attributes.length > 0) {
		obj["@attributes"] = {};
			for (var j = 0; j < xml.attributes.length; j++) {
				var attribute = xml.attributes.item(j);
				obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
			}
		}
	} else if (xml.nodeType == 3) { // text
		obj = xml.nodeValue;
	}

	// do children
	if (xml.hasChildNodes()) {
		for(var i = 0; i < xml.childNodes.length; i++) {
			var item = xml.childNodes.item(i);
			var nodeName = item.nodeName;
			if (typeof(obj[nodeName]) == "undefined") {
				obj[nodeName] = xmlToJson(item);
			} else {
				if (typeof(obj[nodeName].push) == "undefined") {
					var old = obj[nodeName];
					obj[nodeName] = [];
					obj[nodeName].push(old);
				}
				obj[nodeName].push(xmlToJson(item));
			}
		}
	}
	return obj;
};

function getDataXML(json){

    var UUID = json["cfdi:Comprobante"]["cfdi:Complemento"]["tfd:TimbreFiscalDigital"]["@attributes"].UUID;
    var proveedor = json["cfdi:Comprobante"]['cfdi:Emisor']["@attributes"].Nombre;
    var rfc_receptor = json["cfdi:Comprobante"]['cfdi:Receptor']["@attributes"].Rfc;
    //var fecha_factura = json["cfdi:Comprobante"]['cfdi:Complemento']["pago10:Pagos"]["pago10:Pago"]["@attributes"].FechaPago;
    //var importe_pagado = json["cfdi:Comprobante"]['cfdi:Complemento']["pago10:Pagos"]["pago10:Pago"]["pago10:DoctoRelacionado"]["@attributes"].ImpPagado;
    var fecha_factura = json["cfdi:Comprobante"]["@attributes"].Fecha; 
    var importe_pagado = json["cfdi:Comprobante"]["@attributes"].Total; 
    var rfc_proveedor = json["cfdi:Comprobante"]['cfdi:Emisor']["@attributes"].Rfc;    

    var json = {
        'UUID' : UUID,
        'proveedor' : proveedor,
        'rfc_receptor' : rfc_receptor,
        'rfc_proveedor' : rfc_proveedor,        
        'fecha_factura' : fecha_factura,
        'importe_pagado' : importe_pagado
    };

    return json;
}

function toDataTableEspecial(id,num) {
    destroyDT(id);
    $('#' + id).DataTable({
        "iDisplayLength": num,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        }
    });
}

function toDataTableGen() {
    destroyDTGen();
    $('.ui .table').DataTable({
        "iDisplayLength": 10,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        }
    });
}

function toDataTable(id) {
    destroyDT(id);
    $('#' + id).DataTable({
        "iDisplayLength": 10,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        }
    });
}

function toDataTableGenExcel() {
    destroyDTGen();
    $('.ui .table').DataTable({
        "iDisplayLength": 10,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        },
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', footer: true },
        ],
        drawCallback: function(){
            $('.buttons-excel').addClass('ui green button flotarDerecha');
            $('.ui.stackable.pagination.menu').addClass('flotarDerecha');
        }
    });    
}

function toDataTableGenExcelId(id) {
    destroyDT(id);
    $('#' + id).DataTable({
        "iDisplayLength": 10,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        },
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', footer: true },
        ],
        drawCallback: function(){
            $('.buttons-excel').addClass('ui green button flotarDerecha');
            $('.ui.stackable.pagination.menu').addClass('flotarDerecha');
        }
    });    
}

function toDataTableButtonTXT(id,button_title,title,content) {
    destroyDT(id);
    $('#' + id).DataTable({
        "iDisplayLength": 10,
        "ordering": false,
        "info": false,
        "bFilter": false,
        "lengthChange": false,
        "pagingType": "numbers",
        "language": {                    
            "sZeroRecords": "No se encontraron resultados"
        },
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', footer: true },
            {
                text: button_title,
                action: function ( e, dt, node, config ) {
                    newTxTFile(title, content)
                }
            }
        ],
        drawCallback: function(){
            $('.buttons-excel').addClass('ui green button flotarDerecha');
            $('.dt-button').addClass('ui gray button flotarDerecha');
            $('.ui.stackable.pagination.menu').addClass('flotarDerecha');
        }
    });    
}

function destroyDTGen(){
    try{
        var table = $('.ui .table').DataTable();
        table.destroy();
    }catch(err){
        console.log("err: " + err.toString());
    }
}

function destroyDT(id){
    try{
        var table = $('#' + id).DataTable();
        table.destroy();
    }catch(err){
        console.log("err: " + err.toString());
    }
}

function armar_menu(){
    $.ajax({
        type: "POST",
        url: "../Comun/menu_lst.php",
        data:{}
    }).done(function (data) {
        //orden menu = "020100"
        var json = JSON.parse(data);
        var string = '';
        var stringSub = '';
        var padreid = 1;
        var ordenmenu = json[0].ordenmenu[0] + json[0].ordenmenu[1];
        var length = json.length;
        var nombre_padre = '';

        for (let i in json) {
            var ob = json[i];
            
            if((ob.ordenmenu[0] + ob.ordenmenu[1]) > ordenmenu){
                string += '</div>' + '</div>';
                stringSub += '</div>' + '</div>';
                ordenmenu = (ob.ordenmenu[0] + ob.ordenmenu[1]);
            }

            //if(ob.menuid == ob.padreid){
            if( ( (ob.ordenmenu[0] + ob.ordenmenu[1]) == ordenmenu ) && ( (ob.ordenmenu[2] + ob.ordenmenu[3]) == 0 ) ){
                padreid = ob.menuid;
                nombre_padre = ob.nombremenu;
                string +=   '<div class="ui dropdown item menu_ocultar">' +
                                ob.nombremenu + '<i class="dropdown icon"></i>' +
                                '<div class="menu">';

                stringSub += '<div class="item">' + 
                    '<div class="header">'+ ob.nombremenu +'</div>' +
                    '<div class="menu">';

            }else if( ( (ob.ordenmenu[0] + ob.ordenmenu[1]) == ordenmenu ) && ( (ob.ordenmenu[2] + ob.ordenmenu[3]) > 0 ) ){
                //string += '<a class="item" href="' + ob.url + '">' + ob.nombremenu + '</a>';
                //stringSub += '<a class="item" href="' + ob.url + '">' + ob.nombremenu + '</a>';
                string += '<a class="item" onclick="redirectBit(\'' + ob.url + '\',\'' + ob.nombremenu + '\',\'' + nombre_padre + '\');">' + ob.nombremenu + '</a>';
                stringSub += '<a class="item" redirectBit(\'' + ob.url + '\',\'' + ob.nombremenu + '\',\'' + nombre_padre + '\');>' + ob.nombremenu + '</a>';
            }
            
            if(i == length-1){
                string += '</div>' + '</div>';
                stringSub += '</div>' + '</div>';
            }

        }        

        $('#menu_principal').html(string);
        
        $('#attachSideBarMenu').html(stringSub);            

        $('.ui.dropdown').dropdown();        
        
    });
    
}

function redirectBit(url,nombre,nombre_padre){
    nombre_pagina_G = nombre_padre + ' - ' + nombre;

    localStorage.setItem('nombre_pagina_G', nombre_pagina_G);

    ajaxAuditoria(nombre_pagina_G, 'Principal', 'Acceso', {});

    redirect(url);
}

function correcto(json){
    console.log(json);
    if(json.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','index.php');
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function abrirDoc(ruta){
    console.log(ruta);
    window.open(ruta, '_blank', 'location=yes');    
}

function setLS(name,value){
    localStorage.setItem(name,value);    
}

function getLS(name){
    return localStorage.getItem(name);    
}

function cargar_tabla_guardada(pagina){
    var tabla = ''

    try {

        tabla = getLS( pagina );

        if(tabla == 'null' || tabla.length == 0) tabla = -1
        else tabla = JSON.parse(tabla)

    } catch (error) {

        console.log(error)
        tabla = -1

    }
    
    return tabla;
        
}

function newTxTFile(name, content) {
    var atag = document.createElement("a");
    var file = new Blob([content], {type: 'text/plain'});
    atag.href = URL.createObjectURL(file);
    atag.download = name;
    atag.click();
  }

function UUID(){
    var dt = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });
    return uuid;
}