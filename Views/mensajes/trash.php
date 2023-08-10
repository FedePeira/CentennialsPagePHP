<?php
  include_once 'layouts/header.php';
?>
    <!-- Modal Crear Mensaje -->
    <div class="modal fade model-right" id="modal_crear_mensaje" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-marca" enctype="multipart/form-data">
              <div class="form-group">
                <!-- Actual pass de Persona -->
                <div class="form-group">
                  <label for="para">Para:</label>
                  <select name="para" id="para" class="form-control select2-info" style="width:100%"></select>
                </div>
                <div class="form-group">
                  <label for="asunto">Asunto: </label>
                  <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Ingrese asunto">
                </div>
                <div class="form-group">
                  <label for="contenido">Contenido: </label>
                  <textarea type="text" style="height: 200px" name="contenido" id="contenido" class="form-control" placeholder="Ingrese contenido"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="cerrar_modal_crear_mensaje" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_ver_mensaje_trash" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="asunto_modal"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label id="E_D_modal"></label>
            </div>
            <div id="botones_trash" class="form-group">

            </div>
            <div class="form-group">
              <label for="contenido_modal">Contenido:</label>
              <span id="contenido_modal"></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="cerrar_modal_crear_mensaje" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <title>Papelera | CodeWar</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Papelera</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Papelera</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <style>
      .model .model-right .modal-dialog{
        top: 320px;
        max-width: 500px;
        max-height: 500px;
        min-height: calc(100vh - 0);
      }

      .model .model-right .show .modal-dialog{
        transform: translate(0, 0);
      }

      .model .model-right .modal-content{
        height: calc(100vh - 0);
        overflow-y: auto;
      }

      .model .model-right .modal-dialog{
        transform: translate(100%, 0);
        margin: 0 0 0 auto;
      }
    </style>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
              <button data-bs-toggle="modal" data-bs-target="#modal_crear_mensaje" class="btn btn-outline-info btn-block mb-3"><i class="fas fa-plus mr-2"></i>Redactar</button>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Carpetas</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                            <a id="recibidos" href="../mensajes" class="nav-link ">
                                
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="sent.php" class="nav-link">
                                <i class="far fa-envelope"></i> Enviados
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="favorites.php" class="nav-link">
                                <i class="far fa-star"></i> Favoritos
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-trash-alt"></i> Papelera
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Papelera</h3>
    
                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Search Mail">
                      <div class="input-group-append">
                        <div class="btn btn-primary">
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <button type="button" title="Seleccionador grupal" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <button type="button" title="Restaurar grupo seleccionado" class="btn btn-default btn-sm restaurar_mensajes">
                            <i class="fas fa-trash-restore"></i> Restaurar mensajes
                        </button>
                        <button type="button" title="Eliminar grupo seleccionado" class="btn btn-default btn-sm eliminar_mensajes">
                            <i class="far fa-trash-alt"></i> Eliminar definitivamente
                        </button>
                        <button type="button" title="Actualizar mensajes" class="btn btn-default btn-sm actualizar_mensajes">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <table id="mensajes_papelera" class="table table-hover mailbox-messages">
                        <thead>
                            <tr class="table-primary">
                                <th></th>
                                <th></th>
                                <th>E/D</th>
                                <th>Asunto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </section>
<?php
  include_once 'layouts/footer.php';
?>
<script>
$(document).ready(function(){
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

    $('#modal_crear_mensaje').modal({
      backdrop: "static",
      keyboard: false
    });

    $('#para').select2({
      placeholder: 'Seleccione un destinatario',
      language: {
        noResults: function(){
          return "No hay resultado";
        },
        searching: function() {
          return "Buscando....";
        }
      }
    });

    async function llenar_destinatarios() {
      funcion = "llenar_destinatarios";
      let data = await fetch('../../Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let destinatarios = JSON.parse(response);
          let template = '';
          destinatarios.forEach(destinatario => {
            template += `
              <option value="${destinatario.id}">${destinatario.nombre_completo}</option>
            `;
          });
          $('#para').html(template);
          $('#para').val('').trigger('change');
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

    async function read_notificaciones(){
      funcion = "read_notificaciones";
      let data = await fetch('../../Controllers/NotificacionController.php', {
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
              <a href="../../${notificacion.url_1}&&noti=${notificacion.id}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../Util/Img/producto/${notificacion.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <a href="../../Views/notificaciones.php" class="dropdown-item dropdown-footer">ver todas las notificaciones</a>
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
      let data = await fetch('../../Controllers/FavoritoController.php', {
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
              <a href="../../${favorito.url}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../Util/Img/producto/${favorito.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <a href="../../Views/favoritos.php" class="dropdown-item dropdown-footer">ver todos tus favoritos</a>
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
          <a class="nav-link" href="../../Views/register.php" role="button">
            <i class="fas fa-user-plus"></i> Registrarse
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../Views/login.php" role="button">
            <i class="far fa-user"></i> Iniciar Sesion
          </a>
        </li>
        `;
      }
      else{
        template = `
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

          <li id="notificacion" class="nav-item dropdown">
            
          </li>
          <li id="favorito" class="nav-item dropdown">
           
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../Util/Img/Users/${usuario.avatar}" width="30" height="30" class="img-fluid img-circle">
                <spa>${usuario.user}</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../../Views/mi_perfil.php"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> Mis pedidos</a></li>
                <li><a class="dropdown-item" href="../../Controllers/logout.php"><i class="fas fa-user-times"></i> Cerrar sesion</a></li>
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
            <a id="active_nav_notificaciones" href="../../Views/notificaciones.php" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p id="nav_cont_noti">
                Notificaciones
              </p>
            </a>
          </li>
          <li id="nav_favoritos" class="nav-item">
            <a id="active_fav_favoritos" href="../../Views/favoritos.php" class="nav-link">
              <i class="nav-icon far fa-heart"></i>
              <p id="nav_cont_fav">
                Favoritos
              </p>
            </a>
          </li>
          <li id="nav_mensajes" class="nav-item">
            <a id="active_fav_mensajes" href="../../Views/mensajes/index.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p id="nav_cont_mens">
                Mensajes
              </p>
            </a>
          </li>`;
          if(usuario.tipo_usuario == 1){
            template+= `<li class="nav-header">Producto</li>
            <li id="nav_marcas" class="nav-item">
              <a id="active_nav_marcas" href="../../Views/marca.php" class="nav-link">
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
              <a id="active_nav_marcas" href="../../Views/marca.php" class="nav-link">
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
              <a id="active_nav_marcas" href="../../Views/marca.php" class="nav-link">
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
      let data = await fetch('../../Controllers/UsuarioController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          if(response != ''){
          // location.href = '../index.php';
            let sesion = JSON.parse(response);
            llenar_menu_superior(sesion);
            llenar_menu_lateral(sesion);
            $('#active_nav_mensajes').addClass('active');
            $('#avatar_menu').attr('src', '../Util/Img/Users/' + sesion.avatar);
            $('usuario_menu').text(sesion.user);
            read_notificaciones();
            read_favoritos();
            llenar_destinatarios();
            read_mensajes_papelera();
            obtener_contadores();
            CloseLoader();
          } else {
            location.href = '../login.php';
          }
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

    async function read_mensajes_papelera() {
      funcion = "read_mensajes_papelera";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        try {
          let mensajes = JSON.parse(response);
          $('#mensajes_papelera').DataTable({
            data: mensajes,
            "aaShorting": [],
            "searching": true,
            "scrollX": false,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            columns: [
              { 
                "render": function(data, type, datos, meta) {
                  return `
                  <div class="icheck-primary">
                    <input class="select " type="checkbox" value="${datos.id}">
                    <label for="check1"></label>
                  </div>`;
                } 
              },
              {
                "render": function(data, type, datos, meta) {
                  if(datos.favorito == '1'){
                    return `<i class="fas fa-star text-warning"></i>`;
                  } else {
                    return `<i class="far fa-star"></i>`;
                  }
                } 
              },
              { 
                "render": function(data, type, datos, meta) {
                  let variable;
                  if(datos.abierto == '0'){
                    variable = `<a id="${datos.id}" asunto="${datos.asunto}" E_D="${datos.E_D}" favorito="${datos.favorito}" class="enviar_info_modal" href="" data-bs-toggle="modal" data-bs-target="#modal_ver_mensaje_trash" style="color: #000""><strong>${datos.E_D}</strong></a>`;
                  } else {
                    variable = `<a id="${datos.id}" asunto="${datos.asunto}" E_D="${datos.E_D}" favorito="${datos.favorito}" class="enviar_info_modal" data-bs-toggle="modal" data-bs-target="#modal_ver_mensaje_trash" style="color: #000">${datos.E_D}</a>`;
                  }
                  return variable;
                } 
              },
              { 
                "render": function(data, type, datos, meta) { 
                  let variable;
                  if(datos.abierto == '0'){
                    variable = `<a id="${datos.id}" asunto="${datos.asunto}" E_D="${datos.E_D}" favorito="${datos.favorito}" class="enviar_info_modal" data-bs-toggle="modal" data-bs-target="#modal_ver_mensaje_trash" style="color: #000"><strong>${datos.asunto}</strong></a>`;
                  } else {
                    variable = `<a id="${datos.id}" asunto="${datos.asunto}" E_D="${datos.E_D}" favorito="${datos.favorito}" class="enviar_info_modal" data-bs-toggle="modal" data-bs-target="#modal_ver_mensaje_trash" style="color: #000">${datos.asunto}</a>`;
                  }
                  return variable;
                } 
              },
              {
                "data": "fecha_creacion"
              },
            ],
            "destroy": true, 
            "language": espanol
          })
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

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks');
      let inactivo = $('.checkbox-toggle').hasClass('inactivo');
      let activo = $('.checkbox-toggle').hasClass('activo');
      if (clicks) {
        //Uncheck all checkboxes
        if (inactivo == true) {
          $('.checkbox-toggle').removeClass('inactivo').addClass('activo');
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
        } else {
          $('.checkbox-toggle').removeClass('activo').addClass('inactivo');
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
        }
      } else {
        //Check all checkboxes
        if (inactivo == false) {
          $('.checkbox-toggle').removeClass('activo').addClass('inactivo');
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
        } else {
          $('.checkbox-toggle').removeClass('inactivo').addClass('activo');
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
        }
      }
      $(this).data('clicks', !clicks);
    });

    $('#mensajes_papelera').on('draw.dt', function() {
      $('.checkbox-toggle').removeClass('activo').addClass('inactivo');
      $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
      $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
    });

    async function eliminar_mensajes_definitivamente(eliminados) {
      funcion = "eliminar_mensajes_definitivamente";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&eliminados=' + JSON.stringify(eliminados)
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          if(respuesta.mensaje == 'success') {
            toastr.success('Seccion de mensaje eliminado', 'Eliminados!');
            read_mensajes_papelera();
            obtener_contadores();
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(respuesta.mensaje == 'error') {
            toastr.error('Algunos mensajes no se borraron ya que alguno de ellos fueron vulnerados', 'Error al eliminar!');
            read_mensajes_papelera();
            obtener_contadores();
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
    $(document).on('click', '.eliminar_mensajes', function() {
      let seleccionados = $('.select');
      let eliminados = [];
      $.each(seleccionados, function(index, input){
        if($(input).prop('checked')==true) {
          eliminados.push($(input).val());
        }
      });
      if(eliminados.length != 0) {
        eliminar_mensajes_definitivamente(eliminados);
      } else {
        toastr.warning('Seleccione los mensajes que desea eliminar', 'No se elimino');
      }
    });

    async function restaurar_mensajes(eliminados) {
      funcion = "restaurar_mensajes";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&eliminados=' + JSON.stringify(eliminados)
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          if(respuesta.mensaje == 'success') {
            toastr.success('Seccion de mensaje restaurada', 'Eliminados!');
            read_mensajes_papelera();
            obtener_contadores();
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(respuesta.mensaje == 'error') {
            toastr.error('Algunos mensajes no se restauraron ya que alguno de ellos fueron vulnerados', 'Error al restaurar!');
            read_mensajes_papelera();
            obtener_contadores();
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
    $(document).on('click', '.restaurar_mensajes', function() {
      let seleccionados = $('.select');
      let eliminados = [];
      $.each(seleccionados, function(index, input){
        if($(input).prop('checked')==true) {
          eliminados.push($(input).val());
        }
      });
      if(eliminados.length != 0) {
        restaurar_mensajes(eliminados);
      } else {
        toastr.warning('Seleccione los mensajes que desea eliminar', 'No se elimino');
      }
    });

    $(document).on('click', '.actualizar_mensajes', function() {
      toastr.info('Mensajes actualizados', 'Actualizado');
      read_mensajes_papelera();
      obtener_contadores();
    });

    async function crear_mensaje(datos) {
      let data = await fetch('../../Controllers/MensajeController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          //console.log(sesion);
          if(respuesta.mensaje == 'success') {
            toastr.success('Mensaje enviado', 'Enviado!');
            $('#form-mensaje').trigger('reset');
            $('#para').val('').trigger('change');
            $('#modal_crear_mensaje').modal('hide');
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error') {
            toastr.success('No intente vulnerar el sistema', 'Error!');
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
    $.validator.setDefaults({
      submitHandler: function () {
        // alert('validado');
        let funcion = "crear_mensaje";
        let datos = new FormData($('#form-mensaje')[0]);
        //console.log(datos);
        datos.append('funcion', funcion); 
        crear_mensaje(datos);
      }
    });
    $('#form-marca_rechazar_sol').validate({
      rules: {
        para:{
          required: true
        }, 
        asunto:{
          required: true
        }, 
        contenido:{
          required: true
        }, 
      },
      messages: {
        para: {
          required: "*Este campo es obligatorio",
        },
        asunto: {
          required: "*Este campo es obligatorio",
        },
        contenido: {
          required: "*Este campo es obligatorio",
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

    $(document).on('click', '#cerrar_modal_cerrar_mensaje', function() {
      $('#para').val('').trigger('change');
      $('#modal_crear_mensaje').modal('hide');
    });

    async function obtener_contenido_mensaje(id) {
      funcion = "obtener_contenido_mensaje";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          $('#contenido_modal').html(respuesta.contenido);
        } catch(error) {
          console.error(error);
          console.log(response);
          if(respuesta.mensaje == 'error') {
            toastr.error('Error', 'Error!');
            // read_mensajes_papelera();
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
    $(document).on('click', '.enviar_info_modal', (e)=>{
        let elemento =  e.target;
        let id = $(elemento).attr('id');
        let asunto = $(elemento).attr('asunto');
        let favorito = $(elemento).attr('favorito ');
        let E_D = $(elemento).attr('E_D');
        obtener_contenido_mensaje(id);
        $('#asunto_modal').text(asunto);
        console.log(E_D);
        $('#E_D_modal').text(E_D);
        let template = `
                    <div class="mailbox-controls with-border text-center">
                      <div class="btn-group">
                        <button id="${id}" type="button" class="eliminar_mensaje_definitivamente btn btn-default btn-sm" data-container="body" title="Eliminar definitivamente">
                          <i class="far fa-trash-alt"></i>
                        </button>
                        <button id="${id}" type="button" class="restaurar_mensaje eliminar_mensaje btn btn-default btn-sm" data-container="body" title="Restaurar mensaje">
                          <i class="fas fa-trash-restore"></i>
                        </button>
                      </div>
                      <button type="button" class="btn btn-default btn-sm" title="Imprimir">
                        <i class="fas fa-print"></i>
                      </button>
                      <div class="h4 float-right mr-2"> `;
                          if(favorito == "1") {
                            template+= `<i class="fav fas fa-star text-warning"></i>`;
                          } else {
                            template+= `<i class="nofav fas fa-star"></i>`;
                          }
          template+= `</div>
                    </div>
        `;
        $('#botones_trash').html(template);
    })
    
    async function eliminar_mensaje_definitivamente(id) {
      funcion = "eliminar_mensaje_definitivamente";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id
      });
      if(data.ok){
        let response = await data.text();
        try {
          let respuesta = JSON.parse(response);
          if(respuesta.mensaje=='success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se elimino el mensaje definativamente',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              read_mensajes_papelera();
              $('#modal_ver_mensajes_trash').modal('hide');
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(respuesta.mensaje == 'error') {
            toastr.error('No intente vulnerar el sistema', 'Error al eliminar!');
          } else {
            toastr.error('Hubo un error al eliminar', 'Error al eliminar!');
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
    $(document).on('click', '.eliminar_mensaje_definitivamente', (e)=>{
      let elemento =  e.target;
      let id = $(elemento).attr('id');
      eliminar_mensaje_definitivamente(id);
    })

    async function restaurar_mensaje(id) {
      funcion = "restaurar_mensaje";
      let data = await fetch('../../Controllers/DestinoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id
      });
      if(data.ok){
        let response = await data.text();
        console.log(response);
        try {
          let respuesta = JSON.parse(response);
          console.log(respuesta);
          if(respuesta.mensaje=='success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se elimino el mensaje',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              read_mensajes_papelera();
              obtener_contadores();
              $('#modal_ver_mensajes_trash').modal('hide');
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(respuesta.mensaje == 'error') {
            toastr.error('No intente vulnerar el sistema', 'Error al eliminar!');
          } else {
            toastr.error('Hubo un error al eliminar', 'Error al eliminar!');
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
    $(document).on('click', '.restaurar_mensaje', (e)=>{
      let elemento =  $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      restaurar_mensaje(id);
    })

    async function obtener_contadores() {
      funcion = "obtener_contadores";
      let data = await fetch('../../Controllers/UsuarioController.php', {
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
let espanol = 
{
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %ds fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de",
                "notContains": "No Contiene",
                "notStartsWith": "No empieza con",
                "notEndsWith": "No termina con"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "stateRestore": {
        "creationModal": {
            "button": "Crear",
            "name": "Nombre:",
            "order": "Clasificación",
            "paging": "Paginación",
            "search": "Busqueda",
            "select": "Seleccionar",
            "columns": {
                "search": "Búsqueda de Columna",
                "visible": "Visibilidad de Columna"
            },
            "title": "Crear Nuevo Estado",
            "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
    }
};
</script>