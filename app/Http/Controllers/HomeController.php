<?php

namespace App\Http\Controllers;

use DB;
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

    public function statistikPerTahun()
    {
        $query = DB::table('users')
            ->select('graduation_year', DB::raw('COUNT(graduation_year) as jumlah'))
            ->where('level', 'alumni')
            ->groupBy('graduation_year')
            ->get();

        return view('dashboard.statistik.per-tahun', compact('query'));
    }

    public function statistikPerguruanTinggi()
    {
        $query = DB::table('colleges')
            ->join('education_histories', 'colleges.id', '=', 'education_histories.college_id')
            ->where('colleges.jenis', 'perguruan tinggi')
            ->groupBy('name')
            ->select('name', DB::raw('COUNT(education_histories.user_id) as jumlah'))
            ->get();

        return view('dashboard.statistik.college-chart', compact('query'));
    }
}
