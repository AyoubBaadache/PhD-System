<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Subject;
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
        $sbjct =Subject::all();

        $user=User::find($id);
                return view ("Announcements",[
                    'user' =>$user,
                    'Announcements' => $Announcements,
                    'Announces'=>$Announces,
                    'sbjcts'=>$sbjct,

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
        $teacher = user::all() -> whereIn ( 'role' , 3)->count("id");
        $user = user::all() -> count("id");
        $participant = user::all() -> whereIn ( 'role' , 4)->count("id");
        $subject = Subject::all() -> count("id");
        $Announces=Announcement::all()->take(-3);

                return view("Admin.AdminDash")->with([
                    "Announces" => $Announces,
                    "participant" => $participant,
                    "subject" => $subject,
                    "teacher" => $teacher,
                    "user" => $user,

                    ]);

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
