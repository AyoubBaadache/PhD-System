<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Note;
use App\Models\Secret;
use App\Models\Subject;
use App\Models\User;
use App\Models\Users_subject;
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
                $notes->secret  = $secret->id; // array_search($key) returns day id
                $notes->folder= $folder->id;
                $notes->save();
            }
        }
        $Announces=Announcement::all()->take(-3);

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
        if ($folder->phase=2){

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
            if ($length1=$length2){
                $this->compare($folder->subject_id,$notes1,$notes2);
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
                $note->save();
                $folder->t_copies= $folder->t_copies+1;
                $folder->update();

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
