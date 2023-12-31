<?php
  session_start();
  include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/header.php';
?>
    <title>Inicio | Centennials</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio</h1>
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

    <!-- Style Css -->
    <style>
      /* Titulo de Producto en function "llenar_productos()" */ 
      .titulo_producto{
        color: #000; 
      }
      .titulo_producto:visited{
        color: #000;
      }
      .titutlo_producto:focus{
        border-bottom: 1px solid;
      }
      .titulo_producto:hover{
        border-bottom: 1px solid
      }
      .titulo_producto:active{
        background: #000;
        color: #FFF;
      }
    </style>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Productos</h3>
        </div>
        <div class="card-body">
          <div id="productos" class="row">
            <div id="loader_3" class="overlay">
              <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
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
            obtener_contadores();
          } else {
            llenar_menu_superior();
            llenar_menu_lateral();
          }
          // setTimeout(llenar_productos, 2000);
          llenar_productos();
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

    async function llenar_productos(){
      funcion = "llenar_productos";
      let data = await fetch('/Centennials/Controllers/ProductoTiendaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let productos =  JSON.parse(response);
          // console.log(productos);
          let template = ``;
          productos.forEach(producto => {
            template += `
                <div class="col-sm-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <img src="/Centennials/Util/Img/Producto/${producto.imagen}" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12">
                          <span class="text-muted float-left">${producto.marca}</span></br>
                          <!-- Descripcion.php -> se le pasa el id y name del producto -->
                          <a class="titulo_producto" href="/Centennials/Views/descripcion.php?name=${producto.producto}&&id=${producto.id}">${producto.producto}
                          </a>`;
                if(producto.envio == 'gratis'){
                  template += `</br>`;
                  template += `<span class="badge bg-success">Envio gratis</span>`;
                }
                if(producto.calificacion != 0){
                  template += `</br>`;
                  for(let index = 0; index < producto.calificacion; index++){
                    template += `<i class="fas fa-star text-warning"></i>`;
                  }
                  let estrellas_faltantes = 5 - producto.calificacion;
                  for(let index = 0; index < estrellas_faltantes; index++) {
                    template += `<i class="far fa-star text-warning"></i>`;
                  }
                  template += `</br>`;
                }
                if(producto.descuento != 0){
                  template += `
                  <span class="text-muted" style="text-decoration: line-through">S/ ${producto.precio}</span>
                  <span class="text-muted">-${producto.descuento}%</span></br>
                  `;
                }
                template += `
                          <h4 class="text-danger">S/ ${producto.precio_descuento}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            `;
          });
          $('#loader_3').hide(500);
          $('#productos').html(template);
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

    async function obtener_contadores() {
      funcion = "obtener_contadores";
      let data = await fetch('/Centennials/Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let contadores = JSON.parse(response);
          let template = ``;
          let template_1 = ``;
          if(contadores.contador_mensajes>0) {
            template = `
              <i class="fas fa-inbox"></i> Recibidos
              <span class="badge bg-warning float-right">${contadores.contador_mensajes}</span>
            `;
            template_1 = `Mensajes <span class="badge badge-warning right">${contadores.contador_mensajes}</span>`;
          } else {
            template = `
            <i class="fas fa-inbox"></i> Recibidos
            `;
            template_1 = `Mensajes`;
          }
          $('#recibidos').html(template);
          $('#nav_cont_mens').html(template_1);
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