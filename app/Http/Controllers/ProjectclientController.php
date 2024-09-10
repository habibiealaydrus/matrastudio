<?php

namespace App\Http\Controllers;

use App\Models\Projectclient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectclientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Projectclient::all();
        return response()->json([
            "status" => true,
            "message" => "Data Found",
            "data" => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $newProjectclient = new Projectclient();
        $rules = [
            'projectclient_name' => 'required',
            'projectclient_img' => 'required'
        ];
        //dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal tambah client',
                'data' => $validator->errors()
            ], 401);
        }
        $newProjectclient->projectclient_name = $request->projectclient_name;
        if ($request->projectclient_img) {
            $filename = $request->projectclient_name;
            $extension = $request->projectclient_img->extension();
            Storage::putFileAs('public/projectclients', $request->projectclient_img, $filename . '.' . $extension);
        };
        $newProjectclient->projectclient_img = $filename . '.' . $extension;
        $newProjectclient->save();
        return response()->json([
            'status' => true,
            'message' => 'Project Client Image has been added',
            'data' => $newProjectclient,
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
        $detail = Projectclient::find($id);
        return response()->json([
            'status' => true,
            'message' => 'Data Found',
            'data' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projectclient $projectclient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projectclient $projectclient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteimage = Projectclient::find($id);
        $targetimg = $deleteimage->projectclient_img;
        Storage::disk('local')->delete('public/projectclients/' . $targetimg);
        $deleteimage->delete();
        if ($deleteimage) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Project Client Image deleted',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Project Client Image Not deleted'
                ]
            );
        }
    }
}
