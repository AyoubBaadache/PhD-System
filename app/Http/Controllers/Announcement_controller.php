<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Announcement_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
            $announcement =new announcement;
            $announcement->user_id = Auth::user()->id;
        $this->extracted($request, $announcement);
        return back();
    }


    public function show()
    {
        $Announcement= Announcement::all();
        $Announces=Announcement::all()->take(-3);
        return view ("ViceDean.announcementsList")->with('Announcements',$Announcement)->with('Announces',$Announces);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $announcement = announcement::find($request->user_edit_id);
        $announcement->title = $request->input('Title');
        $announcement->Content = $request->input('COntent');
        $announcement->starting = $request->input('Starting');
        $announcement->ending = $request->input('Ending');
        $announcement->save();        return back ();
    }

    public function destroy(Request $request)
    {
        $announcement =  announcement ::find ( $request -> user_delete_id);
        $announcement -> delete ();
        return back ();
    }


    public function extracted(Request $request, $announcement): void
    {
        $announcement->title = $request->input('title');
        $announcement->Content = $request->input('Content');
        $announcement->starting = $request->input('starting');
        $announcement->ending = $request->input('ending');
        $announcement->priority = $request->input('priority');
        $announcement->save();
    }
}
