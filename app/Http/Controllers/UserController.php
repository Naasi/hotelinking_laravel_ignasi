<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller {

    public function createUser ($user, $email, $pass) {
        $exist = $this->checkUser($email, $pass);
        $hola = substr($exist, 0, 2);

        if ($hola != '[{') {
                $result = DB::table('users')->insert(['user' => $user, 'email' => $email, 'pass' => $pass]);
                if ($result) {
                    $response = 'You have registered correctly. Login to use our services';
                } else {
                    $response = 'An error occurred when inserting the user into the database';
                }
        } else {
            $response = 'This email has already been used';
        }

        return $response;
    }

    public function checkUser ($email, $pass) {
        $result = DB::table('users')
            ->select(DB::raw('count(email) as total, user, id'))
            ->groupBy('id')
            ->groupBy('user')
            ->where([
                ['email', '=', $email],
                ['pass', '=', $pass]
            ])->get()->tojson();

        return $result;
        //return redirect()->route('');
    }
}
