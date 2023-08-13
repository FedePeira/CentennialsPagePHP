<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | CodeWar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/Centennials/Util/Css/css/all.min.css">
  <!-- icheck bootstrap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="/Centennials/Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="/Centennials/Util/Css/toastr.min.css">
  <link rel="icon" type="image/png" href="/Centennials/Util/img/logo.png">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="/Centennials/Util/Img/Logos/LogoCentennials.png" class="profile-user-img img-fluid img-circle">
    <a href="/Centennials/index.php"><b>Code</b>WAR</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicie sesion</p>

      <form id="form-login">
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="User" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <div class="social-auth-links text-center mb-3">

        <button type="submit" href="#" class="btn btn-block btn-primary">
            Iniciar sesion
        </button>
      </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">He olvidado la contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Registrarse</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/Centennials/Util/Js/jquery.min.js"></script>
<script src="/Centennials/Util/Js/sweetalert2.min.js"></script>

<!--<script src="login.js"></script>-->

<!-- Bootstrap 4 -->
<script src="/Centennials/Util/Js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/Centennials/Util/Js/adminlte.min.js"></script>

<script src="/Centennials/Util/Js/toastr.min.js"></script>


<script>
  $(document).ready(function() {
    var funcion;
    verificar_sesion();
    Loader();
    // setTimeout(verificar_sesion, 2000);

    async function verificar_sesion() {
      funcion = "verificar_sesion";
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          if(response != ''){
            location.href = '/Centennials/index.php';
          } 
          CloseLoader();
        } catch(error) {
          console.error(error);
          console.log(response);
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    }

    async function login(user, pass) {
      funcion = "login";
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&user=' + user + '&&pass=' + pass
      });
      if(data.ok){
        let response = await data.text();
        try {
            let respuesta =  JSON.parse(response);
             if(respuesta.mensaje == 'logueado'){
                toastr.success('* Logueado !!!');
                location.href = '/Centennials/index.php';
            } else if(respuesta.mensaje == 'error'){
                toastr.error('* Usuario o contraseña incorrectas!');
            }
          CloseLoader();
        } catch(error) {
          console.error(error);
          console.log(response);
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    }

    $('#form-login').submit(e => {
        funcion = 'login';
        let user = $('#user').val();
        let pass = $('#pass').val();
        Loader('Iniciando Sesion...');
        // setTimeout(login(), 2000);
        login(user, pass);
        e.preventDefault();
    })   

    // Loader
    function Loader(mensaje){
      if(mensaje==''||mensaje==null){
        mensaje = 'Cargano datos...';
      }
      Swal.fire({
          position: 'center',
          html: '<i class="fas fa-2x fa-sync-alt fa-spin"></i>',
          title: mensaje,
          showConfirmButton: false
      });
    }
    // Close Loader
    function CloseLoader(mensaje, tipo){
      if(mensaje==''||mensaje==null){
        Swal.close();
      }
      else {
        Swal.fire({
            position: 'center',
            icon: tipo,
            title: mensaje,
            showConfirmButton: false
        });
      }
    } 
})
</script>
</body>
</html>