<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // public function index(Request $request): View
    // {
    //     //
    //     $perPage = 5;
    //     $keyword = $request->get('search');
    //     if (!empty($keyword)) {
    //         $student = Student::where('name', 'LIKE', "%$keyword%")
    //             ->orWhere('age', 'LIKE', "%$keyword%")
    //             ->latest()->paginate($perPage);

    //         }
    //      else {
    //         $student = Student::latest()->paginate($perPage);
    //     }



    //     $students = Student::all();
    //     return view ('students.index',['student' => $student])->with('students', $students, );
    //     // 'students', $students,
    // }
    public function index(Request $request): View
    {
        $perPage = 7;
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $students = Student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $students = Student::latest()->paginate($perPage);
        }

        return view('students.index', compact('students'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //  
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //


        $input = $request->all();
        Student::create($input);
        // return redirect('student')->with('flash_message', 'Student Addedd Successfully!');
        return redirect('student')->with('success', 'Student Addedd Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //

        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        // return redirect('student')->with('flash_message', 'student Updated!');  
        return redirect('student')->with('success', 'student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        Student::destroy($id);
        // return redirect('student')->with('flash_message', 'Student deleted!');
        return redirect('student')->with('success', 'Student deleted!');
    }
}