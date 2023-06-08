<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Subject;
use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;
class Claims extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $subject=Subject::all();
        $Announces=Announcement::all()->take(-3);
        $Claim=Claim::all();
        $myClaim=Claim::all()->whereIn('user_id',\Auth::user()->id);
        if (\Auth::user()->role == 4)
        return view('Participant.myClaims')->with([
            'subjects'=>$subject,
            'Announces'=>$Announces,
            'myClaims'=>$myClaim,
        ]);
        elseif (\Auth::user()->role == 1 )
            return view('ViceDean.Claims')->with([
                'subjects'=>$subject,
                'Announces'=>$Announces,
                'Claims'=>$Claim,
                'myClaims'=>$myClaim,
            ]);
        elseif (Auth::user()->role == 2 )
            return view('ViceDean.Claims')->with([
                'subjects'=>$subject,
                'Announces'=>$Announces,
                'Claims'=>$Claim,
                'myClaims'=>$myClaim,
            ]);
        else abort(403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myclaim =new Claim();
        $myclaim->user_id = \Auth::user()->id;
        $myclaim->title = $request->input('title');
        $myclaim->claim = $request->input('Reason');
        $myclaim->status = "waiting";
        $myclaim->subject_id = $request->input('subject');
        $myclaim->save();
        return back();
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

    public function refuse($id)
    {
        $claim =Claim::find ( $id);

        $claim -> status = "refused";
        $claim -> update ();
        return back ();

    }


    public function accept ($id){
        $claim =Claim::find ( $id );
        $claim -> status = "accepted";
        $claim -> update ();
        return back ();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
