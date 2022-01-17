@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Create your event</h1>
        <form action="/events" method='POST' enctype = "multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Image">Insert an image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Event Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Event Name">
            </div>
            <div class="form-group">
                <label for="city">Event City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Ex: Fortaleza-CE">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Event description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Something about your event">
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
                btn
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
