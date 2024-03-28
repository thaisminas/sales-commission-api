<?php

namespace App\Repositories;

use App\DTOs\SalesDTO;
use App\Models\Sales;

class SalesRepository
{
    public function create(SalesDTO $data)
    {
        try{
            return Sales::create([
                'salesperson_id' => $data['salesperson'],
                'amount' => $data['amount'],
                'sale_date' => $data['sale_date']
            ]);
        } catch(\Exception $e){
            throw new \Exception("Erro ao registrar venda: " . $e->getMessage());
        }
    }

    public function getSales()
    {
        try{
            $sales = Sales::all();
            return $sales;
        } catch(\Exception $e){
            throw new \Exception("Erro ao obter dados dos vendedores: " . $e->getMessage());
        }
    }

    public function getSalesBySalllersId(int $params)
    {
        try{
            $sales = Sales::where('salesperson_id', $params)->get();
            return $sales;
        } catch(\Exception $e){
            throw new \Exception("Erro ao obter dados dos vendedores: " . $e->getMessage());
        }
    }
}
