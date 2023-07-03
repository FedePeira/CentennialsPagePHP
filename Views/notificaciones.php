<?php
  include_once 'Layouts/general/header.php';
?>
    <title>Notificaciones | CodeWar</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notificaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">

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
  include_once 'Layouts/general/footer.php';
?>
<script>
$(document).ready(function(){
    verificar_sesion();
    $('#active_nav_notificaciones').addClass('active');

    async function read_notificaciones(id_usuario){
      funcion = "read_notificaciones";
      let data = await fetch('../Controllers/NotificacionController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_usuario=' + id_usuario 
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
          read_notificaciones(sesion.id);
          $('#notificacion').show();
          $('#nav_notificaciones').show();
        } else {
            $('#nav_usuario').hide();
            $('#notificacion').hide();
            $('#nav_notificaciones').hide();
            location.href = 'login.php';
        }
      }) 
    }
})
</script>