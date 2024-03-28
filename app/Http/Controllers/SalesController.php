<?php

namespace App\Http\Controllers;

use App\DTOs\SalesDTO;
use App\Services\SalesService;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    private $salesService;

    public function __construct(SalesService $salesService)
    {
        $this->salesService = $salesService;
    }

    public function create(Request $request): string
    {
        try{
            $data = $request->validate([
                'salesperson' => 'required|integer',
                'amount' => 'required|numeric',
                'sale_date' => 'required|string',
            ]);

            $salesDTO = new SalesDTO(
                $data['salesperson'],
                $data['amount'],
                $data['sale_date']
            );

            $this->salesService->create($salesDTO);

            return response()->json(['message' => 'Sale registration with successfully'], 201);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAllSales(Request $request): string
    {
        try{
            $sales = $this->salesService->getAllSales();

            return response()->json($sales, 202);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getSalesBySalllersId(Request $request): string
    {
        try{
            dd($request->all());
            
            $sales = $this->salesService->getSalesBySalllersId($request->get('id'));

            return response()->json($sales, 202);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
