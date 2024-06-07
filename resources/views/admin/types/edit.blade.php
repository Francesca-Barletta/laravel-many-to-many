@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Modifica la tipologia</h2>
    </div>
    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label">Nome tipologia:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $type->name)}}"
                    placeholder="inserisci nome tipologia">
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
