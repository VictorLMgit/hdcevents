<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
 
class EventController extends Controller
{
    public function index(){

        $search = request('search');
        if($search){
            $events = Event::where('title' , 'like' , "%".$search."%")->get();
        }else{
            $events = Event::all();
        }
         
    return view('welcome', ['events'=>$events, 'search'=>$search]);
    }

    public function create(){
        return view('events.create');
    }

    public function register(){
        return view('events.register');
    }
    public function login(){
        return view('events.login');
    }
    public function store(Request $request){
        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->items = $request->items;
        $event->date = $request->date;
        //img upload
        if ($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'). $extension);
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        $event->save();
        return redirect('/')->with('msg', 'Event Created successfully');
    }

    public function show($id) {

        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
        
    }

}
