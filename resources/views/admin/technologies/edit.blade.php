@extends('layouts.app')
@section('content')
    <div class="container-fluid edit-content">
        <div class="container">
            <h2 class="edit-title">Modifica la tecnologia</h2>
        </div>
       
    
    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label">Nome tecnologia:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $technology->name)}}"
                    placeholder="inserisci nome tecnologia">
            </div>
            <button class="btn btn-primary mt-2 mb-2">Modifica</button>
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
@endsection
