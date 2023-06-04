<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository implements AuthRepositoryInterface {

  /* function create insert kedalam database */
  public function register(array $data)
  {
    return User::create($data);
  }

}