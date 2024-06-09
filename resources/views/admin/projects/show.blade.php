@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
    <div class="container-fluid show-content">
        <div class="container">
            <h2 class="show-title">{{ $project->progetto }}</h2>
   
      
            <p>Descrizione: {{ $project->descrizione }}</p>
            <p>Link: {{ $project->link }}</p>
            <p>Tipo: {{ optional($project->type)->name }}</p>
            <p>Tecnologia:
                @foreach($project->technologies as $tech)
                <span>{{$tech->name}}</span>
                @endforeach
            </p>
         
            <div class="proj-img">
                @if($project->image)
                <img src="{{ Vite::asset("resources/img/$project->image") }}" class="d-block w-100" alt="...">
                @else
                <p>Non ci sono immagini del progetto</p>
                @endif
            </div>
            <a href="{{ route('admin.projects.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
    
    
        </div>
       
    </div>
@endsection
