@extends('layouts.app')


@section('content')
    

  <div class="container">
      <form action="{{ route('projects.update',$project) }}" method="POST">
  
          @csrf
          @method('PUT')
    
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$project->title) }}">
            @error('title')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
              <label for="technologies" class="form-label">technologie</label>
              <div class="d-flex @error('technologies') is-invalid @enderror flex-wrap gap-3">

                @foreach($technologies as $key => $technology)
                  <div class="form-check">
                    <input name="technologies[]" @checked( in_array($technology->id, old('technologies',$project->getTechnologyIds()) ) ) class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{ $technology->name }}
                    </label>
                  </div>
                @endforeach
              </div>

              @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
  
          <div class="mb-3">
              <label for="slug" class="form-label">slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$project->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
          </div>
    
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description',$project->description) }}">
            @error('description')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
            
          </div>
    
          
    
          <div class="mb-3">
            <label for="date" class="form-label">date </label>
            <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date',$project->date) }}">
            @error('date')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="url" class="form-label">url project</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url',$project->url) }}">
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
                <option @selected( old('type_id', $project->type_id ) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
            
              @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
           </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    
          
      </form>
    
  
  </div>

@endsection