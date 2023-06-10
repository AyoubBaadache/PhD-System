<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Final_grade;
use App\Models\Note;
use App\Models\Secret;
use App\Models\Subject;
use App\Models\V_grade;
use Illuminate\Http\Request;

class f_grades_P extends Controller
{
    public function index()
    {
        $subjects=Subject::all();
        $Announces=Announcement::all()->take(-3);
        $grade=V_grade::join('subjects', 'v_grades.subject_id', '=', 'subjects.id')
            ->join('secrets','v_grades.secret','=','secrets.id')
            ->join('users',"secrets.user_id","=","users.id")
            ->where("users.id",\Auth::user()->id)->get();
        $information=Final_grade::join('secrets','final_grades.secret','=','secrets.id')
            ->join('users','secrets.user_id','=','users.id')
            ->where("users.id",\Auth::user()->id)->get();
        $sbjct =Subject::all();

        return view('Participant.fgrades',[
            'subjects'=>$subjects,
            'Announces'=>$Announces,
            'sbjcts'=>$sbjct,
            "grades"=>$grade,
            "informations"=>$information
        ]);
    }
    /**
     * CFD notes view
     */
}
