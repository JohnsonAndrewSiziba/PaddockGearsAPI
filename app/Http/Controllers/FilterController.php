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
        return;
    }

    public function finishedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;
        return;
    }

    public function invoicedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;
        return;
    }

    public function collectedJobs(Request $request) {
        $from = $request->from;
        $to = $request->to;
        return;
    }
}
