@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Alimento
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alimento</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos alimento</h4>
               
                <form method="POST" action="{{route('alimento.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input  name="nombre" type="text" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Peso</label>
                        <div class="col-sm-6">
                            <input  name="peso" type="number" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="unidad_peso" id="" >
                                <option selected disabled>Seleccione la unidad de peso</option>
                                <option value="1">gramos</option>
                                <option value="2">mililitros</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Valor calórico (kcal)</label>
                        <div class="col-sm-9">
                            <input name="valor_calorico" type="number" class="form-control" id="exampleInputEmail2"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Carbohidrato (g)</label>
                        <div class="col-sm-9">
                            <input name="carbohidrato" type="number" class="form-control" id="exampleInputEmail2"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Proteina (g)</label>
                        <div class="col-sm-9">
                            <input name="proteina" type="number" min="1" max="10000" class="form-control" id="exampleInputEmail2"
                               >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputMobile"
                            class="col-sm-3 col-form-label">Grasa (g)</label>
                        <div class="col-sm-9">
                            <input name="grasa" type="number" class="form-control" id="exampleInputMobile"
                                placeholder="">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Cantidad</label>
                        <div class="col-sm-9">
                            <input name="cantidad" type="number" class="form-control" id="exampleInputEmail2"
                               >
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">¿Agregar por porciones?</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="porcion" id="" >
                              <option selected disabled>Porciones</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                        </div>
                    </div> --}}

                 


                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <input name="foto" type="file" class="form-control" id="exampleInputEmail2"
                               >
                        </div>
                    </div>

                  <div style="display:flex; justify-content:center">
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    <button class="btn btn-light mx-2">Cancelar</button>
                  </div>
                    

                </form>


            

            </div>
        </div>
    </div>
  
</div>
@endsection
