<?php

namespace App\Http\Controllers;

use App\Models\MagicCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'power' => 'required',
            'toughness' => 'required',
            'image_data' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $imageData = file_get_contents($request->file('image_data')->getRealPath());
        $card = new MagicCard();
        $card->name = $request->name;
        $card->description = $request->description;
        $card->power = $request->power;
        $card->toughness = $request->toughness;
        $card->image_data = $imageData;
        $card->user_id = auth()->id();
        $card->save();

        return redirect()->intended('/cards');

    }


    public function edit(MagicCard $card)
    {
        return view('edit_card', compact('card'));
    }

    public function update(Request $request, MagicCard $card)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'power' => 'required',
            'toughness' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $card->name = $request->name;
        $card->description = $request->description;
        $card->power = $request->power;
        $card->toughness = $request->toughness;

        $card->save();

        return redirect()->intended('/cards');
    }

    public function delete(MagicCard $card)
    {
        $card->delete();

        return redirect()->intended('/cards');
    }
    public function getAllCards()
    {
        $cards = MagicCard::all();
        return view('cards', ['cards' => $cards]);
    }
}
