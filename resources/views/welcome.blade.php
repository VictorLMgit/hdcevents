@extends('layouts.main')
@section('title', 'HDC events')

@section('content')
@session
<div id="search-container" class="col-md-12">
   <h1>Find an event</h1>
   <form action="">
      <input type="text" name="search" id="search" class='form-control' placeholder ='Search...'>
   </form>
</div>

<div id="events-container" class="col-md-12">
   <h2>Others Events</h2>
   <p class="subtitle"> See upcoming events </p>
  
      <div id="cards-container" class="row">
         @foreach ($events as $event)
         <div class="card col-md-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            
            <div class="card-body">
               <p class="card-date">24/09/2022</p>
               <h5 class="card-title">{{$event->title}}</h5>
               <p class="card-participants">X Participants</p>
               <a href="/events/{{ $event->id }}" class="btn btn-primary">More about this</a>
            </div>
         </div>
         @endforeach
      </div>
   
</div>

@endsection
   