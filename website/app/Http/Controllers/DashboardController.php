<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function index(Request $request)
    {
        $contracts = DB::table('contract')
            ->join('building', 'contract.idB', '=', 'building.id')
            ->join('contractType', 'contract.idT', '=', 'contractType.id')
            ->where('contract.idU', Auth::user()->id)
            ->select('contract.id', 'contractType.energyType', 'building.street', 'building.civicNumber', 'contractType.idS')
            ->orderBy('contract.rinovate', 'desc')
            ->orderBy('contract.id', 'asc')
            ->get();

        //carbon footprint rudimentale
        $totalKWEnergyConsumption = DB::table('consumption')
            ->join('building', 'consumption.idB', '=', 'building.id')
            ->where('building.idU', Auth::user()->id)
            ->sum('KW');

        $totalMCEnergyConsumption = DB::table('consumption')
            ->join('building', 'consumption.idB', '=', 'building.id')
            ->where('building.idU', Auth::user()->id)
            ->sum('mc');

        $emissionFactorKW = 0.7;
        $emissionFactorMC = 0.2;

        $totalCO2EmissionsKW = $totalKWEnergyConsumption * $emissionFactorKW;
        $totalCO2EmissionsMC = $totalMCEnergyConsumption * $emissionFactorMC;

        $totalCO2Emissions = $totalCO2EmissionsKW + $totalCO2EmissionsMC;

        return view('users/dashboard', ['contracts' => $contracts, 'totEmissions' => $totalCO2Emissions, 'totEmissionsKW' => $totalCO2EmissionsKW, 'totEmissionsMC' => $totalCO2EmissionsMC,]);
    }
}
