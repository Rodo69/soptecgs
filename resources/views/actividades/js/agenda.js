      document.addEventListener('DOMContentLoaded', function() {

    //   Recolectamos los datos del formulario

        let formulario = document.querySelector("form");

        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:"es",

            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events:'/actividades/mostrar',

        dateClick:function(info){
            formulario.reset();

            // formulario.start.value=info.dateStr;
            // formulario.end.value=info.dateStr;
            
            $("#actividad").modal("show");
            
        },
        eventClick:function(info){

            var actividad=info.event;
            console.log(actividad);

            axios.post('actividades/editar/'+info.event.id).
            then(
                (respuesta)=>{

                    formulario.id.value=respuesta.data.id;
                    formulario.title.value=respuesta.data.title;
                    formulario.color.value=respuesta.data.color;
                    formulario.start.value=respuesta.data.start;
                    formulario.end.value=respuesta.data.end;

                    $("#actividades").modal("show");
                }
                ).catch(
                    (
                        error=>{
                            if(error.response){
                                console.log(error.response.data);
                            }
                        }
                    )
                )
        }

        });

        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click",function(){
            enviarDatos('localhost/soptecgs/actividades/agregar');
        });

        document.getElementById("btnEliminar").addEventListener("click",function(){
            enviarDatos('http://127.0.0.1:8000/actividades/borrar/'+formulario.id.value);
        });

        function enviarDatos(url){
            const datos = new FormData(formulario);

            axios.post('url', datos).
            then(
                (respuesta)=>{
                    calendar.refetchEvents();
                    $("#actividades").modal("hide");
                }
                 ).catch(
                    (error=>{if(error.response){console.log(error.response.data);}})
                )
        }
        
      });