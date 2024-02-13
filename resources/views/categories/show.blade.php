@extends("layout")


@section("page-content")
    <div class="container my-2 py-4 py-4">
        <h2>Category Information</h2>
        <a href="{{ url('categories')}}">
            &larr; Back
        </a>
        <div class="my-2 py-4 py-4">
            <hr>
        </div>
        <div class="my-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-4">
                        <h6>ID</h6>
                        <h4>{{$category->id}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Code</h6>
                        <h4>{{$category->code}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Name</h6>
                        <h4>{{$category->name}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Description</h6>
                        <h4>{{$category->description}}</h4>
                    </div> <!-- info group -->
                </div>
            </div>
        </div>
    </div>
@stop
