<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use File;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('level', 'admin')->get();
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email|unique:users',
            'photo' => 'image|mimes:jpeg,jpg,png'
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->level = 'admin';

        if ($request->has('photo')) {
            $photo = $request->photo;
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo->getRealPath())->resize(300, 300)->save('assets/img/foto-profil/', $namafile);
            $admin->photo = $namafile;
        } else {
            $admin->photo = "admin.png";
        }

        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect("/admin")->with('pesan', 'Berhasil menambah data admin');
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
        $admin = User::find($id);
        return view('admin.edit', compact('admin'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'image|mimes:jpeg,jpg,png'
        ]);

        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->has('photo')) {
            $photo = $request->photo;
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 500)->save('assets/img/foto-profil/' . $namafile, 80);

            if ($admin->photo != 'admin.png') {
                // hapus foto lama
                File::delete('assets/img/foto-profil/' . $admin->photo);
            }

            $admin->photo = $namafile;
        }

        if ($request->input('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->update();
        return redirect("/admin")->with('pesan', 'Berhasil mengupdate data admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        if ($admin->photo != 'admin.png') {
            // hapus foto lama
            File::delete('assets/img/foto-profil/' . $admin->photo);
        }
        $admin->delete();
        return redirect("/admin")->with('pesan', 'Data admin berhasil dihapus');
    }
}
