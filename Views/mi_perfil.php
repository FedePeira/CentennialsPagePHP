
<?php
  include_once 'Layouts/general/header.php';
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
              <select id="departamento" class="form-control" style="width:100%" required>
              </select>
            </div>
            <div class="form-group">
              <label>Provincia: </label>
              <select id="provincia" class="form-control" style="width:100%" required>
              </select>
            </div>
            <div class="form-group">
              <label>Distrito: </label>
              <select id="distrito" class="form-control" style="width:100%" required></select>
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

  <!-- Modal -->
 <title>Mi Perfil | CodeWar</title>
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 id="username" class="widget-user-username"></h3>
                <h5 id="tipo_usuario" class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img id="avatar_perfil" class="img-circle elevation-2" alt="User Avatar">
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

            <!-- About Me Box -->
            <!-- Llamada del Modal Datos, para ingresar los datos personales de la persona -->
            <div class="card card-light">
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
                      <h2 id="nombres" class="lead"><b></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-address-card"></i></span>DNI: <span id="dni"></span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span>Email: <span id="email"></span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Telefono: <span id="telefono"></span></li>
                      </ul>
                    </div>
                    <div class="col-4 text-center">
                      <img src="../Util/Img/datos.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#modal_contra">Cambiar password</button>
                </div>
              </div>
            <!-- /.card -->
            <div class="card card-light">
                <div class="card-header border-bottom-0">
                   <strong>Mis direcciones de envios</strong>
                   <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-bs-toggle="modal" data-bs-target="#modal_direcciones"  >
                      <i class="fas fa-plus"></i>
                    </button>
                   </div>
                </div>
                <div id="direcciones" class="card-body pt-0 mt-3">
                </div>
              </div>
            <!-- /.card -->
            <div class="card card-light">
                <div class="card-header border-bottom-0">
                   <strong>Mis tarjetas de pago</strong>
                   <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                      <i class="fas fa-plus"></i>
                    </button>
                   </div>
                </div>
                <div class="card-body pt-0 mt-3">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Nicole Pearson</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                    </div>
                    <div class="col-4 text-center">
                      <img src="../Util/Img/credito.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
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
      </div><!-- /.container-fluid -->
    </section>

    
<?php
    include_once 'Layouts/general/footer.php'
?>

<script>
$(document).ready(function() {
    var funcion;
    bsCustomFileInput.init();
    verificar_sesion();
    obtener_datos();
    llenar_departamentos();
    llenar_direcciones();

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

    function llenar_direcciones(){
      funcion = 'llenar_direcciones';
      $.post('../Controllers/UsuarioDistritoController.php', { funcion }, (response)=>{
        console.log(response);
        let direcciones = JSON.parse(response);
        let contador = 0;
        let template = '';
        direcciones.forEach(direccion => {
          contador++;
          template+=` 
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
        $('#direcciones').html(template);
      })
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
          funcion = "eliminar_direccion";
          $.post('../Controllers/UsuarioDistritoController.php', { funcion, id }, (response) => {
            if(response == "success") {
              swalWithBootstrapButtons.fire(
                'Borrado!',
                'La direccion fue borrado',
                'success'
              )
              llenar_direcciones();
            } else if(response == "error") {
                swalWithBootstrapButtons.fire(
                  'No se borro!',
                  'Hubo alternaciones en la integridad de datos',
                  'success'
                )
            } else {
                swalWithBootstrapButtons.fire(
                  'No se ha borrado!',
                  'Tenemos problemas en el sistema',
                  'success'
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

    function llenar_departamentos(){
      funcion = 'llenar_departamentos';
      $.post('../Controllers/DepartamentoController.php', { funcion }, (response)=>{
        let departamentos = JSON.parse(response);
        let template = '';
        departamentos.forEach(departamento => {
          template += `
            <option value="${departamento.id}">${departamento.nombre}</option>
          `;
        });
        $('#departamento').html(template);
        $('#departamento').val('').trigger('change');
      })
    } 

    $('#departamento').change(function(){
      let id_departamento = $('#departamento').val();
      funcion = "llenar_provincia"
      $.post('../Controllers/ProvinciaController.php', { funcion, id_departamento }, (response)=>{
        let provincias = JSON.parse(response);
        let template = '';
        provincias.forEach(provincia => {
          template += `
            <option value="${provincia.id}">${provincia.nombre}</option>
          `;
        });
        $('#provincia').html(template);
        $('#provincia').val('').trigger('change');
      })
    })

    $('#provincia').change(function(){
      let id_provincia = $('#provincia').val();
      funcion = "llenar_distritos";
      $.post('../Controllers/DistritoController.php', { funcion, id_provincia }, (response)=>{
        let distritos = JSON.parse(response);
        let template = '';
        distritos.forEach(distrito => {
          template += `
            <option value="${distrito.id}">${distrito.nombre}</option>
          `;
        });
        $('#distrito').html(template);
      })
    })

    function verificar_sesion() {
      funcion = 'verificar_sesion';
      $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
        console.log(response);
        if(response != ''){
          // location.href = '../index.php';
          let sesion = JSON.parse(response);
          $('#nav_login').hide();
          $('#nav_register').hide();
          $('#usuario_nav').text(sesion.user + ' #' + sesion.id);
          $('#avatar_nav').attr('src', '../Util/Img/Users/' + sesion.avatar);
          $('#avatar_menu').attr('src', '../Util/Img/Users/' + sesion.avatar);
          $('usuario_menu').text(sesion.user);
            
        } else {
            $('#nav_usuario').hide();
            location.href = 'login.php';
        }
      }) 
    }

    function obtener_datos() {
      funcion = 'obtener_datos';
      $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
        let usuario = JSON.parse(response);
        $('#username').text(usuario.username);
        $('#tipo_usuario').text(usuario.tipo_usuario);
        $('#nombres').text(usuario.nombres + ' ' + usuario.apellidos);
        $('#avatar_perfil').attr('src', '../Util/Img/Users/' + usuario.avatar);
        $('#dni').text(usuario.dni);
        $('#email').text(usuario.email);
        $('#telefono').text(usuario.telefono);
      }) 
    }

    $('#form-direccion').submit(e => {
    funcion = 'crear_direccion';
    let id_distrito = $('#distrito').val();
    let direccion = $('#direccion').val();
    let referencia = $('#referencia').val();
    $.post('../Controllers/UsuarioController.php', {id_distrito, direccion, referencia, funcion}, (response) =>{
      if(response == 'success'){
        Swal.fire({
          position:'center',
          icon: 'success',
          title: 'Se ha registrado su direccion',
          showConfirmButton: false,
          timer: 500,
        }).then(function(){
          $('#form-direccion').trigger('reset');
          $('#departamento').val('').trigger('change');
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Hubo conflicto al crear su direccion, comuniquese con el area de sistemas',
        });
      }
    });
      e.preventDefault();
    })

    // Javascript Modal Datos
    $(document).on('click', 'editar_datos', (e) => {
      funcion = "obtener_datos";
      $.post('../Controllers/UsuarioController.php', {funcion}, (response) => {
        let usuario = JSON.parse(response);
        $('#nombres_mod').val(usuario.nombres);
        $('#apellidos_mod').val(usuario.apellidos);
        $('#dni_mod').val(usuario.dni);
        $('#email_mod').val(usuario.email);
        $('#telefono_mod').val(usuario.telefono);
      })
    }) 
    $.validator.setDefaults({
      submitHandler: function () {
          funcion="editar_datos";
          let datos = new FormData($('#form-datos')[0]);
          datos.append("funcion", funcion);
          $.ajax({
            type: "POST",
            url: '../Controllers/UsuarioController.php',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){
              console.log(response);
              if(response == "success"){
                Swal.fire({ 
                  position:'center',
                  icon: 'success',
                  title: 'Se ha editado sus datos',
                  showConfirmButton: false,
                  timer: 500,
                }).then(function(){
                  verificar_sesion();
                  obtener_datos();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Hubo conflicto al editar sus datos, comuniquese con el area de sistemas',
                });
              };
            }
          })
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

    // Form Contra Validator
    $.validator.setDefaults({
      submitHandler: function () {
        // Nombre Funcion
        funcion = "cambiar_contra";
        // Variables de la old contra y la new contra
        let pass_old = $('#pass_old').val();
        let pass_new = $('#pass_new').val();
        $.post('../Controllers/UsuarioController.php', { funcion, pass_old, pass_new }, (response)=> {
          // Si la "response == 'success' significa que salio todo bien y se cambio la contra y se tira el swal que va a mostrar que salio todo bien"
          console.log(response)  
          if(response == "success"){
              Swal.fire({ 
                  position:'center',
                  icon: 'success',
                  title: 'Se ha cambiado su password',
                  showConfirmButton: false,
                  timer: 500,
                }).then(function(){ 
                  $('#form-contra').trigger('reset');
                });
            } else if (response = "error") {
              Swal.fire({
                  icon: 'warning',
                  title: 'Password Incorrecta',
                  text: 'Ingrese su contraseña actual para poder cambiarla',
                });
            } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Hubo conflicto al cambiar su password, comuniquese con el area de sistemas',
                });
            }
        })
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
})
</script>
