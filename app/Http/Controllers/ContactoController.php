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

    public function send(Request $request) 
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);
        $correo = new ContactoMailable($request->all());
        Mail::to('fernan.alemercado@gmail.com')->send($correo);
    
        return redirect()->route('contacto.index')->with('info' , 'Mensaje enviado');
    }
}
