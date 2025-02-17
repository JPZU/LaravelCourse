<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('home.contact', [
            'title' => "Contact - Online Store",
            'subtitle' => "Contact",
            'description' => "This is an contact page ...",
            'email' => 'onlinestore@gmail.com',
            'address' => 'Carrera 49 #7 sur 50, El Poblado, Medellín, El Poblado, Medellín, Antioquia',
            'phone' => '604 2619500',
            'author' => "Developed by: Juan Pablo Zuluaga"
        ]);
    }
}
