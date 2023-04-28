<?php

namespace App\Http\Controllers;
Use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $user = user::all() -> whereNotIn ( 'role' , 0);;
        return view ("Admin.UsersManagement")->with('users',$user);
    }
    public  function store (Request $request){
        $input = $request->all();
        User::create($input);
        return redirect('admin\users');
    }
    public function update (Request $request){
        $user =User::find ( $request -> user_edit_id );
        $user -> fname     = $request -> input ( 'Fname' );
        $user -> ar_fname     = $request -> input ( 'ar_Fname' );
        $user -> lname = $request -> input ( 'Lname' );
        $user -> ar_lname = $request -> input ( 'ar_Lname' );
        $user -> birthdate   = $request -> input ( 'Birthdate' );
        $user -> save ();
        return back ();    }
    public function destroy (Request $request) {
        $user = User ::find ( $request -> user_delete_id );
        $user -> delete ();
        return back ();

    }
}
