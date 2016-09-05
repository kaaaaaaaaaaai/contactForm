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
            'email'     =>  'required|email',
        ]);
        $_data = $req->all();

        $req->Session()->put('data',$_data);

        return view('contact.confirm')->with('data',$_data);
    }

    public function store(Request $req){
        /*
         Mail::send('contact.thanksPage', $data, function($message){
            $message->to('kai-ogita@rich.co.jp')
                ->subject('問い合わせ');
        });*/

        Mail::raw("Mail test dev ogita", function($message){
            $message->to('kaiogita@gmail.com')
                ->subject('test');
        });


        //return view('contact.thanksPage');
    }
}
