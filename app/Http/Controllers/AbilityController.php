<?php

namespace App\Http\Controllers;

use App\Entities\Ability;
use App\Http\Resources\AbilityResource;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    public function all()
    {
        $abilities = Ability::paginate();

        return AbilityResource::collection($abilities);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:150|unique:abilities',
            'title' => 'required|max:255',
        ]);

        $ability = Ability::firstOrCreate($request->only('name', 'title'));

        return new AbilityResource($ability);
    }

    public function get($ability_id)
    {
        $ability = Ability::findOrFail($ability_id);

        return new AbilityResource($ability);
    }

    public function update(Request $request, $ability_id)
    {
        $ability = Ability::findOrFail($ability_id);

        $this->validate($request, [
            'name'  => "required|max:150|unique:abilities,id,{$ability->id}",
            'title' => 'required|max:255'
        ]);

        $ability->update($request->only('name', 'title'));

        return new AbilityResource($ability);
    }

    public function destroy($ability_id)
    {
        $ability = Ability::findOrFail($ability_id);

        $ability->delete();

        return response()->json(null, 204);
    }
}
