<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }


    public static function boot(){

        parent::boot();

        static::deleting(function($modal){
            User::where('role_id', $modal->id)->update(['role_id' => null]);
            $modal->permissions()->sync([]);
        });

    }
}
