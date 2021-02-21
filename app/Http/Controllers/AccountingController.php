<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\Models\Acc_Accounts;

class AccountingController extends Controller
{
    public function create(Request $request)
    {
        try{
            $Accounts = Acc_Accounts::create([
                'organisationName' => $request->organisationName,
                'date' => $request->date,
                'billNumber' => $request->billNumber,
                'billDate' => $request->billDate,
                '5%Amount' => $request->FiveAmount,
                '12%Amount' => $request->TwelveAmount,
                '18%Amount' => $request->EighteenAmount,
                '5%Tax' => $request->FiveTax,
                '12%Tax' => $request->TwelveTax,
                '18%Tax' => $request->EighteenTax,
                'interstate_local' => $request->interstate_local,
                'filled_notfilled' => $request->filled_notfilled,
                'createdBy' => "JK",
                'updatedBy' => "JK",
                'isDeleted' => 0,
            ]);
            return $Accounts;
        }
        catch (\Throwable $th) {
            return view('500');
        }
    }
    public function update(Request $request)
    {
        try{
            $Accounts = Acc_Accounts::where('id', $request->id)
                        ->update([
                                    'organisationName' => $request->organisationName,
                                    'date' => $request->date,
                                    'billNumber' => $request->billNumber,
                                    'billDate' => $request->billDate,
                                    '5%Amount' => $request->FiveAmount,
                                    '12%Amount' => $request->TwelveAmount,
                                    '18%Amount' => $request->EighteenAmount,
                                    '5%Tax' => $request->FiveTax,
                                    '12%Tax' => $request->TwelveTax,
                                    '18%Tax' => $request->EighteenTax,
                                    'interstate_local' => $request->interstate_local,
                                    'filled_notfilled' => $request->filled_notfilled,
                                    'updatedBy' => "JK",
                                ]);
            return $Accounts;
        }
        catch (\Throwable $th) {
            return view('500');
        }
    }
    public function delete(Request $request)
    {
        try{
            $Accounts = Acc_Accounts::where('id', $request->id)
                        ->update([
                            'isDeleted' => 1,   
                                ]);
            return $Accounts;
        }
        catch (\Throwable $th) {
            return view('500');
        }
    }
    public function gstfilled(Request $request)
    {
        try{
            $Accounts = Acc_Accounts::where('id', $request->id)
                        ->update([
                            'filled_notfilled' => $request->filled_notfilled,   
                                ]);
            return $Accounts;
        }
        catch (\Throwable $th) {
            return view('500');
        }
    }
    public function createdisplay(Request $request)
    {
        try {
            $Org = Acc_OrganisationName::where('isDeleted', '0')
                ->get();
            return view('organizationNames',['organisationNames' => $Org,]);

        } catch (\Throwable $th) {

            return view('500');

        }
    }
    public function updatedisplay($id,Request $request)
    {
        try {
            $Org = Acc_OrganisationName::where('isDeleted', '0')
                ->get();
            $accounts = Acc_Accounts::where('isDeleted', '0')
                ->where('id',$id)
                ->get();
            return view('organizationNames',['organisationNames' => $Org,
                                            'accounts' => $accounts,
                                            ]);

        } catch (\Throwable $th) {

            return view('500');

        }
    }
    public function display($id,Request $request)
    {
        try {
            $Org = Acc_OrganisationName::where('isDeleted', '0')
                ->get();
            $accounts = DB::table('acc__accounts')
            ->where('acc__accounts.isDeleted', '0')
            ->join('acc__organisation_name', 'acc__organisation_name.id', 'acc__accounts.organisationName')
            ->where('acc__organisation_name.isDeleted', '0')
            ->select('acc__accounts.*','acc__accounts.organisationName as org')
            ->get();
            return view('organizationNames',['organisationNames' => $Org,
                                            'accounts' => $accounts,
                                            ]);

        } catch (\Throwable $th) {

            return view('500');

        }
    }
}