<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /*
    * Below are permission constants we will use in the application
    * You can add more permission constants here in the future
    */

    // Users permissions
    const CREATE_USERS = 'create users';
    const UPDATE_USERS = 'update users';
    const DELETE_USERS = 'delete users';
    const VIEW_USERS = 'view users';

    // Roles Permissions
    const CREATE_ROLES = 'create roles';
    const UPDATE_ROLES = 'update roles';
    const DELETE_ROLES = 'delete roles';
    const VIEW_ROLES = 'view roles';

    // Permissions Permissions
    const CREATE_PERMISSIONS = 'create permissions';
    const UPDATE_PERMISSIONS = 'update permissions';
    const DELETE_PERMISSIONS = 'delete permissions';
    const VIEW_PERMISSIONS = 'view permissions';

    // Schools Permissions
    const CREATE_SCHOOLS = 'create schools';
    const UPDATE_SCHOOLS = 'update schools';
    const DELETE_SCHOOLS = 'delete schools';
    const VIEW_SCHOOLS = 'view schools';

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
}
