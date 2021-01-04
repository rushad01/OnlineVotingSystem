<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('admins.profile');
    }
    
    public function adminCitizens()
    {
        $citizens = User::where('type','=','citizen')->get();
        return view('admins.citizen')->with('citizens',$citizens);
    }


    public function editCitizen($id)
    {
        $citizen = User::find($id);
        return view('admins.editCitizen')->with('citizen',$citizen);
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
        
        return redirect('/admin/citizens')->with('success','Citizen Updated Successfully.');
    }

    public function destroyCitizen(){

    }

    public function adminCandidates(){
        $candidates = User::where('type','=','candidate')->get();
        return view('admins.candidate')->with('candidates',$candidates);
    }

    public function editCandidate($id)
    {
        $candidate = User::find($id);
        return view('admins.editCandidate')->with('candidate',$candidate);
    }

    public function updateCandidate(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'birthday' => 'required']);
        
        $candidate = User::find($id);
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->birthday = $request->input('birthday');
        $candidate->save();

        return redirect('/admin/candidates')->with('success','Candidate Information Updated');
    }

    public function destroyCandidate()
    {

    }
}
