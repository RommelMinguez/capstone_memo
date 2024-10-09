<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Auth;
use DB;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index() {
        $regions = DB::table('refRegion')->get();
        $addresses = Auth::user()->addresses;
        return view('user.address', compact('regions', 'addresses'));
    }

    public function store() {

        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street_building' => 'required|string|max:255',
            'unit_floor' => 'max:255'
        ]);

        $address = Auth::user()->addresses()->create($attributes);

        if (!Auth::user()->address_id) {
            Auth::user()->update([
                'address_id' => $address->id,
            ]);
        }

        return redirect('user/address')->with('success', 'Address Added Successfully');
    }

    public function updateMainAddress($address) {
        Auth::user()->update([
            'address_id' => $address
        ]);

        return redirect('/user/address')->with('success', 'Successfully Change Main Address.');
    }

    public function updateAddress(Address $address) {

    }

    public function destroy(Address $address) {
        $address->delete();

        return redirect('/user/address')->with('success', 'Address Successfully Deleted.');
    }


    public function getRegion() {
        $region = DB::table('refRegion')->get();
        return response()->json(['region' => $region]);
    }
    public function getProvince($region) {
        $province = DB::table('refProvince')->where('regCode', $region)->get();
        return response()->json($province);
    }
    public function getCityMun($province) {
        $cityMun = DB::table('refCityMun')->where('provCode', $province)->get();
        return response()->json( $cityMun);
    }
    public function getBarangay($cityMun) {
        $barangay = DB::table('refBrgy')->where('cityMunCode', $cityMun)->get();
        return response()->json($barangay);
    }
}
