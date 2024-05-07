<?php

namespace App\Http\Controllers;

use App\Models\MagicCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'power' => 'required',
            'toughness' => 'required',
            'image_data' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         $card = new MagicCard();
         $card->name = $request->name;
         $card->description = $request->description;
         $card->power = $request->power;
         $card->toughness = $request->toughness;
         $card->image_data = $request->file('image_data')->store('images', 'public');
         $card->user_id = auth()->id();
         $card->save();

        return redirect()->intended('/cards');

    }
}
