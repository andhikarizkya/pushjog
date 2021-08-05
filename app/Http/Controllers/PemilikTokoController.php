<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\Pesanan;
use Alert;
use Illuminate\Support\Facades\Auth;

class PemilikTokoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Barang::latest()->paginate(5);
        return view('PemilikToko.index', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PemilikToko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'      =>  'required',
            'harga'            =>  'required',
            'stok'             =>  'required',
            'kategori'         =>  'required',
            'keterangan'       =>  'required',
            'image'            =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_barang'      =>   $request->nama_barang,
            'harga'            =>   $request->harga,
            'stok'             =>   $request->stok,
            'kategori'         =>   $request->kategori,
            'keterangan'       =>   $request->keterangan,
            'image'            =>   $new_name
        );

        Barang::create($form_data);

        Alert::success('Produk yang anda jual berhasil diunggah.', 'Success');
        return redirect('penjual/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::findOrFail($id);
        return view('PemilikToko.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::findOrFail($id);
        return view('PemilikToko.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'nama_barang'    =>  'required',
                'harga'            =>  'required',
                'stok'             =>  'required',
                'kategori'         =>  'required',
                'keterangan'       =>  'required',
                'image'            =>  'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'nama_barang'      =>  'required',
                'harga'            =>  'required',
                'stok'             =>  'required',
                'kategori'         =>  'required',
                'keterangan'       =>  'required'
            ]);
        }

        $form_data = array(
            'nama_barang'      =>   $request->nama_barang,
            'harga'            =>   $request->harga,
            'stok'             =>   $request->stok,
            'kategori'         =>   $request->kategori,
            'keterangan'       =>   $request->keterangan,
            'image'            =>   $image_name
        );
  
        Barang::whereId($id)->update($form_data);

        Alert::success('Produk yang anda jual berhasil diperbarui.', 'Success');
        return redirect('penjual/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();

        Alert::success('Produk yang anda jual berhasil dihapus.', 'Success');
        return redirect('penjual/barang');
    }
}
