@extends('layouts.app')
@section('content')
<div class="index-content position-relative">
  <table class="table mh-100">
    <thead>
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Slug</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
          <tr>
            <th scope="row">{{ $type->id }}</th>
            <td>{{ $type->name }}</td>
            <td>{{ $type->slug }}</td>
            <td><a href="{{ route('admin.types.show', $type) }}" class="text-decoration-none btn btn-outline-primary" target="_blank">Mostra</a></td>
            <td><a href="{{ route('admin.types.edit', $type) }}"class="text-decoration-none btn btn-outline-success">Modifica</a></td>
            <td>
              <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="delete-form">
    
                <button class="btn btn-outline-danger">Elimina</button>
                @csrf
                @method('DELETE')
            
                <div class="modal">
                  <div class="modal-box">
                    <h3 class="text-center">Vuoi eliminare questa tipologia?</h3>
                    <span class="link link-danger modal-yes">Si</span>
                    <span class="link link-success modal-no">No</span>
                  </div>
                </div>
                
              </form>
            </td>
    
          </tr>
            @endforeach
          
          </table>
        
</div>


@endsection