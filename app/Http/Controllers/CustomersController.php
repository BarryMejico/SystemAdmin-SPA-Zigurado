<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
// use App\Customers;
use Illuminate\Support\Facades\DB;
// use App\Rules\inUseData;

class CustomersController extends Controller
{
    public function store(Request $request){        
        $request->validate([
            'Name'=>'required',
            'Number'=>'required',
            // 'Address'=>'required'  
        ]);
        $input = $request->all();
        $Code=Ucode();

        //----for taging to specific user/s
            // $UserIn=getUser()->id;
            // $UserCoCode=getUser()->CoCode;
        //---------------
        
        $customer = Customers::updateOrCreate([
            'Customer'=> $input['Name'],
            'Number'=> $input['Number'],
            // 'Address'=> $input['Address'], 
            'Ccode'=>$Code,
            //----taging to specific user/s
            // 'user_id' => $UserIn,
            // 'CoCode' => $UserCoCode,
            //---------------
        ]);
        $customer->save();

        // $customer = Customer::where('Ccode',$Code)->get();
        $customer=array(
            // "Address"=>$input['Address'],
            "Ccode"=>$Code,
            "Customer"=>$input['Name'],
            "Number"=>$input['Number'],
        );

        return $customer;
    }

    public function Delete(Request $request){  
        $input = $request->all();
        //dd($input);
        $request->validate([
            'Ccode'=>['required'],
        ]);
        $customer = Customers::where('Ccode',$input['Ccode'])->delete();
    }   

    public function update(Request $request){        
        $request->validate([
            'Name'=>'required',
            'Number'=>'required',
            // 'Address'=>'required'  
        ]);

        $input = $request->all();
       
        $customer = Customers::where('Ccode',$input['ids'])
        ->update([
           'Customer'=> $input['Name'],
           'Number'=> $input['Number'],
        //    'Address'=> $input['Address'],
        ]);
    }


    public function LoadCus(){
        $customers=DB::table('customers')
        ->select('Ccode','Customer','Number')
        ->get();
        return $customers;
    }

    public function LoadCusPagination(){
        $Cocode=getUser()->CoCode;
        $customers=DB::table('customers')
        ->where('CoCode', '=', $Cocode)
        ->paginate(5);
        return $customers;
}

    public function Search(Request $request){
        $input = $request->all();
        $Cocode=getUser()->CoCode;
        
        $s= $input['Search'];
        $search = DB::table('customers')
                ->where('Customer', 'like', "%{$s}%")
                ->where('CoCode', '=', $Cocode)
                ->paginate(5);
        return $search;
    }

    public function customerBaseOnSales(){
        $customers = DB::table('orders')
        ->join('users', 'users.Reference_ID', '=', 'orders.Ccode')
        ->select('orders.Ccode','users.name','users.Profile_Picture','users.email')
        ->groupBy('orders.Ccode','users.name','users.Profile_Picture','users.email')
        ->get();
        return $customers;
    }
}
