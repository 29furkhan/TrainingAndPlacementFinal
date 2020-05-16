<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index(){
        return view("pages.TPO.photoGalleryTPO");
    }
}
