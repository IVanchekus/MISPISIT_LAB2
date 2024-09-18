<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    public function index()
    {
        $jokes = Joke::orderBy("id", "desc")->get();
        return view('jokes.index', compact('jokes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Joke::create($validatedData);

        return redirect()->route('jokes.index')->with('success', 'Прикольчик успешно создан!');
    }

    public function edit($id)
    {
        $joke = Joke::findOrFail($id);
        return view('jokes.edit', compact('joke'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $joke = Joke::findOrFail($id);
        $joke->update($validatedData);

        return redirect()->route('jokes.index')->with('success', 'Прикольчик успешно обновлен!');
    }

    public function destroy($id)
    {
        $joke = Joke::findOrFail($id);
        $joke->delete();

        return redirect()->route('jokes.index')->with('success', 'Прикольчик успешно удален!');
    }
}
