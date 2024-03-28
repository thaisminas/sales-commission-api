<?php

namespace App\Repositories;

use App\Models\Salesperson;

class SalespersonRepository
{
    public function create(array $data)
    {
        try{
            return Salesperson::create([
                'name' => $data['name'],
                'email' => $data['email']
            ]);
        } catch(\Exception $e){
            throw new \Exception("Erro ao criar vendedor: " . $e->getMessage());
        }
    }

    public function getSellers()
    {
        try{
            $salespeople = Salesperson::all();
            return $salespeople;
        } catch(\Exception $e){
            throw new \Exception("Erro ao obter dados dos vendedores: " . $e->getMessage());
        }
    }
}
