<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    //
    public function input(){

        return view('contact.input');
    }

    public function confirm(Request $req){

        var_dump($req);
        return view('contact.confirm');
    }

    public function store(){

    }
}
