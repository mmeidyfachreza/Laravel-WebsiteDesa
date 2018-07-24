<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
* @param string|array $roles
*/
    public function authorizeRoles($roles) 
    {
        // untuk request yang bisa dilewati lebih dari 1 hak akses
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
            Flash::warning('Access Denied', 'You are not authorized to view that content.');
        }
        // untuk request yang hanya dilewati 1 hak akses
        return $this->hasRole($roles) || 
        abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        if ($this->roles()->whereIn('nama', $roles)->first()) {
            # code...
            return true;
        }
        return false;
    }

    
}
