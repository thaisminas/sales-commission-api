<?php

namespace App\Http\Controllers;

use App\Services\SalespersonRegistrationService;
use App\Services\SalespersonService;
use Illuminate\Http\Request;
use Exception;


class SalespersonController extends Controller
{

    private $salespersonService;

    public function __construct(SalespersonService $salespersonService)
    {
        $this->salespersonService = $salespersonService;
    }

    public function create(Request $request): string
    {
        try{
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:salesperson,email',
            ]);

            $this->salespersonService->create($data);

            return response()->json(['message' => 'Transaction created successfully'], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getSallers(Request $request): string
    {
        try{
            $sales = $this->salespersonService->getSallers();

            return response()->json($sales, 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
