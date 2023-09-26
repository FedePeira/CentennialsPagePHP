<?php
  session_start();
  include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/header.php';
?>
  <!-- Modal para el cambio de Contraseña -->
  <div class="modal fade" id="modal_contra" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-contra">
            <div class="form-group">
              <!-- Actual pass de Persona -->
              <div class="form-group">
                <label for="pass_old">Ingrese password actual</label>
                <input type="password" name="pass_old" class="form-control" id="pass_old" placeholder="Ingrese password actual">
              </div>
              <!-- Nueva pass de Persona -->
              <div class="form-group">
                <label for="pass_new">Ingrese nuevo password</label>
                <input type="password" name="pass_new" class="form-control" id="pass_new" placeholder="Ingrese su nueva password">
              </div>
              <!-- Repetir pass de Persona -->
              <div class="form-group">
                <label for="pass_repeat">Repita su nuevo password</label>
                <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="Repita su nueva password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
          </div>
      </div>
    </div>
  </div>
  <!-- Modal Datos Personales-->
  <!-- id="modal_datos" identificador -->
  <div class="modal fade" id="modal_datos" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar datos personales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-datos" enctype="multipart/form-data">
            <div class="form-group">
              <!-- Nombre de Persona -->
              <div class="form-group">
                <label for="nombres_mod">Nombres</label>
                <input type="text" name="nombres_mod" class="form-control" id="nombres_mod" placeholder="Ingrese nombres">
              </div>
              <!-- Apellido de Persona -->
              <div class="form-group">
                <label for="apellidos_mod">Apellidos</label>
                <input type="text" name="apellidos_mod" class="form-control" id="apellidos_mod" placeholder="Ingrese apellidos">
              </div>
              <!-- DNI de Persona -->
              <div class="form-group">
                <label for="dni_mod">DNI</label>
                <input type="text" name="dni_mod" class="form-control" id="dni_mod" placeholder="Ingrese DNI">
              </div>
              <!-- Email de Persona -->
              <div class="form-group">
                <label for="email_mod">Email</label>
                <input type="text" name="email_mod" class="form-control" id="email_mod" placeholder="Ingrese email">
              </div>
              <!-- Telefono de Persona -->
              <div class="form-group">
                <label for="telefono_mod">Telefono</label>
                <input type="text" name="telefono_mod" class="form-control" id="telefono_mod" placeholder="Ingrese telefono">
              </div>
              <div class="form-group">
                    <label for="exampleInputFile">Avatar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar_mod" name="avatar_mod">
                        <label class="custom-file-label" for="exampleInputFile">Seleccione un avatar</label>
                      </div>
                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>
          </form>
          </div>
      </div>
    </div>
  </div>
  <!-- Modal Direcciones -->
  <div class="modal fade" id="modal_direcciones" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Direccion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-direccion">
            <div class="form-group">
              <label>Departamento: </label>
              <select id="departamento" class="form-control" placeholder="Ingrese su departamento" style="width:100%" required>
              </select>
            </div>
            <div class="form-group">
              <label>Provincia: </label>
              <select id="provincia" class="form-control" placeholder="Ingrese su provincia" style="width:100%" required>
              </select>
            </div>
            <div class="form-group">
              <label>Distrito: </label>
              <select id="distrito" class="form-control" placeholder="Ingrese su distrito" style="width:100%; placeholder: center" required></select>
            </div>
            <div class="form-group">
              <label>Direccion: </label>
              <input id="direccion" class="form-control" placeholder="Ingrese su direccion" style="width:100%" required>
            </div>
            <div class="form-group">
              <label>Referencia: </label>
              <input id="referencia" class="form-control" placeholder="Ingrese alguna referencia" style="width:100%">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>
          </div>
      </div>
    </div>
  </div>

  <title>Mi Perfil | Centennials</title>
 <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div id="card_usuario" class="card card-widget widget-user">
              <div class="card">
                <div class="card-body">
                  <div id="loader_3" class="overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- About Me Box -->
            <!-- Llamada del Modal Datos, para ingresar los datos personales de la persona -->
            <div id="card_datos_personales" class="card card-light">
              <div class="card">
                <div class="card-body">
                  <div id="loader_4" class="overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <div id="card_direcciones" class="card card-light">
              <div class="card">
                <div class="card-body">
                  <div id="loader_5" class="overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Historial</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="timeline">
                    <div id="historiales" class="timeline timeline-inverse">
                      <div id="loader_5" class="overlay">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

    
<?php
  include_once $_SERVER["DOCUMENT_ROOT"].'/Centennials/Views/Layouts/footer.php';
?>

<script>
$(document).ready(function() {
    var funcion;
    //bsCustomFileInput.init();
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

    $('#departamento').select2({
      placeholder: 'Seleccione un departamento',
      language: {
        noResults:function() {
          return "No hay resultados";
        },
        searching: function(){
          return "Buscando...";
        }
      }
    });

    $('#provincia').select2({
      placeholder: 'Seleccione una provincia',
      language: {
        noResults:function() {
          return "No hay resultados";
        },
        searching: function(){
          return "Buscando...";
        }
      }
    });

    $('#distrito').select2({
      placeholder: 'Seleccione un distrito',
      language: {
        noResults:function() {
          return "No hay resultados";
        },
        searching: function(){
          return "Buscando...";
        }
      }
    });

    async function read_notificaciones(){
      funcion = "read_notificaciones";
      let data = await fetch('/Centennials/Controllers/NotificacionController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let notificaciones =  JSON.parse(response);
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
        try {
          let favoritos =  JSON.parse(response);
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
        // console.log(response);
        try {
          if(response != ''){
          // location.href = '/Centennials/index.php';
            let sesion = JSON.parse(response);
            // console.log(sesion);
            llenar_menu_superior(sesion);
            llenar_menu_lateral(sesion);
            $('#avatar_menu').attr('src', '/Centennials/Util/Img/Users/' + sesion.avatar);
            $('#username_menu').text(sesion.user);
            $('usuario_menu').text(sesion.user);
            read_notificaciones();
            read_favoritos();
            mostrar_card_usuario();
            mostrar_card_direcciones();
            mostrar_historial();
            llenar_departamentos();
            obtener_contadores();
            CloseLoader();
          } else {
            // llenar_menu_superior();
            // llenar_menu_lateral();
            location.href = '/Centennials/login.php';
          }
          // setTimeout(verificar_sesion, 2000);

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

    async function mostrar_card_usuario(){
      funcion = "obtener_datos";
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let usuario = JSON.parse(response);
          let template = `
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">${usuario.username}</h3>
                <h5 class="widget-user-desc">${usuario.tipo_usuario}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="/Centennials/Util/Img/Users/${usuario.avatar}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                  </div>
                </div>
              </div>
              `;
              let template_1 = `
                <div class="card-header border-bottom-0">
                  <strong>Mis Datos personales</strong>
                  <div class="card-tools">
                    <!-- Boton de llamada al modal -->
                    <button type="button" class="editar_datos btn btn-tool" data-bs-toggle="modal" data-bs-target="#modal_datos">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body pt-0 mt-3">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>${usuario.nombres + ' ' + usuario.apellidos}</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-address-card"></i></span>DNI: <span>${usuario.dni}</span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span>Email: <span>${usuario.email}</span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Telefono: <span>${usuario.telefono}</span></li>
                      </ul>
                    </div>
                    <div class="col-4 text-center">
                      <img src="/Centennials/Util/Img/datos.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#modal_contra">Cambiar password</button>
                </div>`;
              $('#loader_3').hide(500);
              $('#loader_4').hide(500);
              $('#card_usuario').html(template);
              $('#card_datos_personales').html(template_1);
        } catch(error) {
          console.log(error);
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

    async function mostrar_card_direcciones(){
      funcion = "llenar_direcciones";
      let data = await fetch('/Centennials/Controllers/UsuarioDistritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let direcciones = JSON.parse(response);
          //console.log(direcciones);
          let contador = 0;
          let template = `
              <div class="card-header border-bottom-0">
                  <strong>Mis direcciones de envios</strong>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-bs-toggle="modal" data-bs-target="#modal_direcciones"  >
                    <i class="fas fa-plus"></i>
                  </button>
                  </div>
              </div>
              <div class="card-body pt-0 mt-3">`;
                direcciones.forEach(direccion => {
                  contador++;
                  template+= ` 
                    <div class="callout callout-info">
                      <div class="card-header">
                        <strong>direccion ${contador}</strong>
                        <div class="card-tools">
                          <button dir_id="${direccion.id}" type="button" class="eliminar_direccion btn btn-tool">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <h2 class="lead"><b>${direccion.direccion}</b></h2>
                        <p class="text-muted text-sm"><b>Referencia: ${direccion.referencia}</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                            ${direccion.distrito}, ${direccion.provincia}, ${direccion.departamento}
                          </li>
                        </ul>
                      </div>
                    </div>
                  `;
                });
          template += `
              </div>
          `;
          $('#loader_5').hide(500);
          $('#card_direcciones').html(template);
        } catch(error) {
          console.log(error);
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

    async function mostrar_historial(){
      funcion = "llenar_historial";
      let data = await fetch('/Centennials/Controllers/HistorialController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let historiales = JSON.parse(response);
          let template = '';
        // Template de cada historial con sus variables: modulo, hora, tipo_historial, etc.
          historiales.forEach(historial => {
            //console.log(historial);
            template += `
                  <div class="time-label">
                    <span class="bg-danger">
                      ${historial[0].fecha}
                    </span>
                  </div>
            `;
            historial.forEach(cambio => { 
              // console.log(cambio.descripcion);
              template += `
                        <div>
                          ${cambio.m_icono}

                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> ${cambio.hora}</span>

                            <h3 class="timeline-header">${cambio.th_icono} Se realizo la accion "${cambio.tipo_historial}"  en ${cambio.modulo}</h3>

                            <div class="timeline-body">
                              ${cambio.descripcion}
                            </div>
                          </div>
                        </div>
                        `;
            });
          });
          template += `
          <div>
            <i class="far fa-clock bg-gray"></i>
          </div>
          `;
          $('#historiales').html(template);
        } catch(error) {
          console.log(error);
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

    async function llenar_departamentos(){
      funcion = "llenar_departamentos";
      let data = await fetch('/Centennials/Controllers/DepartamentoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let departamentos = JSON.parse(response);
          let template = '';
          departamentos.forEach(departamento => {
            template += `
              <option value="${departamento.id}">${departamento.nombre}</option>
            `;
          });
          $('#departamento').html(template);
          $('#departamento').val('').trigger('change');
        } catch(error) {
          console.log(error);
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

    /*
    function obtener_datos() {
      funcion = 'obtener_datos';
      $.post('/Centennials/Controllers/UsuarioController.php', { funcion }, (response) => {
        let usuario = JSON.parse(response);
        $('#username').text(usuario.username);
        $('#tipo_usuario').text(usuario.tipo_usuario);
        $('#nombres').text(usuario.nombres + ' ' + usuario.apellidos);
        $('#avatar_perfil').attr('src', '/Centennials/Util/Img/Users/' + usuario.avatar);
        $('#dni').text(usuario.dni);
        $('#email').text(usuario.email);
        $('#telefono').text(usuario.telefono);
      }) 
    }
    */

    $('#departamento').change(async function(){
      let id_departamento = $('#departamento').val();
      if(id_departamento == null){
        id_departamento = '';
      }
      funcion = "llenar_provincia";
      let data = await fetch('/Centennials/Controllers/ProvinciaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_departamento=' + id_departamento
      });
      if(data.ok){
        let response = await data.text();
        try {
          if(response!='error'){
            let provincias = JSON.parse(response);
            let template = '';
            provincias.forEach(provincia => {
              template += `
                <option value="${provincia.id}">${provincia.nombre}</option>
              `;
            });
            $('#provincia').html(template);
            $('#provincia').val('').trigger('change');
          } else {
            $('#provincia').html('');
            $('#distrito').html('');
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intentes vulnerar el sistema, presione F5',
            });
          }
        } catch(error) {
          console.log(error);
          console.log(response);
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    })

    $('#provincia').change(async function(){
      let id_provincia = $('#provincia').val();
      if(id_provincia == null){
        id_provincia = '';
      }
      funcion = "llenar_distritos";
      let data = await fetch('/Centennials/Controllers/DistritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_provincia=' + id_provincia
      });
      if(data.ok){
        let response = await data.text();
        try {
          if(response != 'error'){
            let distritos = JSON.parse(response);
            let template = '';
            distritos.forEach(distrito => {
              template += `
                <option value="${distrito.id}">${distrito.nombre}</option>
              `;
            });
            $('#distrito').html(template);
          } else {
            $('#distrito').html('');
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intentes vulnerar el sistema, presione F5',
            });
          }
        } catch(error) {
          console.log(error);
          console.log(response);
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    })

    async function crear_direccion(id_distrito, direccion, referencia){
      let data = await fetch('/Centennials/Controllers/UsuarioDistritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_distrito=' + id_distrito + '&&direccion=' + direccion + '&&referencia=' + referencia
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          if(respuesta.mensaje == 'success'){
            Swal.fire({
              position:'center',
              icon: 'success',
              title: 'Se ha registrado su direccion',
              showConfirmButton: false,
              timer: 500,
            }).then(function(){
              $('#form-direccion').trigger('reset');
              $('#departamento').val('').trigger('change');
              mostrar_historial();
              mostrar_card_direcciones();
            });
          } else if(respuesta.mensaje == 'error'){
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No intente vulnerar el sistema',
            });
          }
        } catch(error) {
          console.log(error);
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

    $('#form-direccion').submit(e => {
      funcion = 'crear_direccion';
      let id_distrito = $('#distrito').val();
      let direccion = $('#direccion').val();
      let referencia = $('#referencia').val();
      crear_direccion(id_distrito, direccion, referencia);
      e.preventDefault();
    })

    async function eliminar_direccion(id){
      funcion = "eliminar_direccion";
      let respuesta = '';
      let data = await fetch('/Centennials/Controllers/UsuarioDistritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id 
      });
      if(data.ok){
        let response = await data.text();
        try {
          respuesta = JSON.parse(response);
        } catch(error) {
          console.log(error);
          console.log(response);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Comuniquese con el area de sistemas',
          });
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
      return respuesta;
    }

    $(document).on('click', '.eliminar_direccion', (e) => {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('dir_id'); 
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-3',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Desea borrar esta direccion?',
        text: "Esta accion puede traer consecuencias!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, borra esto!',
        cancelButtonText: 'No, deseo cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          eliminar_direccion(id).then(respuesta => {
            if(respuesta.mensaje == "success") {
              swalWithBootstrapButtons.fire(
                'Borrado!',
                'La direccion fue borrado',
                'success'
              )
              mostrar_card_direcciones();
              mostrar_historial();
            } else if(respuesta.mensaje == "error") {
                swalWithBootstrapButtons.fire(
                  'No se borro!',
                  'Hubo alternaciones en la integridad de datos',
                  'error'
                )
              } 
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'La direccion no se borro',
            'error'
          )
        }
      })
    })

    // Javascript Modal Datos
    $(document).on('click', 'editar_datos', async (e) => {
      funcion = "obtener_datos";
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let usuario = JSON.parse(response);
          $('#nombres_mod').val(usuario.nombres);
          $('#apellidos_mod').val(usuario.apellidos);
          $('#dni_mod').val(usuario.dni);
          $('#email_mod').val(usuario.email);
          $('#telefono_mod').val(usuario.telefono);
        } catch(error) {
          console.log(error);
          console.log(response);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Comuniquese con el area de sistemas',
          });
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    }) 

    async function editar_datos(datos){
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          if(respuesta.mensaje == 'success'){
            Swal.fire({ 
              position:'center',
              icon: 'success',
              title: 'Se ha editado sus datos',
              showConfirmButton: false,
              timer: 500,
            }).then(function(){
              verificar_sesion();
              mostrar_card_usuario();
              // Agrega que se editaron datos en el historial
              mostrar_historial();
            });
          } else if(respuesta.mensaje == 'danger') {
            Swal.fire({
              icon: 'warning',
              title: 'No altero ningun cambio',
              text: 'Modifique algun cambio para realizar la edicion!',
            });
          }
        } catch(error) {
          console.log(error);
          console.log(response);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Comuniquese con el area de sistemas',
          });
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
        funcion="editar_datos";
        let datos = new FormData($('#form-datos')[0]);
        datos.append("funcion", funcion);
        editar_datos(datos);
      }
    });

    jQuery.validator.addMethod("letras",
      function(value, element){
        // Permite espacios en el formulario
        let variable = value.replace(/ /g, "");
        return /^[A-Za-z]+$/.test(variable);
      }, "*Este campo solo permite letras"
    );
    // Validaciones del formulario datos
    $('#form-datos').validate({
      rules: {
        nombres_mod:{
          required: true,
          letras: true,
        }, 
        apellidos_mod:{
          required: true,
          letras: true,
        },  
        dni_mod:{
          required: true,
          digits: true,
          minlength: 8,
          maxlength: 8
        },
        email_mod: {
          required: true,
          email: true,
        },
        telefono_mod:{
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 10
        },
      },
      messages: {
        nombres_mod: {
          required: "*Este campo es obligatorio",
        },
        apellidos_mod: {
          required: "*Este campo es obligatorio",
        },
        dni_mod: {
          required: "*Este campo es obligatorio",
          minlength: "*El DNI debe ser solo 8 caracteres",
          maxlength: "*El DNI debe ser solo 8 caracteres",
          digits: "*El DNI solo esta compuesto por numeros"
        },
        email_mod: {
          required: "*Este campo es obligatorio",
          email: "*No es formato email"
        },
        telefono_mod: {
          required: "*Este campo es obligatorio",
          minlength: "*El telefono debe ser solo 10 caracteres",
          maxlength: "*El telefono debe ser solo 10 caracteres",
          digits: "*El telefono solo esta compuesto por numeros"
        },
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

    async function cambiar_contra(funcion, pass_old, pass_new){
      let data = await fetch('/Centennials/Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&pass_old=' + pass_old + '&&pass_new=' + pass_new 
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          console.log(respuesta);
          // Si la "response == 'success' significa que salio todo bien y se cambio la contra y se tira el swal que va a mostrar que salio todo bien"
          if(respuesta.mensaje == "success"){
              Swal.fire({ 
                  position:'center',
                  icon: 'success',
                  title: 'Se ha cambiado su password',
                  showConfirmButton: false,
                  timer: 500,
                }).then(function(){ 
                  $('#form-contra').trigger('reset');
                  mostrar_historial();
                });
            } else if (respuesta.mensaje = "error") {
              Swal.fire({
                  icon: 'warning',
                  title: 'Password Incorrecta',
                  text: 'Ingrese su contraseña actual para poder cambiarla',
                });
            } 
        } catch(error) {
          console.log(error);
          console.log(response);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Comuniquese con el area de sistemas',
          });
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
        // Nombre Funcion
        funcion = "cambiar_contra";
        // Variables de la old contra y la new contra
        let pass_old = $('#pass_old').val();
        let pass_new = $('#pass_new').val();
        console.log(pass_old);
        console.log(pass_new);
        cambiar_contra(funcion, pass_old, pass_new);
      }
    });

    jQuery.validator.addMethod("letras",
    function(value, element){
        let variable = value.replace(/ /g, "");
        return /^[A-Za-z]+$/.test(variable);
      }, "*Este campo solo permite letras"
    );

    $('#form-contra').validate({
      rules: {
        pass_old:{
          required: true,
          minlength: 4,
          maxlength: 20,
        }, 
        pass_new:{
          required: true,
          minlength: 8,
          maxlength: 20,
        }, 
        pass_repeat:{
          required: true,
          equalTo: "#pass_new"
        }
      },
      messages: {
        pass_old: {
          required: "*Este campo es obligatorio",
          minlength: "*El password debe ser de minimo 4 caracteres",
          maxlength: "*El password dede ser de maximo 20 caracteres"
        },
        pass_new: {
          required: "*Este campo es obligatorio",
          minlength: "*El password debe ser de minimo 8 caracteres",
          maxlength: "*El password dede ser de maximo 20 caracteres"
        },
        pass_repeat: {
          required: "*Este campo es obligatorio",
          equalTo: "*El password no coincide con el ingresado"
        }
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
