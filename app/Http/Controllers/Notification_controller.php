<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Notification_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {  $Announces=Announcement::all()->take(-3);
        $Announcements=Announcement::all()->reverse();
        $id=$Announcements->first()->user_id;
        $user=User::find($id);
                return view ("Announcements",[
                    'user' =>$user,
                    'Announcements' => $Announcements,
                    'Announces'=>$Announces
                ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     */
    public  function show()
    {
        $Announces=Announcement::all()->take(-3);
        switch (Auth::user()->role) {
            case(0):
                return view("Admin.AdminDash")->with(["Announces" => $Announces]);
            case(1):
                return view ("ViceDean.viceDeanDash")->with(["Announces" => $Announces]);
            case(2):
                return view ("CFD.AssignTeacher")->with(["Announces" => $Announces]);
            case(3):
                return view ("Teacher.TeacherDash")->with(["Announces" => $Announces]);
            case(4):
                return view ("Participant.ParticipantDash")->with(["Announces" => $Announces]);
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
