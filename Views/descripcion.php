<?php
// Obtenemos el id y el name de index.php
if(!empty($_GET['id'])&& $_GET['name']){
    session_start();
    $_SESSION['product-verification']=$_GET['id'];
    if(!empty($_GET['noti'])){
      $_SESSION['noti']=$_GET['noti'];
    }
   // echo $_SESSION['product-verification'];
   include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/header.php';
?>
    <!-- Description Page -->
    <title><?php echo $_GET['name']?> | Centennials</title>

    <!-- Style Css -->
    <style>
      .preguntas {
        height: 100% !important;
      }
    </style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $_GET['name']?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Centennials/index.php">Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $_GET['name']?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div id="imagenes" class="col-12 col-sm-6">
              <div id="loader_3" class="overlay">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 id="producto" class="my-3"></h3>
              <span id="marca"></span><br>
              <span id="sku"></span>
              <div id="informacion_precios">

              </div>
              <hr>
              <div class="card card-light">
                <div id="informacion_envio" class="card-body">

                </div>
              </div>
              <h4>Enviado y vendido por: </h4>
            
              <div id="tienda" class="bg-light py-2 px-3 mt-4 border">
                
              </div>

              <div id="agregar_carrito" class="mt-4">
                
              </div>
            </div>
          </div>
          <!-- PREGUNTAS / DESCRIPCION / CARACTERISTICAS / RESEÑAS -->
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-pre-tab" data-toggle="tab" href="#product-pre" role="tab" aria-controls="product-pre" aria-selected="true">Preguntas</a>
                <a class="nav-item nav-link " id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripcion</a>
                <a class="nav-item nav-link" id="product-caract-tab" data-toggle="tab" href="#product-caract" role="tab" aria-controls="product-caract" aria-selected="false">Caracteristicas</a>
                <a class="nav-item nav-link" id="product-rese-tab" data-toggle="tab" href="#product-rese" role="tab" aria-controls="product-rese" aria-selected="false">Resenas</a>
              </div>
            </nav>

            <!-- PREGUNTAS -->
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-pre" role="tabpanel" aria-labelledby="product-pre-tab">
              
              </div>

              <!-- DESCRIPCION -->
              <div class="tab-pane fade show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                
              </div>

              <!-- CARACTERISTICAS -->
              <div class="tab-pane fade" id="product-caract" role="tabpanel" aria-labelledby="product-caract-tab">
                
              </div>

              <!-- RESEÑAS -->
              <div class="tab-pane fade" id="product-rese" role="tabpanel" aria-labelledby="product-rese-tab">
                <div id="resenas" class="card-footer card-comments">

                </div>
              </div>
            </div>
          </div>
          <!-- /.DESCRIPCION / RESEÑA / CARACTERISTICAS / PREGUNTAS-->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

<?php
    include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/footer.php';
}
else {
    header('Location: /Centennials/');
}
?>
<script>
$(document).ready(function(){
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
          // console.log(notificaciones);
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
                <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> Mis pedidos</a></li>
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
          // location.href = '/Centennials/index.php';
            let sesion = JSON.parse(response);
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
          verificar_producto();
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

    function mostrar_pasarela(producto) {
      let template = '';
      if(producto.imagenes.length>0){
        template+=`
            <div class="col-12">
              <img id="imagen_principal" src="/Centennials/Util/Img/producto/${producto.imagenes[0].nombre}" class="img-fluid">
            </div>
            <div class="col-12 product-image-thumbs">`;
          producto.imagenes.forEach(imagen => {
            template += `
              <button prod_img="${imagen.nombre}" class="imagen_pasarelas product-image-thumb">
                <img src="/Centennials/Util/Img/producto/${imagen.nombre}"
              </button>
            `;
          });
          template += `
              </div>`;
      } else {
        template += `
          <div class="col-12">
            <img id="imagen_principal" src="/Centennials/Util/Img/producto/${producto.imagen}"
            class="product-image img-fluid">
          </div>
          `;
      }
      $('#loader_3').hide(500);
      $('#imagenes').html(template);
    }

    async function mostrar_titulo_favorito() {
      funcion = "mostrar_titulo_favorito";
      let data = await fetch('/Centennials/Controllers/FavoritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let producto = JSON.parse(response);
          // console.log(response);
          let template = '';
          if(producto.usuario_sesion != '') {
            if(producto.estado_favorito == ''){
              template = `${producto.producto} <button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="far fa-heart fa-lg text-danger"></i></button>`;
            }
            else {
              if(producto.estado_favorito == 'I'){
                template = `${producto.producto} <button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="far fa-heart fa-lg text-danger"></i></button>`;
              }
              else {
                template = `${producto.producto} <button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="fas fa-heart fa-lg text-danger"></i></button>`;
              }
            }
          } 
          else {
            template = `${producto.producto}`;
          }
          $('#producto').html(template);
         
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

    function mostrar_informacion_precio(producto){
      let template = '';
      if(producto.calificacion != 0){
            // template1 += `</br>`;
        for(let index = 0; index < producto.calificacion; index++){
          template += `<i class="fas fa-star text-warning"></i>`;
        }
        let estrellas_faltantes = 5 - producto.calificacion;
        for(let index = 0; index < estrellas_faltantes; index++) {
          template += `<i class="far fa-star text-warning"></i>`;
        }
        template += `</br>`;
      }
      if(producto.descuento != 0) {
        template += `
            <span class="text-muted" style="text-decoration: line-through">S/ ${producto.precio}</span>
            <span class="text-muted">-${producto.descuento}%</span></br>
        `;
      }
      template += `<h4 class="text-danger">S/ ${producto.precio_descuento}</h4>`
      $('#informacion_precios').html(template);
    }

    function mostrar_informacion_envio(producto){
      let template = '';
      if(producto.envio == 'gratis'){
        template += `<i class="fas fa-truck-moving text-danger"></i>
                      <span class="ml-1">Envio: </span>
                      <span class="badge bg-success">Envio gratis</span>`;
      } else {
        template += `<i class="fas fa-truck-moving text-danger"></i>
                      <span class="ml-1">Envio: </span>
                      <span class="mr-1">S/ 15.00</span>`;
      }
      template += `</br>`;
      template += `<i class="fas fa-store text-danger"></i>
                    <span class="ml-1">Recogelo en tienda: ${producto.direccion_tienda}</span>`;
      $('#informacion_envio').html(template);
    }

    function mostrar_tienda(producto){  
      let template = `
        <h2 class="mb-0">
          <button class="btn btn-primary">
            <i class="fas fa-star text-warning mr-1"></i><span>${producto.promedio_calificacion_tienda}</span>
          </button>
          <span class="text-muted ml-1">${producto.tienda}</span>
        </h2>
        <h4 class="mt-0">
          <small>${producto.numero_resenas}</small>
        </h4>
        <div class="mt-2 product-share">
          <a href="#" class="text-gray">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-rss-square fa-2x"></i>
          </a>
        </div>
      `;
      $('#tienda').html(template);
    }

    function mostrar_agregar_carrito(){
      let template = ` 
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <select id="cantidad_producto" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>  
          <div class="btn btn-success btn-flat">
            <i class="fas fa-cart-plus fa-lg mr-2"></i>
            Agregar al carrito
          </div>
        </div> `;
        $('#agregar_carrito').html(template);
    }

    function mostrar_caracteristicas(caracteristicas) {
      let template = `
      <table class="table table-over table-responsive">
                    <thead>
                        <tr>
                            <th class="col">#</th>
                            <th class="col">Caracteristica</th>
                            <th class="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>`;
                    let cont = 0;
                    caracteristicas.forEach(caracteristica => {
                      cont++;
                      template += `  
                        <tr>
                          <td>${cont}</td>
                          <td>${caracteristica.titulo}</td>
                          <td>${caracteristica.descripcion}</td>
                        </tr>
                      `;
                    })
      template += `
                    </tbody>
                </table>`;
      $('#product-caract').html(template);
    }

    function mostrar_resenas(resenas){
      let template = '';
      resenas.forEach(resena => {
              // Obtener la fecha actual
        const fechaActual = moment();
            
        // Obtener la fecha de creación de la reseña
        const fechaCreacion = moment(resena.fecha_creacion);
            
        // Calcular la diferencia en segundos entre las dos fechas
        const segundosTranscurridos = fechaActual.diff(fechaCreacion, 'seconds');
            
        // Crear una variable para almacenar el texto de tiempo transcurrido
        let tiempoTranscurrido = '';
            
        if (segundosTranscurridos < 60) {
          tiempoTranscurrido = 'hace unos segundos';
        } else if (segundosTranscurridos < 3600) {
          const minutosTranscurridos = fechaActual.diff(fechaCreacion, 'minutes');
          tiempoTranscurrido = `hace ${minutosTranscurridos} minutos`;
        } else if (segundosTranscurridos < 86400) {
          const horasTranscurridas = fechaActual.diff(fechaCreacion, 'hours');
          tiempoTranscurrido = `hace ${horasTranscurridas} horas`;
        } else {
          tiempoTranscurrido = fechaCreacion.format('DD [de] MMMM [de] YYYY HH:mm');
        }
        template += `
            <div class="card-comment">
            <img class="img-circle img-sm" src="/Centennials/Util/Img/Users/${resena.avatar}" alt="User Image">
  
            <div class="comment-text">
            <span class="username">
                  ${resena.usuario}`;
            for(let index = 0; index < resena.calificacion; index++){
              template += `<i class="fas fa-star text-warning"></i>`;
            }
            let estrellas_faltantes = 5 - resena.calificacion;
            for(let index = 0; index < estrellas_faltantes; index++) {
              template += `<i class="far fa-star text-warning"></i>`;
            }

            template += `<span class="text-muted float-right">${tiempoTranscurrido}</span>
                  </span>
                  ${resena.descripcion}
                  </div>
                </div>
          `;
      });
      $('#resenas').html(template);
    }

    async function mostrar_comentarios() {
      funcion = "mostrar_comentarios";
      let data = await fetch('/Centennials/Controllers/PreguntaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let producto = JSON.parse(response);
          // console.log(response);
          let template = '';
          if(producto.bandera == '2'){
            template += `
              <div class="card-footer">
                  <form id="form_pregunta">
                    <div class="input-group">
                      <img class="direct-chat-img mr-1" src="/Centennials/Util/Img/Users/${producto.avatar_sesion}" alt="Message User Image">
                      <input type="text" id="pregunta" placeholder="Escribir pregunta" class="form-control" required>
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </span>
                    </div>
                  </form>
              </div>
            `;
          }
          template +=`
              <div class="direct-chat-messages direct-chat-danger preguntas">
          `;
          producto.preguntas.forEach(pregunta => {
            // console.log(pregunta);
            template += `
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">${pregunta.username}</span>
                    <span class="direct-chat-timestamp float-right">${pregunta.fecha_creacion}</span>
                  </div>
                  <img class="direct-chat-img" src="/Centennials/Util/Img/Users/${pregunta.avatar}" alt="Message User Image">
                  <div class="direct-chat-text">
                    ${pregunta.contenido}
                  </div>`;
                  if(pregunta.estado_respuesta == '0'){
                    if(producto.bandera == '1'){
                      template += `
                      <div class="card-footer">
                        <form>
                          <div class="input-group">
                            <img class="direct-chat-img mr-1" src="/Centennials/Util/Img/Users/${producto.avatar}" alt="Message User Image">
                            <input type="text" placeholder="Responder pregunta" class="form-control respuesta" required>
                            <input type="hidden" value="${pregunta.id}" class="id_pregunta">
                            <span class="input-group-append">
                              <button class="btn btn-danger enviar_respuesta">Enviar</button>
                            </span>
                          </div>
                        </form>
                      </div>`;
                    }
                  } else {
                    template += `
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">${producto.username}</span>
                      </div>
                      <img class="direct-chat-img" src="/Centennials/Util/Img/Users/${producto.avatar}" alt="Message User Image">
                      <div class="direct-chat-text">
                        ${pregunta.respuesta.contenido}
                      </div>
                    </div>
                    `;
                  } 
                  template+= `
                  </div>`;
          });
          template+= `</div>`;
          $('#product-pre').html(template);
         
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

    async function verificar_producto(){
      funcion = "verificar_producto";
      let data = await fetch('/Centennials/Controllers/ProductoTiendaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let producto =  JSON.parse(response);
          // console.log(producto);
          if(producto.usuario_sesion != ''){
            read_notificaciones();
          }
          mostrar_pasarela(producto);
          mostrar_titulo_favorito();
          $('#marca').text('Marca: ' + producto.marca);
          $('#sku').text('SKU: ' + producto.sku);
          mostrar_informacion_precio(producto);
          mostrar_informacion_envio(producto);
          mostrar_tienda(producto);
          mostrar_agregar_carrito();
          $('#product-desc').text(producto.detalles);
          mostrar_caracteristicas(producto.caracteristicas);
          mostrar_resenas(producto.resenas);
          mostrar_comentarios();
          obtener_contadores();
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
              location.href = '/Centennials/index.php';
          }
        }
        
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    }

    // Imagen Pasarelas
    $(document).on('click', '.imagen_pasarelas', (e) => {
      let elemento = $(this)[0].activeElement;
      let img = $(elemento).attr('prod_img');
      $('#imagen_principal').attr('src', '/Centennials/Util/Img/producto/' + img)
    })

    // Realizar Pregunta
    async function realizar_pregunta(pregunta){
      funcion = "realizar_pregunta";
      let data = await fetch('/Centennials/Controllers/PreguntaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&pregunta=' + pregunta
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          mostrar_comentarios();
          $('#form_pregunta').trigger('reset');
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

    // Submit realizar pregunta
    $(document).on('submit', '#form_pregunta', (e) => {
      let pregunta = $('#pregunta').val();
      realizar_pregunta(pregunta);
      e.preventDefault();
    });

    // Realizar Respuesta
    async function realizar_respuesta(respuesta, id_pregunta){
      funcion = "realizar_respuesta";
      let data = await fetch('/Centennials/Controllers/RespuestaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&respuesta=' + respuesta + '&&id_pregunta=' + id_pregunta
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          mostrar_comentarios();
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

    // Enviar respuesta
    $(document).on('click', '.enviar_respuesta', (e) => {
      let elemento = $(this)[0].activeElement.parentElement.parentElement;
      let respuesta = $(elemento).children('input.respuesta').val();
      let id_pregunta = $(elemento).children('input.id_pregunta').val();
      // console.log(respuesta + ' ' + id_pregunta);
      if(respuesta != ''){
        realizar_respuesta(respuesta, id_pregunta)
      } else {
        toastr.error('* La respuesta esta vacia');
      }
      e.preventDefault();
    });  

    // Realizar Favorito
    async function cambiar_estado_favorito(id_favorito, estado_favorito){
      funcion = "cambiar_estado_favorito";
      let data = await fetch('/Centennials/Controllers/FavoritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_favorito=' + id_favorito + '&&estado_favorito=' + estado_favorito
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta.mensaje);
          if(respuesta.mensaje == 'add'){
            toastr.success('Se agrego a favoritos');
          } 
          else if(respuesta.mensaje == 'remove') {
            toastr.warning('Se removio de favoritos');
          } 
          else if(respuesta.mensaje == 'error al eliminar'){
            toastr.error('No intente vulnerar el sistema');
          }
          mostrar_titulo_favorito();
          read_favoritos();
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

    // Favoritos
    $(document).on('click', '.bandera_favorito', (e) => {
      let elemento = $(this)[0].activeElement;
      let id_favorito = $(elemento).attr('id_favorito');
      let estado_favorito = $(elemento).attr('estado_fav');
      cambiar_estado_favorito(id_favorito, estado_favorito);
    });  

    // Contadores 
    async function obtener_contadores() {
      funcion = "obtener_contadores";
      let data = await fetch('/Centennials/Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
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