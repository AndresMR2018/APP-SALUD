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
                    <th>Especialidad</th>
                    <th>Correo</th>
                    
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($nutricionistas as $key => $nutricionista)
                <tr>
                    <td>{{$key+1}}</td>
              
                    <td>{{$nutricionista->nombre}}</td>
                    <td>{{$nutricionista->apellido}}</td>
                    <td>{{$nutricionista->especialidad}}</td>
                 
                 
                    <td>{{$nutricionista->user->email}}</td>
                    
                    <td>
                      <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{$nutricionista->id}}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                        <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-2{{$nutricionista->id}}"><i class="fa fa-edit"></i></a>
                   
                        <form method="post" id="deletecategoria" action="{{url('/nutricionista/'.$nutricionista->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <button onclick="if(!confirm('Está seguro que desea eliminar el nutricionista?'))return false;" type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>


                <div class="modal fade" style="min-width:600px !important;" id="exampleModal-2{{$nutricionista->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" style="min-width:600px !important;" role="document">
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
                          <br>
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
                                    <input  name="correo" type="text" value="{{$nutricionista->user->email}}" class="form-control" id="exampleInputUsername2"
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




 <div class="modal fade" id="exampleModal-3{{$nutricionista->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalLabel">Datos nutricionista</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="display:flex; flex-wrap:wrap; align-content:flex-start">
                          
                            <div>
                              @if(isset($nutricionista->imagen->url)  )
                              <img class="img-thumbnail" style="max-width:200px;" src="{{$nutricionista->imagen->url}}">
  @else
  <img class="img-thumbnail" style="max-width:200px; margin-top:80px;" src="{{asset('img/mujer.png')}}">
        @endif                    
</div>
                           
                            <div style="margin-left:20px;" >
                              
                                <div class="form-group">
                                  <label for="recipient-name" ><strong>Nombre:</strong> {{$nutricionista->nombre}}</label>
                                 
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name"><strong>Apellido:</strong> {{$nutricionista->apellido}}</label>
                               
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name"><strong>Cedula:</strong> {{$nutricionista->cedula}}</label>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name"><strong>Teléfono:</strong> {{$nutricionista->telefono}}</label>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name"><strong>Correo:</strong> {{$nutricionista->user->email}}</label>
                                  
                                </div>

                                <div class="form-group">
                                  <label for="recipient-name"><strong>Especialidad:</strong>{{$nutricionista->especialidad}}</label>
                                  
                                </div>
                         
                          </div>
                          
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-success">Send message</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div> --}}
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