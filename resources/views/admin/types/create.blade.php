@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Aggiungi una tipologia</h2>
    </div>
    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label">Nome tipologia</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}"
                    placeholder="inserisci nome tipologia">
            </div>
            <button class="btn btn-primary ">Aggiungi</button>
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
