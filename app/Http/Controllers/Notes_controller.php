<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Note;
use App\Models\Secret;
use App\Models\Subject;
use App\Models\User;
use App\Models\Users_subject;
use App\Models\V_grade;
use Illuminate\Http\Request;

class Notes_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data=array();
        $data2=array();
        $folder=Users_subject::all()->where('id',$id)->first();
        $Announces=Announcement::all()->take(-3);
        if(!Note::where('folder',$id)->exists()){
            $OTHER_T_F=Users_subject::all()
                ->where('subject_id',$folder->subject_id)
                ->where('phase',$folder->phase)
                ->whereNotIn('id',$folder->id);
            foreach ($OTHER_T_F as $other){
                $data[]= $other->id;

            }

            $students=Note::whereIN('folder',$data)->get('secret');
            foreach ($students as $student){
                $data2[]= $student->secret;

            }

            $secrets=Secret::all()->whereNotIn('id',$data2)->take($folder->t_copies);

            foreach ($secrets as $secret){
                $notes=new Note();
                $notes->secret  = $secret->id;
                $notes->folder= $folder->id;
                $notes->save();
            }
        }

        $note_student=Note::join('secrets','notes.secret','=','secrets.id')->where('folder',$folder->id)->get();
        return view('teacher.Grades',[
            'students'=>$note_student,
            'folder'=>$folder,
            'Announces'=>$Announces,

        ]);

    }

    /**
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

        $f_id=$request->folder_id;
        $data=array();
        $data2=array();
        $length=count($request->secret_id);
        for ($i=0;$i< $length;$i++){

            Note::where('secret',$request->secret_id[$i])->where('folder',$f_id)->update(
                [
                    'note'=>$request->student_mark[$i],
                ]
            );
        }

        $folder=Users_subject::where('id',$f_id)->first();
        if ($folder->phase==2){

            $folders=Users_subject::where('subject_id',$folder->subject_id)->where('phase',1)->get();
            foreach ($folders as $fd){
                $data[]= $fd->id;
            }
            $folders=Users_subject::where('subject_id',$folder->subject_id)->where('phase',2)->get();
            foreach ($folders as $fd){
                $data2[]= $fd->id;
            }
            $notes1=Note::all()->whereIn('folder',$data);
            $notes2=Note::all()->whereIn('folder',$data2);
            $length1=count($notes1);
            $length2=count($notes2);
            if ($length1==$length2){
                $this->compare($folder->subject_id,$notes1,$notes2);
            }

        }else{
            if ($folder->phase==3){
                $notes3=Note::all()->where('folder',$f_id);
                $this->compare_third($notes3,$f_id);
            }
        }
        return back();
    }
    /**
     * compare between phase1 and phase2 marks.
     */

    public function compare(int $a, $n1, $n2)
    {

        $notes1=array();
        $notes2=array();
        $secret_ids=array();
        $folder=Users_subject::where('subject_id',$a)
            ->where('phase',3)->first();
        foreach ($n2 as $n){
            $notes2[]= $n->note;
        }
        foreach ($n1 as $n){
            $notes1[]= $n->note;
            $secret_ids[]=$n->secret;
        }
        $length=count($notes1);
        for ($i=0;$i< $length;$i++){

            $conflict=abs($notes1[$i]-$notes2[$i]);

            if ($conflict>=3){
                $note=new Note();
                $note->secret  = $secret_ids[$i];
                $note->folder= $folder->id;

                if (Note::where('folder',$note->folder)->where('secret',$note->secret)->exists()){
                    $note->update();


                }else{
                    $note->save();
                    $folder->t_copies= $folder->t_copies+1;
                    $folder->update();

                }
            }else{
                $f=Users_subject::where('id',$folder->id)->first();
                $n= ($notes1[$i]+$notes2[$i])/2;

                $note_v=new V_grade();
                $note_v->secret  = $secret_ids[$i];
                $note_v->subject_id  = $f->subject_id;
                $note_v->note  = $n;
                if (V_grade::where('subject_id',$note_v->subject_id)->where('secret',$note_v->secret)->exists()){

                    V_grade::where('subject_id',$note_v->subject_id)->where('secret',$note_v->secret)->update(
                        [
                            'note'=>$note_v->note,
                        ]
                    );

                }else{
                    $note_v->save();
                }

            }
        }



    }

    /**
     * Comparing the conflicts with the 3 teachers
     */
    public function compare_third( $n3,$f_id)
    {
        $secret=array();
        $note1=array();
        $note2=array();
        $note3=array();
        $folder3=Users_subject::where('id',$f_id)->first();
        foreach ($n3 as $n){
            $secret[]= $n->secret;
            $note3[]=$n->note;
        }
        $n1=Note::join('users_subjects','notes.folder','=','users_subjects.id')->where('subject_id',$folder3->subject_id)->where('phase',1)->whereIN('secret',$secret)->get();
        $n2=Note::join('users_subjects','notes.folder','=','users_subjects.id')->where('subject_id',$folder3->subject_id)->where('phase',2)->whereIN('secret',$secret)->get();
        foreach ($n1 as $n){
            $note1[]= $n->note;
        }
        foreach ($n2 as $n){
            $note2[]= $n->note;
        }
        $length=count($note1);
        for ($i=0;$i< $length;$i++){
            $c1=abs($note1[$i]-$note2[$i]);
            $c2=abs($note2[$i]-$note3[$i]);
            $c3=abs($note1[$i]-$note3[$i]);
            if ($c1<$c2&$c1<$c3){
                $avg=($note1[$i]+$note2[$i])/2;
            }else{
                if ($c2<$c1&$c2<$c3){
                    $avg=($note2[$i]+$note3[$i])/2;
                }else{
                    if ($c3<$c1&$c3<$c2){
                        $avg=($note1[$i]+$note3[$i])/2;
                    }else{
                        if ($c1==$c2 | $c1==$c3 |$c2==$c3){
                            $n_list=[$note1[$i],$note2[$i],$note3[$i]];
                            $max=max($n_list);
                            $s_max = max(array_diff($n_list, [$max]));
                            $avg=($max+$s_max)/2;
                        }
                    }
                }
            }
            $note_v=new V_grade();
            $note_v->secret  = $secret[$i];
            $note_v->subject_id  = $folder3->subject_id;
            $note_v->note  = $avg;
            if (V_grade::where('subject_id',$note_v->subject_id)->where('secret',$note_v->secret)->exists()){
                V_grade::where('secret',$note_v->secret)->where('subject_id',$note_v->subject_id)->update(
                    [
                        'note'=>$note_v->note,
                    ]
                );

            }else{
                $note_v->save();
            }
        }
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
