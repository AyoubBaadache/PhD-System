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
                1 => redirect('vd/home'),
                2 => redirect('cfd/home'),
                3 => redirect('teacher/announcements'),
                4 => redirect('participant/announcements'),
            };
        }
    }
}
