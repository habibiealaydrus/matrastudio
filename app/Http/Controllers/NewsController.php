<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        if ($news) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $news
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }
    public function limitednews()
    {
        $news = News::orderBy('created_at', 'desc')->limit(3)->get();
        if ($news) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $news
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        };
    }
    public function detailnews($id)
    {
        $newsdetail = News::find($id);
        if ($newsdetail) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $newsdetail
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
    public function create(Request $request)
    {
        $newNews = new News();
        $rules = [
            'main_pic' => 'required',
            'headline_news' => 'required',
            'logo_news' => 'required',
            'article_news' => 'required',
            'link_berita' => 'required',
        ];
        //dd($request->all());
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal tambah news',
                'data' => $validator->errors()
            ], 401);
        }
        $newNews->headline_news = $request->headline_news;
        $newNews->article_news = $request->article_news;
        $newNews->link_berita = $request->link_berita;
        if ($request->main_pic) {
            $filename1 = $request->headline_news . " main pic";
            $extension = $request->main_pic->extension();
            Storage::putFileAs('public/news', $request->main_pic, $filename1 . '.' . $extension);
        };
        $newNews->main_pic = $filename1 . '.' . $extension;
        $newNews->link_berita = $request->link_berita;
        if ($request->logo_news) {
            $filename1 = $request->headline_news . " logo news";
            $extension = $request->logo_news->extension();
            Storage::putFileAs('public/news/logo_news', $request->logo_news, $filename1 . '.' . $extension);
        };
        $newNews->logo_news = $filename1 . '.' . $extension;
        $newNews->save();
        return response()->json([
            'status' => true,
            'message' => 'News has been added',
            'data' => $newNews,
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
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $targetnewsdelete = News::find($id);
        $targetMainPic = $targetnewsdelete->main_pic;
        Storage::disk('local')->delete('public/news/' . $targetMainPic);
        $targetLogoNews = $targetnewsdelete->logo_news;
        Storage::disk('local')->delete('public/news/' . $targetLogoNews);

        $targetnewsdelete->delete();

        if ($targetnewsdelete) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'News deleted',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'News not deleted'
                ]
            );
        }
    }
}
