<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function hitung(Request $req)
    {
        $hargapermeter = 900000;
        $luas = $req->panjang * $req->lebar;
        $totalharga = $luas * $hargapermeter;

        return view('welcome')->with([
            'luas' => $luas,
            'total_harga' => $totalharga,
            'hargapermeter' => $hargapermeter,
            'lebar' => $req->lebar,
            'panjang' => $req->panjang
        ]);
    }
}
