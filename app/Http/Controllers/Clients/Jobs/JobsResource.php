<?php

namespace App\Http\Controllers\Clients\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsResource extends Controller
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
        $job = new Job();
        $job->date = $request->date;
        $job->customer_name = $request->customer_name;
        $job->description = $request->description;
        $job->quantity = $request->quantity;
        $job->quotation_amount = $request->quotation_amount;
        $job->quotation_number = $request->quotation_number;
        $job->work_in_progress = $request->work_in_progress;
        $job->order_number = $request->order_number;
        $job->invoice_number = $request->invoice_number;
        $job->invoice_amount = $request->invoice_amount;
        $job->department_id = $request->department_id;
        $job->delivery_note_number = $request->delivery_note_number;
        $job->save();

        return $job;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return Job::with('department')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $job->date = $request->date;
        $job->customer_name = $request->customer_name;
        $job->description = $request->description;
        $job->quantity = $request->quantity;
        $job->quotation_amount = $request->quotation_amount;
        $job->quotation_number = $request->quotation_number;
        $job->work_in_progress = $request->work_in_progress;
        $job->order_number = $request->order_number;
        $job->invoice_number = $request->invoice_number;
        $job->invoice_amount = $request->invoice_amount;
        $job->department_id = $request->department_id;
        $job->delivery_note_number = $request->delivery_note_number;
        $job->save();

        return $job;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return true;
    }
}
