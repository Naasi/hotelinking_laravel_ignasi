<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Code;

class codeController extends Controller {

    public function getCodes ($id) {
        $coupons = DB::table('codes')->where([
            ['idUs', '=' ,$id],
            ['redeemed', '=', 'n']
        ])->pluck('code');

        $respuesta = "<table id='table' class='table'><tr><td><h4>Code</h4></td><td><h4>Action</h4></td></tr>";
        foreach ($coupons as $code) {
            $respuesta = $respuesta."<tr><td id='cod'>".$code."</td><td><h4 class='t-button' id='botonCanjear'><a href='#'><span class='label label-success'>Redeem</span></a></h4></td></tr>";
        }

        return $respuesta;
    }

    public function redeemCode ($code) {
        $update = DB::table('codes')
            ->where('code', $code)
            ->update(['redeemed' => 's']);

        return $update;
    }

    public function generateCode ($userID) {

        //Generate unique code
        $codigo = uniqid();

        $ins = DB::table('codes')->insert(
            ['code' => $codigo, 'redeemed' => 'n', 'idUs' => $userID]
        );

        if ($ins = 1) {
            return '1';
        } else {
            return '0';
        }

    }
}
