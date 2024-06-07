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
                <label for="progetto" class="form-label">Nome progetto</label>
                <input type="text" name="progetto" class="form-control" id="progetto" value="{{ old('progetto')}}"
                    placeholder="inserisci nome progetto">
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" name="descrizione" id="descrizione" rows="3" placeholder="Inserisci descrizione">{{ old('descrizione')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link alla repo Git-hub</label>
                <input type="text" name="link" class="form-control" id="link" value="{{ old('link')}}"
                    placeholder="inserisci link progetto">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo:</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Scegli il tipo</option>
                    @foreach($types as $type)
                        <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary ">Crea</button>
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
    </div>
@endsection
