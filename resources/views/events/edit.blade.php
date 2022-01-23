@extends('layouts.main')
@section('title', 'Edite seu evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Edit: {{$event->title}}</h1>
        <form action="/events/update/{{$event->id}}" method='POST' enctype = "multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="Image">Change image</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">New Event Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$event->title}}">
            </div>
            <div class="form-group">
                <label for="city">New Event City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{$event->city}}">
            </div>
            <div class="form-group">
                <label for="date">New Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{$event->date->format('Y-m-d')}}">
            </div>
            <div class="form-group">
                <label for="description">New Event description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{$event->description}}">
            </div>
            <div class="form-group">
                <label for="list">Add items to your event</label>

                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes  
                </div>
                
            </div>
            <div class="form-group">
                <P>Is Private Event?</P>
                <input type="radio" id="private" name="private" value="1">
                <label for="private">Yes</label><br>
                <input type="radio" id="public" name="private" value="0">
                <label for="public">No</label><br>
            </div>
            <input type="submit" class="btn btn-primary" value="Create">
        </form>
    </div>
@endsection
