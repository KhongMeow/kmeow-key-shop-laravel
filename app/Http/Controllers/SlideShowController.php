<?php

namespace App\Http\Controllers;

use App\Models\SlideShow;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
        $slideShow = SlideShow::latest()->paginate(20);
        return view('crud.SlideShow.Index',compact('slideShow'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        $slideShow = SlideShow::all();
        return view('crud.SlideShow.Create',compact('slideShow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request)
    {
        $request->validate([
            'Photo' => 'required|mimes:png,jpg|max:2048'
        ]);

        $input = $request->all();

        if($Photo = $request->file('Photo')){
            $path = 'SlideShowPhotos/';
            $tPhoto = date('YmdHis').'.'.$Photo->getClientOriginalExtension();
            $Photo->move($path,$tPhoto);
            $input['Photo'] = "$tPhoto";
        }

        SlideShow::create($input);
        return redirect()->route('SlideShow.Index')->with('alert','Create data successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SlideShow $slideShow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit(SlideShow $slideShow)
    {
        $slideShow = SlideShow::all();
        return view('crud.SlideShow.Edit',compact('slideShow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, SlideShow $slideShow)
    {
        $request->validate([
            'Photo' => 'required|mimes:png,jpg|max:2048'
        ]);

        $input = $request->all();

        if($Photo = $request->file('Photo')){
            $path = 'SlideShowPhotos/';
            $tPhoto = date('YmdHis').'.'.$Photo->getClientOriginalExtension();
            $Photo->move($path,$tPhoto);
            $input['Photo'] = "$tPhoto";
        }

        $slideShow->update($input);
        return redirect()->route('SlideShow.Index')->with('alert','Update data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Delete(SlideShow $slideShow)
    {
        $slideShow->delete();
        return redirect()->route('SlideShow.Index')->with('alert','Delete data successfully!');
    }
}
