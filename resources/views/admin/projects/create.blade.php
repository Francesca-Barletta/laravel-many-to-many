@extends('layouts.app')
@section('Progetti|Francesca Barletta')
@section('content')
    <div class="container-fluid create-content">
        <div class="container ">
            <h2 class="create-title">Crea un nuovo progetto</h2>
        </div>
      
    
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="progetto" class="form-label"><h3>Nome progetto</h3></label>
                <input type="text" name="progetto" class="form-control" id="progetto" value="{{ old('progetto')}}"
                    placeholder="inserisci nome progetto">
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label"><h3>Descrizione</h3></label>
                <textarea class="form-control" name="descrizione" id="descrizione" rows="3" placeholder="Inserisci descrizione">{{ old('descrizione')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label"><h3>Link alla repo Git-hub</h3></label>
                <input type="text" name="link" class="form-control" id="link" value="{{ old('link')}}"
                    placeholder="inserisci link progetto">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"><h3>Image</h3></label>
                <input type="text" name="image" class="form-control" id="image" value="{{ old('image')}}"
                    placeholder="inserisci nome file">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label"><h3>Tipo:</h3></label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Scegli il tipo</option>
                    @foreach($types as $type)
                        <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="check-tech">
                @foreach($technologies as $tech)
                <div class="form-check">
                    <input @checked( in_array($tech->id, old('technologies', []))) type="checkbox" id="tech-{{ $tech->id }}" value="{{ $tech->id }}" name="technologies[]" class="form-check-input" >
                    <label  class="form-check-label" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                </div>
               
                @endforeach
            </div>
            <button class="btn btn-primary mt-2 mb-2 ">Crea</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <div class="container">
        <a href="{{ route('admin.projects.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
    </div>
    
    </div>
@endsection
