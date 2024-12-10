<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos registrados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action=""   method="post">
            <div class="mb-3">
                    <label for="exampleInputText2" class="form-label">ID</label>
                    <input type="text"  readonly name="idEmpleado" id="idEmpleado" class="form-control" id="exampleInputText2" disabled>
                  </div>
                  <div class="mb-3">
                  <label for="exampleInputText1" class="form-label">fecha</label>
                  <input type="time" name="fechaCita" id="fechaCita" class="form-control" id="exampleInputText1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">hora</label>
                  <input type="time" name="correoEmpleado" id="correoEmpleado" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">precio</label>
                    <input type="number" name="precioCita" id="precioCita" class="form-control" id="exampleInputPassword1">
                  </div>
                
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">cliente</label>
                  <input type="text" name="idCliente" id="idCliente" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">empleado</label>
                  <input type="number" name="idEmpleado" id="idEmpleado" class="form-control" id="exampleInputPassword1">
                </div>
                  <button type="submit" class="btn btn-primary" name="modifica">Guardar</button>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>