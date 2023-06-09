<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Subject;
use App\Models\User;
use App\Models\User_subject;
use App\Models\Users_subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class teach_sub_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::all();
        $users=User::all()->where('role',3);//Teaches
        $Announces=Announcement::all()->take(-3);



        $t_sub=array();
        foreach ($subjects as $subject){
            $t_sub[]=[
                'id'=>$subject->id,
                'name'=>$subject->name,
                'copies'=>$subject->nbr_copies,

                'ph1'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',1)->where('subject_id',$subject->id)->get('user_id'),
                'c1'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',1)->where('subject_id',$subject->id)->get('t_copies') ,
                'ph2'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',2)->where('subject_id',$subject->id)->get('user_id'),
                'c2'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',2)->where('subject_id',$subject->id)->get('t_copies'),
                'ph3'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',3)->where('subject_id',$subject->id)->get('user_id'),
                'c3'=>Subject::join('users_subjects','subjects.id','=','users_subjects.subject_id')->where('phase',3)->where('subject_id',$subject->id)->get('t_copies'),
            ];
        }


        return view('CFD.AssignTeacher',([
            'subjects'=>$t_sub,
            'teachers'=>$users,
            'sub'=>$subjects,
            'Announces'=>$Announces,

        ]));
    }

    public function get_teacher(Request $request){

        //$subjects =$teacher->subjects()->get($teacher->id);


        $attributes = json_decode($request->dataValue, true);
        $atts = json_decode($request->dataValue2, true);
        $id =array();
        foreach ($attributes as $attribute){
            $id[]=$attribute['user_id'];
        }
        foreach ($atts as $att){
            $id[]=$att['user_id'];
        }
        $teachers=User::all()->where('role',3)->whereNotIn('id',$id);
        return \response()->json($teachers);
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

        $data =new Users_subject;
        $data->subject_id = $request->input('subject_id');
        $data->user_id = $request->input('teacher_id');

        $data->phase = $request->input('phase');
        if ( $data->phase==3){
            $data->t_copies =0;
        }else{
            $data->t_copies = $request->input('c_nbr');

        }
        $sub_nbr=Subject::where('id',$data->subject_id)->get('nbr_copies');
        $t_nbr=Users_subject::all()->
        where('subject_id',$data->subject_id)->
        where('phase',$data->phase)->sum('t_copies');

        $s_nbr=$sub_nbr[0]->nbr_copies;

        if ($data->t_copies+$t_nbr<=$s_nbr){
            $data->save();
        }
        else{
            return back()->withErrors(['msg' => 'You have exceeded the copies number']);
        }



        return back();
    }



    /**storing the third teacher**/
    public function store_third(Request $request)
    {
        $data =new Users_subject;
        $data->subject_id = $request->input('subject_id');
        $data->user_id = $request->input('teacher_id');
        $data->phase = 3;
        $data->t_copies = 0;
        $data->save();
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
