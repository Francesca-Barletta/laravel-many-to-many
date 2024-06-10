@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
    <div class="container-fluid show-content">
        <div class="container text-center">
            <h2 class="show-title">{{ $project->progetto }}</h2>
        </div>
        <div class="container">
        <div class="row row-cols-2">
            <div class="col mh-100">
                <p><h3>Descrizione:<br></h3> {{ $project->descrizione }}</p>
                <p><h3>Repo Git-hub:<br></h3><a href="{{ $project->link }}">{{ $project->link }}</a></p>
            </div>
           <div class="col mh-100">
            <p><h3>Tipo:<br></h3> {{ optional($project->type)->name }}</p>
            <p><h3>Tecnologia:<br></h3>
                @foreach($project->technologies as $tech)
                <span>{{$tech->name}}</span>
                @endforeach
            </p>
         
           </div>
        
        </div>
      
            <div class="proj-img">
                @if($project->image)
                <img src="{{ Vite::asset("resources/img/$project->image") }}" class="d-block w-100" alt="...">
                @else
                <p>Non ci sono immagini del progetto</p>
                @endif
            </div>
            <a href="{{ route('admin.projects.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
    
    
        </div>
     
        @if($project->type)
        <div class="container">
            <h3>Progetti correlati</h3>
        @foreach($project->type->projects as $related_proj)
            <div>
                 <a href="{{ route('admin.projects.show', $related_proj) }}"><h3>{{ $related_proj->progetto }}</h3></a>
            </div>
        @endforeach
        </div>
        @endif
        @if($project->technology)
        <div class="container">
        @foreach($project->technology->projects as $related_proj)
            <div>
                <a href="{{ route('admin.projects.show', $related_proj) }}"><h3>{{ $related_proj->progetto }}</a>
            </div>
        @endforeach
        </div>
        @endif
@endsection
