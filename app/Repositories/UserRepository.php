<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create($data)
    {
        try{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } catch(\Exception $e){
            throw new \Exception("Erro ao cadastrar usuario: " . $e->getMessage());
        }
    }

}
