<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\OrganizationHistory;
use Illuminate\Http\Request;
use Auth;

class OrganizationHistoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.organization.create');
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

        $organization = new OrganizationHistory();
        $organization->year = $request->year;
        $organization->detail = $request->detail;
        $organization->user_id = Auth::id();
        $organization->save();
        return redirect("/profile")->with('pesan', 'Berhasil menambah data riwayat organisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = OrganizationHistory::find($id);
        $organization->delete();
        return redirect("/profile")->with('pesan', 'Data riwayat organisasi berhasil dihapus'); 
    }
}
