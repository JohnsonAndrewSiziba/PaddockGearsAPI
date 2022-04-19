<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Material;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MaterialsDataTableController extends Controller
{
    public function material(Request $request) {
        $data = Material::All();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/materials/$row->id'>View</a>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
