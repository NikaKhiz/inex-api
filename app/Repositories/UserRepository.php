<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
	public function show($request)
	{
		return $request->user();
	}
}
