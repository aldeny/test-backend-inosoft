<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\JWTAuth;
// use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTAuthException;


class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nama'  => 'required|string',
            // 'email'  => 'required|email|unique:users',
            // 'password' => 'required|min:3'
        ]);

        if ($validator -> fails()) {
            return response()->json([
                'error'     => 'Validasi error',
                'messages'  => $validator->errors(),
            ], 400);
        }

        $data = $request->only([
            'nama',
            'email',
            'password',
        ]);

        $user = $this->authService->register($data);

        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'gagal menambahkan'
            ], 400);
        }
        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $jwtAuth = app('Tymon\JWTAuth\JWTAuth');
            if (! $token = $jwtAuth->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(['token' => $token]);

        // if (!Auth::attempt($request->only('email','password'))) {
        //     return response()->json([
        //         'message' => 'Invalid credencials!'
        //     ], Response::HTTP_UNAUTHORIZED);
        // }

        // $user = Auth::user();

        // // $token = $user->createToken('token')->plainTextToken;

        // return response()->json([
        //     'message' => 'Login berhasil',
        //     'user' => $user
        // ], Response::HTTP_OK);
    }

    public function user()
    {
        return response()->json([
            'message' => User::all()
        ]);
    }
}
