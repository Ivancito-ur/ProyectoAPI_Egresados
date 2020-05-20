<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Tesis</h6>
                    <h5 class="h3 mb-0">Subida de tesis de grado</h5>
                </div>
            </div>
        </div>
        

        <div class="card-body">


            <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                <br>
                <h4 style="padding-left: 10px;">Seleccionar Archivo</h4>
                <form>
                    <label for="codigo">Codigo</label>
                    <div class="input-group mb-3">
                        <input onkeyup="explodeCodigo()" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: #dd4b39; color: white;">Agregar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo Tesis</label>
                        <input type="text" class="form-control" id="titulo" required>
                    </div>
                    <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td><a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"
                                style="background-color: #dd4b39; border-color: #dd4b39;">Remover</a></td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Thornton</td>
                        <td><a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"
                                style="background-color: #dd4b39; border-color: #dd4b39;">Remover</a></td>
                    </tr>
                    <tr>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>the Bird</td>
                        <td><a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"
                                style="background-color: #dd4b39; border-color: #dd4b39;">Remover</a></td>
                    </tr>
                </tbody>
            </table>
                </form>
                <form>
                    <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                        <div class="input-group-prepend">
                            <span  class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                        </div>
                        <div class="custom-file">
                            <input onchange="cargaTesis()" style="display:none"type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01"><p class="nameArchivoTesis">...</p></label>
                        </div>
                    </div>
                    <button onclick=" return guardarTesis(event)" type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Cargar</button>
                    <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alertTesis"class="alert alert-danger" role="alert">
                        <p class="respuestaTesis" id="respuestaTesis" ></p></div>
                        <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alertTesis2" class="alert alert-success" role="alert">
                        <p class="respuestaTesis2"></p>
                        </div>
                </form>
            </div>
            <br>
            <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                <div style="margin-bottom:10px"class="card-group">
                    <div class="card">
                        <div class="form-group">
                            <div class="embed-responsive embed-responsive-16by9" id="pdf">
                                <iframe class="embed-responsive-item" src="./img/elementary os.pdf" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titulo Tesis</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="form-group">
                            <div class="embed-responsive embed-responsive-16by9" id="pdf">
                                <iframe class="embed-responsive-item" src="./img/elementary os.pdf" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titulo Tesis</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="form-group">
                            <div class="embed-responsive embed-responsive-16by9" id="pdf">
                                <iframe class="embed-responsive-item" src="./img/elementary os.pdf" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titulo Tesis</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>