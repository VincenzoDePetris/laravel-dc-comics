
<a href="{{ route('comics.index') }}" class="btn btn-success">Torna alla  lista</a>

@if ($errors->any())
<div class="alert alert-danger">
    <h4>Correggi i seguenti errori per proseguire:</h4>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('comics.store') }}" method="POST">
  @csrf

  <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control" id="title" name="title" />
  <br>
  <label for="series" class="form-label">Serie</label>
  <input type="text" class="form-control" id="series" name="series" />
  <br>
  <label for="type" class="form-label">Tipo</label>
  <select class="form-select" id="type" name="type">
      <option value="comic">comic book</option>
      <option value="graphic">Graphic novel</option>
  </select>
  <br>
  <label for="price" class="form-label">Prezzo</label>
  <input type="text" class="form-control" id="price" name="price" />
  <br>
  <label for="thumb" class="form-label">Prezzo</label>
  <input type="text" class="form-control" id="thumb" name="thumb" />
  <br>
  <label for="sale_date">Date di sconto</label>
  <input type="date" id="sale_date" name="sale_date">
  <br>
  <label for="description" class="form-label">Descrizione</label>
  <textarea
      class="form-control"
      id="description"
      name="description"
      rows="4"
  ></textarea>
  <br>
  <button type="submit" class="btn btn-primary">Salva</button>
</form>