<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Arr;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Loan;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->with(['tag', 'loans'])->get();

        return view('welcome', [
            'books' => $books,
            'tags' => Tag::all(),
            'loans' => Loan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        $attributes = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'published_year' => ['required', 'date'],
            'description' => ['required'],
            'tag_id' => ['required']
        ]);

        Book::create($attributes);

        return redirect('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $tags = Tag::all();
        $loan = $book->loans()->orderBy('due_date', 'desc')->first();

        return view('show', compact('book', 'loan', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreBookRequest $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'published_year' => ['required', 'date'],
            'description' => ['required'],
            'tag_id' => ['required']
        ]);

        if(Auth::user()->id === 13){
            $book->update($attributes);
        }
            return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
