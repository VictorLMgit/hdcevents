<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();
        return redirect('/')->with('msg', 'Event Created successfully');
    }

    public function show($id) {

        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
        
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events'=>$events]);
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('/dashboard')->with('flash_massage', 'The event was deleted');
    }
    public function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit',['event'=>$event]);
    }
    public function update(Request $request){
        $data = $request->all();

        if ($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'). $extension);

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }
        $event = Event::findOrFail($request->id);
        $event->update($data);

        return redirect('/dashboard')->with('flash_massage', 'The event was edited');
    }
    public function joinEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('flash_massage', 'Subscribed successfully');
    }
}
