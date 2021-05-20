@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <b>View User</b>
            <a href="{{ route('admin.users.index') }}" class="btn btn-info btn-sm ml-3">Back to List</a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-center">
                    <i class="las la-user-circle la-8x"></i>
                    <br><br>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary">
                        Edit
                    </a>
                    <a href="{{ route('admin.users.update.approval.status', $user->id) }}" class="btn btn-outline-orange ml-2">
                        @if($user->approved)
                            <i class="las la-ban"></i>
                        @else
                            <i class="las la-check"></i>
                        @endif
                    </a>
                    @if($user->id != auth()->id())
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline-block"  onsubmit="return confirm('Are you sure?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger ml-2">
                                <i class="las la-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>
                <div class="col-md-9 border-left">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 200px;">ID</th>
                            <td>{{ str_pad($user->id, 4, 0, STR_PAD_LEFT)}}</td>
                        </tr>
                        <tr>
                            <th style="width: 200px;">Full Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 200px;">Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 200px;">Approved</th>
                            <td>
                                @if($user->approved)
                                    <div class="fa fa-check text-success"></div>
                                @else
                                    <div class="fa fa-times text-danger"></div>
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <th style="width: 200px;">Date of Registration</th>
                            <td>{{ $user->created_at->format('F d, Y h:i:s A') }}</td>
                        </tr>
                        <tr>
                            <th style="width: 200px;">Role</th>
                            <td>
                                <div class="badge badge-success">
                                    {{$user->role->name}}
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

