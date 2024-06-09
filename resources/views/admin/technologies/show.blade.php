@extends('layouts.app')
@section('content')
    <div class="container-fluid show-content">
        <div class="container">
            <h2 class="show-title">Tecnologia:</h2>
            <p>{{ $technology->name}}</p>
        
        <a href="{{ route('admin.technologies.index') }}"class="text-decoration-none btn btn-back">Indietro</a>
        </div>
    </div>
       
@endsection
