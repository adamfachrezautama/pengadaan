<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Department\Update;
use App\Http\Requests\Admin\Department\Store;


class DepartmentController extends Controller
{
    //

    public function index(){
        $department = Department::all();
        $department = Department::paginate(5);

        $query = request()->query('search');
        if($query){
            $department = Department::where('department_name','ILIKE',"%{$query}%")->paginate(5);
            $department->appends(['search' => $query]);
        }

        return view('department.index',compact('department'));
    }

    public function create(){
        return view('department.create');
    }

    public function store(Store $request){


       Department::create($request->validated());

        return redirect()->route('departments.index')->with('success', 'department berhasil ditambahkan');
    }

    public function show(Department $department){
        abort(404);
    }

     public function edit(Department $department){
        return view('department.edit',compact('department'));
    }

    public function update(Update $request, Department $department){
        $department->update($request->validated());
        return redirect()->route('departments.index')->with('success','Departemen Berhasil Diperbaharui');
    }

    public function destroy(Department $department){
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen Berhasil dihapus');
    }

}
