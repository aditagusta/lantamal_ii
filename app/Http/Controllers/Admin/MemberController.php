<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Model\Member;
use Auth;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'username' => 'required',
            'password' => 'required',
            'password1' => 'required',
            'nama_member' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'jenis_kelamin' => 'required',
        );
    }

    public function index()
    {
        $data = Member::all();
        return view('pages.member.index', compact('data'));
    }

    public function get($id)
    {
        $data = DB::table('tbl_member')->where('id_member', $id)->first();
        return view('pages.member.edit', compact('data'));
    }

    public function remove($id)
    {
        $data = DB::table('tbl_member')->where('id_member', $id)->delete();
        if($data == TRUE)
        {
            return back()->with('status', 'Data Member Berhasil Dihapus');
        } else {
            return back()->with('error', 'Gagal Menghapus Member');
        }
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return back()->with('error', 'Data Tidak Valid');
        } else {
            if ($request->password == $request->password1) {
                $pass = password_hash($request->password, PASSWORD_DEFAULT);
                $data = DB::table('tbl_member')->insert([
                    'username' => $request->username,
                    'password' => $pass,
                    'password1' => $request->password1,
                    'nama_member' => $request->nama_member,
                    'alamat' => $request->alamat,
                    'no_ktp' => $request->no_ktp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);
                return back()->with('status', 'Data Member Berhasil Ditambahkan');
            } else {
                return back()->with('error', 'Cek Password Anda Kembali');
            }
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return back()->with('error', 'Data Tidak Valid');
        } else {
            if ($request->password == $request->password1) {
                $pass = password_hash($request->password, PASSWORD_DEFAULT);
                $data = DB::table('tbl_member')
                ->where('id_member', $request->id_member)
                ->update([
                    'username' => $request->username,
                    'password' => $pass,
                    'password1' => $request->password1,
                    'nama_member' => $request->nama_member,
                    'alamat' => $request->alamat,
                    'no_ktp' => $request->no_ktp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);
                return redirect()->route("member")->with('status', 'Data Member Berhasil Diubah');
            } else {
                return back()->with('error', 'Cek Inputan Kembali');
            }
        }
    }

    // Android
    public function registerMember(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json(['messageForm' => $validator->errors(), 'status' => 422, 'message' => 'Data Tidak Valid']);
        } else {
            if ($request->password == $request->password1) {
                $pass = password_hash($request->password, PASSWORD_DEFAULT);
                $data = DB::table('tbl_member')->insert([
                    'username' => $request->username,
                    'password' => $pass,
                    'password1' => $request->password1,
                    'nama_member' => $request->nama_member,
                    'alamat' => $request->alamat,
                    'no_ktp' => $request->no_ktp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);
                return response()->json(['message' => 'Data Berhasil Ditambahkan', 'status' => 200]);
            } else {
                return response()->json(['message' => 'Password Tidak Valid', 'status' => 200]);
            }
        }
    }

    public function loginMember(Request $request)
    {
        if ($token = Auth::guard('member')->attempt(["username" => $request->username, "password" => $request->password])) {
            return $this->respondWithToken($token);
        } else {
            return response()->json("Error");
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            "data" => Auth::guard('member')->user()
        ]);
    }
}
