      document.addEventListener('DOMContentLoaded', function() {

    //   Recolectamos los datos del formulario

        let formulario = document.getElementById("form");

        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:"es",

            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events:'http://127.0.0.1:8000/actividades/mostrar',

        dateClick:function(info){
           // formulario.reset();

            // formulario.start.value=info.dateStr;
            // formulario.end.value=info.dateStr;
            
            $("#actividad").modal("show");
            
        },
        eventClick:function(info){

            var actividades=info.event;
            console.log(actividades);

            axios.get("http://127.0.0.1:8000/actividades/"+info.event.id).
            then(
                (respuesta)=>{

                    //formulario.id.value=respuesta.data.id;
                     formulario.title.valueOf=respuesta.data.title;
                     formulario.color.value=respuesta.data.color;
                     formulario.start.value=respuesta.data.start;
                     formulario.end.value=respuesta.data.end;

                    $("#actividad").modal("show");
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
            enviarDatos('http://127.0.0.1:8000/actividades/agregar');
        });

        document.getElementById("btnEliminar").addEventListener("click",function(){
            enviarDatos('http://127.0.0.1:8000/actividades/borrar/'+formulario.id.value);
        });

        function enviarDatos(url){
            const datos = new FormData(formulario);

            axios.post("actividades", datos).
            then(
                (respuesta)=>{
                    calendar.refetchEvents();
                    $("#actividad").modal("hide");
                }
                 ).catch(
                    (error=>{if(error.response){console.log(error.response.data);}})
                )
        }
        
      });