<?php
  include_once 'Layouts/general/header.php';
?>
    <title>Favoritos | CodeWar</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Favoritos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Favoritos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <table id="fav" class="table table-hover">
            <thead>
              <tr>
                <th>Favoritos</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
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
    $('#active_nav_favoritos').addClass('active');
    toastr.options = {
      'debug': false,
      'positionClass': 'toast-bottom-full-width',
      'onclick': null,
      'fadeIn': 300,
      'fadeOut': 1000,
      'timeOut': 5000,
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
        // console.log(response);
        try {
          let notificaciones =  JSON.parse(response);
          // console.log(notificaciones);
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

    async function read_favoritos(){
      funcion = "read_favoritos";
      let data = await fetch('../Controllers/FavoritoController.php', {
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
          let template2 = '';
          if(favoritos.length == 0){
            template1 += ` 
                 <i class="far fa-heart"></i>
            `; 
            template2 += ` 
                Favoritos
            `; 
          } else {
            template1 += ` 
                 <i class="far fa-heart"></i>
                 <span class="badge badge-warning navbar-badge">${favoritos.length}</span>
            `; 
            template2 += ` 
              Favoritos <span class="badge badge-warning right">${favoritos.length}</span>
            `; 
          }
          $('#numero_favorito').html(template1);
          $('#nav_cont_fav').html(template2);
          let template = '';
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
          `;
          $('#favoritos').html(template);
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
          read_all_favoritos();
          $('#notificacion').show();
          $('#nav_notificaciones').show();
          read_favoritos();
          $('#favorito').show();
          $('#nav_favoritos').show();
        } else {
            $('#nav_usuario').hide();
            $('#notificacion').hide();
            $('#nav_notificaciones').hide();
            $('#favorito').hide();
            $('#nav_favoritos').hide();
            location.href = 'login.php';
        }
      }) 
    }

    async function read_all_favoritos(){
      funcion = "read_all_favoritos";
      let data = await fetch('../Controllers/FavoritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion
      });
      if(data.ok){
        let response = await data.text();
        //console.log(response);
        try {
          let favoritos =  JSON.parse(response);
          // console.log(favoritos);
          let template = '';
          let favorites = [];
          // let ejemplo = [{ celda: 'Hola primera celda' }, { celda: 'Adios' }];
          // ejemplo.push({ celda:'hola adios' });
          favoritos.forEach(favorito => {
            template = '';
            template += `
              <div class="row">
                <div class="col-sm-1 text-center">
                  <button type="button" class="btn eliminar_fav" attrid="${favorito.id}">
                    <i class="far fa-trash-alt text-danger"></i>
                  </button>
                </div>
                <div class="col-sm-11">
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
                </div>
              </div>
            `;
            favorites.push({celda: template});
          });
          // console.log(notification);
          $('#fav').DataTable({
            data: favorites,
            "aaShorting": [],
            "searching": true,
            "scrollX": true,
            "autoWidth": false,
            columns: [
              { data: 'celda' }
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

    async function eliminar_favorito(id_favorito){
      funcion = "eliminar_favorito";
      let data = await fetch('../Controllers/FavoritoController.php', {
        method:'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'funcion=' + funcion + '&&id_favorito=' + id_favorito
      });
      if(data.ok){
        let response = await data.text();
        // console.log(response);
        try {
          let respuesta =  JSON.parse(response);
          // console.log(respuesta.mensaje);
          if(respuesta.mensaje == "favorito eliminado") {
            toastr.success('El item se elimino de tus favoritos');
          }
          else if(respuesta.mensaje == "error al eliminar") {
            toastr.success('No intente vulnerar el sistema');
          } 

          read_all_favoritos();
          read_favoritos();

        } catch(error) {
          console.error(error);
          console.log(response);
          toastr.success('Comuniquese con el area de sistemas');
        }
        
      } else {
        Swal.fire({
          icon: 'error',
          title: data.statusText,
          text: 'Hubo conflicto de codigo: ' + data.status,
        });
      }
    }
    $(document).on('click', '.eliminar_fav', (e)=> {
      let elemento = $(this)[0].activeElement;
      let id = $(elemento).attr('attrid');
      eliminar_favorito(id);
      // console.log(id);
    })
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