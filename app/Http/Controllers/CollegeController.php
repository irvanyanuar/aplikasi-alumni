<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Regency;
use Illuminate\Http\Request;
use Auth;

class CollegeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view('college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regencies = Regency::all();
        return view('college.create', compact('regencies'));
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
            'regency_id' => 'required'
        ]);
        $college = new College();
        $college->name = $request->name;
        $college->regency_id = $request->regency_id;

        $college->save();
        return redirect("/college")->with('pesan', 'Berhasil menambah data perguruan tinggi');
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

        $college = College::find($id);
        $regencies = Regency::all();
        return view('college.edit', compact('college', 'regencies'));
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
            'regency_id' => 'required'
        ]);
        $college = College::find($id);
        $college->name = $request->name;
        $college->regency_id = $request->regency_id;

        $college->update();
        return redirect("/college")->with('pesan', 'Berhasil mengupdate data perguruan tinggi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->level == 'admin') {
            $college = College::find($id);
            $college->delete();
            return redirect("/college")->with('pesan', 'Data berhasil dihapus');
        } else {
            return redirect()->back();
        }
    }
}
