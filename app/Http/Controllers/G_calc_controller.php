<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Final_grade;
use App\Models\Secret;
use App\Models\Subject;
use App\Models\User;
use App\Models\V_grade;
use Illuminate\Http\Request;

class G_calc_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sbjct =Subject::all();

        $sub=Subject::all()->count();
        $secret=Secret::all()->count();
        $v_d=V_grade::all()->count();
        $Announces=Announcement::all()->take(-3);
        $nt_nbr=$sub*$secret;
        $f_grades=Final_grade::orderBy('Final_AVG','DESC')->join('secrets','final_grades.secret','=','secrets.id')->get();
        $fgrades=Final_grade::orderBy('Final_AVG','DESC')->join('secrets','final_grades.secret','=','secrets.id')->join("users","secrets.user_id","=","users.id")->get()->take(3);

        $f_count=$f_grades->count();
        if(\Auth::user()->role == 2)
        return view('CFD.Rnking',[
            'nt_nbr'=>$nt_nbr,
            'vd_nbr'=>$v_d,
            'f_grades'=>$f_grades,
            'nbr'=>$f_count,
            'Announces'=>$Announces,
            'sbjcts'=>$sbjct,

        ]);
else{
    return view('Participant.Ranking',[
        'nt_nbr'=>$nt_nbr,
        'vd_nbr'=>$v_d,
        'fgrades'=>$fgrades,
        'nbr'=>$f_count,
        'Announces'=>$Announces,
        'sbjcts'=>$sbjct,

    ]);
}
    }
    /**calculate the grades**/

    public function f_calc()
    {
        $ranking=3;
        $secret=Secret::all();
        $sub=Subject::all()->count();
        foreach ($secret as $s){
            $avg =(V_grade::all()->where('secret',$s->id)->sum('note'))/$sub;
            if(!Final_grade::where('secret',$s->id)->exists()){
                $data=new Final_grade();
                $data->secret  = $s->id;
                $data->Final_AVG  = $avg;
                $data->save();
            }else{
                Final_grade::where('secret',$s->id)->update(
                    [
                        'Final_AVG'=>$avg,
                    ]
                );
            }

        }
        $f=Final_grade::orderBy('Final_AVG','DESC')->get();
        foreach ($f as $f_r){
            if ($ranking>0){
                Final_grade::where('secret',$f_r->secret)->update(
                    [
                        'status'=>'Admitted',
                    ]
                );
                $ranking=$ranking-1;

            }else{
                Final_grade::where('secret',$f_r->secret)->update(
                    [
                        'status'=>'refused',
                    ]
                );
            }
        }
        return back();
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
