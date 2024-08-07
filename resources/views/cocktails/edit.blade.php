@extends('layouts.app')

@section('main')

<div class="container py-5">

    <a href="{{ route("cocktails.index") }}" class=" mb-3 btn btn-outline-primary">
      <i class="fas fa-arrow-left"></i>
      Torna alla lista dei Cocktails
    </a>
    
    <div class="cocktail-edit">
        <form  action="{{route('cocktails.update', $cocktail)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="img" class="form-label">Immagine</label>
              <input type="text" class="form-control" id="img" name="img" value="{{ old('img', $cocktail->img)}}">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cocktail->name)}}">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Descrizione</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $cocktail->description)}}">
            </div>
            <div class="mb-3">
              <label for="method" class="form-label">Metodo</label>
              <input type="text" class="form-control" id="method" name="method" value="{{ old('method', $cocktail->method)}}">
            </div>

            <div class="mb-3">
              <label for="glass_type" class="form-label">Tipo di bicchiere</label>
              <input type="text" class="form-control" id="glass_type" name="glass_type" value="{{ old('glass_type', $cocktail->glass_type)}}">
            </div>

            <fieldset class="my-4">
              <legend>Tipo di bicchiere</legend>
              @foreach ($glasses as $glass)
              <div class="form-check">
                @if ($errors->any())
                <input class="form-check-input" type="radio" name="glass_id" value="{{ $glass->id }}" id="glass-{{ $glass->id }}"
                {{in_array($glass->id, old('glasses', $cocktail->glasses)) ? 'checked' : ''}}>
                <label for="glass-{{ $glass->id }}">{{ $glass->name }}</label>
                @else
                <input class="form-check-input" type="radio" name="glass_id" value="{{ $glass->id }}" id="glass-{{ $glass->id }}"
                {{$cocktail->glasses->contains($glass) ? 'checked' : ''}}>
                <label for="glass-{{ $glass->id }}">{{ $glass->name }}</label>                  
                @endif
              </div>
              @endforeach
          </fieldset>

            <div class="mb-3">
              <label for="ingredients" class="form-label">Ingredienti</label>
              <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients', $cocktail->ingredients)}}">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $cocktail->price)}}">
            </div>
            
            <button type="submit" class="btn btn-outline-primary">Submit</button>
          </form>
    
    </div>

</div>

    
@endsection

