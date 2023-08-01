<?php
  include_once 'Layouts/general/header.php';
?>
    <!-- Modal Crear Marca -->
    <div class="modal fade" id="modal_crear_marca" role="dialog" >
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
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre">
                </div>
                <div class="form-group">
                  <label for="desc">Descripcion</label>
                  <input type="text" name="desc" class="form-control" id="desc" placeholder="Ingrese descripcion">
                </div>
                <!-- Nueva pass de Persona -->
                <div class="form-group">
                  <label for="exampleInputFile">Avatar</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imagen" name="imagen">
                      <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                    </div>
                  </div>
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
    <!-- Modal Editar Marca -->
    <div class="modal fade" id="modal_editar_marca" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 id="widget_nombre_marca" class="widget-user-username"></h3>
                <h5 id="widget_nombre_marca" class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img id="widget_imagen_marca" class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="imagen marca">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <form id="form-marca_mod" enctype="multipart/form-data">
              <input type="hidden" id="id_marca_mod" name="id_marca_mod">
              <div class="form-group">
                <div class="form-group">
                  <label for="nombre_mod">Nombre</label>
                  <input type="text" name="nombre_mod" class="form-control" id="nombre_mod" placeholder="Ingrese nombre">
                </div>
                <div class="form-group">
                  <label for="desc_mod">Descripcion</label>
                  <input type="text" name="desc_mod" class="form-control" id="desc_mod" placeholder="Ingrese descripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imagen_mod" name="imagen_mod">
                      <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                    </div>
                  </div>
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
    <!-- Modal Crear Solicitud -->
    <div class="modal fade" id="modal_crear_solicitud" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar solicitud para marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-marca_sol" enctype="multipart/form-data">
              <input type="hidden" id="id_marca_mod" name="id_marca_mod">
              <div class="form-group">
                <div class="form-group">
                  <label for="nombre_sol">Nombre</label>
                  <input type="text" name="nombre_sol" class="form-control" id="nombre_sol" placeholder="Ingrese nombre">
                </div>
                <div class="form-group">
                  <label for="desc_sol">Descripcion</label>
                  <input type="text" name="desc_sol" class="form-control" id="desc_sol" placeholder="Ingrese descripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imagen_sol" name="imagen_sol">
                      <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <span>
                  Esta solicitud estara en tu lista de espera para ser enviada a todos los administradores para ser revisada, si los datos son
                  correctos se aprobara, si no le enviara un mensaje para que haga las correcciones correspondientes
                </span>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Editar Solicitud -->
    <div class="modal fade" id="modal_editar_sol" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar solicitud marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 id="widget_nombre_sol" class="widget-user-username"></h3>
                <h5 id="widget_nombre_sol" class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img id="widget_imagen_sol" class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="imagen marca">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <form id="form-marca_mod_sol" enctype="multipart/form-data">
              <input type="hidden" id="id_marca_mod_sol" name="id_marca_mod_sol">
              <div class="form-group">
                <div class="form-group">
                  <label for="nombre_mod_sol">Nombre</label>
                  <input type="text" name="nombre_mod_sol" class="form-control" id="nombre_mod_sol" placeholder="Ingrese nombre">
                </div>
                <div class="form-group">
                  <label for="desc_mod_sol">Descripcion</label>
                  <input type="text" name="desc_mod_sol" class="form-control" id="desc_mod_sol" placeholder="Ingrese descripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imagen_mod_sol" name="imagen_mod_sol">
                      <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                    </div>
                  </div>
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
    <!-- Modal Rechazar Solicitud -->
    <div class="modal fade" id="modal_rechazar_sol" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rechazar solicitud marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 id="widget_nombre_sol_rechazar" class="widget-user-username"></h3>
                <h5 id="widget_nombre_sol_rechazar" class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img id="widget_imagen_sol_rechazar" class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="imagen marca">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Solicitante</h5>
                      <span id="" class="description-text"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <form id="form-marca_rechazar_sol" enctype="multipart/form">
              <input type="hidden" id="id_marca_rechazar_sol" name="id_marca_rechazar_sol">
              <input type="hidden" id="nombre_rechazar_sol" name="nombre_rechazar_sol">
              <div class="form-group">
                <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <textarea style="height: 150px" type="text" name="observaciones" class="form-control" id="observaciones" placeholder="Ingrese observaciones"></textarea>
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

    <!-- Marcas -->
    <title>Marcas | CodeWar</title>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="btn_adm">Marcas <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modal_crear_marca">Crear marca</button></h1>
            <h1 id="btn_ven">Solicitudes <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modal_crear_solicitud">Crear solicitud</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Marcas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#tab_marcas" data-toggle="tab">Marcas</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_sol" data-toggle="tab">Solicitudes</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_por_aprobar" data-toggle="tab">Solicitudes por aprobar</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_marcas">    
              <table id="marca" class="table table-hover">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Fecha de creacion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>   
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="tab_sol">
              <table id="mis_solicitudes_marcas" class="table table-hover">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th style="width:15%">Estado de envio</th>
                    <th>Estado aprobado</th>
                    <th>Fecha de creacion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>   
                </tbody>
              </table>
            </div>

            <div class="tab-pane" id="tab_por_aprobar">
              <table id="solicitudes_por_aprobar" class="table table-hover">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Solicitante</th>
                    <th>Fecha de creacion</th>
                    <th>Acciones</th>
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
  include_once 'Layouts/general/footer.php';
?>
<script>
$(document).ready(function(){
    Loader();
    $('#btn_adm').hide();
    $('#btn_ven').hide();

    bsCustomFileInput.init();
    verificar_sesion();
    // setTimeout(verificar_sesion, 2000);
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
      let data = await fetch('../Controllers/NotificacionController.php', {
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
              <a href="../${notificacion.url_1}&&noti=${notificacion.id}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../Util/Img/producto/${notificacion.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <a href="../Views/notificaciones.php" class="dropdown-item dropdown-footer">ver todas las notificaciones</a>
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
      let data = await fetch('../Controllers/FavoritoController.php', {
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
              <a href="../${favorito.url}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../Util/Img/producto/${favorito.imagen}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <a href="../Views/favoritos.php" class="dropdown-item dropdown-footer">ver todos tus favoritos</a>
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
          <a class="nav-link" href="../Views/register.php" role="button">
            <i class="fas fa-user-plus"></i> Registrarse
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Views/login.php" role="button">
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
                <img src="../Util/Img/Users/${usuario.avatar}" width="30" height="30" class="img-fluid img-circle">
                <spa>${usuario.user}</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../Views/mi_perfil.php"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> Mis pedidos</a></li>
                <li><a class="dropdown-item" href="../Controllers/logout.php"><i class="fas fa-user-times"></i> Cerrar sesion</a></li>
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
            <a id="active_nav_notificaciones" href="../Views/notificaciones.php" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p id="nav_cont_noti">
                Notificaciones
              </p>
            </a>
          </li>
          <li id="nav_favoritos" class="nav-item">
            <a id="active_fav_favoritos" href="../Views/favoritos.php" class="nav-link">
              <i class="nav-icon far fa-heart"></i>
              <p id="nav_cont_fav">
                Favoritos
              </p>
            </a>
          </li>
          <li id="nav_mensajes" class="nav-item">
            <a id="active_fav_mensajes" href="../Views/mensajes/index.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p id="nav_cont_mens">
                Mensajes
              </p>
            </a>
          </li>`;
          if(usuario.tipo_usuario == 1){
            template+= `<li class="nav-header">Producto</li>
            <li id="nav_marcas" class="nav-item">
              <a id="active_nav_marcas" href="../Views/marcas.php" class="nav-link">
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
              <a id="active_nav_marcas" href="../Views/marcas.php" class="nav-link">
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
              <a id="active_nav_marcas" href="../Views/marcas.php" class="nav-link">
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
      let data = await fetch('../Controllers/UsuarioController.php', {
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
            if(sesion.tipo_usuario!=4) {
              llenar_menu_superior(sesion);
              llenar_menu_lateral(sesion);
              $('#active_nav_marcas').addClass('active');
              $('#avatar_menu').attr('src', '../Util/Img/Users/' + sesion.avatar);
              $('usuario_menu').text(sesion.user);
              read_notificaciones();
              read_favoritos();
              read_all_marcas();
              if(sesion.tipo_usuario==1 || sesion.tipo_usuario==2){
                read_solicitudes_por_aprobar();
                CloseLoader();
                $('#btn_adm').show();
              } else if(sesion.tipo_usuario==3) {
                read_tus_solicitudes();
                CloseLoader();
                $('#btn_ven').show();
              }
            } else {
              location.href = '../index.php';
            }
          } else {
            location.href = 'login.php';
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

    // Mostrar Marcas
    async function read_all_marcas(){
      funcion = "read_all_marcas";
      let data = await fetch('../Controllers/MarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let marcas =  JSON.parse(response);
          // console.log(marcas);
          $('#marca').DataTable({
            data: marcas,
            "aaShorting": [],
            "searching": true,
            "scrollX": false,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            columns: [
              { data: 'nombre' },
              { data: 'descripcion' },
              { 
                "render": function(data, type, datos, meta) {
                  return `<img width="100" height="100" src="../Util/Img/marca/${datos.imagen}">`;
                } 
              },
              { data: 'fecha_creacion' },
              { 
                "render": function(data, type, datos, meta) {
                  if(datos.tipo_usuario == 3) {
                    return `<button class="alerta_usuario btn btn-info" title="Editar marca" type="button"><i class="fas fa-pencil-alt"></i></button>
                            <button class="alerta_usuario btn btn-danger" title="Eliminar marca"><i class="fas fa-trash-alt"></i></button>`;
                  
                  } else {
                    return `<button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" desc="${datos.descripcion}"  class="edit btn btn-info" title="Editar marca" type="button" data-bs-toggle="modal" data-bs-target="#modal_editar_marca"><i class="fas fa-pencil-alt"></i></button>
                            <button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" class="remove btn btn-danger" title="Eliminar marca"><i class="fas fa-trash-alt"></i></button>`;
                  }
                } 
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

    // Mostrar Solicitudes
    async function read_tus_solicitudes(){
      funcion = "read_tus_solicitudes";
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let solicitudes =  JSON.parse(response);
          // console.log(solicitudes);
          $('#mis_solicitudes_marcas').DataTable({
            data: solicitudes,
            "aaShorting": [],
            "searching": true,
            "scrollX": false,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            columns: [
              { data: 'nombre' },
              { data: 'descripcion' },
              { 
                "render": function(data, type, datos, meta) {
                  return `<img width="100" height="100" src="../Util/Img/marca/${datos.imagen}">`;
                } 
              },  
              { 
                "render": function(data, type, datos, meta) {
                  if(datos.estado_envio=='0'){
                    return `<button id="${datos.id}" nombre="${datos.nombre}" class="send_sol btn btn-primary">Enviar</button>`;
                  } 
                  else if(datos.estado_envio=='1') {
                    return `<span class="badge bg-primary">Enviado</span>`;
                  } 
                  else if(datos.estado_envio=='2') {
                    return `<span class="badge bg-success">Aceptado</span>`;
                  } 
                  else if(datos.estado_envio=='3') {
                    return `<span class="badge bg-danger">Rechazado</span>
                            </br>
                            <span>${datos.observacion}</span>`;
                  }
                } 
              },
              { 
                "render": function(data, type, datos, meta) {
                  if(datos.estado_aprobado=='' || datos.estado_aprobado==null){
                    return `<span class="badge bg-info">En espera</span>`;
                  } 
                  else if(datos.estado_envio=='1') {
                    return `<span>${datos.estado_aprobado}</span>`;
                  } 
                } 
               },
              { data: 'fecha_creacion' },
              { 
                "render": function(data, type, datos, meta) {
                  if(datos.estado_envio=='0'){
                    return `<button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" desc="${datos.descripcion}"  class="edit_solicitud btn btn-info" title="Editar solicitud" type="button" data-bs-toggle="modal" data-bs-target="#modal_editar_sol"><i class="fas fa-pencil-alt"></i></button>
                            <button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" class="remove_solicitud btn btn-danger" title="Eliminar solicitud"><i class="fas fa-trash-alt"></i></button>`;
                  } 
                  else if(datos.estado_envio=='1') {
                    return `<button class="alerta_solicitud_enviada btn btn-info" title="Editar solicitud" type="button"><i class="fas fa-pencil-alt"></i></button>
                            <button class="alerta_solicitud_enviada btn btn-danger" title="Eliminar solicitud"><i class="fas fa-trash-alt"></i></button>`;
                  } 
                  else if(datos.estado_envio=='2') {
                    return `<button class="alerta_solicitud_aprobada btn btn-info" title="Editar solicitud" type="button"><i class="fas fa-pencil-alt"></i></button>
                            <button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" class="remove_solicitud btn btn-danger" title="Eliminar solicitud"><i class="fas fa-trash-alt"></i></button>`;
                  } 
                  else if(datos.estado_envio=='3') {
                    return `<button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" desc="${datos.descripcion}"  class="edit_solicitud btn btn-info" title="Editar solicitud" type="button" data-bs-toggle="modal" data-bs-target="#modal_editar_sol"><i class="fas fa-pencil-alt"></i></button>
                            <button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" class="remove_solicitud btn btn-danger" title="Eliminar solicitud"><i class="fas fa-trash-alt"></i></button>`;
                  }
                } 
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

    // Mostrar Solicitudes
    async function read_solicitudes_por_aprobar(){
      funcion = "read_solicitudes_por_aprobar";
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let solicitudes =  JSON.parse(response);
          // console.log(solicitudes);
          $('#solicitudes_por_aprobar').DataTable({
            data: solicitudes,
            "aaShorting": [],
            "searching": true,
            "scrollX": false,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            columns: [
              { data: 'nombre' },
              { data: 'descripcion' },
              { 
                "render": function(data, type, datos, meta) {
                  return `<img width="100" height="100" src="../Util/Img/marca/${datos.imagen}">`;
                } 
              },  
              { data: "solicitante" },
              { data: 'fecha_creacion' },
              { 
                "render": function(data, type, datos, meta) {
                  return `<button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" desc="${datos.descripcion}" class="aprobar_solicitud btn btn-success" title="Aprobar la solicitud"><i class="fas fa-check"></i></button>
                          <button id="${datos.id}" nombre="${datos.nombre}" img="${datos.imagen}" desc="${datos.descripcion}" solicitante="${datos.solicitante}" class="rechazar_solicitud btn btn-success" title="Rechazar la solicitud" data-bs-toggle="modal" data-bs-target="#modal_rechazar_sol"><i class="fas fa-times"></i></button>`;
                } 
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

    // Crear Marca
    async function crear_marca(datos){
      let data = await fetch('../Controllers/MarcaController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          if(respuesta.mensaje == 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se ha creado la marca',
              showConfirmButton: false,
              timer: 500
            }).then(function() {
              read_all_marcas();
              $('#form-marca').trigger('reset');
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'La marca ya existe',
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
        let funcion = "crear_marca";
        let datos = new FormData($('#form-marca')[0]);
        datos.append("funcion", funcion);
        crear_marca(datos);
      }
    });
    // Validaciones del formulario datos
    $('#form-marca').validate({
      rules: {
        nombre:{
          required: true
        }, 
        desc:{
          required: true
        }, 
        imagen:{
          required: true,
          extension: "png|jpg|jpeg"
        }
      },
      messages: {
        nombre: {
          required: "*Este campo es obligatorio",
        },
        desc: {
          required: "*Este campo es obligatorio",
        },
        imagen: {
          required: "*Este campo es obligatorio",
          extension: "*Debe elegir el formato png, jpg, jpeg"
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

    //Editar Marca
    async function editar_marca(datos){
      let data = await fetch('../Controllers/MarcaController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          if(respuesta.mensaje == 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se ha editado la marca',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              $('#widget_nombre_marca').text(respuesta.nombre_marca);
              $('#widget_desc_marca').text(respuesta.desc_marca);
              if(respuesta.img != '') {
                $('#widget_imagen_marca').attr('src', '../Util/Img/marca/' + respuesta.img);
              }
              read_all_marcas();
              $('#form-marca_mod').trigger('reset');
              $('#modal_editar_marca').modal('hide');
            });
          } else if(respuesta.mensaje == 'danger'){
            Swal.fire({
              icon: 'warning',
              title: 'No altero ningun cambio!',
              text: 'Modifique algun cambio para realizar la edicion',
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error') {
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
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
    $(document).on('click', '.edit', (e)=> {
      $('#form-marca_mod').trigger('reset');
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      let descripcion = $(elemento).attr('desc');
      // console.log(nombre, img);
      $('#widget_nombre_marca').text(nombre);
      $('#widget_desc_marca').text(descripcion);
      $('#widget_imagen_marca').attr('src', '../Util/Img/marca/' + img);
      $('#nombre_mod').val(nombre);
      $('#desc_mod').val(descripcion);
      $('#id_marca_mod').val(id);
    })
    $.validator.setDefaults({
      submitHandler: function () {
        let funcion = "editar_marca";
        let datos = new FormData($('#form-marca_mod')[0]);
        //console.log(datos);
        datos.append('funcion', funcion); 
        editar_marca(datos);
      }
    });
    $('#form-marca_mod').validate({
      rules: {
        nombre_mod:{
          required: true
        }, 
        desc_mod:{
          required: true
        }, 
        imagen_mod:{
          extension: "png|jpg|jpeg"
        }
      },
      messages: {
        nombre_mod: {
          required: "*Este campo es obligatorio",
        },
        desc_mod: {
          required: "*Este campo es obligatorio",
        },
        imagen_mod: {
          extension: "*Debe elegir el formato png, jpg, jpeg",
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

    // Eliminar Marca
    async function eliminar_marca(id, nombre){
      let funcion = "eliminar_marca";
      let respuesta = '';
      let data = await fetch('../Controllers/MarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id + '&&nombre=' + nombre
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          respuesta =  JSON.parse(response);
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
          }
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
    $(document).on('click', '.remove', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      // console.log(nombre, img);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Desea eliminar la marca' + nombre + '?',
        text: "No podras revertir esto!",
        imageUrl: '../Util/Img/marca/' + img,
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-check"></i>',
        cancelButtonText: '<i class="fas fa-times"></i>',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          eliminar_marca(id, nombre).then(respuesta=> {
            if(respuesta.mensaje == 'success'){
              swalWithBootstrapButtons.fire(
                'Borrado!',
                'La marca' + nombre + ' fue borrada',
                'success'
              )
              read_all_marcas();
            }
          });
          swalWithBootstrapButtons.fire(
            'Borrado!',
            'La marca' + nombre + ' fue borrada',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se borro la marca',
            'error'
          )
        }
      })
    });

    // Alerta Usuario
    $(document).on('click', '.alerta_usuario', (e)=> {
      toastr.error('No tienes permiso para realizar esta accion', 'Error!');
    });
    $(document).on('click', '.alerta_solicitud_enviada', (e)=> {
      toastr.warning('La solicitud ya fue enviada, no se puede editar ni eliminar','Cuidado!');
    })
    $(document).on('click', '.alerta_solicitud_aprobada', (e)=> {
      toastr.warning('La solicitud ya fue aprobada, no se puede editar la solicitud','Cuidado!');
    })

    /*Creacion de solicitudes marca*/ 
    async function crear_solicitud_marca(datos){
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          console.log(respuesta);
          if(respuesta.mensaje == 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se ha creado la solicitud marca',
              showConfirmButton: false,
              timer: 500
            }).then(function() {
              read_tus_solicitudes();
              $('#form-marca_sol').trigger('reset');
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == "error_marca"){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'La marca ya existe',
            });
          } else if(response == "error_marca"){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'Ya existe una solicitud para esta marca',
            });
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
        let funcion = "crear_solicitud_marca";
        let datos = new FormData($('#form-marca_sol')[0]);
        //console.log(datos);
        datos.append('funcion', funcion); 
        crear_solicitud_marca(datos);
      }
    });
    $('#form-marca_sol').validate({
      rules: {
        nombre_sol:{
          required: true
        }, 
        desc_sol:{
          required: true
        }, 
        imagen_sol:{
          required: true,
          extension: "png|jpg|jpeg"
        }
      },
      messages: {
        nombre_sol: {
          required: "*Este campo es obligatorio",
        },
        desc_sol: {
          required: "*Este campo es obligatorio",
        },
        imagen_sol: {
          required: "*Este campo es obligatorio",
          extension: "*Debe elegir el formato png, jpg, jpeg"
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
    /*Editar solicitudes Marca*/ 
    async function editar_solicitud(datos){
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          
          if(respuesta.mensaje == 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se ha editado la solicitud marca',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              $('#widget_nombre_sol').text(respuesta.nombre_sol);
              $('#widget_desc_sol').text(respuesta.desc_sol);
              if(respuesta.img_sol != '') {
                $('#widget_imagen_sol').attr('src', '../Util/Img/marca/' + respuesta.img_sol);
              }
              read_tus_solicitudes();
              $('#form-marca_mod_sol').trigger('reset');
              $('#modal_editar_sol').modal('hide');
            });
          } else if(respuesta.mensaje == 'danger'){
            Swal.fire({
              icon: 'warning',
              title: 'No altero ningun cambio!',
              text: 'Modifique algun cambio para realizar la edicion',
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error') {
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
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
    $(document).on('click', '.edit_solicitud', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      let descripcion = $(elemento).attr('desc');
      // console.log(nombre, img);
      $('#widget_nombre_sol').text(nombre);
      $('#widget_desc_sol').text(descripcion);
      $('#widget_imagen_sol').attr('src', '../Util/Img/marca/' + img);
      $('#nombre_mod_sol').val(nombre);
      $('#desc_mod_sol').val(descripcion);
      $('#id_marca_mod_sol').val(id);
    })
    $.validator.setDefaults({
      submitHandler: function () {
        let funcion = "editar_solicitud";
        let datos = new FormData($('#form-marca_mod_sol')[0]);
        //console.log(datos);
        datos.append('funcion', funcion); 
        editar_solicitud(datos);
      }
    });
    $('#form-marca_mod_sol').validate({
      rules: {
        nombre_mod_sol:{
          required: true
        }, 
        desc_mod_sol:{
          required: true
        }, 
        imagen_mod_sol:{
          extension: "png|jpg|jpeg"
        }
      },
      messages: {
        nombre_mod_sol: {
          required: "*Este campo es obligatorio",
        },
        desc_mod_sol: {
          required: "*Este campo es obligatorio",
        },
        imagen_mod_sol: {
          extension: "*Debe elegir el formato png, jpg, jpeg",
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

    /*Eliminar solicitudes Marca*/ 
    async function eliminar_solicitud(id, nombre){
      let funcion = "eliminar_solicitud";
      let respuesta = '';
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id + '&&nombre=' + nombre
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          respuesta =  JSON.parse(response);
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
          }
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
    $(document).on('click', '.remove_solicitud', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      // console.log(nombre, img);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Desea eliminar la solicitud marca' + nombre + '?',
        text: "No podras revertir esto!",
        imageUrl: '../Util/Img/marca/' + img,
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-check"></i>',
        cancelButtonText: '<i class="fas fa-times"></i>',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          eliminar_solicitud(id, nombre).then(respuesta=> {
            if(respuesta.mensaje == 'success'){
              swalWithBootstrapButtons.fire(
                'Borrado!',
                'La solicitud marca' + nombre + ' fue borrada',
                'success'
              )
              read_tus_solicitudes();
            }
          });
          swalWithBootstrapButtons.fire(
            'Borrado!',
            'La solicitud marca' + nombre + ' fue borrada',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se borro solicitud la marca',
            'error'
          )
        }
      })
    })

    /*Envio solicitudes Marca*/ 
    async function enviar_solicitud(id, nombre){
      let funcion = "enviar_solicitud";
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id + '&&nombre=' + nombre
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          if(respuesta.mensaje=="success"){
            toastr.success('La solicitud marca ' + nombre + ' fue enviado correctamente', 'Solicitud enviada!');
            read_tus_solicitudes();
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
          }
          if(response == 'error_usuarios'){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No se pudo enviar el mensaje porque no hay destinatarios',
            });
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
    $(document).on('click', '.send_sol', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      // console.log(nombre, img);
      enviar_solicitud(id, nombre);
    })

    /*Aprobar Solicitud*/
    async function aprobar_solicitud(id, nombre){
      let funcion = "aprobar_solicitud";
      let respuesta = '';
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id=' + id + '&&nombre=' + nombre
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          respuesta =  JSON.parse(response);
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
          }
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
    $(document).on('click', '.aprobar_solicitud', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      let descripcion = $(elemento).attr('desc');
      // console.log(nombre, img);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Desea aprobar la solicitud marca' + nombre + '?',
        text: "No podras revertir esto!",
        imageUrl: '../Util/Img/marca/' + img,
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-check"></i>',
        cancelButtonText: '<i class="fas fa-times"></i>',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          aprobar_solicitud(id, nombre).then(respuesta=> {
            if(respuesta.mensaje == 'success'){
              swalWithBootstrapButtons.fire(
                'Aprobado!',
                'La solicitud marca' + nombre + ' fue aprobada',
                'success'
              )
              read_solicitudes_por_aprobar();
              read_all_marcas();
            }
            else if(respuesta.mensaje == "danger") {
              swalWithBootstrapButtons.fire(
                'No se pudo aprobar',
                'No se aprobo solicitud la marca, ya existe una marca con el mismo nombre',
                'error'
              )
              read_solicitudes_por_aprobar();
            }
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se aprobo solicitud la marca',
            'error'
          )
        }
      })
    })

    /*Rechazar Solicitud*/
    async function rechazar_solicitud(datos){
      let data = await fetch('../Controllers/SolicitudMarcaController.php', {
        method:'POST',
        body: datos
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta);
          
          if(respuesta.mensaje == 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se ha rechazado la solicitud marca',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              read_solicitudes_por_aprobar();
              $('#form-marca_rechazar_sol').trigger('reset');
              $('#modal_rechazar_sol').modal('hide');
            });
          } else if(respuesta.mensaje == 'danger'){
            Swal.fire({
              icon: 'warning',
              title: 'No altero ningun cambio!',
              text: 'Modifique algun cambio para realizar la edicion',
            });
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error') {
            Swal.fire({
              icon: 'error',
              title: 'Cuidado!',
              text: 'No intente vulnerar el sistema, presiene F5',
            });
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
    $(document).on('click', '.rechazar_solicitud', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('id');
      let nombre = $(elemento).attr('nombre');
      let img = $(elemento).attr('img');
      let descripcion = $(elemento).attr('desc');
      let solicitante = $(elemento).attr('solicitante');
      // console.log(nombre, img);
      $('#widget_nombre_sol_rechazar').text(nombre);
      $('#widget_desc_sol_rechazar').text(descripcion);
      $('#widget_imagen_sol_rechazar').attr('src', '../Util/Img/marca/' + img);
      $('#solicitante').text(solicitante);
      $('#id_marca_rechazar_sol').val(id);
      $('#nombre_rechazar_sol').val(nombre);
    })
    $.validator.setDefaults({
      submitHandler: function () {
        // alert('validado');
        let funcion = "rechazar_solicitud";
        let datos = new FormData($('#form-marca_rechazar_sol')[0]);
        //console.log(datos);
        datos.append('funcion', funcion); 
        rechazar_solicitud(datos);
      }
    });
    $('#form-marca_rechazar_sol').validate({
      rules: {
        observaciones:{
          required: true
        }, 
      },
      messages: {
        observaciones: {
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