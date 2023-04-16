<?php

namespace App\Http\Controllers;
use App\models\Assignments;
use App\models\questions;
use App\models\subAns;
use App\models\assignment_status;
use Illuminate\Http\Request;
use Session;

class viewQuestionController extends Controller
{
    public function viewQuestion($id)
    {
        if (Session::has('loginId')) {
            $id1 = Session::get('loginId');
            $data = questions::all()->where('a_id', "=", $id);
            return view('viewQuestion', compact('data', 'id1', 'id'));
        }
    }

    // public function delete($id)
    // {
    //     echo $id;
    //     die;
    // }
    public function submitAns(Request $request, $stu_id, $ass_id)
    {
       $questions = $request->get('q_id');
       $answerInput = $request->get('answer');
       foreach($questions as $key => $quesId){
            $answer = new subAns();
            $answer->student_id = $stu_id;
            $answer->question_id = $quesId;
            $answer->assignment_id = $ass_id;
            $answer->answers = isset($answerInput[$key])? $answerInput[$key] : '';
            $answer->save();
       }
    //    while($new>=2){
    //     $ans = $request->answer[$new-2];
    //     if(!empty($ans)){
    //         $answer = new subAns();
    //         $answer->student_id = $stu_id;
    //         $answer->question_id = $request->q_id[$new-2];
    //         $answer->assignment_id = $ass_id;
    //         $answer->answers = $ans;
    //         $answer->save();}
    //         $new--;
    //     }


       $name1 = $request->file('pdffile');
       if(!empty($name1)){
        $name1 = $request->file('pdffile')->getClientOriginalName();
        $file1 = $name1.'-'.time().'.'.$request->file('pdffile')->getClientOriginalExtension();
        $request->file('pdffile')->move('pdf',$file1);
        $answer = new subAns();
        $answer->student_id = $stu_id;
        $answer->question_id = "0";
        $answer->assignment_id = $ass_id;
        $answer->answers = $file1;
        $answer->save();
       }
        $As_s = new assignment_status();
        $As_s->student_id = $stu_id;
        $As_s->a_id= $ass_id;
        $As_s->status = 1;
        $As_s->save();
       
      
       return redirect('dashboard')->with('assign', "Your Assignment Submitted Successfully");
    }
}