<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = User::where('level', 'alumni')->get();
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regencies = Regency::all();
        return view('alumni.create', compact('regencies'));
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

        $alumni = new User();
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->level = 'alumni';
        $alumni->student_number = $request->student_number;
        $alumni->entry_year = $request->entry_year;
        $alumni->graduation_year = $request->graduation_year;
        $alumni->birth_place_id = $request->birth_place_id;
        $alumni->birth_date = $request->birth_date;

        if ($request->has('photo')) {
            $photo = $request->photo;
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 500)->save('assets/img/foto-profil/' . $namafile, 80);
            $alumni->photo = $namafile;
        } else {
            $alumni->photo = "alumni.png";
        }

        $alumni->password = bcrypt($request->password);
        $alumni->save();
        return redirect("/alumni")->with('pesan', 'Berhasil menambah data alumni');
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
        $alumni = User::find($id);
        $regencies = Regency::all();
        return view('alumni.edit', compact('alumni', 'regencies'));
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

        $alumni = User::find($id);
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->student_number = $request->student_number;
        $alumni->entry_year = $request->entry_year;
        $alumni->graduation_year = $request->graduation_year;
        $alumni->birth_place_id = $request->birth_place_id;
        $alumni->birth_date = $request->birth_date;

        if ($request->has('photo')) {
            $photo = $request->photo;
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 500)->save('assets/img/foto-profil/' . $namafile, 80);

            if ($alumni->photo != 'alumni.png') {
                // hapus foto lama
                File::delete('assets/img/foto-profil/' . $alumni->photo);
            }

            $alumni->photo = $namafile;
        }

        if ($request->input('password')) {
            $alumni->password = bcrypt($request->password);
        }

        $alumni->update();
        return redirect("/alumni")->with('pesan', 'Berhasil mengupdate data alumni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni = User::find($id);
        if ($alumni->photo != 'alumni.png') {
            // hapus foto lama
            File::delete('assets/img/foto-profil/' . $alumni->photo);
        }
        $alumni->delete();
        return redirect("/alumni")->with('pesan', 'Data alumni berhasil dihapus');
    }
}
