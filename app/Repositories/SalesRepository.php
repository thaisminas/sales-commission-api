<?php

namespace App\Repositories;

use App\DTOs\SalesDTO;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SalesRepository
{
    public function create($data)
    {
        try{
            return Sales::create([
                'salesperson_id' => $data['salesperson'],
                'amount' => $data['amount'],
                'commission_amount' => $data['commission_amount'],
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

    public function getSalesReportBySalesperson($salespersonId)
    {
        $date = Carbon::now()->toDateString();

        $result = DB::table('sales')
            ->select(
                'salesperson_id',
                DB::raw('SUM(amount) as totalVendas'),
                DB::raw('SUM(commission_amount) as totalComissoes'),
                DB::raw('COUNT(*) as quantidadeVendas')
            )
            ->where('salesperson_id', $salespersonId)
            ->whereDate('sale_date', $date)
            ->groupBy('salesperson_id')
            ->get();

        return $result;
    }
}
