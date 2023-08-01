<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | CodeWar</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Util/Css/css/all.min.css">
  <!-- icheck bootstrap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="../Util/Css/toastr.min.css">
  <link rel="stylesheet" href="../Util/Css/sweetalert2.min.css">
</head>
<!-- Modal -->
<div class="modal fade" id="terminos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h5 class="card-title">Terminos y condiciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
            <p>
                * utilizaremos sus datos para generar publicidad de acuerdo a sus gastos.
            </p>
            <p>
                * la empresa no se hace responsable de fraudes o estafas.
            </p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-secondary btn-clock" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<body class="hold-transition login-page">
<div class="mt-5">
  <div class="login-logo">
    <img src="../Util/Img/Logos/LogoCentennials.png" class="profile-user-img img-fluid img-circle">
    <a href="../index.php"><b>Code</b>WAR</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registrarse</p>
      <form id="form-register">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Ingrese usarname">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese password">
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese nombres">
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingrese DNI">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese telefono(11.....)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pass_repeat">Repetir password</label>
                        <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="Ingrese de nuevo su password">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese apellidos">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese email">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="terms">
                            <label class="custom-control-label" for="terms">Estoy de acuerdo con los <a href="#" data-toggle="modal" data-target="#terminos">terminos de servicio</a>.</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-lg bg-gradient-primary">Registrarme</button>
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Util/Js/jquery.min.js"></script>

<!--<script src="login.js"></script>-->

<!-- Bootstrap 4 -->
<script src="../Util/Js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Util/Js/adminlte.min.js"></script>

<script src="../Util/Js/toastr.min.js"></script>

<!-- Validate Querys -->
<script src="../Util/Js/jquery.validate.min.js"></script>
<script src="../Util/Js/additional-methods.min.js"></script>
<script src="../Util/Js/sweetalert2.min.js"></script>

<script>
$(document).ready(function () {
  var funcion;
  Loader();
  // setTimeout(verificar_sesion, 2000);
  verificar_sesion();
  toastr.options = {
    'debug': false,
    'positionClass': 'toast-top-right',
    'onclick': null,
    'fadeIn': 300,
    'fadeOut': 1000,
    'extendedTimeOut': 1000,
  }

  async function verificar_sesion() {
    funcion = "verificar_sesion";
    let data = await fetch('../Controllers/UsuarioController.php', {
      method:'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'funcion=' + funcion
    });
    if(data.ok){
      let response = await data.text();
      try {
        if(response != ''){
          location.href = '../index.php';
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

  async function registrar(username, pass, nombres, apellidos, dni, email, telefono) {
    funcion = "registrar_usuario";
    let data = await fetch('../Controllers/UsuarioController.php', {
      method:'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'funcion=' + funcion + '$$username' + username + '$$pass' + pass + '$$nombres' + nombres + '$$apellidos' + apellidos + '$$dni' + dni + '$$email' + email + '$$telefono' + telefono
    });
    if(data.ok){
      let response = await data.text();
      try {
        let respuesta = JSON.parse(response)
        if(respuesta.mensaje == "success"){
          Swal.fire({
            position:'center',
            icon: 'success',
            title: 'Se ha registrado correctamente',
            showConfirmButton: false,
            timer: 2500,
          }).then(function(){
            $('#form-register').trigger('reset');
            location.href = '../Views/login.php'
          })
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

  $.validator.setDefaults({
    submitHandler: function () {
      let username = $('#username').val();
      let pass = $('#pass').val();
      let nombres = $('#nombres').val();
      let apellidos = $('#apellidos').val();
      let dni = $('#dni').val();
      let email = $('#email').val();
      let telefono = $('#telefono').val();
      Loader('Registrando usuario...')
      registrar(username, pass, nombres, apellidos, dni, email, telefono);
    }
  });

  jQuery.validator.addMethod("usuario_existente",
    function(value, element){
      let funcion = "verificar_usuario";
      let bandera;
      $.ajax({
        type: "POST",
        url: "../Controllers/UsuarioController.php",
        data: 'funcion=' + funcion + '&&value=' + value,
        async: false,
        success: function(response) {
          if(response == "success"){
            bandera = false;
          } else {
            bandera = true;
          }
        }
      })
      return bandera;
    }, "*El usuario ya existe, por favor ingrese uno diferente"
  );

  jQuery.validator.addMethod("letras",
  function(value, element){
      let variable = value.replace(/ /g, "");
      return /^[A-Za-z]+$/.test(variable);
    }, "*Este campo solo permite letras"
  );

  $('#form-register').validate({
    rules: {
      nombres:{
        required: true,
        letras: true,
      }, 
      apellidos:{
        required: true,
        letras: true,
      }, 
      username:{
        required: true,
        minlength: 7,
        maxlength: 20,
        usuario_existente: true,
      }, 
      pass:{
        required: true,
        minlength: 8,
        maxlength: 20,
      }, 
      pass_repeat:{
        required: true,
        equalTo: "#pass"
      }, 
      dni:{
        required: true,
        digits: true,
        minlength: 8,
        maxlength: 8
      },
      email: {
        required: true,
        email: true,
      },
      telefono:{
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10
      },
      terms: {
        required: true
      },
    },
    messages: {
      username: {
        required: "*Este campo es obligatorio",
        minlength: "*El username debe ser de minimo 8 caracteres",
        maxlength: "*El username dede ser de maximo 20 caracteres"
      },
      pass: {
        required: "*Este campo es obligatorio",
        minlength: "*El password debe ser de minimo 8 caracteres",
        maxlength: "*El password dede ser de maximo 20 caracteres"
      },
      pass_repeat: {
        required: "*Este campo es obligatorio",
        equalTo: "*El password no coincide con el ingresado"
      },
      nombres: {
        required: "*Este campo es obligatorio",
      },
      apellidos: {
        required: "*Este campo es obligatorio",
      },
      dni: {
        required: "*Este campo es obligatorio",
        minlength: "*El DNI debe ser solo 8 caracteres",
        maxlength: "*El DNI debe ser solo 8 caracteres",
        digits: "*El DNI solo esta compuesto por numeros"
      },
      email: {
        required: "*Este campo es obligatorio",
        email: "*No es formato email"
      },
      telefono: {
        required: "*Este campo es obligatorio",
        minlength: "*El telefono debe ser solo 10 caracteres",
        maxlength: "*El telefono debe ser solo 10 caracteres",
        digits: "*El telefono solo esta compuesto por numeros"
      },
      terms: "Porfavor acepte los terminos de servicio"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
      $(element).removeClass('is-valid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      $(element).addClass('is-valid')
    }
  });

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
});
</script>
</body>
</html>