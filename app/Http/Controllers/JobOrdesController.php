<?php

namespace App\Http\Controllers;

use App\Models\JobOrdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobOrdesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TransactionDate'=>'required',
            'Ccode'=>'required',
            'DeviceCode'=>'required',
            'ProblemDescription'=>'required'
        ]);

        $input = $request->all();
        $Code='JO' . Ucode();

        $Device = JobOrdes::updateOrCreate([
            'JOCode'=> $Code,
            'TransactionDate'=>$input['TransactionDate'],
            'Ccode'=> $input['Ccode'],
            'DeviceCode'=>$input['DeviceCode'],
            'ProblemDescription'=>$input['ProblemDescription'],

            'Action'=> $input['Action'],
            'Status'=>$input['Status'],
            'RepairedBy'=>$input['RepairedBy'],
        ]);
        // pass to payments to save
        return $Device;
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOrdes $jobOrdes)
    {
        $resdevices=DB::table('job_ordes')
        // ->select('DeviceCode','Ccode','Name','Details')
        ->get();
        return $resdevices;
    }

    /**
     * Display the specified resource.
     */
    public function showSpecific(Request $request,JobOrdes $jobOrdes)
    {
        $input = $request->all();
        // dd($input['Ccode']);
        $JO=DB::table('job_ordes')
        // ->select('DeviceCode','Ccode','Name','Details')
        ->where('JOCode','=',$input['JOCode'])
        ->get();
        return $JO;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOrdes $jobOrdes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOrdes $jobOrdes)
    {
        $request->validate([
            'TransactionDate'=>'required',
            'Ccode'=>'required',
            'DeviceCode'=>'required',
            'ProblemDescription'=>'required'
        ]);

        $input = $request->all();

        $JO = JobOrdes::where('JOCode',$input['JOCode'])
        ->update([
           'TransactionDate'=>$input['TransactionDate'],
            'Ccode'=> $input['Ccode'],
            'DeviceCode'=>$input['DeviceCode'],
            'ProblemDescription'=>$input['ProblemDescription'],
            
            'Action'=> $input['Action'],
            'Status'=>$input['Status'],
            'RepairedBy'=>$input['RepairedBy'],
        ]);

        return $JO;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOrdes $jobOrdes)
    {
        //
    }
}
