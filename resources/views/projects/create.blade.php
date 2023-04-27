
@extends('layouts.app')


@section('content')
    
<div>
    modifica
  </div>
  <div class="container">
      <form action="{{ route('projects.store') }}" method="POST">
  
          @csrf
          
    
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"  value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
  
          <div class="mb-3">
              <label for="slug" class="form-label">slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  value="{{ old('slug') }}">
              @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
    
          
    
          <div class="mb-3">
            <label for="date" class="form-label">date </label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"  value="{{ old('date') }}">
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="url" class="form-label">url project</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"  value="{{ old('url') }}">
            @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type-id" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type-id" name="type_id" aria-label="Default select example">
              <option value="" selected>Seleziona tipo</option>
              @foreach ($types as $type)
                <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
            
            @error('type_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
    
        </div>
    
          <button type="submit" class="btn btn-primary">Salva</button>
      </form>
      
    
  
  </div>

@endsection


