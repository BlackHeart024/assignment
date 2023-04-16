<?php

namespace App\Http\Controllers;

use App\models\TeacherRegModel;
use Session;
use Illuminate\Http\Request;
use App\Models\questions;
use App\Models\Assignments;
use App\Models\subAns;
use App\Models\assignment_status;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    //
    public function index(){
        $data = [];
        $data['data'] = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
        $d_id = $data['data']->t_d_id ?? null;
        $data['data1'] = DB::table('department')->where('d_id',$d_id)->first();
        return view('create_assignment',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.subject' => 'required'
        ]);
//  echo "<pre>";
//         print_r($request->all());
        $teacherDetails = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
        $assignments = new Assignments();
        // $assignments->id = $request->input('id');
        $assignments->assignment_name = $request->input('assignment_name');
        $assignments->t_id = $teacherDetails->t_id;
        $assignments->d_id = $teacherDetails->t_d_id;
        $assignments->semester = $request->input('semester');
        $assignments->submission_d_t = $request->input('submission_d_t');
        $assignments->save();

        foreach ($request->addmore as $key => $value) {
        // $questions = new questions();
            // $questions->a_id = $assignments->id;
            // $questions->marks_contain = $request->input(101);
            $questions = new questions();
            $questions->a_id = $assignments->id;
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
        $data = [];
        $data['data'] = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
        $d_id = $data['data']->t_d_id ?? null;
        $data['data1'] = DB::table('department')->where('d_id',$d_id)->first();
        $data['assignments'] = $assignments;
        return view('view_assignments')->with($data);
    }
    public function editAssignment($id){
        $data = [];
        $data['data'] = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
        $d_id = $data['data']->t_d_id ?? null;
        $data['data1'] = DB::table('department')->where('d_id',$d_id)->first();;
        return view('create_assignment',$data);
    }

    public function deleteAssignment($id) {
        $assignments = Assignments::find($id);
        if(!empty($assignments)) {
            questions::where('a_id', $id)->delete();
            assignment_status::where('a_id', $id)->delete();
            subAns::where('assignment_id', $id)->delete();
            $assignments->delete();
            return redirect()->route('assignment.view');
        }else{
            return "Assignment not found!";
        }
    }
    public function submittedAssignment($id) {
        $assignments = Assignments::find($id);
        if(!empty($assignments)) {
            $data = [];
            $data['data'] = TeacherRegModel::where('t_id', "=", Session::get('loginId'))->first();
            $d_id = $data['data']->t_d_id ?? null;
            $data['data1'] = DB::table('department')->where('d_id',$d_id)->first();
            $data['assignmentDetails'] = $assignments;
            // $data['data3'] = assignment_status::select()
            //                     ->leftJoin('assignments', 'assignments.id', '=', 'assignment_statuses.a_id')
            //                     ->where('a_id', $id)
            //                     ->get();
            $data['submittedAns'] = subAns::select('students.name', 'students.roll_no', 'students.semester','questions.question', 'sub_ans.answers','sub_ans.created_at', 'sub_ans.question_id')
                                    ->leftJoin('assignments', 'assignments.id', '=', 'sub_ans.assignment_id')
                                    ->leftJoin('students', 'students.id', '=', 'sub_ans.student_id')
                                    ->leftJoin('questions', 'questions.q_id', '=', 'sub_ans.question_id')
                                    ->where('assignment_id', $id)
                                    ->get();
                                
            return view('viewSubmittedAssignment', $data);
        }else{
            return "Assignment not found!";
        }
    }
}
