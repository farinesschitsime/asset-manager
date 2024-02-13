@extends("layout")


@section("page-content")
<div class="container my-2 py-4 py-4">
<h2>Institution Information</h2>
<a href="{{ url('institutions')}}">
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
               <h4>{{$institution->id}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Name</h6> 
               <h4>{{$institution->name}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Email</h6> 
               <h4>{{$institution->email}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Phone</h6> 
               <h4>{{$institution->phone}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Location</h6> 
               <h4>{{$institution->location}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Address</h6> 
               <h4>{{$institution->address}}</h4>
            </div> <!-- info group -->
            <div class="mb-4">
               <h6>Description</h6> 
               <h4>{{$institution->description}}</h4>
            </div> <!-- info group -->
        </div>
    </div>
</div>
</div>
@stop