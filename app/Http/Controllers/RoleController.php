<?php

namespace App\Http\Controllers;

use App\Entities\Role;
use App\Http\Resources\AbilityResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function all()
    {
        $roles = Role::paginate();

        return RoleResource::collection($roles);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:150|unique:roles',
            'title' => 'required|max:255',
        ]);

        $role = Role::firstOrCreate($request->only('name', 'title'));

        return new RoleResource($role);
    }

    public function get($role_id)
    {
        $role = Role::findOrFail($role_id);

        return new RoleResource($role);
    }

    public function update(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);

        $this->validate($request, [
            'name' => "required|max:150|unique:roles,id,{$role->id}",
            'title' => 'required|max:255',
        ]);

        $role->update($request->only('name', 'title'));

        return new RoleResource($role);
    }

    public function destroy($role_id)
    {
        $role = Role::findOrFail($role_id);

        $role->delete();

        return response()->json(null, 204);
    }

    public function abiities($role_id)
    {
        $role = Role::findOrFail($role_id);
        $abilities = $role->abilities()->paginate();

        return AbilityResource::collection($abilities);
    }
}
