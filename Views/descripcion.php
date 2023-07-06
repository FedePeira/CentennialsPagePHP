<?php
// Obtenemos el id y el name de index.php
if(!empty($_GET['id'])&& $_GET['name']){
    session_start();
    $_SESSION['product-verification']=$_GET['id'];
    if(!empty($_GET['noti'])){
      $_SESSION['noti']=$_GET['noti'];
    }
   // echo $_SESSION['product-verification'];
    include_once 'Layouts/general/header.php';
?>
<!-- Descripcion Page -->
    <title><?php echo $_GET['name']?> | Codewar</title>
    <style>
      .preguntas {
        height: 100% !important;
      }
    </style>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $_GET['name']?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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

            </div>
            <div class="col-12 col-sm-6">
              <h3 id="producto" class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
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
            
              <div class="bg-light py-2 px-3 mt-4 border">
                <h2 class="mb-0">
                  <button class="btn btn-primary">
                    <i class="fas fa-star text-warning mr-1"></i><span id="promedio_calificacion_tienda"></span>
                  </button>
                  <span id="nombre_tienda" class="text-muted ml-1">nombre de tienda</span>
                </h2>
                <h4 class="mt-0">
                  <small id="numero_resenas"></small>
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
              </div>

              <div class="mt-4">
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
                    <button type="button" class="btn"><i class="fas fa-heart fa-lg text-danger"></i></button>
                </div>
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
                <div class="card-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <img class="direct-chat-img mr-1" src="../Util/Img/Users/user_default.png" alt="Message User Image">
                      <input type="text" name="message" placeholder="Escribir pregunta" class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </span>
                    </div>
                  </form>
                </div>
                <div class="direct-chat-messages direct-chat-danger preguntas">
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <img class="direct-chat-img" src="../Util/Img/Users/user_default.png" alt="Message User Image">
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <div class="card-footer">
                      <form action="#" method="post">
                        <div class="input-group">
                          <img class="direct-chat-img mr-1" src="../Util/Img/Users/6483f76af38e1-1.png" alt="Message User Image">
                          <input type="text" name="message" placeholder="Responder pregunta" class="form-control">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-danger">Enviar</button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <img class="direct-chat-img" src="../Util/Img/Users/6483f76af38e1-1.png" alt="Message User Image">
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                  </div>
                </div>
              </div>

              <!-- DESCRIPCION -->
              <div class="tab-pane fade show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                descripcion
              </div>

              <!-- CARACTERISTICAS -->
              <div class="tab-pane fade" id="product-caract" role="tabpanel" aria-labelledby="product-caract-tab">
                <table class="table table-over table-responsive">
                    <thead>
                        <tr>
                            <th class="col">#</th>
                            <th class="col">Caracteristica</th>
                            <th class="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody id="caracteristicas">

                    </tbody>
                </table>
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
    include_once 'Layouts/general/footer.php';
}
else {
    header('Location: ../index.php');
}
?>
<script>
$(document).ready(function(){
    verificar_sesion();
    verificar_producto();

    async function read_notificaciones(){
      funcion = "read_notificaciones";
      let data = await fetch('../Controllers/NotificacionController.php', {
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
          let template2 = '';
          if(notificaciones.length == 0){
            template1 += ` 
                 <i class="far fa-bell"></i>
            `; 
            template2 += ` 
                Notificaciones
            `; 
          } else {
            template1 += ` 
                 <i class="far fa-bell"></i>
                 <span class="badge badge-warning navbar-badge">${notificaciones.length}</span>
            `; 
            template2 += ` 
                Notificaciones <span class="badge badge-warning right">${notificaciones.length}</span>
            `; 
          }
          $('#numero_notificacion').html(template1);
          $('#nav_cont_noti').html(template2);
          let template = '';
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
          `;
          $('#notificaciones').html(template);
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
          read_notificaciones();
          $('#notificacion').show();
          $('#nav_notificaciones').show();
        } else {
            $('#nav_usuario').hide();
            $('#notificacion').hide();
            $('#nav_notificacion').hide();
        }
      }) 
    }

    async function verificar_producto(){
      funcion = "verificar_producto";
      let data = await fetch('../Controllers/ProductoTiendaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let producto =  JSON.parse(response);
          console.log(producto);
          if(producto.usuario_sesion != ''){
            read_notificaciones();
          }
          let template = '';
          if(producto.imagenes.length>0){
            template+=`
                <div class="col-12">
                  <img id="imagen_principal" src="../Util/Img/producto/${producto.imagenes[0].nombre}" class="img-fluid">
                </div>
                <div class="col-12 product-image-thumbs">`;
              producto.imagenes.forEach(imagen => {
                template += `
                  <button prod_img="${imagen.nombre}" class="imagen_pasarelas product-image-thumb">
                    <img src="../Util/Img/producto/${imagen.nombre}"
                  </button>
                `;
              });
              template += `
                  </div>`;
          } else {
            template += `
              <div class="col-12">
                <img id="imagen_principal" src="../Util/Img/producto/${producto.imagen}"
                class="product-image img-fluid">
              </div>
              `;
          }
          $('#imagenes').html(template);
          let template6 = '';
          if(producto.usuario_sesion != '') {
            if(producto.estado_favorito == ''){
              template6 = `<button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="far fa-heart fa-lg text-danger"></i></button>`;
 
            }
            else {
              if(producto.estado_favorito == 'I'){
                template6 = `${producto.producto} <button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="far fa-heart fa-lg text-danger"></i></button>`;
              }
              else {
                template6 = `${producto.producto} <button type="button" id_favorito="${producto.id_favorito}" estado_fav="${producto.estado_favorito}" class="btn bandera_favorito"><i class="fas fa-heart fa-lg text-danger"></i></button>`;
              }
            }
          } 
          else {
            template6 = `${producto.producto}`;
          }
          $('#producto').html(template6);
          $('#marca').text('Marca: ' + producto.marca);
          $('#sku').text('SKU: ' + producto.sku);
          let template1 = '';
          if(producto.calificacion != 0){
                  // template1 += `</br>`;
                  for(let index = 0; index < producto.calificacion; index++){
                    template1 += `<i class="fas fa-star text-warning"></i>`;
                  }
                  let estrellas_faltantes = 5 - producto.calificacion;
                  for(let index = 0; index < estrellas_faltantes; index++) {
                    template1 += `<i class="far fa-star text-warning"></i>`;
                  }
                  template1 += `</br>`;
                }
          if(producto.descuento != 0) {
            template1 += `
                  <span class="text-muted" style="text-decoration: line-through">S/ ${producto.precio}</span>
                  <span class="text-muted">-${producto.descuento}%</span></br>
            `;
          }
          template1 += `<h4 class="text-danger">S/ ${producto.precio_descuento}</h4>`
          $('#informacion_precios').html(template1);
          let template2 = '';
          if(producto.envio == 'gratis'){
                  template2 += `<i class="fas fa-truck-moving text-danger"></i>
                                <span class="ml-1">Envio: </span>
                                <span class="badge bg-success">Envio gratis</span>`;
          } else {
                  template2 += `<i class="fas fa-truck-moving text-danger"></i>
                                <span class="ml-1">Envio: </span>
                                <span class="mr-1">S/ 15.00</span>`;
          }
          template2 += `</br>`;
          template2 += `<i class="fas fa-store text-danger"></i>
                        <span class="ml-1">Recogelo en tienda: ${producto.direccion_tienda}</span>`;
          $('#informacion_envio').html(template2);
          $('#nombre_tienda').text(producto.tienda);
          $('#numero_resenas').text(producto.numero_resenas + ' resenas');
          $('#promedio_calificacion_tienda').text(producto.promedio_calificacion_tienda);
          $('#product-desc').text(producto.detalles);
          // console.log(producto.promedio_calificacion_tienda);
          let template3 = '';
          let cont = 0;
          producto.caracteristicas.forEach(caracteristica => {
            cont++;
            template3 += `  
                          <tr>
                            <td>${cont}</td>
                            <td>${caracteristica.titulo}</td>
                            <td>${caracteristica.descripcion}</td>
                          </tr>
            `;
          })
          $('#caracteristicas').html(template3);

          // producto.resenas.sort((a, b) => moment(b.fecha_creacion).diff(moment(a.fecha_creacion)));
          let template4 = '';
          producto.resenas.forEach(resena => {
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
            template4 += `
                    <div class="card-comment">
                      <img class="img-circle img-sm" src="../Util/Img/Users/${resena.avatar}" alt="User Image">
  
                      <div class="comment-text">
                        <span class="username">
                          ${resena.usuario}`;
                  for(let index = 0; index < resena.calificacion; index++){
                    template4 += `<i class="fas fa-star text-warning"></i>`;
                  }
                  let estrellas_faltantes = 5 - resena.calificacion;
                  for(let index = 0; index < estrellas_faltantes; index++) {
                    template4 += `<i class="far fa-star text-warning"></i>`;
                  }

                      template4 += `<span class="text-muted float-right">${tiempoTranscurrido}</span>
                        </span>
                        ${resena.descripcion}
                      </div>
                    </div>
            `;
          });
          $('#resenas').html(template4);
          let template5 = '';
          if(producto.bandera == '2'){
            template5 += `
              <div class="card-footer">
                  <form id="form_pregunta">
                    <div class="input-group">
                      <img class="direct-chat-img mr-1" src="../Util/Img/Users/${producto.avatar_sesion}" alt="Message User Image">
                      <input type="text" id="pregunta" placeholder="Escribir pregunta" class="form-control" required>
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </span>
                    </div>
                  </form>
              </div>
            `;
          }
          template5 +=`
              <div class="direct-chat-messages direct-chat-danger preguntas">
          `;
          producto.preguntas.forEach(pregunta => {
            console.log(pregunta);
            template5 += `
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">${pregunta.username}</span>
                    <span class="direct-chat-timestamp float-right">${pregunta.fecha_creacion}</span>
                  </div>
                  <img class="direct-chat-img" src="../Util/Img/Users/${pregunta.avatar}" alt="Message User Image">
                  <div class="direct-chat-text">
                    ${pregunta.contenido}
                  </div>`;
                  if(pregunta.estado_respuesta == '0'){
                    if(producto.bandera == '1'){
                      template5 += `
                      <div class="card-footer">
                        <form>
                          <div class="input-group">
                            <img class="direct-chat-img mr-1" src="../Util/Img/Users/${producto.avatar}" alt="Message User Image">
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
                    template5 += `
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">${producto.username}</span>
                      </div>
                      <img class="direct-chat-img" src="../Util/Img/Users/${producto.avatar}" alt="Message User Image">
                      <div class="direct-chat-text">
                        ${pregunta.respuesta.contenido}
                      </div>
                    </div>
                    `;
                  } 
                  template5+= `
                  </div>`;
          });
          template5+= `</div>`;
          $('#product-pre').html(template5);
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
              location.href = '../index.php';
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
      $('#imagen_principal').attr('src', '../Util/Img/producto/' + img)
    })

    // Realizar Pregunta
    async function realizar_pregunta(pregunta){
      funcion = "realizar_pregunta";
      let data = await fetch('../Controllers/PreguntaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&pregunta=' + pregunta
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          console.log(respuesta);
          verificar_producto();
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
      let data = await fetch('../Controllers/RespuestaController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&respuesta=' + respuesta + '&&id_pregunta=' + id_pregunta
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          console.log(respuesta);
          verificar_producto();
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

    // Favoritos
    $(document).on('click', '.bandera_favorito', (e) => {
      let elemento = $(this)[0].activeElement;
      let id_favorito = $(elemento).attr('id_favorito');
      let estado_favorito = $(elemento).attr('estado_fav');
      console.log(id_favorito);
    });  
})
</script>