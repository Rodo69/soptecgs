document.addEventListener('DOMContentLoaded', function () {

    //   Recolectamos los datos del formulario

    let formulario = document.getElementById("form");

    var calendarEl = document.getElementById('agenda');
    var Idtarea = "";

    var calendar = new FullCalendar.Calendar(calendarEl, {

        validRange: {
            start: new Date() // La fecha actual
        },

        initialView: 'dayGridMonth',
        locale: "es",
        displayEventTime:false,

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

            const { id } = info.event;
            Idtarea = id;
            console.log("este es nuestro id", id)
           

            axios.post("/actividades/editar/"+id).
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
        },
    });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function () {
        enviarDatos("/actividades/agregar");
    });

    document.getElementById("btnEliminar").addEventListener("click", function () {
        enviarDatos("/actividades/borrar/"+Idtarea);
    });

    // document.getElementById("btnEditar").addEventListener("click", function () {
    //     console.log(Idtarea);
    //     enviarDatos("/actividades/update/"+Idtarea);
    // });

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