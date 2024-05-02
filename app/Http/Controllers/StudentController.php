<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('student.index',compact('students'))
        ->with("1",(request()->input('page',1)-1)*5);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create')
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
'studname'->'required',
'course'->'required',
'fee'->'required'

        ])

        //
    }

    /**
     * Display the specified resource.
     */


    public function show(Studentapp $studentapp)
    {
       return view('students.show',compact('student'))
        //
    }
public function store(Request $request){

    $request->validate([
        'studname'->'required',
        'course'->'required',
        'fee'->'required'

    ])
Student::create($request->all());
return redirect()->route('students.index')
->with('success'.'Students created successsfully.');

}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studentapp $studentapp)
    {

    return view('students.edit',compact('student'))
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studentapp $studentapp)
    {
       $request->validate([]);
       $student ->update($request->all());
       return redirect()->route('students_index')
       ->with('success','student updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studentapp $studentapp)
    {
      $student->delete();
      return redirecr()->route('students.index')
      ->with('success','Student deleted succesfully');

        //
    }
}
