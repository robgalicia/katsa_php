$(document).ready(function() {
    $(".money").on({
        "focus": function(event) {
          $(event.target).select();
        },
        "keyup": function(event) {
          $(event.target).val(function(index, value) {            
            value = quitarComas(value);
            return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');            
          });
        }
      });

      $('.number').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
          event.preventDefault();
        }
      });

      $('.modal').modal({allowMultiple: true});
      
});

function toMoney(value){
  value = quitarComas(value.toString());
  return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'); 
}

function trunc(x, posiciones = 0) {
  var s = x.toString()
  var l = s.length
  var decimalLength = s.indexOf('.') + 1

  if (l - decimalLength <= posiciones){
    return x
  }
  // Parte decimal del número
  var isNeg  = x < 0
  var decimal =  x % 1
  var entera  = isNeg ? Math.ceil(x) : Math.floor(x)
  // Parte decimal como número entero
  // Ejemplo: parte decimal = 0.77
  // decimalFormated = 0.77 * (10^posiciones)
  // si posiciones es 2 ==> 0.77 * 100
  // si posiciones es 3 ==> 0.77 * 1000
  var decimalFormated = Math.floor(
    Math.abs(decimal) * Math.pow(10, posiciones)
  )
  // Sustraemos del número original la parte decimal
  // y le sumamos la parte decimal que hemos formateado
  var finalNum = entera + 
    ((decimalFormated / Math.pow(10, posiciones))*(isNeg ? -1 : 1))
  
  return finalNum
}

function validarInit(id){

  var rules = {};

  $('#' + id).find(':input').each(function(){
    var val = $(this).attr('validate');
    
    if (val == 'true'){
      var key = $(this).attr('id');
      rules[key] = 'empty';
    }
        
  });

  validarFormFields(id,rules);
}

function validarFormFields(id,jFields){
  $('#'+id)
  .form({
      inline : false,
      on: 'blur',
      fields: jFields
  });
}

function formValido(id){
    $('#'+id).form('submit');

    if( $('#'+id).form('is valid')) {
        return true;
    }else{
        return false;
    }
}

function quitarComas(string){
    return string.replace(/,/g, '');
}

function clearForm(form){
  $('#'+form).form('clear');
}

function fechaSinHora(string,T = false){
  if (string == null) return "";

  if(string.length > 0){
    if(T) return string.split('T')[0];
    else return string.split(' ')[0];
  }else{
    return "";
  }  
}

function histBack(){
  window.history.back();
}

function fechaEspanol(string, formal = false, hora = false){
  if(string.length > 0){
    arr = string.split(' ');
    arr = arr[0].split('-');
    year = arr[0];
    month = parseInt(arr[1]) - 1
    if (month < 0) month = 0;
    day = arr[2];  
    var fecha = new Date(year, month, day);
    var options;
    if (formal){
      options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
    }else if(hora){
      fecha = new Date(string);
      options = {/*weekday: "long",*/ year: "numeric", month: "numeric", day: "numeric", hour: "numeric", hour12:"false", minute:"numeric"};
    }
    else{
      options = {/*weekday: "long",*/ year: "numeric", month: "numeric", day: "numeric"/*, hour: "numeric", hour12:"false"*/};
    }

    return fecha.toLocaleString("es-ES", options).toUpperCase();
  }else{
    return '';
  }
}