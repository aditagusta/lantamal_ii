<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'jenis_pengaduan' => 'required',
            'pengaduan' => 'required',
        );
    }

    public function index()
    {
        $data = DB::table('tbl_pengaduan')->join('tbl_member','tbl_pengaduan.id_member','tbl_pengaduan.id_member')->get();
        return view('pages.pengaduan.index',compact('data'));
    }

    // Android
    public function addPengaduan(Request $request)
    {
        $validation = Validator::make($request->all(), $this->rules);
        if ($validation->fails()) {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'status' => 404
            ]);
        } else {
            if($request->foto != '')
            {
                $image = $request->file('foto');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('pengaduan'), $new_name);
                $data = DB::table('tbl_pengaduan')->insert([
                    'id_member' => Auth::guard('member')->user()->id_member,
                    'jenis_pengaduan' => $request->jenis_pengaduan,
                    'pengaduan' => $request->pengaduan,
                    'tanggal_pengaduan' => date('Y-m-d'),
                    'foto' => $new_name
                ]);
                return response()->json([
                    'data' => $data,
                    'message'   => 'Pengaduan Berhasil Dikirim',
                    'status' => 200
                ]);
            } else {
                $data = DB::table('tbl_pengaduan')->insert([
                    'id_member' => Auth::guard('member')->user()->id_member,
                    'jenis_pengaduan' => $request->jenis_pengaduan,
                    'pengaduan' => $request->pengaduan,
                    'tanggal_pengaduan' => date('Y-m-d')
                ]);
                return response()->json([
                    'data' => $data,
                    'message'   => 'Pengaduan Berhasil Dikirim',
                    'status' => 200
                ]);
            }
        }
    }
}
