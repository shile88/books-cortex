<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Binding;
use App\Models\Book;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Letter;
use App\Models\Publisher;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()->with(['authors', 'genres', 'categories'])->get();

        return view('dashboard', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $letters = Letter::all();
        $formats = Format::all();
        $bindings = Binding::all();
        $languages = Language::all();

        return view('books.create', [
            'genres' => $genres,
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'letters' => $letters,
            'formats' => $formats,
            'bindings' => $bindings,
            'languages' => $languages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validated();

        $book = Book::create([
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
            'page_count' => $validatedData['pages'],
            'letter_id' => $validatedData['letter'],
            'binding_id' => $validatedData['binding'],
            'format_id' => $validatedData['format'],
            'language_id' => $validatedData['language'],
            'publisher_id' => $validatedData['publisher'],
        ]);

        $book->genres()->attach($validatedData['genre']);
        $book->categories()->attach($validatedData['category']);
        $book->authors()->attach($validatedData['author']);

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', ['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::all();
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $letters = Letter::all();
        $formats = Format::all();
        $bindings = Binding::all();
        $languages = Language::all();

        return view('books.edit', [
            'book' => $book,
            'genres' => $genres,
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'letters' => $letters,
            'formats' => $formats,
            'bindings' => $bindings,
            'languages' => $languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        $book = Book::find($book->id);

        $book->update([
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
            'page_count' => $validatedData['pages'],
            'letter_id' => $validatedData['letter'],
            'binding_id' => $validatedData['binding'],
            'format_id' => $validatedData['format'],
            'language_id' => $validatedData['language'],
            'publisher_id' => $validatedData['publisher'],
        ]);

        $book->genres()->detach();
        $book->categories()->detach();
        $book->authors()->detach();

        $book->genres()->attach($validatedData['genre']);
        $book->categories()->attach($validatedData['category']);
        $book->authors()->attach($validatedData['author']);

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->authors()->detach();
        $book->categories()->detach();
        $book->genres()->detach();
        $book->delete();

        return redirect()->route('books.index');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('title');

        $books = Book::where('title', 'like', '%'.$searchTerm.'%')->get();

        return view('dashboard', ['books' => $books]);
    }
}
