<form action="{{ url('/categories') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("admin.categories.form")


    </div>
</form>