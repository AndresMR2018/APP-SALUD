@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Nutricionistas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nutricionistas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Datos nutricionistas</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>N #</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($nutricionistas as $nutricionista)
                <tr>
                    <td>{{$nutricionista->id}}</td>
                    <td>{{$nutricionista->nombre}}</td>
                    <td>{{$nutricionista->apellido}}</td>
                    <td>{{$nutricionista->cedula}}</td>
                    <td>{{$nutricionista->telefono}}</td>
                    <td>{{$nutricionista->correo}}</td>
                    <td>
                        <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-2{{$nutricionista->id}}">Editar</a>
                   
                        <form method="post" id="deletecategoria" action="{{url('/nutricionista/'.$nutricionista->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <button onclick="if(!confirm('Está seguro que desea eliminar el nutricionista?'))return false;" type="submit" class="btn btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>


                <div class="modal fade" id="exampleModal-2{{$nutricionista->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Editar nutricionista</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

<form method="POST" action="{{route('nutricionista.update',$nutricionista->id)}}">
@csrf
{{ method_field('PATCH') }}
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input  name="nombre" type="text" value="{{$nutricionista->nombre}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Apellido</label>
                                <div class="col-sm-9">
                                    <input  name="apellido" type="text" value="{{$nutricionista->apellido}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Cédula</label>
                                <div class="col-sm-9">
                                    <input  name="cedula" type="text" value="{{$nutricionista->cedula}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Teléfono</label>
                                <div class="col-sm-9">
                                    <input  name="telefono" type="text" value="{{$nutricionista->telefono}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Correo electrónico</label>
                                <div class="col-sm-9">
                                    <input  name="correo" type="text" value="{{$nutricionista->correo}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Contraseña</label>
                                <div class="col-sm-9">
                                    <input  name="password" type="text" placeholder="Nueva contraseña" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>

                        

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>


              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-6 grid-margin stretch-card">
    
     
        <!-- Dummy Modal Ends -->
        <!-- Modal starts -->
      
        
        <!-- Modal Ends -->
      
  </div>

  @endsection