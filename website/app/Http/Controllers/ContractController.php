<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\LaravelPdf\Facades\Pdf;
class ContractController extends Controller
{
    public function index($id)
    {
        if (DB::table('contract')->where('id', $id)->value('idU') != Auth::user()->id) return redirect()->route('dashboard');

        $contract = DB::table('contract')
            ->join('building', 'contract.idB', '=', 'building.id')
            ->join('contractType', 'contract.idT', '=', 'contractType.id')
            ->join('suppliers', 'suppliers.id', '=', 'contractType.idS')
            ->where('contract.id', $id)
            ->select('contract.id', 'contractType.energyType', 'building.street', 'building.civicNumber', 'suppliers.ragSoc', 'contract.paymentType', 'contract.date', 'contractType.KWh', 'contractType.type', 'contract.rinovate')
            ->orderBy('contract.id', 'asc')
            ->first();

        $invoices = DB::table('invoices')
            ->where('idC', $id)
            ->select( 'id', 'year', 'month', 'amount')
            ->orderBy('id', 'desc')
            ->get();

        return view('users/contract', ['contract' => $contract, 'invoices' => $invoices]);
    }

    public function stipulateContract($id) {
        if (!DB::table('contractType')->where('id', $id)->value('isActive')) return redirect()->route('product');
        if (DB::table('contractType')->where('id', $id)->value('type') == 'home' && Auth::user()->PIVA != null) return redirect()->route('product');
        if (DB::table('contractType')->where('id', $id)->value('type') == 'business' && Auth::user()->PIVA == null) return redirect()->route('product');

        $buildings = DB::table('building')
        ->where('idU', Auth::user()->id)
        ->get();

        $contract = DB::table('contractType')
            ->where('id', $id)
            ->first();

        return view('users/stipulate', ['contract' => $contract, 'buildings' => $buildings]);
    }

    public function storeContract(Request $request, $id) {
        $request->validate(['building' => 'required']);
        $idB = $request->input('building');

        if ($idB == "add") {
            $validatedData = $request->validate([
                'city' => 'required|string',
                'CAP' => 'required|digits:5',
                'street' => 'required|string',
                'civicNumber' => 'required|string',
            ]);

            $idB = DB::table('building')->insertGetId([
                'city' => $validatedData['city'],
                'cap' => $validatedData['CAP'],
                'street' => $validatedData['street'],
                'civicNumber' => $validatedData['civicNumber'],
                'idU' => Auth::user()->id,
            ]);
        }

        $insertedId = DB::table('contract')->insertGetId([
            'idU' => Auth::user()->id,
            'idB' => $idB,
            'idT' => $id,
            'date' => Carbon::now(),
            'rinovate' => true,
            'paymentType' => $request->input('paymentType'),
        ]);
        $contract = DB::table('contract')
            ->where('id', $insertedId)
            ->first();

        $type = DB::table('contractType')
            ->where('id', $contract->idT)
            ->first();

        return redirect()->route('payment.form', ['contract' => $type]);
    }

    public function list() {
        $contracts = DB::table('contractType')
            ->where('isActive', true)
            ->where('deleted', false)
            ->get();
        return view('product', ['contracts' => $contracts]);
    }

    public function dismissContract(Request $request, $id) {
        if (DB::table('contract')->where('id', $id)->value('idU') != Auth::user()->id) return redirect()->route('dashboard');

        DB::table('contract')->where('id', $id)->update([
            'rinovate' => false,
        ]);

        return redirect()->route('user.dashboard');
    }

    public function invoicePDF(Request $request, $id) {

        /*
        $invoice = DB::table('invoices')
            ->select('id', 'month', 'year', 'date', 'amount', 'idC')
            ->where('id', $id)
            ->first();

        $contract = DB::table('contract')
            ->where('id', $invoice->idC)
            ->select('idT', 'idB')
            ->first();

        $contractType = DB::table('contractType')
            ->where('id', $contract->idT)
            ->select('energyType', 'idS')
            ->first();

        $building = DB::table('building')
            ->where('id', $contract->idB)
            ->select('street', 'civicNumber', 'city', 'CAP')
            ->first();
        */

        //Join è più veloce delle query separate
        $invoices = DB::table('invoices')
            ->join('contract', 'contract.id', '=', 'invoices.idC')
            ->join('building', 'building.id', '=', 'contract.idB')
            ->join('contractType', 'contract.idT', '=', 'contractType.id')
            ->join('suppliers', 'suppliers.id', '=', 'contractType.idS')
            ->where('invoices.id', $id)
            ->select('building.street', 'building.civicNumber', 'building.city', 'building.CAP',
            'invoices.idC', 'invoices.id', 'invoices.amount', 'invoices.month', 'invoices.year', 'invoices.date',
            'invoices.totGas', 'invoices.totEle', 'invoices.IVA', 'invoices.transport', 'invoices.meter', 'suppliers.email',
            'contractType.energyType', 'contract.idU', 'contractType.idS', 'contractType.priceG', 'contractType.priceE', 'contractType.KWh')
            ->orderBy('contract.id', 'asc')
            ->first();


        return Pdf::view('users/fattura', ['invoices' => $invoices])
            ->format('a4')
            ->name('invoice_'.sprintf('%08d',$invoices->id).'.pdf');
    }

    public function footprint(Request $request) {
        $ele = null;
        $gas = null;

        if (Auth::check()) {
            $consumption = DB::table('consumption')
                ->join('contract', 'contract.id', '=', 'consumption.idB')
                ->selectRaw('SUM(KW) as KW, SUM(mc) as mc')
                ->where('consumption.date', '>', Carbon::now()->subDays(30))
                ->where('idU', Auth::user()->id)
                ->get();

            $ele = $consumption[0]->KW;
            $gas = $consumption[0]->mc;
        }

        return view('carbonFootprint', ['ele' => $ele, 'gas' => $gas]);
    }
}

