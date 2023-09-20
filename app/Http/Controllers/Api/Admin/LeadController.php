<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function addLead(Request $request)
    {
        $rules = array(
            'userId' => 'required',
            'hospitalId' => 'required',
            'type' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $date = Carbon::now()->toDateString();
        $lead = new Lead();
        $lead->userId = $request->userId;
        $lead->hospitalId = $request->hospitalId;
        $lead->date = $date;
        $lead->hospitalId = $request->hospitalId;
        $lead->type = $request->type;
        $lead->save();

        if ($lead) {
            $response = [
                'success' => true,
                'data' => $lead,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['There is a problem with your input']
            ], 200);
        }
    }
}
