<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	private AuthRepositoryInterface $authRepository;

	public function __construct(AuthRepositoryInterface $authRepository)
	{
		$this->authRepository = $authRepository;
	}

	public function register(RegisterRequest $request): JsonResponse
	{
		$this->authRepository->register($request);
		return response()->json('', 204);
	}

	public function login(LoginRequest $request): JsonResponse
	{
		if (!$this->authRepository->login($request)) {
			return response()->json(['errors' => ['email' => 'provided credentials are incorrect.']], 401);
		}
		$user = User::find(Auth::user()->id);
		$token = $user->createToken('access_token')->accessToken;
		return response()->json(['access_token' => $token,  'user' => auth()->user()], 201);
	}

	public function logout(Request $request): JsonResponse
	{
		$this->authRepository->logout($request);
		return response()->json('', 204);
	}
}
