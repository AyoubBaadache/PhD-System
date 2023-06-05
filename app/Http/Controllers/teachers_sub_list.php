<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Users_subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teachers_sub_list extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()){
            $id=Auth::id();
            $role=Auth::user()->role;
            $Announces=Announcement::all()->take(-3);

            if ($role=3){
                $subs=Users_subject::all()->where('user_id',$id);

                return view('teacher.sub_list',([
                    'subjects'=>$subs,
                    'Announces'=>$Announces,

                ]));
            }else {abort('403');}
        }else{return redirect('login');}

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
