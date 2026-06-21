<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function overview(Request $request) {
        $nContracts = DB::table('contractType')
            ->where('idS', Auth::user()->id)->count();

        $stipulatedContracts = DB::table('contract')
            ->join('contractType', 'contract.idT', '=', 'contractType.id')
            ->where('contractType.idS', Auth::user()->id)->count();

        $activeContracts = DB::table('contractType')
            ->where('isActive', true)
            ->where('idS', Auth::user()->id)
            ->count();

        $nUsers = DB::table('contract')
        ->where('contractType.idS', Auth::user()->id)
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->join('users', 'contract.idU', '=', 'users.id')
        ->distinct('users.id')->count();

        $nPrivate = DB::table('contract')
        ->where('contractType.idS', Auth::user()->id)
        ->where('contractType.type', 'home')
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->join('users', 'contract.idU', '=', 'users.id')
        ->distinct('users.id')->count();

        $nActive = DB::table('contract')
        ->where('contractType.idS', Auth::user()->id)
        ->where('rinovate', true)
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->count();

        $date = date_format(Carbon::now()->subMonth(), 'F');

        $income = DB::table('contract')
        ->where('contractType.idS', Auth::user()->id)
        ->where('invoices.month', Carbon::now()->subMonth()->month)
        ->where('invoices.year', Carbon::now()->subMonth()->year)
        ->join('contractType', 'contract.idT', '=', 'contractType.id')
        ->join('users', 'contract.idU', '=', 'users.id')
        ->join('invoices', 'invoices.idC', '=', 'contract.id')
        ->selectRaw('SUM(amount) as total, SUM(totGas) as totGas')
        ->get();

        $totIncome = 100000;
        $totGas = 60000;

        $data = [
            'nContracts' => $nContracts,
            'activeContracts' => $activeContracts,
            'nUsers' => $nUsers,
            'stipulatedContracts' => $stipulatedContracts,
            'nPrivate' => $nPrivate,
            'nActive' => $nActive,
            'totIncome' => $income[0]->total,
            'totGas' => $income[0]->totGas,
            'date' => $date."'s Report"
        ];

        return view('suppliers/overview', $data);
    }

    public function manageContracts(Request $request) {
        $contracts = DB::table('contractType')
            ->where('idS', Auth::user()->id)
            ->where('deleted', false)
            ->select('id', 'type', 'energyType', 'KWh', 'PriceE', 'PriceG', 'isActive')
            ->orderBy('id', 'asc')
            ->get();

        return view('suppliers/manage', ['contracts' => $contracts]);
    }

    public function createContract(Request $request) {
        $contracts = DB::table('contractType')
            ->where('idS', Auth::user()->id)
            ->select('id', 'type', 'energyType', 'KWh', 'PriceE', 'PriceG')
            ->orderBy('id', 'asc')
            ->get();

        return view('suppliers/create', ['contracts' => $contracts]);
    }

    public function storeContract(Request $request) {
        $PriceG = null;
        $PriceE = null;
        $KWh = null;
        $isActive = 0;

        if ($request->input('energyType') == "E") {
            $validatedData = $request->validate([
                'PriceE' => 'decimal:0,2',
                'KWh' => 'decimal:0,2',
            ]);

            $PriceE = $request->input('PriceE');
            $KWh = $request->input('KWh');
        } elseif ($request->input('energyType') == "G") {
            $validatedData = $request->validate([
                'PriceG' => 'decimal:0,2',
            ]);

            $PriceG = $request->input('PriceG');
        } else {
            $validatedData = $request->validate([
                'PriceE' => 'decimal:0,2',
                'PriceG' => 'decimal:0,2',
                'KWh' => 'decimal:0,2',
            ]);

            $PriceG = $request->input('PriceG');
            $PriceE = $request->input('PriceE');
            $KWh = $request->input('KWh');
        }

        if ($request->input('isActive') != null) $isActive = 1;

        DB::table('contractType')->insert([
            'type' => $request->input('type'),
            'idS' => Auth::user()->id,
            'energyType' => $request->input('energyType'),
            'PriceE' => $PriceE,
            'KWh' => $KWh,
            'PriceG' => $PriceG,
            'minimumDuration' => $request->input('minimumDuration'),
            'isActive' => $isActive,
        ]);

        return $this->manageContracts($request);
    }

    public function editContract(Request $request, $id) {
        if (DB::table('contractType')->where('id', $id)->value('idS') != Auth::user()->id) return redirect()->route('supplier.manage');

        $contract = DB::table('contractType')
            ->where('idS', Auth::user()->id)
            ->select('id', 'type', 'energyType', 'KWh', 'PriceE', 'PriceG', 'minimumDuration', 'isActive')
            ->where('id', $id)
            ->first();

        return view('suppliers/edit', ['contract' => $contract]);
    }

    public function updateContract(Request $request, $id) {
        if (DB::table('contractType')->where('id', $id)->value('idS') != Auth::user()->id) return redirect()->route('supplier.manage');

        $PriceG = null;
        $PriceE = null;
        $KWh = null;
        $isActive = 0;

        if ($request->input('energyType') == "E") {
            $validatedData = $request->validate([
                'PriceE' => 'decimal:0,2',
                'KWh' => 'decimal:0,2',
            ]);

            $PriceE = $request->input('PriceE');
            $KWh = $request->input('KWh');
        } elseif ($request->input('energyType') == "G") {
            $validatedData = $request->validate([
                'PriceG' => 'decimal:0,2',
            ]);

            $PriceG = $request->input('PriceG');
        } else {
            $validatedData = $request->validate([
                'PriceE' => 'decimal:0,2',
                'PriceG' => 'decimal:0,2',
                'KWh' => 'decimal:0,2',
            ]);

            $PriceG = $request->input('PriceG');
            $PriceE = $request->input('PriceE');
            $KWh = $request->input('KWh');
        }

        if ($request->input('isActive') != null) $isActive = 1;

        DB::table('contractType')->where('id', $id)->update([
            'type' => $request->input('type'),
            'energyType' => $request->input('energyType'),
            'PriceE' => $PriceE,
            'KWh' => $KWh,
            'PriceG' => $PriceG,
            'minimumDuration' => $request->input('minimumDuration'),
            'isActive' => $isActive,
        ]);

        return $this->manageContracts($request);
    }

    public function deleteContract(Request $request, $id) {
        if (DB::table('contractType')->where('id', $id)->value('idS') != Auth::user()->id) return redirect()->route('supplier.manage');

        DB::table('contractType')->where('id', $id)
        ->update([
            'deleted' => true,
        ]);

        return $this->manageContracts($request);
    }

    public function managePayments(Request $request){
        $payments = DB::table('invoices')
            ->join('contract', 'contract.id', '=', 'invoices.idC')
            ->join('users', 'users.id', '=', 'contract.idU')
            ->join('contractType', 'contract.idT', '=', 'contractType.id')
            ->where('contractType.idS', Auth::user()->id)
            ->select('invoices.id', 'users.ragSoc', 'invoices.month', 'invoices.year', 'invoices.amount', 'contractType.energyType')
            ->get();

        return view('suppliers/payment', ['payments' => $payments]);
    }
}
