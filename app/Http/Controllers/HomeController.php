<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pertemuan3.praktikum1.home');
    }

    public function product()
    {
        return view('pertemuan3.praktikum1.product');
    }

    public function berita($param)
    {
        return view('pertemuan3.praktikum1.news', ['param' => $param]);
    }

    public function program()
    {
        return view('pertemuan3.praktikum1.program');
    }

    public function about()
    {
        return view('pertemuan3.praktikum1.about');
    }

    public function index()
    {
        return view('pertemuan3.praktikum1.contact');
    }
}
