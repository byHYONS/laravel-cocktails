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
                    ,
                  @endif
                @endforeach
              </p>

              <p><strong>Price:</strong> {{ $cocktail->price }}$</p>

              <div class="card-footer">
                <a href="{{ route('cocktails.show', $cocktail) }}" class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-binoculars"></i>
                </a>
                <a href="{{ route('cocktails.edit', $cocktail) }}" class="btn btn-outline-warning btn-sm">
                  <i class="far fa-pen-to-square"></i>
                </a>

                <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" style="display:inline;"
                  onsubmit="return confirmDelete()">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this cocktail?')">
                    <i class="far fa-trash-can"></i></button>
                </form>
              </div>

            </div>
          </div>
        </div>
      @endforeach
    @endsection
