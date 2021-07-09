<?php include('../Comun/header_fourteen.php');?>

<script src="conciliar.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="index.js"></script>   

<div class="ui form">
    <div class="fields">
        <div class="five wide field">
            <h3>Conciliar</h3>
        </div>

        <div class="seven wide field">
        </div>

        <div class="one wide field">
            <div class="ui buttons">
                <button class="ui gray icon button" onclick="redirect('index.php');">
                    <i class="icon reply"></i>
                </button>
            </div>
        </div>
        <div class="three wide field">
        </div>
    </div>
    <div class="fields">
        <table class="ui table" id="tablePrin">
            <thead>
                <tr style="border-width:0 !important;">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Tipo Partida</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>Total</th>
                    <th>Justificación</th>
                </tr>
            </thead>
            <tbody id="tbodyPrin">
                
            </tbody>
                <tfoot id="tfootPrin">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th id="importetotal"></th>
                    <th></th>
                </tr>                    
            </tfoot>
        </table>
    </div>

    <div class="fields">
        <table class="ui table" id="tableFact">
            <thead>
                <tr style="border-width:0 !important;">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Tipo</th>
                    <th>Tipo Partida</th>
                    <th>Folio</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Importe</th>
                    <th>PDF</th>
                    <th>XML</th>
                </tr>
            </thead>
            <tbody id="tbodyFac">
                
            </tbody>
                <tfoot id="tfootFac">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th id="importetotalfact"></th>
                    <th></th>
                    <th></th>
                </tr>                    
            </tfoot>
        </table>
    </div>
    <div class="ui segment">
        <div class="ui form" id="formComent">
            <div class="fields">
                <div class="two wide field">
                    <label>Comentarios:</label>
                </div>
                <div class="ten wide field">
                    <input type="text" id="comentarios">
                </div>
            </div>
            <div class="fields">
                <div class="four wide field">   
                    <button class="ui green icon button" onclick="conciliarSolicitud();">
                        <i class="icon check"></i>Conciliado
                    </button>
                </div>
                <div class="four wide field">
                    <button class="ui red icon button" onclick="redirect('index.php');">
                        <i class="reply icon"></i>Regresar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

