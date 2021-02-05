<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $items = Item::get();
        return view('index', ['items' => $items]);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
