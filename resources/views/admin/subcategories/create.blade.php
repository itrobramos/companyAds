<form action="{{ url('/subcategories') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("admin.subcategories.form")


    </div>
</form>