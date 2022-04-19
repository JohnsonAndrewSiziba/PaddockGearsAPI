<?php

namespace App\Http\Controllers\Clients\Jobs\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Jobs extends Controller
{
    public function index(Request $request){
//        if ($request->ajax()) {
            $data = Job::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    return "<a href='/#/jobs/$row->id'>View</a>";
                })
                ->addColumn('materialsactipn', function($row) {
                    return "<a href='/#/materials-job/$row->id'>View</a>";
                })
                ->rawColumns(['action'])
                ->rawColumns(['materialsactipn'])
                ->make(true);
//        }
    }


    public function wip(Request $request) {
        $data = Job::where ("work_in_progress", '<', 100)->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/jobs/$row->id'>View</a>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function finished(Request $request) {
        $data = Job::where ("work_in_progress", '>=', 100)->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/jobs/$row->id'>View</a>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function invoiced(Request $request) {
        $data = Job::where ("invoice_number", '!=', null)->get();
//        dd($data);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/jobs/$row->id'>View</a>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function collected(Request $request) {
        $data = Job::where ("delivery_note_number", '!=', null)->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return "<a href='/#/jobs/$row->id'>View</a>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }






}
