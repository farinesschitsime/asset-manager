@extends("layout")

@section("page-content")
    <div class="px-4 pt-4">
        <div>
            <h3>Assets</h3>
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
                        href={{ route('assets.index') }}
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
                        <form class="mt-8" action="{{ route('assets.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="department_id" value="{{$department_id}}">
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="code"
                                           value="{{ old('code')}}"
                                           class="form-control @error('code') is-invalid @enderror">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name')}}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="number"
                                           name="value"
                                           value="{{ old('value')}}"
                                           class="form-control @error('value') is-invalid @enderror">
                                    @error('value')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Acquisition Date</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="date"
                                           name="acquisition_date"
                                           value="{{ old('acquisition_date')}}"
                                           class="form-control @error('acquisition_date') is-invalid @enderror">
                                    @error('acquisition_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Useful Life</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="number"
                                           name="useful_life"
                                           value="{{ old('useful_life')}}"
                                           class="form-control @error('useful_life') is-invalid @enderror">
                                    @error('useful_life')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10 has-validation">
                                    <textarea
                                            name="description"
                                            class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10 has-validation">
                                    <select name="category_id"
                                            class="form-select  @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    {{old('category_id') == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Depreciation Method</label>
                                <div class="col-sm-10 has-validation">
                                    <select name="depreciation_method"
                                            class="form-select  @error('depreciation_method') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        <option value="straight line" {{old('depreciation_method') == "straight line" ? "selected" : ""}}>
                                            Straight Line
                                        </option>
                                        <option value="declining balance" {{old('depreciation_method') == "declining balance" ? "selected" : ""}}>
                                            Declining Balance
                                        </option>
                                    </select>
                                    @error('depreciation_method')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Depreciation Rate</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="number"
                                           name="depreciation_rate"
                                           value="{{ old('depreciation_rate') ?? 0}}"
                                           class="form-control @error('depreciation_rate') is-invalid @enderror">
                                    @error('depreciation_rate')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label"></label>
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
