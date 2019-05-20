<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('chart-view');
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
        $request->validate([
            'id' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'required',
        ]);

        $nama_produk = $request->input('produk');
        $jumlah = $request->input('jumlah');
        $harga = $request->input('harga');
        $total = $jumlah * $harga;
        $user_id = $request->input('id');
        $status = $request->input('status');

        \App\Chart::create([
            'user_id' => $user_id,
            'nama_produk' => $nama_produk,
            'total' => $total,
            'bukti' => 'null',
            'status' => $status,
        ]);

        return redirect('/')->with('suc', 'Berhasil melakukan pembelian');
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
        $orders = DB::table('charts')
                    ->where('user_id', $id)
                    ->orderBy('created_at', 'asc')
                    ->paginate(5);

        return view('chart', ['orders' => $orders]);
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
        $charts = DB::table('charts')
                    ->find($id);

        return view('kirim-bukti', ['charts' => $charts]);
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
        // $bukti = Storage::putFile('public/bukti', $request->file('bukti'));
        $request->validate([
            'bukti' => 'required',
        ]);
            $bukti = Storage::putFile('public/bukti', $request->file('bukti'));

        \App\Chart::find($id)->update([
            'bukti' => $bukti,
        ]);
        return redirect('chart/'. Auth::user()->id)->with('suc', 'Bukti berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pesanan(){
        $charts = DB::table('charts')
                    ->join('users', 'users.id', '=', 'charts.user_id')
                    ->select('users.name', 'users.alamat', 'charts.nama_produk', 'charts.total', 'charts.bukti', 'charts.status', 'charts.id')
                    ->orderBy('charts.created_at', 'asc')
                    ->paginate(5);

        return view('pesanan', ['charts' => $charts]);
    }
}
