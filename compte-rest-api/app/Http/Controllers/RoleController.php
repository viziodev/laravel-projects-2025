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
         return response()->json([
            "data"=>$roles,
            'message' => 'Liste des roles récupérée avec succès',
            'status' => 'success'
        ]);
      }

   
    public function show(Request $request,$id)
    {
        try {
              $role = Role::findOrFail($id);
              if($request->has('join') ) {
                  $join= $request->input('join') ;
                  $role->load($join);
              }
              return response()->json($role);
        } catch (\Exception $e) {
            return response()->json([
                 'message' => 'Role not found',
                 'status' => 'error'
                    
            ], 404);
        }   
      
    }
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json([
            "data"=>$role,
            'message' => 'Role enregistré avec succès',
            'status' => 'success'
        ], 201);
    }
    public function update(RoleRequest $request, $id)
    {
        try {
             $role = Role::findOrFail($id);
             $role->update($request->all());
             return response()->json([
              "data"=>$role,
             'message' => 'Role modifie avec succès',
             'status' => 'success'
        ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }
    public function destroy($id)
    {
      try {
              $role = Role::findOrFail($id);
              $role->delete();
              return response()->json([
              "data"=>null,
              'message' => 'Role supprimer  avec succès',
              'status' => 'success'
              ], 204);
           } catch (\Exception $e) {
              return response()->json([ 
                'message' => 'Role not found',
                'status' => 'error'], 404);
          }  
       
    }
}
