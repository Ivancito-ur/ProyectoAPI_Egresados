const URLD="http://localhost/faseBeta/";

$(document).ready(function(){      
      $(".formularioCompleto").submit(function (e) {
            e.preventDefault();
            var parametros=new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: URLD + "directorControl/cargarExcel" ,
                data: parametros,
                contentType: false, 
                processData: false,
                success: function (data) {
                   console.log(data);
                   
                },
                error: function (r) {
                    alert("Error del servidor");
                }
            });
        });
});
