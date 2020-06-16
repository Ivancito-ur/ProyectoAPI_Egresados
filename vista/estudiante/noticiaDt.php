<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Noticias</h6>
                    <h5 class="h3 mb-0">Detalles de la Noticia</h5>
                    <a onclick="loadVn()" class="nav-link" href="#">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                    <h4 id="titulo" class="h3 mb-0"></h4>
                    <br>
                    <div>
                        <label style="color:blue; display:block" id="autor" for=""></label>
                        <label id="fecha" for=""></label>
                        <textarea id="cuerpo" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none; height: 500px;" readonly></textarea>
                    </div>    
            </div>
        </div>
    </div>
</div>