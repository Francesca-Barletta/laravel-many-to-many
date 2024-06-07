@extends('layouts.app')
@section('title','Francesca Barletta')
@section('content')
    <div class="container">
        <h2>Modifica il progetto</h2>
    </div>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="mb-3">
                <label for="progetto" class="form-label">Nome progetto</label>
                <input type="text" name="progetto" class="form-control" id="progetto" value="{{ old('progetto', $project->progetto)}}"
                    placeholder="inserisci nome progetto">
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" name="descrizione" id="descrizione" rows="3" placeholder="Inserisci descrizione">{{ old('descrizione', $project->descrizione)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link alla repo Git-hub</label>
                <input type="text" name="link" class="form-control" id="link" value="{{ old('link', $project->link)}}"
                    placeholder="inserisci link progetto">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo:</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Modifica il tipo</option>
                    @foreach($types as $type)
                        <option @selected($type->id == old('type_id', $project->type->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                @foreach($technologies as $tech)
                <div class="form-check">
                    <input @checked( in_array($tech->id, old('technologies', $project->technologies->pluck('id')->all()))) type="checkbox" id="tech-{{ $tech->id }}" value="{{ $tech->id }}" name="technologies[]" class="form-check-input" >
                    <label  class="form-check-label" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                </div>
               
                @endforeach
            </div>
            <button class="btn btn-primary">Modifica</button>
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
@endsection
