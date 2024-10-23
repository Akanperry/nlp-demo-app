<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create() {
        $books = Book::latest()->get();
        return view('index', compact('books'));
    }
}
