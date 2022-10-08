<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return response()->json(Role::all(), 200);
    }

    public function show($id)
    {
        $the_Role = Role::find($id);
        if (is_null($the_Role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_Role::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_Role = Role::create($request->all());
        return response($the_Role, 201);
    }

    public function update(Request $request, $id)
    {
        $the_Role = Role::find($id);
        if (is_null($the_Role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_Role->update($request->all());
            return response()->json($the_Role::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_Role = Role::find($id);
        if (is_null($the_Role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_Role->delete();
            return response()->json(null, 204);
        }
    }

    public function addPermissions($id, Request $request)
    {

        $the_Role = Role::find($id);
        if (is_null($the_Role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            
            $permission=Permission::find($request->input('id'));
            $the_Role->permissions()->save($permission);
            return response()->json($the_Role->permissions, 200);
        }
    }
}
