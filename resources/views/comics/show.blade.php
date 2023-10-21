

<a href="{{ route('comics.index') }}" class="btn btn-success">Torna alla  lista</a>

<section>
  <strong>Id: </strong> {{ $comic->id }} <br />
  <strong>Titolo: </strong> {{ $comic->title }} <br />
  <strong>TPrezzo: </strong> {{ $comic->price }} <br />
  <strong>Serie: </strong> {{ $comic->series }} <br />
  <strong>Data di sconto: </strong> {{ $comic->sale_date }} <br />
  <strong>Tipo:</strong> {{ $comic->type }} <br />
</section>