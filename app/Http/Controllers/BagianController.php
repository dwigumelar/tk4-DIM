<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BagianController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index()
    {
      $bagian = Bagian::latest()->get();
      //render view with posts
      return view('bagian.index', compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('bagian.create');
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
        'nama_bagian' => 'required',
      ]);

        Bagian::create($request->all());
        return redirect()->route('bagian.index')->with('success','Bagian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function show(Bagian $bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagian $bagian)
    {
        return view('bagian.edit',compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagian $bagian)
    {
      $request->validate([
        'nama_bagian' => 'required',
      ]);
        $bagian->update($request->all());
        return redirect()->route('bagian.index')->with('success','Bagian updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagian $bagian)
    {
        $bagian->delete();
        return redirect()->route('bagian.index')->with('success','Bagian deleted successfully');
    }
}
