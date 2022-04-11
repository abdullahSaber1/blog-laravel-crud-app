<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
   public function helloAction(): string
   {
        return view('hello'
            ,['name'=>'abdallah', "age"=>25,'clubs'=>[
          'alahly','man city','liverpool' ]]);
    }
}
