@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <b>Create Role</b>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-info btn-sm ml-3">Back to List</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                    <div class="col-md-6 mt-5">
                        <div style="column-count: 3;">
                            @foreach($permissions as $permission)
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> &nbsp; <b>{{ Str::upper(str_replace('_',' ',$permission->name)) }}</b><br>
                            @endforeach
                        </div>
                        @error('permissions.*')
                            <br>
                            <span class="d-block small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
