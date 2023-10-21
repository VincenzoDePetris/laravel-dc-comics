<a href="{{ route('comics.index') }}" class="btn btn-success">Torna alla  lista</a>


<form action="{{ route('comics.update', $comic) }}" method="POST">
  @method('PUT') @csrf

  <label for="title" class="form-label">Titolo</label>
  <input
      type="text"
      class="form-control"
      id="title"
      name="title"
      value="{{ $comic->title }}"
  />
    <br>
  <label for="type" class="form-label">Tipo</label>
  <select class="form-select" id="type" name="type">
      <option value="comic" @selected($comic->type == 'comic')>comic book</option>
      <option value="graphic" @selected($comic->type == 'graphic')>Graphic novel</option>
  </select>
  <br>
  <label for="price" class="form-label">Prezzo</label>
  <input
      type="text"
      class="form-control"
      id="price"
      name="price"
      value="{{ $comic->price }}"
  />
  <br>
  <label for="sale_date" class="form-label">Data di sconto</label>
  <input
      type="date"
      class="form-control"
      id="sale_date"
      name="sale_date"
      value="{{ $comic->sale_date }}"
  />
  <br>
  <label for="description" class="form-label">Descrizione</label>
  <textarea class="form-control" id="description" name="description" rows="4">
    {{ $comic->description }}
  </textarea>
  <br>
  <label for="thumb" class="form-label">Titolo</label>
  <input
      type="text"
      class="form-control"
      id="thumb"
      name="thumb"
      value="{{ $comic->thumb }}"
  />
  <br>
  <button type="submit" class="btn btn-primary">Modifica</button>
</form>