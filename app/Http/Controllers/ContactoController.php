<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index() 
    {
        return view('contacto.index');
    }

    public function send() 
    {
        $correo = new ContactoMailable;
        Mail::to('fernan.alemercado@gmail.com')->send($correo);
    
        return "Mensaje Enviado";
    }
}
