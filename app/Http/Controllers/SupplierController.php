<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    function index(){
        $suppliers = DB::table('suppliers')->get();
        return view('suppliers.index')->with('suppliers', $suppliers);
    }
    function store(Request $request){
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;

        $supplier->save();

        return redirect()->route('supplier.index');
    }

    function edit($id){
        $supplier = DB::table('suppliers')->find($id);
        return $supplier;
    }

    function update(Request $request){
        DB::table('suppliers')->where('id', $request->id)->update([
            'supplier_name' => $request->supplier_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('supplier.index');

    }

    function destroy($id){
        DB::table('suppliers')->where('id', $id)->delete();
        return redirect()->route('supplier.index');
    }
}
