@extends('layouts.main')
@section('title','dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>    
</div>
@if(session('flash_massage'))
    <p class="msg">{{session('flash_massage')}}</p>
@endif
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events)>0)
<div id="events-container" class="col-md-12">
    <div id="cards-container" class="row">
         @foreach ($events as $event)
         <div class="card col-md-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            
            <div class="card-body">
               <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
               <h5 class="card-title">{{$event->title}}</h5>
               <p class="card-participants">{{count($event->users)}} Participants</p>
               <a href="/events/{{ $event->id }}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon>Your Event</a>

               <form action="/events/{{ $event->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button class = "btn btn-danger" style="margin-top:5px;"><ion-icon name="trash-outline"></ion-icon> Delete</button>
               </form>

               <a href="/events/edit/{{ $event->id }}" class="btn btn-secondary" style="margin-top: 5px;"><ion-icon name="create-outline"></ion-icon>Edit</a>
            </div>
         </div>
         @endforeach
      </div>
</div>
    @else
        <p>Você ainda não possui eventos. <a href="/events/create"> Crie seu Evento! </a></p>
    @endif
</div>
<hr>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>    
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($eventsAsParticipant)>0)
<div id="events-container" class="col-md-12">
    <div id="cards-container" class="row">
         @foreach ($eventsAsParticipant as $event)
         <div class="card col-md-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            
            <div class="card-body">
               <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
               <h5 class="card-title">{{$event->title}}</h5>
               <p class="card-participants">{{count($event->users)}} Participants</p>
               <a href="/events/{{ $event->id }}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon> More</a>
               <form action= "/events/leave/{{ $event->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger" style="margin-top:5px;"><ion-icon name="log-out-outline"></ion-icon> Leave</button>
               </form>
            </div>
         </div>
         @endforeach
      </div>
@else
    <p>Você ainda não está participando de nenhum evento <a href="/">Procure eventos de seu interesse!</a></p>
@endif
</div>
@endsection