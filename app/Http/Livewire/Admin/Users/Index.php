<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $roles;
    public $usersCountPerPage;

    public $searchID, $searchName, $searchEmail, $searchRole;

    public $filter_column = "created_at", $filter_order = "desc";

    public function mount(){
        $this->roles = Role::pluck('name', 'id');
        abort_if(Gate::denies('user_can_read'), 403);
    }

    public function render()
    {

        $users = User::query();

        $users->when($this->searchID != "", function($q){
            return $q->where('id', 'like', '%'.$this->searchID.'%');
        });

        $users->when($this->searchName != "", function($q){
            return $q->where('name', 'like', '%'.$this->searchName.'%');
        });

        $users->when($this->searchEmail != "", function($q){
            return $q->where('email', 'like', '%'.$this->searchEmail.'%');
        });

        $users->when($this->searchRole != "", function($q){
            return $q->where('role_id', $this->searchRole);
        });

        $paginationCounter = 10;

        if($this->usersCountPerPage > 0 && $this->usersCountPerPage <= 100){
            $paginationCounter = $this->usersCountPerPage;
        }


        $users = $users->orderby($this->filter_column, $this->filter_order)->paginate($paginationCounter);

        $this->gotoPage(1);

        return view('admin.users.index')
        ->with(['users' => $users, 'roles' => $this->roles])
        ->extends('layouts.app')
        ->section('content');
    }

    public function sort($field){
        if($this->filter_column == $field){
            $this->filter_order = $this->filter_order  == 'asc' ? 'desc' : 'asc';
        }else{
            if(in_array($field, ['id','name','email','created_at'])){
                $this->filter_column = $field;
                $this->filter_order = "desc";
            }
        }
    }

    public function clearSearch(){
        $this->reset(['searchID','searchName','searchEmail', 'searchRole']);
    }
}
