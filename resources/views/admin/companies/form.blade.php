@extends('layouts.app')

@section('content')

<!-- MATERIAL DESIGN ICONIC FONT -->
<link rel="stylesheet" href="{{env('DEPLOY_URL')}}/assets/css/material-design-iconic-font.css">

<!-- DATE-PICKER -->
<link rel="stylesheet" href="{{env('DEPLOY_URL')}}/assets/css/datepicker.min.css">

<!-- STYLE CSS -->
<link rel="stylesheet" href="{{env('DEPLOY_URL')}}/css/stylewizard.css">


<div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="card shadow">
            <div class="card  shadow">
                <div class="card-body" id="wizard">


                    <!-- SECTION BASICA -->
                    <h4></h4>
                    <section>
                        <h3>Básica</h3>
                        
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if(isset($company->logoUrl))<br>
                                    <br>
                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img src="{{asset($company->logoUrl)}}" id="imgimageUrl" class="">
                                        </label>
                                    </div>
                                    <br>
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
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                    <textarea class="form-control" name="description" rows="5" placeholder="Descripción"></textarea
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION UBICACION -->
                    <h4></h4>
                    <section>
                        <h3>Ubicación</h3>
                        <br>
                        
                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <select class="form-control" name="country">
                                        @foreach($Countries as $Country)
                                            <option val="{{$Country->id}}">{{$Country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <select class="form-control" name="state">
                                        @foreach($States as $State)
                                            <option val="{{$State->id}}">{{$State->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <select class="form-control" name="city">
                                        @foreach($Cities as $City)
                                            <option val="{{$City->id}}">{{$City->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>


                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <input type="text" class="form-control" name="address" placeholder="Dirección">
                                </div>
                            </div> 
                        </div>
                        <div class="form-row">                    
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="zipcode" placeholder="Código Postal">
                                </div>
                            </div>
                        </div>
                        
                    </section>

                    <!-- SECTION CONTACTO -->
                    <h4></h4>
                    <section>
                        <h3 style="margin-bottom: 16px;">Teléfonos</h3>
                        <div class="phones">

                            <div class="form-row phonenumber">
                                <div class="col-md-3"></div>
                                <div class="col-md-2">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="phone[description][1]" placeholder="Nombre">
                                    </div>                                
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="phone[number][1]" placeholder="Teléfono">
                                    </div>                                
                                </div> 
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-md" onclick="addPhone();">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="phone_childs"></div>
                            <hr>

                            <br>
                            <h3 style="margin-bottom: 16px;">GENERAL</h3>

                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    Email                            
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>                                
                                </div> 
                            </div>


                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    Sitio Web                             
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="website" placeholder="Sitio web">
                                    </div>                                
                                </div> 
                            </div>
                            <hr>
                            <br>                        
                            <h3 style="margin-bottom: 16px;">Redes Sociales</h3>
                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    <a href="#" class="fa fa-facebook faicon"></a>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                    </div>                                
                                </div> 
                            </div>

                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    <a href="#" class="fa fa-youtube faicon"></a>                          
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube">
                                    </div>                                
                                </div> 
                            </div>

                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    <a href="#" class="fa fa-instagram faicon"></a>                     
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                                    </div>                                
                                </div> 
                            </div>

                            <div class="form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    <a href="#" class="fa fa-twitter faicon"></a>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                                    </div>                                
                                </div> 
                            </div>

                        </div>

                    </section>

                    <!-- SECTION ADMINITRADOR -->
                    <h4></h4>
                    <section>
                        <h3>Administrador</h3>
                        
                        <br>
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="adminName" placeholder="Nombre">
                                    </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="adminLastName" placeholder="Apellido">
                                    </div>
                                </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                        <input type="email" class="form-control" name="adminEmail" placeholder="Email">
                                </div>
                            </div> 
                        </div>

                        <br>

                    </section>



                </div>
            </div>
        </div>
    </div>
</div>


<!-- JQUERY STEP -->
<script src="{{env('DEPLOY_URL')}}/assets/js/jquery.steps.js"></script>
<script src="{{env('DEPLOY_URL')}}/assets/js/main.js"></script>


<script>

    function addPhone(){

        // var html = $(".horariocaptura").html();
        var div_childs = $('#phone_childs');
        var timestamp = Date.now();
        var html = getHorarioTemplate(timestamp);
        div_childs.append(html);
    }

    function getHorarioTemplate(i){
        var html = `<div  id="${i}" class="form-row phonenumber">
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                                    <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="phone[description][${i}]" placeholder="Nombre">
                                    </div>                                
                                </div> 
                        <div class="col-md-3">
                            <div class="form-holder w-100">
                                <input type="text" class="form-control" name="phone[number][${i}]" placeholder="Teléfono">
                            </div>                                
                        </div> 
                        <div class="col-md-1">
                            <div data-repeater-delete="" onclick="deletetemplate(${i})"
                                    class="btn-md btn btn-danger m-btn m-btn--icon m-btn--pill">
                                <span>
                                    <i class="fa fa-trash"></i>
                                </span>
                            </div>
                        </div>
                    </div>`;
        return html;
    }

    function deletetemplate(i){
        $("#" + i).remove();
    }

</script>


@endsection