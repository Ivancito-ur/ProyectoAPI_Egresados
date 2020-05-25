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
                <form class="formularioTesis" enctype="multipart/form-data">
                    <label for="codigo">Codigo</label>
                    <div class="input-group mb-3">
                        <input name="" maxlength="7"  id="codigo" type="number" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <div class="input-group-append">
                            <button onclick="return explodeCodigo(event)" class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: #dd4b39; color: white;">Agregar</button>
                        </div>
                    </div>
                    <p style="color:red"class="verificarC"></p>
                    <div class="form-group">
                        <label for="titulo">Titulo Tesis</label>
                        <input name="titulo" type="text" class="form-control" id="titulo" required>
                    </div>
                    <table class="table" id="tblUsuario">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="agregar">
                    </tbody>
                     </table>
                    <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                        <div class="input-group-prepend">
                            <span  class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                        </div>
                        <input id="listCodigos" type="text" name="codigo" id="" style="display:none">
                        <div class="custom-file">
                            <input name="archivo" onchange="cargaTesis()" style="display:none"type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
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
            <div class="caja">
            
            
            </div>
               


                
                
                
            </div>
        </div>
    </div>
</div>