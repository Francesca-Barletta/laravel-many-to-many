@extends('layouts.app')
@section('content')
    <div class="container-fluid create-content">
        <div class="container">
            <h2 class="create-title">Aggiungi una tecnologia</h2>
        </div>
        

    
    <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label"><h3>Nome tecnologia</h3></label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}"
                    placeholder="inserisci nome tecnologia">
            </div>
            <button class="btn btn-primary mt-2 mb-2 ">Aggiungi</button>
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
        <a href="{{ route('admin.technologies.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
    </div>
    </div
@endsection
