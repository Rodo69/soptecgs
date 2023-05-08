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

        dateClick:function(info){
            $("#evento").modal("show");

        }

        });

        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click",function(){

            const datos = new FormData(formulario);
            console.log(datos);
            // console.log(formulario.title.value);

            axios.post('http://127.0.0.1:8000/actividades',datos).
            then(
                (respuesta)=>{
                    $("#evento").modal("hide");
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
        });
      });