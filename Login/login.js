$(document).ready(function() {
    $('body').keyup(function(e) {
        if(e.keyCode == 13) {
            login();
        }
    });    
});

function login(){

    var json = {
        'user':$('#user').val(),
        'pass':$('#password').val()
    };

    $.ajax({
        type: "POST",
        url: "login_code.php",
        data: json
    }).done(function (data) {
        console.log(data);
        var json = JSON.parse(data);
        
        if(json.mensaje == 'Ok'){
            localStorage.clear();
            window.location.href = "../Inicio/index.php";
        }else{
            alert('Favor de verificar sus datos');
        }
    });
}