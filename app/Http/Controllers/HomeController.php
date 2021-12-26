<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $books = Book::get();
        $popularBooks = Book::get();
        return view('welcome', compact('books', 'popularBooks'));
    }
}
