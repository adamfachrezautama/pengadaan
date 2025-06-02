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
        $department = Department::get();
        return view('layouts.department.index',[
            "departments" => $department,
        ]);
    }

    public function create(){
        return view('layouts.department.create');
    }

    public function edit(Department $department){
        return view('layouts.department.edit',[
            'department' => $department,
        ]);
    }

    public function update(Update $request, Department $department){
        return redirect();
    }

    public function store(Store $request){
        return redirect();
    }
}
