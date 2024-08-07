@extends("layouts.app")


@section("main")
    <div class="container py-5 ">
        <div class="row">
            <div class="card my-5 ">

                <h2 class="text-center my-3">
                    {{ $cocktail->name }}
                </h2>

                <div class="card-body">
                    <img src="{{$cocktail->img}}" alt="">
                        
                    
                    <div class="card-text mt-3">
                        <p>
                            {{ $cocktail->description }}
                        </p>
                        <p>
                            <strong>Ingredients:</strong> {{ $cocktail->ingredients }}
                        </p>
                        <p>
                            <strong>Method:</strong> {{ $cocktail->method }}
                        </p>
                        @forelse ($cocktail->glasses as $glass)
                        <p>
                            <strong>Glass Type:</strong> {{ $glass->name }}
                        </p>                       
                        @empty
                        <p>
                            <strong>Glass Type:</strong> Nessun bicchiere selezionato
                        </p>                           
                        @endforelse
                        <p>
                            <strong>Price:</strong> {{ $cocktail->price }}$
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <a href="{{ route("cocktails.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Torna alla lista Progetti
                        </a>
    
                        <div class="">
                            <a href="{{ route('cocktails.edit', $cocktail) }}" class="btn btn-outline-warning">
                                <i class="far fa-pen-to-square"></i>
                                Modifica Progetto
                            </a>

                        </div>
                    </div>
                        
                </div>
            </div>


        </div>
        </div>
    </div>
@endsection