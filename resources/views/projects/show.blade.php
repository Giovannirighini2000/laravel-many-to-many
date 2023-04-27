@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="d-flex">
        <div >
            <h1 class="title">{{$project->title}}
                @if($project->type)
                <span class="badge rounded-pill bg-warning">{{ $project->type->name }}</span>
                @else
                    <span class="badge rounded-pill bg-secondary">Nessuna tipo trovato</span>
                @endif
        </h1></h1>
            <p class="slug">{{$project->slug}}</p>
            <p class="description">{{$project->description}}</p>
            <p class="date">{{$project->date}}</p>
            <p class="url">{{$project->url}}</p>
            
        </div>
        <div class="container">
            <h2>Articoli correlati</h2>
            @if($project->type)
            <ul>
                @foreach($project->type->projects as $type)
                    <li>
                        <a href="{{ route('projects.show',$type)}}">
                            {{ $type->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
            @else
                nessun articolo correlato
            @endif
        </div>
        <div>
            <a class="btn" href="{{route('projects.edit',$project)}}">MODIFICA</a>
            @if($project->trashed())
                    <form action="{{ route('projects.restore',$project) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
        </div>

    </div>
    

</div>

@endsection