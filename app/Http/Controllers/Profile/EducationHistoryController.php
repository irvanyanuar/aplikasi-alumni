<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\EducationHistory;
use Illuminate\Http\Request;
use Auth;

class EducationHistoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::all();
        return view('profile.education_history.create', compact('colleges'));
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
            'entry_year' => 'required',
            'graduation_year' => 'required',
            'college_id' => 'required'
        ]);
        $education = new EducationHistory();
        $education->entry_year = $request->entry_year;
        $education->graduation_year = $request->graduation_year;
        $education->jurusan = $request->jurusan;
        $education->college_id = $request->college_id;
        $education->user_id = Auth::id();

        $education->save();
        return redirect("/profile")->with('pesan', 'Berhasil menambah data riwayat sekolah/perguruan tinggi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = EducationHistory::find($id);
        $education->delete();
        return redirect("/profile")->with('pesan', 'Data riwayat pendidikan berhasil dihapus');        
    }
}
