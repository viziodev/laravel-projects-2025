<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
       public function index()
      {
        
         $roles = Role::all();
         return response()->json($roles);
      }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json($role, 201);
    }
    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json($role);
        // Logic to retrieve and return roles  
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(null, 204);
    }
}
