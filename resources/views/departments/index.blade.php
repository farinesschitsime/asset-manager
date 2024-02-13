@extends("layout")


@section('page-content')
    <div class="px-4 pt-4">
        <div>
            <h3>Departments</h3>
        </div>
        <div class="my-4">
            @if(session()->has('success-status'))
                <div class="card bg-success text-white">
                    <div class="card-body">
                        {{session('success-status')}}
                    </div>
                </div>
            @endif
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link active"
                    id="view-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#view-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="view-tab-pane"
                    aria-selected="false">
                    View
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <a
                    class="nav-link "
                    id="view-tab"
                    href="{{ route('departments.create')}}"
                    role="tab"
                    aria-controls="view-tab-pane"
                    aria-selected="true">
                    New
                </a>
            </li>

        </ul>
        <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="view-tab-pane" role="tabpanel">
                <table class="table my-4">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th scope="row">{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td class="d-flex">
                                <a href="{{ route('departments.show',$department->id)}}"
                                   class="btn btn-success">
                                    View
                                </a>

                                <a href="{{ route('departments.edit',$department->id)}}"
                                   class="btn btn-primary">
                                    Edit
                                </a>

                                <!-- trigger delete modal button -->
                                <button type="button" class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal-{{$department->id}}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-{{$department->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm
                                                    Deletion</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Delete {{$department->name}}</h2>
                                                <p class="mt-2">
                                                    Are you sure you want to delete this department?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('departments.destroy',$department->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Yes, Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

