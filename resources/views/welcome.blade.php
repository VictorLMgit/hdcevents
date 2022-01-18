@extends('layouts.main')
@section('title', 'HDC events')

@section('content')

<div id="search-container" class="col-md-12">
   <h1>Find an event</h1>
   <form action="/" method="GET">
      <input type="text" name="search" id="search" class='form-control' placeholder ='Search...'>
      <button type="submit" class="btn btn-primary" style="margin-top:10px;">Search</button>
   </form>
</div>

<div id="events-container" class="col-md-12">
      @if($search)
         <h2>Você procurou por: <i>{{$search}}</i></h2>
         <p class = "subtitle">Os eventos encontrados foram:</p>
      @else
         <h2>Others Events</h2>
         <p class="subtitle"> See upcoming events </p>
      @endif

      <div id="cards-container" class="row">
      @if(count($events) == 0 && $events)
         <p class = "subtitle">Não foi encontrado nenhum evento com: <i>{{$search}}</i> <a href="/"> Ver Todos</a> </p>
      @elseif(count($events) == 0)
         <p class = "subtitle">Nenhum há eventos disponíveis</p>
      @endif
         @foreach ($events as $event)
         <div class="card col-md-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            
            <div class="card-body">
               <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
               <h5 class="card-title">{{$event->title}}</h5>
               <p class="card-participants">X Participants</p>
               <a href="/events/{{ $event->id }}" class="btn btn-primary">More about this</a>
            </div>
         </div>
         @endforeach
      </div>
   
</div>

@endsection
   