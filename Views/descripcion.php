<?php
// Obtenemos el id y el name de index.php
if(!empty($_GET['id'])&& $_GET['name']){
    session_start();
    $_SESSION['product-verification']=$_GET['id'];
    echo $_SESSION['product-verification'];
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
                    <div class="btn btn-default btn-flat">
                        <i class="fas fa-heart fa-lg mr-2 text-danger"></i>
                        Agregar a favoritos
                    </div>
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
          $('#producto').text(producto.producto);
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
            `;
            template5 +=`
              <div class="direct-chat-messages direct-chat-danger preguntas">`;
              producto.preguntas.forEach(pregunta => {
                  console.log(pregunta);
              });
            template5 +=`</div>`;

            $('#product-pre').html(template5);
          }
        } catch(error) {
          console.error(error);
          console.log(response);
          if(response == 'error'){
            // location.href = '../index.php';
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

    $(document).on('click', '.imagen_pasarelas', (e) => {
      let elemento = $(this)[0].activeElement;
      let img = $(elemento).attr('prod_img');
      $('#imagen_principal').attr('src', '../Util/Img/producto/' + img)
    })
})
</script>