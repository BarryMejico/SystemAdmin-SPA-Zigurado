<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name'=>'required',
            'Details'=>'required',
            'Ccode'=>'required'  
        ]);

        $input = $request->all();
        $Code='D' . Ucode();
        // dd($Code);
        $Device = Devices::updateOrCreate([
            'Name'=> $input['Name'],
            'Details'=> $input['Details'],
            'Ccode'=>$input['Ccode'],
            'DeviceCode'=> $Code,
        ]);
        $Device->save();
        $Device=array(
            // "Address"=>$input['Address'],
            "DeviceCode"=>$Code,
            "Name"=>$input['Name'],
            "Details"=>$input['Details'],
        );
        return $Device;
    }

    /**
     * Display the specified resource.
     */
    public function show(Devices $devices)
    {
        $resdevices=DB::table('devices')
        ->select('DeviceCode','Ccode','Name','Details')
        ->get();
        return $resdevices;
    }

        /**
     * Display the specified resource.
     */
    public function showSpecific(Request $devices)
    {
        
        $input = $devices->all();
        // dd($input['Ccode']);
        $resdevices=DB::table('devices')
        ->select('DeviceCode','Ccode','Name','Details')
        ->where('Ccode','=',$input['Ccode'])
        ->get();
        return $resdevices;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devices $devices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devices $devices)
    {
        $request->validate([
            'Name'=>'required',
            'Details'=>'required',
            'Ccode'=>'required',
            'DeviceCode'=>'required',  
        ]);

        $input = $request->all();
       
        $device = Devices::where('DeviceCode',$input['DeviceCode'])
        ->update([
           'Name'=> $input['Name'],
           'Details'=> $input['Details'],
        ]);

        return $device;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devices $devices)
    {
        //
    }
}
