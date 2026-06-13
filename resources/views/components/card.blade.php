<div class="card mx-auto card-w shadow text-center mb-3">

    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200' }}" alt="Immagine dell'articolo {{ $article->title }}" class="card-img-top">
       
    <div class="card-body">

        <h4 class="card-title">{{$article->title}}</h4>
        <h6 class="card-subtitle text-body-secondary">{{$article->price}} €</h6>
        
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-card">Dettaglio</a>
            @if ($article->category)
            <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn btn-card">{{ $article->category->name }}</a>
            @endif
        </div>
    
    </div>

</div>