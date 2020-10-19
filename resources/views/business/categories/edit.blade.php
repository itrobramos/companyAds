<form action="{{ url('/categories/' . $category->id) }}" method="Post" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class='col-md-12'>
        @include("admin.categories.form")


    </div>


</form>