@extends("layout")


@section("page-content")
    <div class="container-fluid my-2 py-4 py-4">
        <h2>Asset Information</h2>
        <a href="{{ url('assets')}}">
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
                        <h4>{{$asset->id}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Code</h6>
                        <h4>{{$asset->code}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Name</h6>
                        <h4>{{$asset->name}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Description</h6>
                        <h4>{{$asset->description}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Category</h6>
                        <h4>{{$asset->description}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Value</h6>
                        <h4>{{$asset->value}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Useful Life</h6>
                        <h4>{{$asset->useful_life}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Depreciation Method</h6>
                        <h4>{{$asset->depreciation_method}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Depreciation Rate</h6>
                        <h4>{{$asset->depreciation_rate}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Book Value</h6>
                        <h4>{{$asset->bookValue()}}</h4>
                    </div> <!-- info group -->
                </div>
            </div>
        </div>
    </div>
@stop
