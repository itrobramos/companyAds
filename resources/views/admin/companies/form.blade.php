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
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="@if(isset($company->name)){{$company->name}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                    <textarea class="form-control" name="description" rows="5" placeholder="Descripción">@if(isset($company->description)){{$company->description}}@endif</textarea>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <select class="form-control" name="category">
                                        @foreach($Categories as $Category)
                                            @if(isset($company->Subcategory->Category->id) && $company->Subcategory->Category->id == $Category->id)
                                            <option val="{{$Category->id}}" selected>{{$Category->name}}</option>
                                            @else
                                            <option val="{{$Category->id}}">{{$Category->name}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>


                        <div class="form-row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-holder w-100">
                                    <select class="form-control" name="subcategory">
                                        @foreach($Subcategories as $Subcategory)
                                            @if(isset($company->subcategory->id) && $company->subcategory->id == $Subcategory->id)
                                            <option val="{{$Subcategory->id}}" selected>{{$Subcategory->name}}</option>
                                            @else
                                            <option val="{{$Subcategory->id}}">{{$Subcategory->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                            @if(isset($Branch->City->State->Country->id) && $Branch->City->State->countryId == $Country->id)
                                            <option val="{{$Country->id}}" selected>{{$Country->name}}</option>
                                            @endif
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
                                            @if(isset($Branch->City->State->id) && $Branch->City->stateid == $State->id)
                                            <option val="{{$State->id}}" selected>{{$State->name}}</option>
                                            @endif
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
                                            @if(isset($Branch->City->id) && $Branch->City->id == $City->id)
                                            <option val="{{$City->id}}" selected>{{$City->name}}</option>
                                            @endif
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
                                    <input type="text" class="form-control" name="address" placeholder="Dirección" value="@if(isset($Branch->address)){{$Branch->address}}@endif">
                                </div>
                            </div> 
                        </div>
                        <div class="form-row">                    
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="zipcode" placeholder="Código Postal" value="@if(isset($Branch->zipcode)){{$Branch->zipcode}}@endif">
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
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="@if(isset($company->email)){{$company->email}}@endif">
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
                                        <input type="text" class="form-control" name="website" placeholder="Sitio web" value="@if(isset($company->website)){{$company->website}}@endif">
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
                                        @php ($fb = 0)
                                        @if(isset($company->socialNetworks))
                                        @foreach($company->socialNetworks as $SN)                                        
                                            @if($SN['Type'] == "Facebook")
                                            <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{$SN['URL']}}">
                                            @php ($fb = 1)
                                            @endif
                                        @endforeach
                                        @endif
                                        @if($fb == 0)
                                            <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                        @endif
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
                                        @php ($yt = 0)
                                        @if(isset($company->socialNetworks))
                                        @foreach($company->socialNetworks as $SN)                                        
                                            @if($SN['Type'] == "Youtube")
                                            <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{$SN['URL']}}">
                                            @php ($yt = 1)
                                            @endif
                                        @endforeach
                                        @endif
                                        @if($yt == 0)
                                            <input type="text" class="form-control" name="youtube" placeholder="Youtube">
                                        @endif
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
                                        @php ($ins = 0)
                                        @if(isset($company->socialNetworks))
                                        @foreach($company->socialNetworks as $SN)                                        
                                            @if($SN['Type'] == "Instagram")
                                            <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{$SN['URL']}}">
                                            @php ($ins = 1)
                                            @endif
                                        @endforeach
                                        @endif
                                        @if($ins == 0)
                                            <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                                        @endif
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
                                        @php ($tw = 0)
                                        @if(isset($company->socialNetworks))
                                        @foreach($company->socialNetworks as $SN)                                        
                                            @if($SN['Type'] == "Twitter")
                                            <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{$SN['URL']}}">
                                            @php ($tw = 1)
                                            @endif
                                        @endforeach
                                        @endif
                                        @if($tw == 0)
                                            <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                                        @endif
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
                                        <input type="text" class="form-control" name="adminName" placeholder="Nombre" value="@if(isset($company->Admin->first_name)){{$company->Admin->first_name}}@endif">
                                    </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-holder w-100">
                                        <input type="text" class="form-control" name="adminLastName" placeholder="Apellido" value="@if(isset($company->Admin->last_name)){{$company->Admin->last_name}}@endif">
                                    </div>
                                </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-holder w-100">
                                        <input type="email" class="form-control" name="adminEmail" placeholder="Email" value="@if(isset($company->Admin->email)){{$company->Admin->email}}@endif">
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