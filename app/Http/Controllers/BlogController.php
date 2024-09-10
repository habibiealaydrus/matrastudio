<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        if ($blog) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $blog
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        }
    }
    public function limitedblog()
    {
        $blog = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        if ($blog) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $blog
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data Not Found",
            ]);
        }
    }
    public function detailblog($id)
    {
        $detailBlog = Blog::find($id);
        if ($detailBlog) {
            return response()->json([
                "status" => true,
                "message" => "data found",
                "data" => $detailBlog
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
        $newBlog = new Blog();
        $rules = [
            'main_img' => 'required|mimes:jpeg,jpg,png,gif',
            'title_blog' => 'required',
            'article_blog' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menambahkan Blog',
                'data' => $validator->errors()
            ], 401);
        }
        $idFile = Str::random(6);

        if ($request->main_img) {
            $filename1 = $idFile . "mainpic";
            $extension = $request->main_img->extension();
            Storage::putFileAs('public/blog', $request->main_img, $filename1 . '.' . $extension);
        };
        $newBlog->main_img = $filename1 . '.' . $extension;

        $newBlog->title_blog = $request->title_blog;
        $newBlog->article_blog = $request->article_blog;

        if ($request->pic1) {
            $filename2 = $idFile . "pic1";
            $extension = $request->pic1->extension();
            Storage::putFileAs('public/blog', $request->pic1, $filename2 . '.' . $extension);
        };
        if ($request->pic1) {
            $newBlog->pic1 = $filename2 . '.' . $extension;
        } else {
            $newBlog->pic1 = NULL;
        }

        if ($request->pic2) {
            $filename3 = $idFile . "pic2";
            $extension = $request->pic2->extension();
            Storage::putFileAs('public/blog', $request->pic2, $filename3 . '.' . $extension);
        };
        if ($request->pic2) {
            $newBlog->pic2 = $filename3 . '.' . $extension;
        } else {
            $newBlog->pic2 = NULL;
        }

        if ($request->pic3) {
            $filename3 = $idFile . "pic3";
            $extension = $request->pic3->extension();
            Storage::putFileAs('public/blog', $request->pic3, $filename3 . '.' . $extension);
        };
        if ($request->pic3) {
            $newBlog->pic3 = $filename3 . '.' . $extension;
        } else {
            $newBlog->pic3 = NULL;
        }

        if ($request->pic4) {
            $filename4 = $idFile . "pic4";
            $extension = $request->pic4->extension();
            Storage::putFileAs('public/blog', $request->pic4, $filename4 . '.' . $extension);
        };
        if ($request->pic4) {
            $newBlog->pic4 = $filename4 . '.' . $extension;
        } else {
            $newBlog->pic4 = NULL;
        }

        $newBlog->save();
        return response()->json([
            'status' => true,
            'message' => 'Blog has been added',
            'data' => $newBlog,
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
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteTarget = Blog::find($id);
        $targetDeleteMainImg = $deleteTarget->main_img;
        Storage::disk('local')->delete('public/blog/' . $targetDeleteMainImg);
        if ($deleteTarget->pic1) {
            $targetDeletePic1 = $deleteTarget->pic1;
            Storage::disk('local')->delete('public/blog/' . $targetDeletePic1);
        }
        if ($deleteTarget->pic2) {
            $targetDeletePic2 = $deleteTarget->pic2;
            Storage::disk('local')->delete('public/blog/' . $targetDeletePic2);
        }
        if ($deleteTarget->pic3) {
            $targetDeletePic3 = $deleteTarget->pic3;
            Storage::disk('local')->delete('public/blog/' . $targetDeletePic3);
        }
        if ($deleteTarget->pic3) {
            $targetDeletePic3 = $deleteTarget->pic3;
            Storage::disk('local')->delete('public/blog/' . $targetDeletePic3);
        }
        if ($deleteTarget->pic4) {
            $targetDeletePic4 = $deleteTarget->pic4;
            Storage::disk('local')->delete('public/blog/' . $targetDeletePic4);
        }
        $deleteTarget->delete();

        if ($deleteTarget) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Blog deleted',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Blog not deleted'
                ]
            );
        }
    }
}
