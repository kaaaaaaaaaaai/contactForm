<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function input(){
        return view('contact.input');
    }

    public function confirm(Request $req){
        //もしvalidateが通らなかったら自動で前のページにvalidateErrorを持ってリダイレクトする
        $this->validate($req,[
            'name'      =>  'required|max:255',
            'gender'    =>  'required',
            'comment'   =>  'max:255',
            'email'     =>  'email'
        ]);
        $_data = $req->all();

        $req->Session()->put('data',$_data);

        return view('contact.confirm')->with('data',$_data);
    }

    public function store(Request $req){

        var_dump($req->Session()->get('data'));
        $data = [];
        Mail::send('contact.thanksPage', $data, function($message){
            $message->to('kai-ogita@rich.co.jp')
                ->subject('ここがタイトルです');
        });
        //return view('contact.thanksPage');
    }
}
