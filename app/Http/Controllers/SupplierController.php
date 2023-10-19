<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{

    public function index()
    {
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('supplier.index', [
            'supplier' => $supplier
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
         ]);

         Supplier::where(['id' => $request->id])->first();
         Supplier::create([
             'nama'         => $request->nama,
             'alamat'       => $request->alamat,
             'deskripsi'    => $request->deskripsi
         ]);
         Alert::success('Success', 'Data Ruang berhasil ditambahkan');
         return redirect()->route('supplier.index');
    }

    public function show($id)
    {
        $supplier = Supplier::all()->find($id);
        return view('supplier.show', [
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if(!$supplier) {
            Alert::error('Error', 'Data Supplier tidak ditemukan');
            return redirect()->route('supplier.index');
        }

        $data_supplier = [
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'deskripsi' => $request->deskripsi
        ];

        $supplier->where(['id' => $id])->update($data_supplier);
        Alert::success('Success', 'Data Supplier Berhasil Di Update');
        return redirect()->route('supplier.index');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if(!$supplier) {
            Alert::error('Error', 'Supplier Tidak Ditemukan');
            return redirect()->route('supplier.index');
        }
        $supplier->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Supplier Berhasil Dihapus');
        return redirect()->route('supplier.index');
    }
}
