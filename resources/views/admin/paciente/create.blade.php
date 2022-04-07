@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Paciente
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Paciente</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos paciente</h4>
               
                <form method="POST" action="{{route('paciente.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input  name="nombre" type="text" class="form-control" id="exampleInputUsername2"
                                placeholder="nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Apellido</label>
                        <div class="col-sm-9">
                            <input name="apellido" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Cédula</label>
                        <div class="col-sm-9">
                            <input name="cedula" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Edad</label>
                        <div class="col-sm-9">
                            <input name="edad" type="number" min="1" max="60" class="form-control" id="exampleInputEmail2"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputMobile"
                            class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input name="telefono" type="text" class="form-control" id="exampleInputMobile"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" id="exampleInputEmail2"
                                placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Tipo diabetes</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="tipo_diabetes" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1">Tipo 1</option>
                              <option value="2">Tipo 2</option>
                              <option value="3">Gestacional</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword2"
                            class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-9">
                            <input name="password" type="password" class="form-control"
                                id="exampleInputPassword2" placeholder="contraseña">
                        </div>
                    </div>

                   
                    
                  <div style="display:flex; justify-content:center">
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    {{-- <a  data-toggle="modal" data-target="#exampleModal-2" class="btn btn-info">Añadir datos antropométricos</a> --}}
                    <button class="btn btn-light mx-2">Cancelar</button>
                  </div>
                    

                </form>


                <div class="modal fade" id="exampleModal-2" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-2">Añadir datos antropométricos</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" >
                                    @csrf
                                   
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2"
                                            class="col-sm-3 col-form-label">Sexo</label>
                                        <div class="col-sm-9">
                                          <select class="form-control" name="tipo_diabetes" id="" >
                                              <option selected disabled>Seleccione una opción</option>
                                              <option value="1">Femenino</option>
                                              <option value="2">Masculino</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleInputUsername2"
                                            class="col-sm-3 col-form-label">Peso</label>
                                        <div class="col-sm-9">
                                            <input name="peso" type="text"
                                                 class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2"
                                            class="col-sm-3 col-form-label">Altura</label>
                                        <div class="col-sm-9">
                                            <input name="altura" type="text"
                                                
                                                class="form-control" id="exampleInputUsername2">
                                        </div>
                                    </div>
                                  


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                                <button type="button" class="btn btn-light"
                                    data-dismiss="modal">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  
</div>
@endsection
