<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function allJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;

        return [
            "jobs" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->get(),
            "invoice_amount" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->sum("invoice_amount"),
        ];
    }

    public function workInProgress(Request $request) {
        $from = $request->from;
        $to = $request->to;

        return [
            "jobs" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->where('work_in_progress', '<', 100)->get(),
            "quotation_amt_sum" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->sum("quotation_amount"),
        ];
    }

    public function finishedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;

        return [
            "jobs" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->where('work_in_progress', '>=', 100)->get(),
            "invoice_amount" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->sum("invoice_amount"),
        ];
    }

    public function invoicedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;

        return [
            "jobs" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->where('invoice_number', '!=', null)->get(),
            "invoice_amount" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->sum("invoice_amount"),
        ];
    }

    public function collectedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;

        return [
            "jobs" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->where('delivery_note_number', '!=', null)->get(),
            "invoice_amount" => Job::where('date', '>=', $from)->where('date', '<=', $to)
                ->sum("invoice_amount"),
        ];
    }
}
