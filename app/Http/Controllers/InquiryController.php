<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allinquiry = Inquiry::all();
        if ($allinquiry) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $allinquiry
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        }
    }
    public function limitedinquiry()
    {
        $limitedinquiry = Inquiry::orderBy("created_at", "desc")->limit(3)->get();
        if ($limitedinquiry) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $limitedinquiry
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = new Inquiry();
        $rules = [
            'title_gender' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email_inquiry' => 'required',
            'phone' => 'required',
            'post_code' => 'required',
            'company_name' => 'required',
            'company_location' => 'required',
            'type_project' => 'required',
            'subject_inquiry' => 'required',
            'message_inquiry' => 'required',
            'project_file' => 'required|mimes:jpg,jpeg,pdf,tif,tiff,gif,docx,doc,xls,xlsx',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Mengirim Inquiri',
                'data' => $validator->errors()
            ], 401);
        }
        $data->title_gender = $request->title_gender;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email_inquiry = $request->email_inquiry;
        $data->phone = $request->phone;
        $data->post_code = $request->post_code;
        $data->company_name = $request->company_name;
        $data->company_location = $request->company_location;
        $data->type_project = $request->type_project;
        $data->subject_inquiry = $request->subject_inquiry;
        $data->message_inquiry = $request->message_inquiry;
        if ($request->project_file) {
            $filename = $request->company_name;
            $extension = $request->project_file->extension();
            Storage::putFileAs('public/projectfile', $request->project_file, $filename . '.' . $extension);
        };
        $data->project_file = $filename . '.' . $extension;

        $data->save();
        return response()->json([
            'status' => true,
            'message' => 'Inquiry has been sent',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailinquiry = Inquiry::find($id);
        return response()->json([
            'status' => true,
            'message' => 'Data Found',
            'data' => $detailinquiry
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
