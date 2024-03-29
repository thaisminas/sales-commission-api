<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $params)
    {
        $params['password'] = Hash::make($params['password']);

        $user = $this->userRepository->create($params);

        return $user;
    }
}
