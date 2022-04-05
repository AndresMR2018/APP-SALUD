@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Datos antropométricos del paciente {{$paciente->nombre}}
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos antropométricos</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos antropométricos del paciente</h4>
               
                <form method="POST" action="{{route('paciente.guardarDatosAntropometricos')}}" class="forms-sample">
                    @csrf
                    
                    <input type="hidden" name="id_paciente" value="{{$paciente->id}}">

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="sexo" id="" >
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
                  
                    
                    
                  <div style="display:flex; justify-content:center">
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    {{-- <a  data-toggle="modal" data-target="#exampleModal-2" class="btn btn-info">Añadir datos antropométricos</a> --}}
                    <button class="btn btn-light mx-2">Cancelar</button>
                  </div>
                    

                </form>



            </div>
        </div>
    </div>



  
</div>
@endsection
