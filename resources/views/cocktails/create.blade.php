@extends('layouts.app')

@section('main')
  <div class="container mt-5">
    <h1 class="mb-3">Create New Cocktail</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('cocktails.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
      </div>
      <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
      </div>
      <div class="form-group mb-3">
        <label for="ingredients">Ingredients</label>
        <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required>{{ old('ingredients') }}</textarea>
      </div>
      <div class="form-group mb-3">
        <label for="method">Method</label>
        <textarea class="form-control" id="method" name="method" rows="3" required>{{ old('method') }}</textarea>
      </div>

      <div class="form-group mb-3">
        <label for="price">Price ($)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price"
          value="{{ old('price') }}" required>
      </div>
      <div class="form-group mb-3">
        <label for="img">Image</label>
        <input type="text" class="form-control" id="img" name="img" value="{{ old('img') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Select Glass Type</label>
        @foreach ($glasses as $glass)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="glass_id" id="glass{{ $glass->id }}"
              value="{{ $glass->id }}" required>
            <label class="form-check-label" for="glass{{ $glass->id }}">
              {{ $glass->name }}
            </label>
          </div>
        @endforeach
      </div>
      <button type="submit" class="btn btn-outline-primary mb-5">Create Cocktail</button>
    </form>
  </div>
@endsection
