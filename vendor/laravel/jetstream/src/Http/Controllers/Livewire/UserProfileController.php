<?php

namespace Laravel\Jetstream\Http\Controllers\Livewire;
use App\Models\Announcement;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $Announces = Announcement::all()->take(-4);
        $sbjct =Subject::all();

        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
            'Announces' => $Announces,
                        'sbjcts'=>$sbjct,

        ]);
    }
}
