<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MY_Controller extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $role=Auth::user()->role;

            return match ($role) {
                0 => redirect('admin/home'),
                1 => redirect('vd/code'),
                2 => redirect('cfd/assignTeachers'),
                3 => redirect('teacher/home'),
                4 => redirect('participant/home'),
                default => redirect('users/announcements'),
            };
        }
    }
}
