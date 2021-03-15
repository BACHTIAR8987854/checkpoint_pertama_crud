<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    // tampilkan data
    public function index()
    {
          $data_barang = DB::table('data_barang')->paginate(5);
        return view('crud',['data_barang' => $data_barang]);
    }

    //method untuk menampilkan form tambah data
    public function tambah()
    {
        return view('crud_tambah_data');
    }

    //method untuk simpan data
    public function simpan(Request $request)
    {
    
        $this->_validation($request);
    
        DB::table('data_barang')->insert
        (
            ['kode_barang' => $request->kode_barang,
          'nama_barang' => $request->nama_barang],
        );

        return redirect()->route('crud')->with('message','data berhasil disimpan');
    }

    private function _validation(Request $request)
    {  
      $validation = $request->validate([
          'kode_barang'=>'required|max:10|min:2',
        'nama_barang'=>'required|max:100|min:2'
        ],
        [
        'kode_barang.required' => 'Harus diisi',
          'kode_barang.min' => 'Minimal 2 digit',
            'kode_barang.max' => 'Maksimal 10 digit',
          'nama_barang.required' => 'Harus diisi',
        'nama_barang.min' => 'Minimal 2 digit',
        ]);
    }

    //method untuk edit data
    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id',$id)->first();
      return view('crud_edit_data',['data_barang' => $data_barang]);
    }

    //method untuk hapus data
    public function delete($id){
        DB::table('data_barang')->where('id',$id)->delete();
      return redirect()->back()->with('message','data berhasil dihapus');
    }

    //method update data
    public function update(Request $request, $id){
      //dd($request->all());
      $this->_validation($request);
        DB::table('data_barang')->where('id',$id)->update([
          'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang
      ]);
      return redirect()->route('crud')->with('message','Data berhasil diupdate');
    }
}
