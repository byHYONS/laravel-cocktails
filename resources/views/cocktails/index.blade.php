<div class="screen holdings">
  @extends('layouts.app')
  @section('main')
    <div class="container pt-5">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-3">All Cocktails</h1>
        <a href="{{ route('cocktails.create') }}" class="btn btn-primary">Create New Cocktail</a>
      </div>

      <div class="row">

        @foreach ($cocktails as $cocktail)
          <div class="col-md-4 mb-4">

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">{{ $cocktail->name }}</h3>
              </div>

              <div class="card-body">

                <img class="w-100 mb-3" src="{{ $cocktail->img }}" alt="{{ $cocktail->img }}">

                <p class="card-text"><strong>Description:</strong> {{ $cocktail->description }}</p>

                <p><strong>Ingredients:</strong> {{ $cocktail->ingredients }}</p>

                <p><strong>Method:</strong> {{ $cocktail->method }}</p>

                <p><strong>Glass Type:</strong>
                  @foreach ($cocktail->glasses as $glass)
                    {{ $glass->name }}@if (!$loop->last)
                    @endif
                  @endforeach
                </p>

                <p><strong>Price:</strong> {{ $cocktail->price }}$</p>

                <div class="card-footer">
                  <a href="{{ route('cocktails.show', $cocktail) }}" class="btn btn-outline-primary btn-sm">
                    <i class="fab fa-sistrix"></i>
                  </a>
                  <a href="{{ route('cocktails.edit', $cocktail) }}" class="btn btn-outline-warning btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="{{$cocktail->id}}" class="destroy btn btn-outline-danger btn-sm" data-slug="{{$cocktail->id}}">
                    <i class="fas fa-trash"></i>
                  </a>                                       
                </div>
              </div>
            </div>
            {{--? modale --}}
            <div class="delete__modale holding" id="modale-{{$cocktail->id}}">
              <span class="modale__exit">CHIUDI</span>
              <h4>Sei sicuro di voler cancellare?</h4>
              <p>La cancellazione è irreversibile</p>
              <form id="delete-form-{{$cocktail->id}}" action="{{route('cocktails.destroy', $cocktail->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="delete" type="submit" value="Elimina Elemento">
              </form>
          </div>
          </div>
        @endforeach
      @endsection
</div>
