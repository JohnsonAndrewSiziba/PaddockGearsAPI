<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Material;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JobMaterialsDatatableController extends Controller
{
    public function index(Request $request, $job_id){


//        if ($request->ajax()) {
        $data = Material::where('job_id',$job_id)->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/material/$row->id'>View</a>";
            })

            ->rawColumns(['action'])
            ->make(true);
//        }
    }
}
