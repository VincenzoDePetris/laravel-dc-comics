@extends('layouts.app')

@section('comics')
  <section class="container mt-5">

    <a href="{{ route('comics.create') }}" role="button" class="btn btn-primary"
    >Crea fumetto</a>
  
    <table class="table">
      <thead>
          <tr>
              <th scope="row">Id</th>
              <th scope="col">Titolo</th>
              <th scope="col">Prezzo</th>
              <th scope="col">Serie</th>
              <th scope="col">Data di sconto</th>
              <th scope="col">Tipo</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($comics as $comic)
          <tr>
              <th scope="row"><a href="{{ route('comics.show', $comic)}}">Dettaglio fumetto</a>, 
                <a href="{{ route('comics.edit', $comic) }}">Modifica</a>
                <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#delete-modal-{{ $comic->id }}"
                >
                    Elimina
                </button>
              </th>
              <td>{{ $comic->title }}</td>
              <td>{{ $comic->price }}</td>
              <td>{{ $comic->series }}</td>
              <td>{{ $comic->sale_date }}</td>
              <td>{{ $comic->type }}</td>
          </tr>

          <div
    class="modal fade"
    id="delete-modal-{{ $comic->id }}"
    tabindex="-1"
    aria-labelledby="delete-modal-{{ $comic->id }}-label"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1
                    class="modal-title fs-5"
                    id="delete-modal-{{ $comic->id }}-label"
                >
                    Conferma eliminazione
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body text-start">
                Sei sicuro di voler eliminare il fumetto {{ $comic->title }} di Tipo {{
                $comic->type }} con ID {{ $comic->id }}? <br />
                L'operazione non è reversibile
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Annulla
                </button>

                <form
                    action="{{ route('comics.destroy', $comic) }}"
                    method="POST"
                    class=""
                >
                    @method('DELETE') @csrf

                    <button type="submit" class="btn btn-danger">
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
          @endforeach
      </tbody>
    </table>
  </section>
@endsection