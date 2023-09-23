<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;

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
			return response()->json(['error' => ['email' => 'provided credentials are incorrect.']], 401);
		}
		return response()->json('', 200);
	}
}
