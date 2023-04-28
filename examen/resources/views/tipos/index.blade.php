@extends('layouts.app')

@section('content')

    <head>
        <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tipos') }}</div>
                    <div class="card-body">
                        @if (session('correcto'))
                        <div class="alert alert-success">{{session('correcto')}}</div>
                        @endif

                        @if (session('incorrecto'))
                        <div class="alert alert-danger">{{session('incorrecto')}}</div>
                        @endif
                         
                        <!-- Modal de registro de datos -->
                         <div class="modal fade" id="modalRegistrar" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Registro de
                                          producto</h5>
                                     <button type="button" class="close" data-dismiss="modal"
                                         aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">

                                     <form action="{{route("tipos.create")}}">
                                        @csrf
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">id</label>
                                             <input type="text" class="form-control"
                                                 id="exampleInputEmail1"
                                                 aria-describedby="emailHelp" name=txtid>
                                             
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">nombre</label>
                                             <input type="text" class="form-control"
                                                 id="exampleInputEmail1"
                                                 aria-describedby="emailHelp" name=txtnombre>
                                         </div>

                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                             <button type="submit" class="btn btn-primary">Registrar</button>
                                         </div>
                                     </form>
                                 </div>

                             </div>
                         </div>
                     </div>

                        <div class="table-responsive">


                            <button class="btn btn-success"  data-toggle="modal" data-target="#modalRegistrar">Añadir Producto</button>


                            <table class="table table-striped table-bordered table-hover">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">nombre</th>
                                        <th scope="col">acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Tipo::all() as $item)
                                        <tr class="">
                                            <td scope="row">{{ $item->id }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#modalEditar{{ $item->id }}"
                                                    class="btn btn-warning btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{route("tipos.destroy",$item->id)}}" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>



                                            <!-- Modal de modificar datos -->
                                            <div class="modal fade" id="modalEditar{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modificar datos
                                                                del producto</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form >
                                                                @csrf 
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">id</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name=txtid value="{{$item->id}}" readonly>
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">nombre</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name=txtnombre value="{{$item->nombre}}">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
