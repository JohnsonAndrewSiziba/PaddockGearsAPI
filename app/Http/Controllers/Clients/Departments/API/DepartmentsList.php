<?php

namespace App\Http\Controllers\Clients\Departments\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsList extends Controller
{
    public function index(){
        return Department::all();
    }
}

