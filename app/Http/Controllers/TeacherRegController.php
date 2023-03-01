<?php

namespace App\Http\Controllers;

use App\models\TeacherRegModel;
use App\models\department;
use App\models\Assignments;
use App\models\assignment_status;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherRegController extends Controller
{
    //
    public function index(){
        return view ('teacher_login');
    }
    public function register(){
        $data['department']=DB::table('department')->orderBy('d_name','asc')->get();
        return view('teacher_reg',$data);
    }
    public function teacherreg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'email' => 'required|unique:students,email',
                'password' => 'required|min:3',
                'confirmpassword' => 'required|same:password',

            ]
        );
        $teachers = new TeacherRegModel();
        $teachers->t_name = $request->input('name');
        $teachers->t_email = $request->input('email');
        $teachers->t_d_id = $request->input('department');
        $teachers->t_gender = $request->input('gender');
        $teachers->t_address = $request->input('address');
        $teachers->t_password = Hash::make($request->input('password'));
        $teachers->dob = $request->input('dob');
        $teachers->save();
        return redirect('/teacher')->with('status', "Account Created Successfully.");
    }



    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required',
            'Password' => 'required',
        ]);

        $usr = TeacherRegModel::where([
            ['t_email', "=", $request->Email],
        ])->first();
        if ($usr) {
            if (Hash::check($request->Password, $usr->t_password)) {
                $request->session()->put('loginId', $usr->id);
                return redirect('teacher_dashboard');
            } else {
                return redirect('/teacher')->with('pass', "You Have Entered Wrong Password");
            }
        } else {
            return redirect('/teacher')->with('mail', "You Have Entered Wrong Email");
        }
    }

    public function dashboard(){ 
    {
            // $data = array();
            $todayDate = Carbon::now();
            if (Session::has('loginId')) {
                $sid =  Session::get('loginId');
                $data = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
                // $data1 = department::where('d_id', "=", $data->d_id)->first();
                return view('teacher_dashboard', compact('data', 'sid', 'todayDate'));
            }
        }
     
}




    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/teacher');
        }
    }
}
