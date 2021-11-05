<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Peoples;
use Illuminate\Support\Facades\Validator;

class PeoplesController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('full_name' => 'unique:peoples');
        $input['full_name'] = $request->full_name;
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $request->validate([
            'full_name' => 'required',
            'brithday_age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'career' => 'required',
        ]);

        Peoples::create($request->all());
        return $this->sendResponse($request->all(), 'Created with successfull!!');
    }
}
