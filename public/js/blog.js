function verBlogs(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#blogs").empty();
    $.ajax({
        url: "blogsApi",
        type: "POST",
        success: function(result){
            var resultado = JSON.parse(result);
            resultado.forEach(blog => {
                $registro = `            <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-image">
                                <img alt="${blog.alt}" style="width: 100%;" class="" src=" ${blog.imagen} ">
                            </div>

                            <div class="card-content">
                                <span class="card-title"> ${blog.nombre}</span>
                                ${blog.contenido}
                            </div>

                            <div id="blog${blog.id}" class="card-action"> </div>
                        </div> </div>`
                $("#blogs").append($registro);
                $.ajax({
                    url: "etiquetaApi",
                    type: "POST",
                    data: 'id='+ blog.id,
                    success: function(resultadoT){
                        resultadoT.forEach(etiqueta => {
                            $tags = `<a href="#"> ${etiqueta.nombre}</a>`
                            document.getElementById('blog'+blog.id).innerHTML += $tags;
                        })
                    }
                })
            });            
        }
    }); 
}

function obtenerEtiquetas(idBlog){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "etiquetaApi",
        type: "POST",
        data: 'id='+ idBlog,
        success: function(resultado){
            return resultado;
        }
    })
}