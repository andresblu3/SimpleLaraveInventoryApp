<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       /* This is checking if the user has entered a search term. If the user has entered a search
       term, then we will search the database for the search term. If the user has not entered a
       search term, then we will display all the items in the database. */
       
        if($request->filled('search')){
            $items = Item::search($request->search)->get();
        }else{
            $items = Item::all();
        }  
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* This is returning the view for the create item page. */
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the request data and save it to the database
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
        ]);
        
        /* This is saving the image to the public/images folder. */
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        /* This is saving the data to the database. */
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $imageName;
        $item->quantity = $request->quantity;
        $item->save();


        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }


     //make a function
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //show the item details
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //edit the item details
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //we validate the request data and update the item
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
            /* Validating the image by MIME type */
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
        ]);

        /* This is checking if the user has uploaded a new image. If the user has uploaded a new image,
        then we will update the image in the database and in the public/images folder. */

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $item->image = $imageName;
        }
        
        //update the item data in the database
        $item->name = $request->name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->save();


        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //delete the item from the database
        $item->delete();
        //delete the image from the public/images folder
        unlink(public_path('images/' . $item->image));

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
