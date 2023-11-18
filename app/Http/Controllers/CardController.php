<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\card;
class CardController extends Controller
{

public function index()
{
    $cards = Card::all();
    return view('welcome', compact('cards'));
}

}
