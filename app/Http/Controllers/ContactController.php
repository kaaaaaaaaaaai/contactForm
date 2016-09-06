<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private $Gender = array(
        'men'   =>  '男性',
        'women' =>  '女性'
    );

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
        $data = $req->Session()->get('data');
        if($req->get('action') == 'back'){
            return redirect()->route('contact.input')->withInput($data);
        }

        //２重投稿を防ぐ
        $req->session()->regenerateToken();

        //入れ替え
        $data['gender'] = $this->Gender[$data['gender']];

        //Mail::queue ? Mail::sned
		Mail::send('mail.recipient', ['data'   =>  $data], function ($message) use ($data){
            $message->to(env('CONTACT_MAIL_RECIPIENT'))
                ->subject('お問い合わせがあります。');
		});
        Mail::send('mail.sender', ['data'   =>  $data], function ($message) use ($data){
            $message->to($data['email'])
                ->subject('お問い合わせありがとうございました。');
        });
		
        return view('contact.thanksPage');
    }
}
