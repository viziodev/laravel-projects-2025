<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'data' => $users,
            'message' => 'Utilisateurs récupérés avec succès'
        ],Response::HTTP_OK);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'message' => 'Utilisateur récupéré avec succès'
        ],Response::HTTP_OK);
    }

    public function store(Request $request)
    {

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make("1234")
        ];


        $user = User::create($data);
        
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'message' => 'Utilisateur créé avec succès'
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Utilisateur non trouvé'
            ], Response::HTTP_NOT_FOUND);
        }

        // Validation des données
       
        $data = $request->only(['first_name', 'last_name', 'email', 'phone_number']
                              +['password'=>Hash::make($request->input('password'))]);
        $user->update($data);
        return response()->json([
            'status' => 'success',
            'data' => $user->fresh(),
            'message' => 'Utilisateur mis à jour avec succès'
        ], Response::HTTP_ACCEPTED);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Utilisateur non trouvé'
            ],  Response::HTTP_NOT_FOUND);
        }
        $user->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Utilisateur supprimé avec succès'
        ], Response::HTTP_NO_CONTENT);
    }

}
