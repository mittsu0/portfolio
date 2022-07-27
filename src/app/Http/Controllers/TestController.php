<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request){
        // dump($request->ip());
        // dump(str_replace('.', '', $request->ip()));
        // dump(date('Ymd'));
        // $id=$request->ip().date('Ymd');
        // dump($id);
        // $hash_id=hash('md5',$id);
        // dump($hash_id);
        // $base64_id = base64_encode($hash_id);
        // dump($base64_id);
        // $hash_hmac_id=hash_hmac('md5', $id, 'kghei873m');
        // dump($hash_hmac_id);
        // $base64_hmac_id = base64_encode($hash_hmac_id);
        // dump($base64_hmac_id);
        // $uid =  substr($base64_hmac_id, 0, 9);
        // dump($uid);
        dump(createId($request->ip()));
    }
}
