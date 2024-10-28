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
        $allclient = Client::orderBy('created_at', 'desc')->get();

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
            'location' => 'required',
            'name_client' => 'required',
            'year' => 'required',
            'status' => 'required',
            'project_name' => 'required',
            'main_pic' => 'required',
            'grid_pic' => 'required',
            'article' => 'required',
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
        $newclient->location = $request->location;
        $newclient->name_client = $request->name_client;
        $newclient->year = $request->year;
        $newclient->status = $request->status;
        if ($request->main_pic) {
            $filename1 = $request->project_name . " main pic";
            $extension = $request->main_pic->extension();
            Storage::putFileAs('public/projectpicture', $request->main_pic, $filename1 . '.' . $extension);
        };
        $newclient->main_pic = $filename1 . '.' . $extension;
        if ($request->grid_pic) {
            $filename1 = $request->project_name . " grid pic";
            $extension = $request->grid_pic->extension();
            Storage::putFileAs('public/projectpicture', $request->grid_pic, $filename1 . '.' . $extension);
        };
        $newclient->project_name = $request->project_name;
        $newclient->grid_pic = $filename1 . '.' . $extension;
        $newclient->article = $request->article;
        if ($request->energy_savings) {
            $newclient->energy_savings = $request->energy_savings;
        };
        if ($request->water_savings) {
            $newclient->water_savings = $request->water_savings;
        };
        if ($request->carbon_reduction) {
            $newclient->carbon_reduction = $request->carbon_reduction;
        };
        if ($request->embodied_energy) {
            $newclient->embodied_energy = $request->embodied_energy;
        };
        if ($request->basic_design) {
            $newclient->basic_design = $request->basic_design;
        };
        if ($request->main_contractor) {
            $newclient->main_contractor = $request->main_contractor;
        };
        if ($request->architecht_build) {
            $newclient->architecht_build = $request->architecht_build;
        };
        if ($request->architecht) {
            $newclient->architecht = $request->architecht;
        };
        if ($request->sustainability_team) {
            $newclient->sustainability_team = $request->sustainability_team;
        };
        if ($request->team_arsitektur) {
            $newclient->team_arsitektur = $request->team_arsitektur;
        };
        if ($request->struktur) {
            $newclient->struktur = $request->struktur;
        };
        if ($request->mep) {
            $newclient->mep = $request->mep;
        };
        if ($request->qs) {
            $newclient->qs = $request->qs;
        };
        if ($request->design_team) {
            $newclient->design_team = $request->design_team;
        };
        if ($request->collaborators) {
            $newclient->collaborators = $request->collaborators;
        };
        if ($request->fabrication_team) {
            $newclient->fabrication_team = $request->fabrication_team;
        };
        if ($request->publication) {
            $newclient->publication = $request->publication;
        };
        if ($request->pic1) {
            $filename3 = $request->project_name . " pic1";
            $extension = $request->pic1->extension();
            Storage::putFileAs('public/projectpicture', $request->pic1, $filename3 . '.' . $extension);
        };
        $newclient->pic1 = $filename3 . '.' . $extension;
        $newclient->name_pic1 = $request->name_pic1;
        if ($request->pic2) {
            $filename4 = $request->project_name . " pic2";
            $extension = $request->pic2->extension();
            Storage::putFileAs('public/projectpicture', $request->pic2, $filename4 . '.' . $extension);
        };
        $newclient->pic2 = $filename4 . '.' . $extension;
        $newclient->name_pic2 = $request->name_pic2;
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
        $newclient->name_pic3 = $request->name_pic3;
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
        $newclient->name_pic4 = $request->name_pic4;
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
        $newclient->name_pic5 = $request->name_pic5;
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
        $newclient->name_pic6 = $request->name_pic6;
        if ($request->pic7) {
            $filename9 = $request->project_name . " pic7";
            $extension = $request->pic7->extension();
            Storage::putFileAs('public/projectpicture', $request->pic7, $filename8 . '.' . $extension);
        };
        if ($request->pic7) {
            $newclient->pic7 = $filename9 . '.' . $extension;
        } else {
            $newclient->pic7 = NULL;
        }
        $newclient->name_pic7 = $request->name_pic7;
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
        $targetgridImage = $targetdelete->grid_pic;
        Storage::disk('local')->delete('public/projectpicture/' . $targetgridImage);
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
