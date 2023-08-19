<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function login(Request $request){
        
        
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($fields)){
           
            $user = Auth::user();
            
           

            $token = $user->createToken('admin-token', json_decode($user["right"]), expiresAt:now()->addHours(2))->plainTextToken;
            return response([   'succes' => true,
                                'name' => $user->name,
                                'accessToken' => $token,
                                'rights' => json_decode($user->right),
                                'role' => $user->role
                            
                            ]);
        }

        return response([   'succes' => false,
                            'error' => "error email or password"]);
    }

    public function logout(Request $request){
        $user = Auth::user();
        $user->tokens()->delete();
    }
    
}
