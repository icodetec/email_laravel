<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Send_email;

class DataFormController extends Controller
{
    private $nome;
    private $email;
    private $mensagem;


    public function __construct(Request $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->menssage = $request->menssage;
    }

    public function SendEmail()
    {   
        $data = array(
            'name' => $this->name, 
            'email' => $this->email,
            'menssage' => $this->menssage
        );

        Mail::to($data['email']) //Mail::to( config('mail.from.address'))
        ->send( new Send_email($data));

    }
}

