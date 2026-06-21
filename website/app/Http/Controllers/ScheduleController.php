<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function randomConsumption() {
        $buildings = DB::table('building')
        ->join('contract', 'contract.idB', '=', 'building.id')
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->select('building.id', 'contractType.type')
        ->distinct()
        ->get();

        foreach ($buildings as $building) {
            $KW = 0;
            $mc = 0;

            if ($building->type == 'home') {
                $KW = rand(20, 50);
                $mc = rand(100, 200);
            } else {
                $KW = rand(300, 500);
                $mc = rand(1000, 1500);
            }

            DB::table('consumption')->insert([
                'idB' => $building->id,
                'date' => Carbon::now(),
                'KW' => $KW,
                'mc'=> $mc
            ]);
        }
    }

    public function generateInvoices() {
        $buildings = DB::table('building')
        ->join('contract', 'contract.idB', '=', 'building.id')
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->select('contract.id', 'contractType.energyType', 'contractType.priceE', 'contractType.priceG')
        ->get();

        foreach ($buildings as $building) {
            $consumption = DB::table('consumption')
                ->selectRaw('SUM(KW) as KW, SUM(mc) as mc')
                ->where('date', '>', Carbon::now()->subDays(30))
                ->where('idB', $building->id)
                ->get();

            $gas = null;
            $ele = null;
            $transport = rand(15, 30);
            $meter = rand(5, 15);

            if ($building->energyType == "G") {
                $gas = $consumption->mc * $building->priceG;
                $IVA = ($gas + $ele + $transport + $meter) / 4;
            }

            if ($building->energyType == "E") {
                $ele = $consumption->KW * $building->priceE;
            }

            if ($building->energyType == "EG") {
                $gas = $consumption->mc * $building->priceG;
                $ele = $consumption->KW * $building->priceE;
            }

            $IVA = ($gas + $ele + $transport + $meter) / 9;
            $amount = $gas + $ele + $transport + $meter + $IVA;
        }


        DB::table('invoices')->insert([
            'month' => Carbon::now()->format('M'),
            'year' => Carbon::now()->format('Y'),
            'amount' => $amount,
            'date'=> Carbon::now(),
            'idC' => $building->id,
            'paid' => false,
            'totGas' => $gas,
            'totEle' => $ele,
            'IVA' => $IVA,
            'transport' => $transport,
            'meter' => $meter,
        ]);
    }
}
