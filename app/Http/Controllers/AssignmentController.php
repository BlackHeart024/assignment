<?php

namespace App\Http\Controllers;

use App\models\TeacherRegModel;
use Session;
use Illuminate\Http\Request;
use App\Models\questions;
use App\Models\Assignments;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    //
    public function index(){
        $data = [];
        $data['data'] = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
        $d_id = $data['data']->t_d_id ?? null;
        $data['data1'] = DB::table('department')->where('d_id',$d_id)->first();;
        return view('create_assignment',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.subject' => 'required'
        ]);
//  echo "<pre>";
//         print_r($request->all());
        $assignments = new Assignments();
        $assignments->id = $request->input('id');
        $assignments->assignment_name = $request->input('assignment_name');
        $assignments->t_id = $request->input('t_id');
        $assignments->d_id = $request->input('d_id');
        $assignments->semester = $request->input('semester');
        $assignments->submission_d_t = $request->input('submission_d_t');
        $assignments->save();

        foreach ($request->addmore as $key => $value) {
        $questions = new questions();
            $questions->a_id = $request->input('id');
            $questions->marks_contain = $request->input(101);
            $questions = new questions();
            $questions->a_id = $request->input('id');
            $questions->question =$value['name'];
            $questions->marks_contain = $value['qty'];
            $questions->save();
            
        //     // questions::create($questions);
           
        }
     return redirect('teacher_view_assignment');
        // return back()->with('success', 'New subject has been added.');
    }
    public function view(){
        $assignments = Assignments::all();
        $data = compact('assignments');
        return view('view_assignments')->with($data);
    }
}
