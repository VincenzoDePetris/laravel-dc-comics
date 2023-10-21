<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $comic = new Comic;
        $comic->fill($data);
        $comic->save();
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validation($request->all(), $comic->id);
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data) {
        $validator = Validator::make(
          $data,
          [
            'title' => 'required|string|max:40',
            'series' => 'required|string|max:40',
            "type" => "required|string|in:comic,graphic",
            "price" => "required|string|max:10",
            "thumb" => "nullable|string",
            "sale_date"=>'required|date_format:Y-m-d H:i:s',
            "description" => "nullable|string"
          ],
          [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo deve massimo di 40 caratteri',
      
            'type.required' => 'Il tipo è obbligatorio',
            'type.integer' => 'Il tipo deve essere scelto tra graphic novel o comic',
      
            'price.required' => 'Il prezzo è obbligatorio',
            'price.in' => 'Il prezzo deve essere una stringa',
      
            'sale_date.required' => 'La data di sconto è obbligatoria',
      
            'thumb.string' => 'L\'immagine deve essere una stringa',
      
            'description.string' => 'La descrizione deve essere una stringa',
          ]
        )->validate();
      
        return $validator;
      }
}
