<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'products' => \App\Product::paginate(5),
        ];
        return view('product-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('product-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $path = Storage::putFile('public/foto', $request->file('foto'));
        $request->validate([
            'produk' => 'required',
            'harga' => 'required|integer',
            'tag' => 'required',
        ]);

        $nama_produk = $request->input('produk');
        $harga = $request->input('harga');
        $tag = $request->input('tag');
        
        \App\Product::create([
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'foto' => $path,
            'tag' => $tag,
        ]);

        return redirect('/product')->with('suc', 'Data telah ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'product' => \App\Product::find($id)
        ];
        return view ('product-edit', $data);
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
        //
        $request->validate([
            'produk' => 'required',
            'harga' => 'required|integer',
            'tag' => 'required',
        ]);

        $nama_produk = $request->input('produk');
        $harga = $request->input('harga');
        $tag = $request->input('tag');

        if($request->input('foto')){
            $foto = $request->input('foto');
        }else {
            $foto = $request->input('foto_old');
        }

        \App\Product::find($id)->update([
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'foto' => $foto,
            'tag' => $tag,
        ]);

        return redirect(route('product.index'))->with('suc', 'Berhasil edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $data = [
            'product' => \App\Product::find($request->input('id'))
        ];
        return view ('product-delete', $data);
    }

    public function destroy($id)
    {
        //
        \App\Product::find($id)->delete();

        return redirect(route('product.index'))->with('suc', 'Berhasil dihapus');
    }

    public function konfirmasi($id){
        $charts = DB::table('charts')
                    ->join('users', 'users.id', '=', 'charts.user_id')
                    ->select('users.name', 'users.alamat', 'charts.nama_produk', 'charts.total', 'charts.bukti', 'charts.status')
                    ->where('charts.id', $id);

        return view('konfirmasi', ['charts' => $charts]);
    }

    public function kelola(Request $request, $id){
        $request->validate([
            'status' => 'required',
        ]);

        $status = $request->input('status');

        \App\Chart::find($id)->update([
            'status' => $status,
        ]);

        return view('pesanan')->with('suc', 'Pesanan telah dikonfirmasi');
    }
}
