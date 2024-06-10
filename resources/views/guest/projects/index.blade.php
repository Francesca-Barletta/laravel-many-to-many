@extends('layouts.app')
@section('title','Progetti | Francesca Barletta')
@section('content')
<div class="container-fluid index-content">
  <div class="mb-2">
            
    <form action="{{ route('projects.index') }}" method="GET">
 
    <label for="type_id" class="form-label"><h3>Filtra per tipo</h3></label>
    <select class="form-control filter" name="type_id" id="type_id">
        <option value="">Scegli il tipo</option>
        @foreach($types as $type)
            <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>
    <button class="mt-2 btn btn-back">filtra</button>
</form>
</div>
          <div class="row">
            @foreach ($projects as $project)
            <div class="col-3">
              <div class="card">
              
                <div class="image-cap">
                  @if($project->image)
                  <img src="{{ Vite::asset("resources/img/$project->image") }}" alt="" class="card-image">
                  @else
                  <div class="proj-title">
                      <h3>{{ $project->progetto }}</h3>
                  </div>
                  @endif
              </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $project->progetto }}</h5>
                  <p class="card-text">{{ $project->descrizione }}</p>
                  <p>Tipo: {{$project->type ? $project->type->name : ''}}</p>
                  <p>Tecnologia:
                    
                      @foreach($project->technologies as $tech)
                      <span>{{$tech->name}}</span>
                      @endforeach
                  
                  </p>
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