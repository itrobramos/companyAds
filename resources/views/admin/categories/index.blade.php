@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Categorías</h3>
                <br>
                <div class="col-1 text-right">
                    <a href="{{ url('categories/create')}}" class="btn btn-sm btn-primary">Agregar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Icono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="Image" style="width:40px; height:40px;" src="{{$category->imageUrl}}">
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{$category->name}}</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                <i class="{{$category->icon}}"></i>
                            </td>
                            

                          
                            <td class="text-left">
                                <form method='post' action="{{ url('/categories/' . $category->id) }}">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <a href="./subcategories/{{$category->id}}"><button
                                            class="btn btn-icon btn-2 btn-success btn-sm" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                        </button></a>

                                    <a href="./categories/{{$category->id}}/edit"><button
                                            class="btn btn-icon btn-2 btn-primary btn-sm" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </button></a>
                                    <!-- <input type="submit" onclick="return confirm('Are you sure?');" value="Delete" class='btn btn-sm btn-danger'>    -->
                                    <button class="btn btn-icon btn-2 btn-danger btn-sm" type="submit"
                                        onclick="return confirm('¿Está seguro?');">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

@endsection