@extends("layout")

@section("page-content")
    <div class="px-4 pt-4">
        <div>
            <h3>Users</h3>
        </div>
        <div class="my-4">
            @if(session()->has('success-status'))
                <div class="card bg-success">
                    <div class="card-body text-white">
                        {{session('success-status')}}
                    </div>
                </div>
            @endif
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                    class="nav-link "
                    id="view-tab"
                    href={{ route('users.index') }}
                                aria-controls="view-tab-pane"
                    aria-selected="true">
                    View
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link active"
                    id="new-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#new-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="new-tab-pane"
                    aria-selected="false">
                    New
                </button>
            </li>
        </ul>
        <div class="tab-content mt-2">
            <div class="tab-pane  active" id="new-tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <form class="mt-8" action="{{ route('users.store')}}" method="POST">
                            @csrf
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Firstname</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="fname"
                                           value="{{ old('fname')}}"
                                           class="form-control @error('fname') is-invalid @enderror">
                                    @error('fname')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="sname"
                                           value="{{ old('sname')}}"
                                           class="form-control @error('sname') is-invalid @enderror">
                                    @error('sname')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email')}}"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="password"
                                           name="password"
                                           value=""
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            @if(request()->user()->role === "admin")
                                <div class="row mb-3 ">
                                    <label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10 has-validation">
                                        <select name="role" class="form-select @error('role') is-invalid @enderror">
                                            <option value="">-- Select Role --</option>
                                            <option value="admin" {{old('role') == "admin" ? 'selected' : ''}}>
                                                Administrator
                                            </option>
                                            <option value="instadmin" {{old('role') == "instadmin" ? 'selected' : ''}}>
                                                Institution Admin
                                            </option>
                                            <option value="deptadmin" {{old('role') == "deptadmin" ? 'selected' : ''}}>
                                                Department Admin
                                            </option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <label class="col-sm-2 col-form-label">Institution</label>
                                    <div class="col-sm-10 has-validation">
                                        <select name="institution_id"
                                                class="form-select  @error('institution_id') is-invalid @enderror">
                                            <option value="">-- Select Institution --</option>
                                            @foreach($institutions as $institution)
                                                <option value="{{$institution->id}}">
                                                    {{$institution->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('institution_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="institution_id"
                                       value="{{request()->user()->institution_id}}">
                                <div class="row mb-3 ">
                                    <label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10 has-validation">
                                        <select name="role" class="form-select @error('role') is-invalid @enderror">
                                            <option value="">-- Select Role --</option>
                                            <option value="instadmin" {{old('role') == "instadmin" ? 'selected' : ''}}>
                                                Institution Admin
                                            </option>
                                            <option value="deptadmin" {{old('role') == "deptadmin" ? 'selected' : ''}}>
                                                Department Admin
                                            </option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <label class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10 has-validation">
                                        <select name="department_id"
                                                class="form-select  @error('department_id') is-invalid @enderror">
                                            <option value="">-- Select Department --</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label htmlFor="inputEmail3" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
