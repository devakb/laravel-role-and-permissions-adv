<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter_column = "created_at", $filter_order = "desc";

    public $search;

    public function mount(){
        abort_if(Gate::denies('role_can_read'), 403);
    }

    public function render()
    {

        $roles = Role::query();

        $roles->when($this->search != "", function($q){
            return $q->orWhere('name', 'ilike', "%".$this->search."%");
        });

        $roles = $roles->orderby($this->filter_column, $this->filter_order)->paginate(5);

        $this->gotoPage(1);

        return view('admin.roles.index')
        ->with(['roles' => $roles])
        ->extends('layouts.app')
        ->section('content');
    }

    public function sort($field){
        if($this->filter_column == $field){
            $this->filter_order = $this->filter_order  == 'asc' ? 'desc' : 'asc';
        }else{
            if(in_array($field, ['id','name'])){
                $this->filter_column = $field;
                $this->filter_order = "desc";
            }
        }
    }
}
