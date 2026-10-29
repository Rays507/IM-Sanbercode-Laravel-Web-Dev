<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Profile;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user();
        $dataUsers = user::find($currentUser->id);
        // dd($dataUsers->profile);
        if($dataUsers->profile)
            {
                $profile = profile::where('user_id', $dataUsers->id)->first();
                return view('profile.update', ['profile' => $profile]);
            }else{
                return view('profile.create');
            }
    }

    // public function getIdUsers()
    // {
    //     $currentUser = Auth::users()->profile->id;
    //     $dataUsers = users::find()->$currentUser->id;
    //     dd($dataUsers);
    //     
    // }

    /**
     * 
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $currentUser = Auth::user();
        $dataUsers = user::find($currentUser->id);
        // dd($dataUsers->profile);
        if($dataUsers->profile)
            {
                $profile = profile::where('user_id', $dataUsers->id)->first();
                return view('profile.update', ['profile' => $profile]);
            }else{
                return view('profile.create');
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $dataPostRequest)
    {
        //validasi data inputan
        $dataPostRequest->validate([
            'age' => ['required'],
            'bio' => ['required']
        ],
        [
            "required"=>"inputan wajib diisi",
        ]);

        $dataUserNow = auth::user();
        $profile = new Profile;

        $profile -> age = $dataPostRequest->input('age');
        $profile -> bio = $dataPostRequest->input('bio');
        $profile -> user_id = $dataUserNow->id;

        $profile->save();
        return redirect('/profile')->with('success', 'Data profile Berhasil Dibuat');

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
    public function update(Request $dataPostRequest, string $id)
    {
        $dataPostRequest->validate([
            'age' => ['required'],
            'bio' => ['required']
        ],
        [
            "required"=>"inputan wajib diisi",
        ]);

        $dataUserNow = auth::user();
        $profile = profile::where('user_id', $dataUserNow->id)->first();

        $profile -> age = $dataPostRequest->input('age');
        $profile -> bio = $dataPostRequest->input('bio');
        $profile -> user_id = $dataUserNow->id;

        $profile->save();
        return redirect('/profile/create')->with('success', 'Data profile Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
