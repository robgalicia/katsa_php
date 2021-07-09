<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="icon" type="image/jpeg" href="../img/logo.jpg"/>

  <!-- Site Properties -->
  <title>KATSA</title>
  <link rel="stylesheet" type="text/css" href="../js_css/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/site.css">

  <link rel="stylesheet" type="text/css" href="../js_css/components/container.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/header.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/image.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/menu.css">

  <link rel="stylesheet" type="text/css" href="../js_css/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/form.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/input.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/button.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/list.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/message.css">
  <link rel="stylesheet" type="text/css" href="../js_css/components/icon.css">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

  <script src="../js_css/components/form.js"></script>
  <script src="../js_css/components/transition.js"></script>
  <script src="login.js"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }    
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {        
       
    });
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    
    <div class="middle aligned column">
      <h2 class="ui center aligned icon teal header">
        <img src="../img/buhosolo.png" class="ui circular massive image">
        <div class="content">
            KATSA
            <div class="ui teal sub header"></div>
        </div>
      </h2>
      <div class="ui large form">
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" id="user" name="user" placeholder="usuario">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
          </div>
          <button class="ui fluid large teal button" onclick="login();">Entrar</button>
        </div>

        <div class="ui error message"></div>

      </div>
    </div>

  </div>
</div>

</body>

</html>