<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;

class SaranController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'saran' => 'required',
        );
    }

    public function index()
    {
        $data = DB::table('tbl_saran')->join('tbl_member','tbl_saran.id_member','tbl_saran.id_member')->get();
        return view('pages.saran.index',compact('data'));
    }

    // Android
    public function addSaran(Request $request)
    {
        $validation = Validator::make($request->all(), $this->rules);
            if ($validation->fails()) {
                return response()->json([
                    'message'   => $validation->errors()->all(),
                    'status' => 404
                ]);
        } else {
            $data = DB::table('tbl_saran')
            ->insert([
                'id_member' => Auth::guard('member')->user()->id_member,
                'saran' => $request->saran,
                'tanggal_saran' => date('Y-m-d'),
            ]);
            return response()->json([
                'message'   => 'Saran Berhasil Dikirim',
                'status' => 200
            ]);
        }
    }
}
