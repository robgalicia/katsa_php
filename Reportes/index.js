var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    llenar_tabla_ajax();    
});

function llenar_tabla_ajax(){
    $('#tbody').html('');

    ajaxPost("reportes_all.php", llenar_tabla);
}

function llenar_tabla(json){    
    var string = '';        
        var padreid = json[0].menuid[0];
        var ordenmenu = json[0].ordenmenu[0] + json[0].ordenmenu[1];
        var length = json.length;
        var nombre_padre = '';

        var nombre_menu = '';

        for (let i in json) {
            var ob = json[i];
            
            nombre_menu = ob.nombremenu.replace('REPORTES ','')
            
            if((ob.ordenmenu[0] + ob.ordenmenu[1]) > ordenmenu){                
                string += '</div>' + '</div>';
                string += '</div>' + '</div>';
                ordenmenu = (ob.ordenmenu[0] + ob.ordenmenu[1]);                
            }
            
            if( ( (ob.ordenmenu[0] + ob.ordenmenu[1]) == ordenmenu ) && ( (ob.ordenmenu[2] + ob.ordenmenu[3]) == 0 ) ){
                padreid = ob.menuid;
                nombre_padre = ob.nombremenu;
                /*string +=   '<div class="ui dropdown item menu_ocultar">' +
                                ob.nombremenu + '<i class="dropdown icon"></i>' +
                                '<div class="menu">';*/
                                
                string +=   '<div class="card">' +
                            '<div class="content">' +
                                '<div class="header">' + nombre_menu + '</div>' +
                                '<div class="meta"></div>' +
                                '<div class="description">' +
                                    '<div class="ui link list">';

            }else if( ( (ob.ordenmenu[0] + ob.ordenmenu[1]) == ordenmenu ) && ( (ob.ordenmenu[2] + ob.ordenmenu[3]) > 0 ) ){                
                string += '<a class="item" onclick="redirectBit(\'' + ob.url + '\',\'' + ob.nombremenu + '\',\'' + nombre_padre + '\');">' + ob.nombremenu + '</a>';                
            }
            
            if(i == length-1){                
                string += '</div>' + '</div>';
            }

        }        

        $('#tbody').html(string);    
        
    NProgress.done();
}