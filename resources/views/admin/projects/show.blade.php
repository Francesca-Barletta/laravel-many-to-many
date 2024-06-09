@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
    <div class="container">
        <h2 class="show-title">{{ $project->progetto }}</h2>
    </div>
    <div class="container show-content">
      
        <p>Descrizione: {{ $project->descrizione }}</p>
        <p>Link: {{ $project->link }}</p>
        <p>Tipo: {{ optional($project->type)->name }}</p>
        <p>Tecnologia:
            @foreach($project->technologies as $tech)
            <span>{{$tech->name}}</span>
            @endforeach
        </p>
        <a href="{{ route('admin.projects.index') }}"class="text-decoration-none btn btn-outline-primary">Indietro</a>


    </div>
@endsection
