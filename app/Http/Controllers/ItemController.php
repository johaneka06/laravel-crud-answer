<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Item;
use App\Mail\NewItemNotification;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public function insert(ItemRequest $request)
    {
        $request = $request->validated();
        
        // Item::create([
        //     "name" => $request['name'],
        //     "price" => $request['price'],
        //     "stock" => $request['stock']
        // ]);

        $item = new Item;
        $item->name = $request['name'];
        $item->price = $request['price'];
        $item->stock = $request['stock'];
        $item->save();
        $item->fresh();
        
        
        dd(new NewItemNotification($item));
        Mail::to('johanekasantosa@yahoo.com')->send(new NewItemNotification($item));
        return redirect('/');
    }

    public function view($id)
    {
        $item = Item::where("id", "=", $id)->first();
        if($item == null)
        {
            return redirect('/')->withErrors("No such item exists!");
        }
        return view('updateItem', ["item" => $item]);
    }

    public function edit(ItemRequest $request, $id)
    {
        $request = $request->validated();

        $item = Item::where('id', '=', $id)->first();
        $item->name = $request['name'];
        $item->price = $request['price'];
        $item->stock = $request['stock'];

        $item->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $item = Item::where('id', '=', $id)->first();

        $item->delete();

        return redirect('/');
    }
}
