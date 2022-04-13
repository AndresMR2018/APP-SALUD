@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Perfil de administración
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Perfil de administración</h4>
               
                <form method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input  name="nombre" type="text" value="{{$administrador->user->email}}" class="form-control" id="exampleInputUsername2"
                                disabled>
                        </div>
                    </div>
                    <div>
                       
                      </div>
                      <a href="{{route('admin.editarCuenta')}}" class="btn btn-primary mr-2">Editar datos</a>
                    {{-- <button type="submit" class="btn btn-primary mr-2">Editar datos</button> --}}
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
