@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
<div class="container-fluid show-content">
    <div class="container">

        <h2 class="show-title">{{ $project->progetto }}</h2>
   
        <p><span class="h4">Descrizione:</span><br> {{ $project->descrizione }}</p>
        <p><span class="h4">Link: </span><br> {{ $project->link }}</p>
        <p><span class="h4">Tipo: </span><br>{{ optional($project->type)->name }}</p>
        <p><span class="h4">Tecnologia: </span><br>
            @foreach($project->technologies as $tech)
            <span>{{$tech->name}}</span>
            @endforeach
        </p>
        <a href="{{ route('projects.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
    </div>
       

</div>
@endsection
