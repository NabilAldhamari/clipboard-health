<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', '=', $request->get('username'))->first();
        
        if (null === $user OR false === Hash::check($request->get('password'), $user['password'])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($user['token']);
    }
  
    private function respondWithToken($token)
        {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 0
        ], 200);}
    }