<?php

namespace App\Http\Controllers;

use App\Catatan;
use Auth;
use Illuminate\Http\Request;

class CatatansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //auth disini berfungsi etika kita masuk home harus login dlu
    }

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
        return view('catatan.catatancreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cek_catatan = Catatan::where('user_id',Auth::user()->id);
        // validasi untuk field agar tidak diisi kosong / harus diisi sblm dikirim
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ]);

        // insert ke database
            $catatan = new Catatan;
            $catatan->user_id=Auth::user()->id;
            $catatan->judul = $request->judul;
            $catatan->isi = $request->isi;
        
            $catatan->save();
        

        // jika sdh disave maka kembalikan ke halaman home
        return redirect('/home')->with('status','Catatan Berhasil Dibuat:)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        // return $catatan;
         return view('catatan.catatandetail', compact('catatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catatan)
    {
        return view('catatan.catatanedit', compact('catatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catatan $catatan)
    {
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ]);

        Catatan::where('id', $catatan->id)
            ->update([
                'judul'=> $request->judul,
                'isi'=>$request->isi
            ]);

        return redirect('/home')->with('status','Catatan Berhasil Diupdate:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catatan $catatan)
    {
        // untuk menghapus data beserta data yng didb
        $catatan::destroy($catatan->id);
        return redirect('/home')->with('status','Catatan Berhasil Dihapus:(');
    }
}
