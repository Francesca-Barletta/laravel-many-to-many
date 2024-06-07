@extends('layouts.app')
@section('title','Progetti | Francesca Barletta')
@section('content')
<div class="container-fluid index-content">
  {{-- <table class="table">
    <thead>
        <tr>
          <th>ID</th>
          <th>Progetto</th>
          <th>Descrizione</th>
          <th>Link alla cartella git-hub</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody> --}}
      
          {{-- <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->progetto }}</td>
            <td>{{ $project->descrizione }}</td>
            <td><a href="{{ $project->link }}">Link</a></td>
            
            <td><a href="{{ route('projects.show', $project) }}">Mostra</a></td> --}}
           <div class="row">
            @foreach ($projects as $project)
            <div class="col-3">
              <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="image-cap">
                  <h3>{{ $project->progetto }}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $project->progetto }}</h5>
                  <p class="card-text">{{ $project->descrizione }}</p>
                  <a href="{{ $project->link }}">Vai alla repo Git-hub</a>
                  <p><a href="{{ route('projects.show', $project) }}" class="btn">Mostra</a></p>
                </div>
              </div>
          @endforeach
            </div>
           </div>
           
    
          {{-- </table> --}}
    
</div>


@endsection