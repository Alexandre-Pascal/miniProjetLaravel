<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class SaucesController extends Controller
{
    public function afficheSauces(Request $request) {
        return view('sauces');
    }

    public function index()
{
    $sauces = Sauce::all();
    return view('sauces', ['sauces' => $sauces]);
}

public function show($id)
{
    $sauce = Sauce::find($id);
    return view('sauce', ['sauce' => $sauce]);

}
}