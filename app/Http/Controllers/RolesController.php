<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Traits\RolesNPermissions;

class RolesController extends Controller
{
    use RolesNPermissions;
    private $ownCrudPermissions;
    private $foreignCrudPermissions;

    public function __construct()
    {
        // $this->middleware(['can:admin.roles']);
        $this->ownCrudPermissions = ['admin.reservation.create','admin.reservation.read','admin.reservation.update','admin.reservation.delete'];
        $this->foreignCrudPermissions = ['admin.reservation.read.other','admin.reservation.update.other','admin.reservation.delete.other'];
    }
    public function index(Request $request)
    {
        $roles = Role::all(['id', 'name']);
        $rolesCRUDPermissions = array_merge($this->ownCrudPermissions, $this->foreignCrudPermissions);
        $permissions = Permission::whereIn('name', $rolesCRUDPermissions)->orderBy('id')->get(['id', 'name']);
        return view('admin.sections.roles', compact('roles', 'permissions'));
    }

    public function setByAjax(){
        $input = json_decode(request('data'));

        $role = Role::findById($input->role);
        $permission = Permission::findById($input->permission);

        $this->PermissionHandler($permission, $role, $input->isChecked);

        return response()->json(json_encode($input));
    }
}
