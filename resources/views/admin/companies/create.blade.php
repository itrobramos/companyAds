<form action="{{ url('/companies') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("admin.companies.form")


    </div>
</form>