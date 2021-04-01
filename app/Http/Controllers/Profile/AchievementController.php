<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Auth;

class AchievementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.achievement.create');
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
            'year' => 'required',
            'detail' => 'required'
        ]);

        $achievement = new Achievement();
        $achievement->year = $request->year;
        $achievement->detail = $request->detail;
        $achievement->user_id = Auth::id();
        $achievement->save();
        return redirect("/profile")->with('pesan', 'Berhasil menambah data penghargaan/prestasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::find($id);
        $achievement->delete();
        return redirect("/profile")->with('pesan', 'Data penghargaan/prestasi berhasil dihapus'); 
    }
}
