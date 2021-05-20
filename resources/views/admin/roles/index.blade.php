<section>

    <div wire:loading.class.remove="d-none" class="d-none">
        @include('partials.pageloader')
    </div>


    <div class="card">
        <div class="card-header">
            <b>All Roles</b>
            @can('role_can_create')
                <a href="{{ route('admin.roles.create') }}" class="btn btn-info btn-sm ml-3">Add New</a>
            @endcan
            <div class="float-right">
                <b>Total Roles: </b> {{ $roles->total() }}
            </div>
        </div>

        <div class="card-body">
            <div class="float-right">
                <div class="form-group-inline">
                    <input type="search" wire:model="search" placeholder="Search" class="form-control">
                </div>
            </div>
            <br>
            <table class="table table-borderless table-hover">
                <thead class="border-bottom">

                    <tr>
                        <th pointer wire:click="sort('id')" class="text-center" style="width:10%;">
                            ID
                            @if($this->filter_column == 'id')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th pointer wire:click="sort('name')" style="width:30%;">
                            Name
                            @if($this->filter_column == 'name')
                                <i class="la la-sort{{ $this->filter_order  == 'asc' ? '-up' : '-down'}}"></i>
                            @else
                                <i class="la la-sort"></i>
                            @endif
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th pointer wire:click="sort('created_at')">
                            Created At
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
                    @forelse ($roles as $role)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                @if($role->id == 1)
                                    -- All --
                                @else
                                    @forelse($role->permissions as $permission)
                                        <div class="badge badge-info">{{ Str::upper(str_replace('_',' ',$permission->name)) }}</div>
                                    @empty
                                    -- No Permissions --
                                    @endforelse
                                @endif
                            </td>
                            <td>{{ $role->created_at->format('F d, Y h:i A') }}</td>
                            @if($role->id != 1)
                                <td class="text-center">
                                    @can('role_can_update')
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-outline-info btn-circle btn-circle-sm m-1">
                                            <i class="lar la-edit"></i>
                                        </a>
                                    @endcan
                                    @can('role_can_delete')
                                        @if($role->id != 2)
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline-block"  onsubmit="return confirm('Are you sure?');">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-circle btn-circle-sm m-1">
                                                    <i class="las la-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endcan
                                </td>
                            @else
                                <td>
                                    &nbsp;
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center text-muted small">
                                No Roles Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <div class="float-right">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</section>
