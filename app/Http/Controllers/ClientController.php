<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allclient = Client::all();

        if ($allclient) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $allclient,
                "url" => url("")
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }

    /**
     * Show the form for creating a new resource.
     */
    public function limitedclient()
    {
        $limitedclient = Client::orderBy('created_at', 'desc')->limit(6)->get();
        if ($limitedclient) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $limitedclient
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }
    public function detailclient($id)
    {
        $detailclient = Client::find($id);
        if ($detailclient) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $detailclient
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        }
    }
    public function create(Request $request)
    {
        $newclient = new Client();
        $rules = [
            'type_project' => 'required',
            'name_client' => 'required',
            'logo_client' => 'required|mimes:jpeg,jpg,png,gif',
            'project_name' => 'required',
            'main_pic' => 'required',
            'article' => 'required',
            'location' => 'required',
            'year' => 'required',
            'pic1' => 'required|mimes:jpeg,jpg,png,gif',
            'pic2' => 'required|mimes:jpeg,jpg,png,gif'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menambahkan Client',
                'data' => $validator->errors()
            ], 401);
        }

        $newclient->type_project = $request->type_project;
        $newclient->name_client = $request->name_client;
        $newclient->project_name = $request->project_name;
        if ($request->main_pic) {
            $filename1 = $request->project_name . " main pic";
            $extension = $request->main_pic->extension();
            Storage::putFileAs('public/projectpicture', $request->main_pic, $filename1 . '.' . $extension);
        };
        $newclient->main_pic = $filename1 . '.' . $extension;
        $newclient->article = $request->article;
        $newclient->location = $request->location;
        $newclient->year = $request->year;
        $newclient->energy_savings = $request->energy_savings;
        $newclient->water_savings = $request->water_savings;
        $newclient->carbon_reduction = $request->carbon_reduction;
        if ($request->designer1) {
            $newclient->designer1 = $request->designer1;
        };
        if ($request->designer2) {
            $newclient->designer2 = $request->designer2;
        };
        if ($request->designer3) {
            $newclient->designer3 = $request->designer3;
        };
        if ($request->designer4) {
            $newclient->designer4 = $request->designer4;
        };
        if ($request->designer5) {
            $newclient->designer5 = $request->designer5;
        };
        if ($request->energy_savings) {
            $newclient->energy_savings = $request->energy_savings;
        };
        if ($request->water_savings) {
            $newclient->water_savings = $request->water_savings;
        };
        if ($request->carbon_reduction) {
            $newclient->carbon_reduction = $request->carbon_reduction;
        };
        if ($request->logo_client) {
            $filename2 = $request->project_name . "logo";
            $extension = $request->logo_client->extension();
            Storage::putFileAs('public/logoclient', $request->logo_client, $filename2 . '.' . $extension);
        };
        $newclient->logo_client = $filename2 . '.' . $extension;
        if ($request->pic1) {
            $filename3 = $request->project_name . " pic1";
            $extension = $request->pic1->extension();
            Storage::putFileAs('public/projectpicture', $request->pic1, $filename3 . '.' . $extension);
        };
        $newclient->pic1 = $filename3 . '.' . $extension;
        if ($request->pic2) {
            $filename4 = $request->project_name . " pic2";
            $extension = $request->pic2->extension();
            Storage::putFileAs('public/projectpicture', $request->pic2, $filename4 . '.' . $extension);
        };
        $newclient->pic2 = $filename4 . '.' . $extension;

        if ($request->pic3) {
            $filename5 = $request->project_name . " pic3";
            $extension = $request->pic3->extension();
            Storage::putFileAs('public/projectpicture', $request->pic3, $filename5 . '.' . $extension);
        };
        if ($request->pic3) {
            $newclient->pic3 = $filename5 . '.' . $extension;
        } else {
            $newclient->pic3 = NULL;
        }

        if ($request->pic4) {
            $filename6 = $request->project_name . " pic4";
            $extension = $request->pic4->extension();
            Storage::putFileAs('public/projectpicture', $request->pic4, $filename6 . '.' . $extension);
        };
        if ($request->pic4) {
            $newclient->pic4 = $filename6 . '.' . $extension;
        } else {
            $newclient->pic4 = NULL;
        }

        if ($request->pic5) {
            $filename7 = $request->project_name . " pic5";
            $extension = $request->pic5->extension();
            Storage::putFileAs('public/projectpicture', $request->pic5, $filename7 . '.' . $extension);
        };
        if ($request->pic5) {
            $newclient->pic5 = $filename7 . '.' . $extension;
        } else {
            $newclient->pic5 = NULL;
        }

        if ($request->pic6) {
            $filename8 = $request->project_name . " pic6";
            $extension = $request->pic6->extension();
            Storage::putFileAs('public/projectpicture', $request->pic6, $filename8 . '.' . $extension);
        };
        if ($request->pic6) {
            $newclient->pic6 = $filename8 . '.' . $extension;
        } else {
            $newclient->pic6 = NULL;
        }
        //dd($newclient->pic6);
        $newclient->save();
        //$newclient->create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Project has been added',
            'data' => $newclient,

        ], 200);
    }

    public function filter($type)
    {
        //dd($request->all());
        $filterclient = Client::where("type_project", $type)->get();
        return response()->json([
            'status' => true,
            'message' => 'data found',
            'data' => $filterclient,

        ], 200);
        //return Client::where("type_project", $type)->get();
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $targetdelete = Client::find($id);
        $targetLogoClient = $targetdelete->logo_client;
        Storage::disk('local')->delete('public/logoclient/' . $targetLogoClient);
        $targetMainImage = $targetdelete->main_pic;
        Storage::disk('local')->delete('public/projectpicture/' . $targetMainImage);
        $targetPic1 = $targetdelete->pic1;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic1);
        $targetPic2 = $targetdelete->pic2;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic2);
        $targetPic3 = $targetdelete->pic3;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic3);
        $targetPic4 = $targetdelete->pic4;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic4);
        $targetPic5 = $targetdelete->pic5;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic5);
        $targetPic6 = $targetdelete->pic6;
        Storage::disk('local')->delete('public/projectpicture/' . $targetPic6);

        $targetdelete->delete();

        if ($targetdelete) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Data deleted',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Data not deleted'
                ]
            );
        }
    }
}
