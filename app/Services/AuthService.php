<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;

class AuthService implements AuthServiceInterface{

  private $authRepository;

  public function __construct(AuthRepositoryInterface $authRepository)
  {
    $this->authRepository = $authRepository;
  }

  public function register(array $data)
  {
    return $this->authRepository->register($data);
  }

}