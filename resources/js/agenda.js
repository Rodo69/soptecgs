document.addEventListener('DOMContentLoaded', function () {

    //   Recolectamos los datos del formulario

    let formulario = document.getElementById("form");

    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '/actividades/mostrar',

        dateClick:function(info){
           formulario.reset();

            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;
            
            $("#actividad").modal("show");

        },
        eventClick:function (info) {

            var actividades = info.event;
            console.log(actividades);

            axios.post("/actividades/editar/"+info.event.id).
            then(
                (respuesta)=>{

                     formulario.title.value=respuesta.data.title;
                     formulario.color.value=respuesta.data.color;
                     formulario.start.value=respuesta.data.start;
                     formulario.end.value=respuesta.data.end;

                        $("#actividad").modal("show");
                    }
                ).catch(
                    (
                        error => {
                            if (error.response) {
                                console.log(error.response.data);
                            }
                        }
                    )
                )
        }

    });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function () {
        enviarDatos("/actividades/agregar");
    });

    document.getElementById("btnEliminar").addEventListener("click", function () {
        enviarDatos("/actividades/borrar/"+formulario.id.value);
    });

    document.getElementById("btnEditar").addEventListener("click", function () {
        enviarDatos("/actividades/actualizar/"+formulario.id.value);
    });

    function enviarDatos(url) {
        const datos = new FormData(formulario);

        const nuevaURL=baseURL+url;

        axios.post(nuevaURL, datos).
            then(
                (respuesta) => {
                    calendar.refetchEvents();
                    $("#actividad").modal("hide");
                }
            ).catch(
                (error =>{if(error.response){console.log(error.response.data);}})
            )
    }
});