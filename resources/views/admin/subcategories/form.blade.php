@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-10">
        <div class="card shadow">
            <div class="card  shadow">
                <div class="card-body">
                  
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Nombre</label>
                                    <input type="text" id="input-name" name="name" class="form-control form-control-alternative" require value="{{ isset($subcategory->name)?$subcategory->name:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <label class="form-control-label" for="input-name">Sub Categoría</label>
                                <select name="categoryId" id="categoryId" class="form-control">
                                    @foreach($categories as $category)
                                    @if(!isset($subcategory) || $subcategory->categoryId == $category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Icono</label>
                                    <input type="text" id="input-icon" name="icon" class="form-control form-control-alternative" require value="{{ isset($subcategory->icon)?$subcategory->icon:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                @if(isset($subcategory->imageUrl))<br>
                                    <br>

                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img src="{{asset($subcategory->imageUrl)}}" id="imgimageUrl" class="">
                                        </label>
                                    </div><br>

                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'
                                        style="display:none">
                                    @else
                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img id="imageUrl" class="rounded-circle">
                                        </label>
                                    </div><br>
                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ url('categories')}}" class='btn btn-primary btn-md'>Cancelar</a>
                        <input type="submit" id="btnSave" class='btn btn-success btn-md' value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection