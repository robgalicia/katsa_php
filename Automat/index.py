##################################################################
################   DataBase Parametros    ########################
#[all, insert, edit, delete]
store_procedure = ["sp_tiposangre_all","",""]
headers_tabla = ["Clave","Descripcion","Acciones"]
##################################################################

##################################################################
################   Parametros de index    ########################
titulo = "Tipo de Sangre"
headers_tabla = ["Clave","Descripcion","Acciones"]
##################################################################

##################################################################
################   Parametros de modal    ########################
num_columnas = 1 # 1 o 2

# [Titulo,ID]
columnas_izquierda = [
    ["Descripción" , "descripcion_mdl"]
]

# Dejar vacio si solo es una columna
# Si son dos columnas poner la misma cantidad de items que en el array columnas_izquierda, si no hay campos suficientes, poner item vacio >""<
columnas_derecha = [] 
##################################################################

def generar_form_modal():
    global num_columnas, columnas_izquierda, columnas_derecha
    
    form = ""
    
    if num_columnas == 1:
        for i in range(len(columnas_izquierda)):
            form += '            <div class="fields">'
            form += '                <div class="five wide field">'
            form += '                    <label>' + columnas_izquierda[i][0] + ':</label>'
            form += '                </div>'
            form += '                <div class="eleven wide field">'
            form += '                    <input type="text" id="' + columnas_izquierda[i][1] + '" tabindex="1" maxlength="50">'
            form += '                </div>'
            form += '            </div>'
    
    elif num_columnas == 2:
        for i in range(len(columnas_izquierda)):
            form += '            <div class="fields">'
            
            form += '                <div class="three wide field">'
            form += '                    <label>' + columnas_izquierda[i][0] + ':</label>'
            form += '                </div>'
            form += '                <div class="five wide field">'
            form += '                    <input type="text" id="' + columnas_izquierda[i][1] + '" tabindex="1" maxlength="50">'
            form += '                </div>'
            
            form += '                <div class="three wide field">'
            if len( columnas_derecha[i][0] ) > 0:
                form += '                    <label>' + columnas_derecha[i][0] + ':</label>'
                
            form += '                </div>'
            form += '                <div class="five wide field">'
            
            if len( columnas_derecha[i][1] ) > 0:
                form += '                    <input type="text" id="' + columnas_derecha[i][1] + '" tabindex="1" maxlength="50">'
                
            form += '                </div>'
            
            form += '            </div>'
    
    
    return form

def generar_modal():
    global num_columnas, columnas_izquierda, columnas_derecha

    modal_php = ''
    modal_php += '<div class="ui modal" id="modal_agregar">'
    modal_php += '    <i class="close icon"></i>'
    modal_php += '    <div class="header">'
    modal_php += '        Nuevo Registro'
    modal_php += '    </div>'
    modal_php += '    <div class="content">'
            
    modal_php += '        <div class="ui form" id="formAgregar">'
                    
    modal_php +=            generar_form_modal()

    modal_php += '        </div>'

    modal_php += '    </div>'
    modal_php += '    <div class="actions">'
    modal_php += '        <div class="ui deny basic red button">'
    modal_php += '            Regresar'
    modal_php += '        </div>'
    modal_php += '        <div class="ui positive button" onclick="agregar_ajax();">'
    modal_php += '            Aceptar            '
    modal_php += '        </div>'
    modal_php += '    </div>'
    modal_php += '</div>'

    modal_php += '<div class="ui mini modal" id="modal_borrar">'
    modal_php += '    <div class="header">ELIMINAR REGISTRO</div>'
    modal_php += '    <div class="content">'
    modal_php += '        <p>¿Desea eliminar el registro seleccionado?</p>'
    modal_php += '    </div>'
    modal_php += '    <div class="actions">'
    modal_php += '        <div class="ui cancel basic red button">Regresar</div>'
    modal_php += '        <div class="ui green button" id="btn_delete">Aceptar</div>'
    modal_php += '    </div>'
    modal_php += '</div>'


def generar_index():    
    global titulo, headers_tabla
        
    index_php = ''
    index_php += '<?php include("../Comun/header_six.php");?>'

    index_php += '<script src="index.js"></script>'
    index_php += '<script src="../Comun/validacion.js"></script>'
    index_php += '<script src="../Comun/dropdown.js"></script>'

    index_php += '    <div class="ui form">'
    index_php += '        <div class="fields">'
    index_php += '            <div class="six wide field">'
    index_php += '                <h3>' + titulo + '</h3>'
    index_php += '            </div>'
    index_php += '            <div class="four wide field">'
    index_php += '            </div>'
    index_php += '            <div class="four wide field">'
    index_php += '            </div>'
    index_php += '            <div class="two wide field">'
    index_php += '                <label>Acciones:</label>'
    index_php += '                <button class="ui blue basic icon button" onclick="mostrarModal(0);">'
    index_php += '                    <i class="plus icon"></i>'
    index_php += '                </button>'
    index_php += '            </div>'
    index_php += '        </div>'
    index_php += '    </div>'

    index_php += '    <table class="ui table">'
    index_php += '        <thead>'
    index_php += '            <tr>'    
    index_php +=                generar_headers()
    index_php += '            </tr>'
    index_php += '        </thead>'
    index_php += '        <tbody id="tbody">'
    index_php += '            '
    index_php += '        </tbody>'
    index_php += '    </table>'

    index_php += '<?php include("modal_agregar.php");?>'

    index_php += '<?php include("../Comun/footer_six.php");?>'
    
def generar_headers():
    titulo, headers_tabla
    
    headers = ''
    
    for head in headers_tabla:
        headers += '<th>' + head + '</th>'
    
    return headers
        
