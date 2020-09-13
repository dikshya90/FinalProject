<?php

namespace App\Providers;

use App\Model\Admin\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        if(!app()->runningInConsole()){
            $roles = Role::with('permissions')->get();

            // dd($roles);

            foreach($roles as $role){
                foreach($role->permissions as $permission){
                    $permissionArray[$permission->permission][] = $role->id;
                }
            }

            foreach($permissionArray as $permission => $roles){
                Gate::define($permission, function($user) use ($roles){
                    foreach($roles as $role){

                        // dd($user->role);

                        if($user->role->id == $role){
                            return true;
                        }
                    }
                });
            }
        }
    }
}
