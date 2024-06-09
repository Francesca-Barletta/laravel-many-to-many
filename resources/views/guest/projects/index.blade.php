@extends('layouts.app')
@section('title','Progetti | Francesca Barletta')
@section('content')
<div class="container-fluid index-content">

          <div class="row">
            @foreach ($projects as $project)
            <div class="col-3">
              <div class="card">
              
                <div class="image-cap">
                  <h3>{{ $project->progetto }}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $project->progetto }}</h5>
                  <p class="card-text">{{ $project->descrizione }}</p>
                  <a href="{{ $project->link }}" class="link-git">Vai alla repo Git-hub</a>
                  <div class="card-buttons">
                    <p><a href="{{ route('projects.show', $project) }}" class="btn">Mostra</a></p>
                  </div>
                
                </div>
              </div>
            </div>
            @endforeach
          </div>
           
           
    
        
    
</div>


@endsection