<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\EducationHistory;
use App\Models\JobExperience;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $profile = User::find($id);
        $education = EducationHistory::where('user_id', $id)->get();
        $job = JobExperience::where('user_id', $id)->get();
        $achievement = Achievement::where('user_id', $id)->get();
        return view('profile.index', compact('profile', 'education', 'job', 'achievement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $profile = User::find($id);
        $regencies = Regency::all();
        return view('profile.edit', compact('profile', 'regencies'));
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
            'photo' => 'image|mimes:jpeg,jpg,png',

        ]);
        $profile = User::find($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->student_number = $request->student_number;
        $profile->entry_year = $request->entry_year;
        $profile->graduation_year = $request->graduation_year;
        $profile->birth_place_id = $request->birth_place_id;
        $profile->birth_date = $request->birth_date;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;

        if ($request->has('photo')) {
            $photo = $request->photo;
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 500)->save('assets/img/foto-profil/' . $namafile, 80);

            if ($profile->photo != 'alumni.png') {
                // hapus foto lama
                File::delete('assets/img/foto-profil/' . $profile->photo);
            }

            $profile->photo = $namafile;
        }

        if ($request->input('password')) {
            $profile->password = bcrypt($request->password);
        }

        $profile->update();
        return redirect("/profile")->with('pesan', 'Berhasil mengupdate data profile');
        
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
}
