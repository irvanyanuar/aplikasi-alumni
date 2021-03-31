<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\College;
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
}
