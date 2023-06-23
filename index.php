<?php
  include_once 'Views/Layouts/header.php';
?>
    <title>Home | CodeWar</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <style>
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
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Productos</h3>
        </div>
        <div class="card-body">
          <div id="productos" class="row">
            <div class="col-sm-2">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="Util/Img/Users/user_default.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-12">
                      <span class="text-muted float-left">Marca</span></br>
                      <a class="titulo_producto" href="#">Titulo del productos</a></br>
                      <span class="badge bg-success">Envio gratis</span></br>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="far fa-star text-warning"></i>
                      <i class="far fa-star text-warning"></i>
                      </br>
                      <span class="text-muted" style="text-decoration: line-through">S/ 1000</span>
                      <span class="text-muted">-10%</span></br>
                      <h4 class="text-danger">S/ 900</h4>
                    </div>
                  </div>
                </div>
              </div>
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
  include_once 'Views/Layouts/footer.php';
?>

<script>
$(document).ready(function() {
    var funcion;
    verificar_sesion();
    llenar_productos();

    function verificar_sesion() {
      funcion = 'verificar_sesion';
      $.post('./Controllers/UsuarioController.php', { funcion }, (response) => {
        console.log(response);
        if(response != ''){
          // location.href = '../index.php';
          let sesion = JSON.parse(response);
          $('#nav_login').hide();
          $('#nav_register').hide();
          $('#usuario_nav').text(sesion.user + ' #' + sesion.id);
          $('#avatar_nav').attr('src', 'Util/Img/Users/' + sesion.avatar);
          $('#avatar_menu').attr('src', 'Util/Img/Users/' + sesion.avatar);
          $('usuario_menu').text(sesion.user);
            
        } else {
            $('#nav_usuario').hide();
        }
      }) 
    }

    async function llenar_productos(){
      funcion = "llenar_productos";
      let data = await fetch('Controllers/ProductoTiendaController.php', {
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
                          <img src="Util/Img/Producto/${producto.imagen}" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12">
                          <span class="text-muted float-left">${producto.marca}</span></br>
                          <!-- Descripcion.php -> se le pasa el id y name del producto -->
                          <a class="titulo_producto" href="Views/descripcion.php?name=${producto.producto}&&id=${producto.id}">${producto.producto}
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
}) 
</script>