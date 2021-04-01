<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\JobExperience;
use Illuminate\Http\Request;
use Auth;

class JobExperienceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.job.create');
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
            'start_date' => 'required',
            'detail' => 'required'
        ]);

        $job = new JobExperience();
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->detail = $request->detail;
        $job->user_id = Auth::id();
        $job->save();
        return redirect("/profile")->with('pesan', 'Berhasil menambah data pengalaman kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = JobExperience::find($id);
        $job->delete();
        return redirect("/profile")->with('pesan', 'Data pengalaman kerja berhasil dihapus');   
    }
}
