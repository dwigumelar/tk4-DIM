<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;
use App\Models\Bagian;

class PegawaiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
      $pegawai = Pegawai::join('bagians', 'pegawais.id_bagian', '=', 'bagians.id_bagian')->select('pegawais.*', 'bagians.nama_bagian')->get();
      //render view with posts
      return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();
        return view('pegawai.create',compact('bagian'));
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
        'nama_pegawai' => 'required',
        'alamat_pegawai' => 'required',
        'hp_pegawai' => 'required',
        'jabatan_pegawai' => 'required',
        'id_bagian' => 'required',
      ]);
      Pegawai::create($request->all());
      return redirect()->route('pegawai.index')->with('success','Pegawai created successfully.');
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
    public function edit(Pegawai $pegawai)
    {
        $bagian = Bagian::all();
        return view('pegawai.edit',compact('pegawai','bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
      $request->validate([
        'nama_pegawai' => 'required',
        'alamat_pegawai' => 'required',
        'hp_pegawai' => 'required',
        'jabatan_pegawai' => 'required',
        'id_bagian' => 'required',
      ]);
      $pegawai->update($request->all());
      return redirect()->route('pegawai.index')->with('success','Pegawai updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
      $pegawai->delete();
      return redirect()->route('pegawai.index')->with('success','Pegawai deleted successfully');
    }
}
