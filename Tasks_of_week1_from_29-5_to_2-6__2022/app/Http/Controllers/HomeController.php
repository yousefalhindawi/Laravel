<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        $data = 'About page Group 3';
        return view('about' ,compact('data'));
    }
    public function contact(){
        $array = ['id' => 1, 'name' => 'yousef', 'email' => 'yousef@gmail'];
        return view('contact', ['user' => $array]);
    }

}
