<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialsCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobId = $request->job_id;
        $material = $request->material;
        $description = $request->description;
        $supplier = $request->supplier;
        $amount = $request->amount;
        $budget = $request->budget;
        $variance = $request->variance;


        $materialModel = new Material();
        $materialModel->job_id = $jobId;
        $materialModel->material = $material;
        $materialModel->description = $description;
        $materialModel->supplier = $supplier;
        $materialModel->amount = $amount;
        $materialModel->budget = $budget;
        $materialModel->variance = $variance;
        $materialModel->save();
        return $materialModel;






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
