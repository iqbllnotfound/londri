<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){


        return view('home');
    }

    public function searchNoHp(Request $request){
        $nomorHp = $request->noHp;
        $datas = DataPesanan::where('noHp','like','%'.$nomorHp.'%')->get();
        return view('home',compact('datas'));
    }

    public function index()
    {
        $datas = DataPesanan::orderBy('created_at', 'desc')->get();


        return view('admin', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hargaPerkilo = 10000;
        $totalHarga = $hargaPerkilo * $request->totalBerat;

        $data = DataPesanan::create([
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'total_berat' => $request->totalBerat,
            'total_harga' => $totalHarga,
            'status' => 'Belum Selesai'
        ]);

        return redirect()->route('dashboard.admin');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataPesanan::find($id);

        return view('edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hargaPerkilo = 10000;
        $totalHarga = $hargaPerkilo * $request->totalBerat;

        $data = DataPesanan::find($id);

        $data->update([
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'total_berat' => $request->totalBerat,
            'total_harga' => $totalHarga,
            'status' => $request->status
        ]);

        return redirect()->route('dashboard.admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataPesanan::find($id);

        $data->delete();

        return redirect()->route('dashboard.admin');
    }

    public function owner(){
        $datas = DataPesanan::orderBy('created_at', 'desc')->get();
        return view('owner',compact('datas'));
    }

    public function searchDate(Request $request){
        $date = $request->date;
        $resultDate = DataPesanan::where('created_at','like','%'.$date.'%')->get();
        
        return view('owner',compact('resultDate'));
    }
}
