<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use App\Models\Announcement;
Use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index(){
        $Announces =  Announcement::all();
        $user = user::all() -> whereNotIn ( 'role' , 0);
        if(\Auth::user()->role==0)
        return view ("Admin.UsersManagement")->with('users',$user)->with('Announces',$Announces);
        else
            abort('403') ;
    }
    public
    function store (
        Request $request
    )
    : \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse {


        User ::create ( [
            'fname'       => $request -> fname ,
            'ar_fname'       => $request -> ar_fname ,
            'lname'   => $request -> lname ,
            'ar_lname'   => $request -> ar_lname ,
            'birthdate' => $request -> birthdate ,
            'role'       => $request ->role,
            'email'      => $request -> email ,
            'password'   => Hash ::make ( $request -> password ) ,
            'age'        => $request -> age ,

        ] );
        return back ();
    }

    public function update (Request $request){
        $user =User::find ( $request -> user_edit_id );
        $user -> fname     = $request -> input ( 'Fname' );
        $user -> ar_fname     = $request -> input ( 'ar_Fname' );
        $user -> lname = $request -> input ( 'Lname' );
        $user -> ar_lname = $request -> input ( 'ar_Lname' );
        $user -> birthdate   = $request -> input ( 'Birthdate' );
        $user -> save ();
        return back ();
    }
    public function destroy (Request $request) {
        $user = User ::find ( $request -> user_delete_id );
        $user -> delete ();
        return back ();

    }

}
