<?php

namespace App\Http\Controllers;


use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class CandidateController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('candidates.profile');
    }

    public function candidateCitizens()
    {
        $citizens = User::where('type','=','citizen')->get();
        return view('candidates.citizen')->with('citizens',$citizens);
    }

    public function editCitizen($id)
    {
        $citizen = User::find($id);
        return view('candidates.editCitizen')->with('citizen',$citizen);
    }

    public function updateCitizen(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'birthday' => 'required']);
        
        $citizen = User::find($id);
        $citizen->name = $request->input('name');
        $citizen->email = $request->input('email');
        $citizen->birthday = $request->input('birthday');
        $citizen->save();
        
        return redirect('/candidate/citizens')->with('success','Information Updated Successfully');
    }
}
