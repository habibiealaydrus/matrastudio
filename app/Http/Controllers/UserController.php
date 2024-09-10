<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            "status" => true,
            "message" => "Data Found",
            "data" => $user
        ]);
    }

    public function create(Request $request)
    {
        $newUser = new User();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
        //dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal tambah user',
                'data' => $validator->errors()
            ], 401);
        }
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);

        $newUser->save();
        return response()->json([
            'status' => true,
            'message' => 'User has been added',
            'data' => $newUser,
        ], 200);
    }
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Login',
                'data' => $validator->errors()
            ], 401);
        }
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'massage' => 'Gagal Login'
            ], 401);
        }
        $datauser = User::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'token' => $datauser->createToken('api-token')->plainTextToken,
            'data' => $datauser->id
        ], 200);
    }
    public function detail($id)
    {
        $detailuser = User::find($id);
        return response()->json([
            'status' => true,
            'message' => 'Data Found',
            'data' => $detailuser
        ]);
    }


    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'berhasil logout',
        ], 200);
    }
    public function destroy($id)
    {
        $targetdelete = User::find($id);
        $targetdelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'User berhasil dihapus',
        ]);
    }
}
