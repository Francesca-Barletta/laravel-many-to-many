@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
    <div class="container">
        <h2>{{ $project->progetto }}</h2>
        <p>Descrizione: {{ $project->descrizione }}</p>
        <p>Link: {{ $project->link }}</p>
        <p>Tipo: {{ optional($project->type)->name }}</p>
        <p>Tecnologia:
            @foreach($project->technologies as $tech)
            <span>{{$tech->name}}</span>
            @endforeach
        </p>



    </div>
@endsection
