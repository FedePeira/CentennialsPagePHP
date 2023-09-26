<?php
  session_start();
  include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/header.php';
?>
    <title>Contacto | Centennials</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Centennials/index.php">Inicio</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <style>
        .container-form{
            width: 100%;
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 50px
        }
        .container-form p{
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .container-form a{
            font-size: 17px;
            display: inline-block;
            text-decoration: none;
            width: 100%;
            margin-bottom: 15px;
            color: black;
        }
        .container-form a i{
            color: orange;
            margin-right: 10px;
        }
        .container-form form .campo, textarea{
            width: 100%;
            padding: 7px 7px;
            font-size: 15px;
            border: 1px solid #dbdbdb;
            margin-bottom: 20px;
            border-radius: 3px;
            outline: 0px;
        }
        .container-form form textarea {
            max-width: 530px;
            min-width: 530px;
            min-height: 140px;
            max-height: 150px;
        }
        .display{
            grid-column: 1 / span 2;
        }
        .dislay-2{
            grid-column: 2;
        }
    </style>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Consulta</h3>
        </div>
        <div class="card-body">
          <div id="productos" class="row">
            <div id="loader_3" class="overlay">
              <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
          </div>
          <div class="container-form">
            <div class="info-form">
                <h2> Contactanos </h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae assumenda minima dolore maiores odio
                aliquid cumque incidunt illo omnis facere, velit pariatur, sequi libero autem consequatur ea 
                labore itaque atque dolorem similique quisquam adipisci, quia obcaecati.</p>
                <a href="#"><i class="fa fa-phone"></i>123-456-789</a>
                <a href="#"><i class="fa fa-envelope"></i>email@tudominio.com</a>
                <a href="#"><i class="fa fa-map-marked"></i>Ciudad, Pais</a>
            </div>
            <form id="form-consult" action="#" autocomplete="off">
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="campo">
                <input type="email" name="email" id="email" placeholder="Ingresa tu email" class="campo">
                <textarea name="mensaje" id="mensaje" placeholder="Ingresa tu mensaje" class="campo"></textarea>
                <!-- <button class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#modal_contra">Cambiar password</button> -->
                <button type="submit" class="btn btn-warning btn-block dislay-2">Enviar Consulta</button>
            </form>
            <blockquote class="quote-warning display">
                <h5 id="warning">Warning!</h5>
                <p>La respuesta del mensaje sera enviado a tu gmail en las proximas 24hs</p>
            </blockquote>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>

    
<?php
  include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/footer.php';
?>

<script>
$(document).ready(function() {
    var funcion;
    // setTimeout(verificar_sesion, 2000);
    Loader();
    verificar_sesion();
    toastr.options = {
      'debug': false,
      'positionClass': 'toast-top-right',
      'onclick': null,
      'fadeIn': 300,
      'fadeOut': 1000,
      'extendedTimeOut': 1000,
    }
    /*--------------------------------*/
    /* Page Design Ones you Enter */ 
    async function read_notificaciones(){
      funcion = "read_notificaciones";
      let data = await fetch('/Centennials/Controllers/NotificacionController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let notificaciones =  JSON.parse(response);
          console.log(notificaciones);
          let template1 = '';
          let template = `
          <a class="nav-link" data-toggle="dropdown" href="#">`;
          if(notificaciones.length == 0){
            template += ` 
                 <i class="far fa-bell"></i>
            `; 
            template1 += ` 
                Notificaciones
            `; 
          } else {
            template += ` 
                 <i class="far fa-bell"></i>
                 <span class="badge badge-warning navbar-badge">${notificaciones.length}</span>
            `; 
            template1 += ` 
                Notificaciones <span class="badge badge-warning right">${notificaciones.length}</span>
            `; 
          }
          template += `</a>
          <div id="notificaciones" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">`;

          $('#nav_cont_noti').html(template1);
          template += `
              <span class="dropdown-item dropdown-header">${notificaciones.length} Notificaciones</span>
          `;
          notificaciones.forEach(notificacion => {
            template += `
            <div class="dropdown-divider"></div>
              <a href="/Centennials/${notificacion.url_1}&&noti=${notificacion.id}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="/Centennials/Util/Img/producto/${notificacion.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      ${notificacion.titulo}
                    </h3>
                    <p class="text-sm">${notificacion.asunto}</p>
                    <p class="text-sm text-muted">${notificacion.contenido}</p>
                    <span class="float-right text-muted text-sm">${notificacion.fecha_creacion}</span>
                  </div>
                </div>
                <!-- Message End -->
              </a>
            <div class="dropdown-divider"></div>
            `;
          });
          template += `
              <a href="/Centennials/Views/notificaciones.php" class="dropdown-item dropdown-footer">ver todas las notificaciones</a>
              </div>`;
          $('#notificacion').html(template);
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

    async function read_favoritos(){
      funcion = "read_favoritos";
      let data = await fetch('/Centennials/Controllers/FavoritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let favoritos =  JSON.parse(response);
          // console.log(notificaciones);
          let template1 = '';
          let template = `
          <a class="nav-link" data-toggle="dropdown" href="#">`;

            if(favoritos.length == 0){
              template += ` 
                   <i class="far fa-heart"></i>
              `; 
              template1 += ` 
                  Favoritos
              `; 
            } else {
              template += ` 
                   <i class="far fa-heart"></i>
                   <span class="badge badge-warning navbar-badge">${favoritos.length}</span>
              `; 
              template1 += ` 
                Favoritos <span class="badge badge-warning right">${favoritos.length}</span>
              `; 
            }
          template += `</a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">`;

          template += `
              <span class="dropdown-item dropdown-header">${favoritos.length} Favoritos</span>
          `;
          favoritos.forEach(favorito => {
            template += `
            <div class="dropdown-divider"></div>
              <a href="/Centennials/${favorito.url}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="/Centennials/Util/Img/producto/${favorito.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      ${favorito.titulo}
                    </h3>
                    <p class="text-sm text-muted">${favorito.precio}</p>
                    <span class="float-right text-muted text-sm">${favorito.fecha_creacion}</span>
                  </div>
                </div>
                <!-- Message End -->
              </a>
            <div class="dropdown-divider"></div>
            `;
          });
          template += `
              <a href="/Centennials/Views/favoritos.php" class="dropdown-item dropdown-footer">ver todos tus favoritos</a>
            </div>`;
          $('#nav_cont_fav').html(template1);
          $('#favorito').html(template);
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

    function llenar_menu_superior(usuario) {
      let template = ``;
      if(usuario===undefined || usuario == '' || usuario == null){
        template = `
        <li class="nav-item"> 
          <a class="nav-link" href="/Centennials/Views/register.php" role="button">
            <i class="fas fa-user-plus"></i> Registrarse
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Centennials/Views/login.php" role="button">
            <i class="far fa-user"></i> Iniciar Sesion
          </a>
        </li>
        `;
      }
      else{
        template = `
          <li id="notificacion" class="nav-item dropdown">
            
          </li>
          <li id="favorito" class="nav-item dropdown">
           
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/Centennials/Util/Img/Users/${usuario.avatar}" width="30" height="30" class="img-fluid img-circle">
                <spa>${usuario.user}</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/Centennials/Views/mi_perfil.php"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class=F"fas fa-shopping-basket"></i> Mis pedidos</a></li>
                <li><a class="dropdown-item" href="/Centennials/Controllers/logout.php"><i class="fas fa-user-times"></i> Cerrar sesion</a></li>
              </ul>
          </li>
        `;
      }
      $('#loader_1').hide(500);
      $('#menu_superior').html(template);
    }

    function llenar_menu_lateral(usuario){
      let template = ``;
      if(usuario===undefined || usuario == '' || usuario == null){
        
      }
      else{
        template = `
        <li class="nav-header">Perfil</li>
          <li id="nav_notificaciones" class="nav-item">
            <a id="active_nav_notificaciones" href="/Centennials/Views/notificaciones.php" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p id="nav_cont_noti">
                Notificaciones
              </p>
            </a>
          </li>
          <li id="nav_favoritos" class="nav-item">
            <a id="active_fav_favoritos" href="/Centennials/Views/favoritos.php" class="nav-link">
              <i class="nav-icon far fa-heart"></i>
              <p id="nav_cont_fav">
                Favoritos
              </p>
            </a>
          </li>
          <li id="nav_mensajes" class="nav-item">
            <a id="active_fav_mensajes" href="/Centennials/Views/mensajes/index.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p id="nav_cont_mens">
                Mensajes
              </p>
            </a>
          </li>`;
          if(usuario.tipo_usuario == 1){
            template+= `<li class="nav-header">Producto</li>
            <li id="nav_marcas" class="nav-item">
              <a id="active_nav_marcas" href="/Centennials/Views/marca.php" class="nav-link">
                <i class="nav-icon fas fa-apple-alt"></i>
                <p id="nav_cont_marcSS">
                  Marcas
                </p>
              </a>
            </li>
            `;
          }
          if(usuario.tipo_usuario == 2){
            template+= `<li class="nav-header">Producto</li>
            <li id="nav_marcas" class="nav-item">
              <a id="active_nav_marcas" href="/Centennials/Views/marca.php" class="nav-link">
                <i class="nav-icon fas fa-apple-alt"></i>
                <p id="nav_cont_marcSS">
                  Marcas
                </p>
              </a>
            </li>
            `;
          }
          if(usuario.tipo_usuario == 3){
            template+= `<li class="nav-header">Producto</li>
            <li id="nav_marcas" class="nav-item">
              <a id="active_nav_marcas" href="/Centennials/Views/marca.php" class="nav-link">
                <i class="nav-icon fas fa-apple-alt"></i>
                <p id="nav_cont_marcSS">
                  Marcas
                </p>
              </a>
            </li>
            `;
          }
      }
      $('#loader_2').hide(500);
      $('#menu_lateral').html(template);
    }
    /*--------------------------------*/
    async function verificar_sesion() {
      funcion = "verificar_sesion";
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          if(response != ''){
          // location.href = '../index.php';
            let sesion = JSON.parse(response);
            // console.log(sesion);
            llenar_menu_superior(sesion);
            llenar_menu_lateral(sesion);
            $('#avatar_menu').attr('src', '/Centennials/Util/Img/Users/' + sesion.avatar);
            $('#username_menu').text(sesion.user);
            $('usuario_menu').text(sesion.user);
            read_notificaciones();
            read_favoritos();
          } else {
            llenar_menu_superior();
            llenar_menu_lateral();
          }
          $('#loader_3').hide(500);
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

    async function consultar(nombre, email, mensaje) {
        funcion = "consulta_usuario";
        let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&nombre=' + nombre + '&&email=' + email + '&&mensaje=' + mensaje
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
                        timer: 500,
                    }).then(function(){
                        $('#form-consult').trigger('reset');
                        location.href = '/Centennials/index.php'
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

    $('#form-consult').submit(e => {
        funcion = 'consultar';
        let nombre = $('#nombre').val();
        let email = $('#email').val();
        let mensaje = $('#mensaje').val();
        console.log(nombre, email, mensaje);
        Loader('Enviando Consulta...');
        // setTimeout(login(), 2000);
        consultar(nombre, email, mensaje);
        e.preventDefault();
    }) 

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