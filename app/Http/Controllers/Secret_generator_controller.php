<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Secret;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Secret_generator_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $Announces=Announcement::all()->take(-3);
        $codes=User::join('secrets','users.id','=','secrets.user_id')->where('role', 4)->get();
        return view('ViceDean.code')->with('users',$codes,)->with('Announces',$Announces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all()->where('role',4);

        $data=array();
        foreach ($users as $user){
            $random = rand(100000,999999);
            $data[]=[
                'user_id'=>$user->id,
                'secret_code'=>$random
            ];

        }

        Secret::insert($data);
        return redirect('/vd/code');
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
