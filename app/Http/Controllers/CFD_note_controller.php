<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Note;
use App\Models\Secret;
use App\Models\Subject;
use App\Models\Users_subject;
use App\Models\V_grade;
use Illuminate\Http\Request;

class CFD_note_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::all();
        $Announces=Announcement::all()->take(-3);

        return view('CFD.shareGrades',[
            'subjects'=>$subjects,
            'Announces'=>$Announces,
        ]);
    }
    /**
     * CFD notes view
     */
    public function CFD_notes($id)
    {
        $Announces=Announcement::all()->take(-3);
        $msg='Finished';
        $t=array();
        $v_grades=V_grade::all()->where('subject_id',$id);
        $secret=Secret::all();
        $v_g=$v_grades->count();
        $s=$secret->count();
        $conf=Note::join('users_subjects','notes.folder','=','users_subjects.id')
            ->where('subject_id',$id)
            ->where('phase',3)->get('secret');


        if ($v_g==$s){
            $ph1=Note::join('users_subjects','notes.folder','=','users_subjects.id')
                ->where('subject_id',$id)
                ->where('phase',1)->where('secret',14)->get('note')->first();

            foreach ($secret as $nt){

                $t[]=[
                    'secret'=>$nt->id,
                    'ph1'=>Note::join('users_subjects','notes.folder','=','users_subjects.id')
                        ->where('subject_id',$id)
                        ->where('phase',1)->where('secret',$nt->id)->get('note')->first(),
                    'ph2'=>Note::join('users_subjects','notes.folder','=','users_subjects.id')
                        ->where('subject_id',$id)
                        ->where('phase',2)->where('secret',$nt->id)->get('note')->first(),
                    'ph3'=>Note::join('users_subjects','notes.folder','=','users_subjects.id')
                        ->where('subject_id',$id)
                        ->where('phase',3)->where('secret',$nt->id)->get('note')->first(),
                    'v_g'=>V_grade::where('secret',$nt->id)->where('subject_id',$id)->get('note')->first(),
                ];

            }


            return view('CFD.ShowGrades',[
                'grades'=>$t,
                'conflict'=>$conf,
                'Message'=>$msg,
                'Announces'=>$Announces,

            ]);
        }else{
            $msg='Not finished';
            return view('CFD.ShowGrades',[
                'Message'=>$msg,
                'grades'=>null,
                'Announces'=>$Announces,
            ]);
        }
    }
    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
