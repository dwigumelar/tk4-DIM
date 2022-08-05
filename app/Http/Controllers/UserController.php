<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
      $user = User::join('pegawais', 'users.id_pegawai', '=', 'pegawais.id_pegawai')->select('users.*', 'pegawais.nama_pegawai')->get();
      //render view with posts
      return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pegawai = Pegawai::all();
      return view('user.create',compact('pegawai'));
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
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|max:255',
        'id_pegawai' => 'required|integer',
      ]);
      $post   =   User::Create([
                      'username' => $request->username,
                      'email' => $request->email,
                      'password' => Hash::make($request->password),
                      'role' => $request->role,
                      'id_pegawai' => $request->id_pegawai,
                  ]);
      return redirect()->route('user.index')->with('success','User created successfully.');

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
    public function edit(User $user)
    {
      $pegawai = Pegawai::all();
      return view('user.edit',compact('pegawai','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|max:255',
        'id_pegawai' => 'required|integer',
      ]);
      $user->update(['username'=>$request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        'id_pegawai' => $request->id_pegawai]);
      return redirect()->route('user.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      return redirect()->route('user.index')->with('success','User deleted successfully');
    }
}
