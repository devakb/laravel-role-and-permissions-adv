<section>

    <div wire:loading.class.remove="d-none" class="d-none">
        @include('partials.pageloader')
    </div>


    <div class="card">
        <div class="card-header">
            <b>All Users</b>
            @can('user_can_create')
                <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm ml-3">Add New</a>
            @endcan
            <div class="float-right">
                <b>Total Users: </b> {{ $users->total() }}
            </div>
        </div>

        <div class="card-body">
           <div class="d-flex align-items-center">
                <label class="m-0"><b>Record Per Page</b></label>
                <select class="form-control ml-3" style="width: 100px;" wire:model="usersCountPerPage">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <a href="{{ route('admin.users.export') }}" target="BLANK" class="btn btn-success btn-flat ml-3">
                    Export PDF
                </a>
           </div>

            <table class="table table-borderless table-hover">
                <thead class="border-bottom">
                    <tr>
                        <th style="width:150px;">
                            <input type="text" class="form-control text-center" placeholder="Search ID" wire:model="searchID">
                        </th>
                        <th>
                            <input type="text" class="form-control" placeholder="Search Name" wire:model="searchName">
                        </th>
                        <th>
                            <input type="text" class="form-control" placeholder="Search Email" wire:model="searchEmail">
                        </th>
                        <th>
                            <select class="form-control" wire:model="searchRole">
                                <option value="">-- All Roles --</option>
                                @foreach ($roles as $id => $role)
                                    <option value="{{$id}}">{{$role}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            @if($this->searchID != "" || $this->searchName != "" || $this->searchEmail != "" || $this->searchRole != "" )
                                <button class="btn btn-info" wire:click="clearSearch">Clear Search</button>
                            @endif
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <th pointer wire:click="sort('id')" class="text-center">
                            ID
                            @if($this->filter_column == 'id')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th pointer wire:click="sort('name')">
                            Name
                            @if($this->filter_column == 'name')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th pointer wire:click="sort('email')">
                            Email
                            @if($this->filter_column == 'email')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th>Role</th>
                        <th>Approved</th>
                        <th pointer wire:click="sort('created_at')">
                            Date of Registration
                            @if($this->filter_column == 'created_at')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th style="width:20%;">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{ str_pad($user->id, 4, 0, STR_PAD_LEFT)}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="badge badge-success">
                                    {{$user->role->name}}
                                </div>
                            </td>
                            <td class="text-center">
                                @if($user->approved)
                                    <div class="fa fa-check text-success"></div>
                                @else
                                    <div class="fa fa-times text-danger"></div>
                                @endif
                            </td>
                            <td>
                                {{$user->created_at->format('F d, Y h:i A')}}
                            </td>
                            <td class="text-center">
                                @can('user_can_approve')
                                <a href="{{ route('admin.users.update.approval.status', $user->id) }}" class="btn btn-outline-orange btn-circle btn-circle-sm m-1">
                                    @if($user->approved)
                                        <i class="las la-ban"></i>
                                    @else
                                        <i class="las la-check"></i>
                                    @endif
                                </a>
                                @endcan
                                @can('user_can_update')
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-info btn-circle btn-circle-sm m-1">
                                    <i class="lar la-edit"></i>
                                </a>
                                @endcan

                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-outline-success btn-circle btn-circle-sm m-1">
                                    <i class="lar la-eye"></i>
                                </a>
                                @can('user_can_delete')
                                    @if($user->id != auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline-block"  onsubmit="return confirm('Are you sure?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-circle btn-circle-sm m-1">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center text-muted small">
                                No Users Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <div class="float-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
