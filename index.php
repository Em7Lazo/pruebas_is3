<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - SCV</title>
   <script type="text/javascript" language="javascript" src="js/jquery-3.min.js"></script>
   <script type="text/javascript" language="javascript" src="js/script_login.js"></script>
    <link rel="icon" href="./img/icono.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./img/icono.png" /> 
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
</head>

<body>

  <div class="login-screen">
  <div class="left-item">
    <div class="login-panel">
      <div class="inner-login-panel">
       
        <div class="content-panel">
         
          <h3 class="title">Iniciar Sesión</h3>
          
          <form action="">
            <label class="label-l" for="">Usuario:
            <br>
            <input type="text" id="username" name="usernameo" placeholder="Ingresar Usuario" /></label>
            <br><br><br>
            <label class="label-l" for="">Contraseña:</label>
            <br>
            <input type="password" id="password" name="password" placeholder="********" />
            <br>
            
            <br>
            
            <span id="login_message"> </span> 
           
            
            <!--
            <label class="" for=""><i class="fa fa-user-times" aria-hidden="true"></i> Credenciales incorrectas</label> -->
            
            <div class="loading" style="display:none;">
               <br><br>
                <img src="img/gif/Loader-red.gif" style="width:40px;">
            </div>
            <button type="button" id="btn_login" class="btn-login"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ingresar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="right-item">
    <div class="slider-panel">
      <div class="inner-slider-panel">
        <h1>SCVeh</h1>
        <p>Sistema Vehicular</p>
        <p>CORTE SUPERIOR DE JUSTICIA DE PIURA</p>
      </div>
    </div>
  </div>
</div>
  
  
<script src="main.js" type="text/javascript"></script>
<script src="js/jquery-3.min.js"></script>
</body>

</html>
