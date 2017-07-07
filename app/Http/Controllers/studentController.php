<?php

namespace App\Http\Controllers; // location of controller
use App\studentModel; // to include file
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\EditRequest;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;


class studentController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkauth');
    }

    public function index()
    {
//        $students = DB::table('student')OrderBy('id')->paginate(3);
        $students =studentModel::OrderBy('id','asc')->paginate(8);
//        $students = studentModel::all();
        return view('students.index', compact('students'));

    }
    /**
     * this method is used to  open student add form
     * @return response
     *
     */

    public function create()
    {
        return view('students.add');
    }
    /**
     * Store  new blog post.
     *
     * @param  CreateStudentRequest  $request
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {

        // To bcrypt password
        $password = $request->input("password");
        $bcryptPassword = bcrypt($password);

        $student = new studentModel();
        $student->FirstName = $request->input("firstname");
        $student->LastName = $request->input("lastname");
        $student->Gender = $request->input("gender");
        $student->Email = $request->input("email");
        $student->Password = $bcryptPassword ;

        //upload image

        if($request->file('image')){
            $imgname = $request->file('image');

            $imgnameori = $request->file('image')->getClientOriginalName();
            //$realpath = $request->file('image')->getRealPath();
           // Storage::disk('public')->put($imgname,file_get_contents($realpath));
            $imgname->move('images/',$imgnameori);

            $student->Image = $imgnameori;
        }


        $student->save();
        return redirect('students');

    }

    public function show($id){
        $students_detail= studentModel::find($id);
        return view('students.detail',compact('students_detail'));
    }


    /**
     * edit method is used to open form edit with old data
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        //$student = studentModel::where('id',$id)->first();
        //dd($student);exit;
        $student_data = studentModel::find($id);
        //dd($student_data);
        return view('students.edit',compact('student_data'));

    }

    /**
     * this method is used to update student
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     */


    public function update(Request $request,$id){

        $this->validate($request,array(
            'firstname' => 'required|Alpha',
            'lastname' => 'required|Alpha',
            'gender' => 'required',
            'email' => "required|email|unique:student,Email,$id",

        ));

        $update_student = studentModel::find($id);
        $update_student->FirstName = $request->firstname;
        $update_student->LastName = $request->lastname;
        $update_student->Gender = $request->gender;
        $update_student->Email = $request->email;
        $update_student->save();

        return redirect('students');
}

    /**
     * destroy delete data
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        studentModel::destroy($id);
        return redirect('students');
    }


    public function search(Request $request){
        $fname = $request->input('search_stu');
        $students =studentModel::OrderBy('id','asc')
            ->where('FirstName','LIKE','%'.$fname.'%')
            ->paginate(8);

        return view('students.index', compact('students'));
    }



}
