@extends("layout")


@section("page-content")
    <div class="container my-2 py-4 py-4">
        <h2>User Information</h2>
        <a href="{{ url('users')}}">
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
                        <h4>{{$user->id}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Fistname</h6>
                        <h4>{{$user->fname}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Surname</h6>
                        <h4>{{$user->sname}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Email</h6>
                        <h4>{{$user->email}}</h4>
                    </div> <!-- info group -->
                    <div class="mb-4">
                        <h6>Role</h6>
                        <h4>{{$user->role}}</h4>
                    </div> <!-- info group -->

                </div>
            </div>
        </div>
    </div>
@stop
