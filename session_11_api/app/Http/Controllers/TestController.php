<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //HTTP Status
    //2XX => SUCCESS
    //200 => FITUR BERJALAN DGN BENAR
    //201 -> test data berhasil

    //4XX => GAGAL atau ERROR(DRI USER)
    //404 => BAD REQUEST
    //401 => BELUM LOGIN
    //403 => UDH LOGIN TP GD IZIN AKSES
    //404 => HALAMAN ATAU DATA YG USER MASUKAN GAADA

    //5XX => GAGAL/ERROR (DRI SERVER)
    //500 => INTERNAL SERVER ERROR

    public function test(){
        //json(data,httpstatus)
        return response()->json(["message" => "test success"],200);
    }
}
