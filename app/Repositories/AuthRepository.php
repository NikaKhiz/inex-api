<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
	public function register($request): void
	{
		User::create([...$request->validated(), 'password' => bcrypt($request->password)]);
	}

	public function login($request): bool
	{
		return auth()->attempt($request->validated());
	}
}
