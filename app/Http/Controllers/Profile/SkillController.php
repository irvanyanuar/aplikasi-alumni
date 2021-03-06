<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;

class SkillController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.skill.create');
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
            'detail' => 'required'
        ]);

        $skill = new Skill();
        $skill->detail = $request->detail;
        $skill->user_id = Auth::id();
        $skill->save();
        return redirect("/profile")->with('pesan', 'Berhasil menambah data kemampuan/skills');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect("/profile")->with('pesan', 'Data kemampuan/skill berhasil dihapus'); 
    }
}
