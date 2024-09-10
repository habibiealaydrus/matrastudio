<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        if ($event) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $event
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }
    public function limitedevent()
    {
        $eventlimited = Event::orderBy('created_at', 'desc')->limit(3)->get();
        if ($eventlimited) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $eventlimited
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }

    public function detilevent($id)
    {
        $detailevent = Event::find($id);
        if ($detailevent) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $detailevent
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
        $addevent = new Event();
        $rules = [
            'pic_event' => 'required|mimes:jpeg,jpg,png,gif',
            'title_event' => 'required',
            'article_event' => 'required',
            'location_event' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menambahkan Event',
                'data' => $validator->errors()
            ], 401);
        }
        $idFile = Str::random(4);

        $addevent->title_event = $request->title_event;
        if ($request->pic_event) {
            $filename1 = $idFile . "picevent";
            $extension = $request->pic_event->extension();
            Storage::putFileAs('public/event', $request->pic_event, $filename1 . '.' . $extension);
        };
        $addevent->pic_event = $filename1 . '.' . $extension;
        $addevent->location_event = $request->location_event;
        $addevent->article_event = $request->article_event;
        $addevent->date = $request->date;
        $addevent->start_time = $request->start_time;
        $addevent->end_time = $request->end_time;
        //dd($request->all());
        $addevent->save();
        return response()->json([
            'status' => true,
            'message' => 'Event has been added',
            'data' => $addevent,
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
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteTarget = Event::find($id);
        if ($deleteTarget->pic_event) {
            $targetDeletePic = $deleteTarget->pic_event;
            Storage::disk('local')->delete('public/event/' . $targetDeletePic);
        }
        $deleteTarget->delete();
        if ($deleteTarget) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Event deleted',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Event not deleted'
                ]
            );
        }
    }
}
