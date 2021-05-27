<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\College;
use App\Models\EducationHistory;
use App\Models\JobExperience;
use App\Models\OrganizationHistory;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alumni = User::where('level', 'alumni')->get();
        $jumlahCollege = College::where('jenis', 'perguruan tinggi')->get()->count();
        $jumlahPrestasi = Achievement::all()->count();
        $jumlahAdmin = User::where('level', 'admin')->count();
        return view('dashboard.index', compact('alumni', 'jumlahCollege', 'jumlahPrestasi', 'jumlahAdmin'));
    }

    public function alumni()
    {
        $alumni = User::where('level', '=', 'alumni')->get();
        return view('dashboard.data_alumni.index', compact('alumni'));
    }

    public function detail($id)
    {
        $profile = User::find($id);
        $education = EducationHistory::where('user_id', $id)->get();
        $job = JobExperience::where('user_id', $id)->get();
        $achievement = Achievement::where('user_id', $id)->get();
        $organization = OrganizationHistory::where('user_id', $id)->get();
        $skill = Skill::where('user_id', $id)->get();

        return view('dashboard.data_alumni.detail', compact('profile', 'education', 'job', 'achievement', 'organization', 'skill'));
    }
}
