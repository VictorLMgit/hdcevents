@extends('layouts.main')
@section('title', $event->title)
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">

        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-fluid" >
        </div>
        
        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city"> <ion-icon name="location-outline"></ion-icon> {{$event->city}} </p>
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon> X Participants </p>
            <p class="event-owner"><ion-icon name="finger-print-outline"></ion-icon> Creator: {{$user->name}}</p>
            <p class="event-date"><ion-icon name="today-outline"></ion-icon> {{date('d/m/Y', strtotime($event->date))}}</p>
            <h3> </ion-icon> O evento possui:</h3>
            <ul id='item-list'>
                @foreach($event->items as $items)
                 <li><p><ion-icon name="caret-forward-outline"></ion-icon>{{$items}}</p>  </li>
                @endforeach
            </ul>
            
            
             
            <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
        </div>
        
        <div class="dol-md-12" id="description-container">
            <h3>about this event</h3>
            <p class="event-description">{{$event->description}}</p>
        </div>
        
    </div>

</div>

@endsection