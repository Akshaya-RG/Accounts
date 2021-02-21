<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\Models\Acc_OrganisationName;

class OrganisationNamesController extends Controller
{
    public function create(Request $request)
    {
        try {

            $count = Acc_OrganisationName::where('organisationName', $request->organizationName)
                ->where('isDeleted', '0')
                ->count();
                (object) $address = "";

                @$address->address1 = $request->addressLine1;
                $address->address2 = $request->addressLine2;
                $address->city = $request->city;
                $address->state = $request->state;
                $address->country = $request->country;

                $addr = get_object_vars($address);
                $address1 = json_encode($addr);


            if ($count > 0) {
                return response()->json(['message' => 'This Organization Name exists already ', 'status' => '201']);
            } else {
                $organizationName = Acc_OrganisationName::create([
                    'organisationName' => $request->organizationName,
                    'GST_No' => $request->GST_No,
                    'address'=>$address1,
                    'createdBy' => 'admin',
                    'updatedBy' => 'admin',
                    'isDeleted' => '0',
                ]);
                $organizationName->save();
                Session::put('msg', "Organization Name created successfully");
                Session::save();
                return $organizationName;
            }
        } catch (\Throwable $th) {
            return view('500');

        }
    }
    public function Createdisplay(Request $request)
    {
        try {

            return view('organizationNames');

        } catch (\Throwable $th) {

            return view('500');

        }
    }
    public function delete(Request $request)
    {
        try {

            $organizationName = Acc_OrganisationName::where('id', $request->input('deleteid'))
                ->update(['isDeleted' => '1',
                    'updatedBy' => $a]);
            Session::put('msg', "Organization Name deleted successfully");
            Session::save();

            return redirect('/organizationType/view');
        } catch (\Throwable $th) {

            return view('500');

        }
    }
    public function update(Request $request)
    {
        try {

            $count = Acc_OrganisationName::where('id', '!=', $request->id1)
                ->where('isDeleted', '0')
                ->where('Acc_OrganisationName', $request->organisationName1)
                ->count();

                (object) $address = "";

                @$address->address1 = $request->addressLine1;
                $address->address2 = $request->addressLine2;
                $address->city = $request->city;
                $address->state = $request->state;
                $address->country = $request->country;

                $addr = get_object_vars($address);
                $address1 = json_encode($addr);

            if ($count > 0) {
                return response()->json(['message' => 'This Organization Name exists already ', 'status' => '201']);
            } else {
                $organizationType = Acc_OrganisationName::where('id', $request->id1)
                    ->update([
                        'organisationName' => $request->organisationName1,
                        'GST_No'=>$request->GST_No,
                        'address'=>$address1,
                        'updatedBy' => '1'
                        ]);
                Session::put('msg', "Organization Name updated successfully");
                Session::save();
                return redirect('/organizationType/view');
            }
        } catch (\Throwable $th) {
            return view('500');
            // return $th;
        }
    }
}
