<?php

namespace App\Http\Controllers;
use App\Models\BooksInfo;
use Illuminate\Http\Request;
use Exception;
use Session;

class BooksInfoController extends Controller
{
    public function index(){
        $booksinfo = BooksInfo::all();
        return view('booksinfo', compact('booksinfo'));
    }


public function showEditForm($id)
{
        $book = BooksInfo::find($id);
        if (!is_null($book)){
            return view('edit-book', compact('book'));
        }
        Session::flash('error', 'We cannot find the record you are searching for.');
        return redirect()->back();
}


public function showNewForm()
{
    return view('new-book-form');
}

public function saveBookInfoChanges(Request $request)
{

/*
    $validated = $request->validate([
        'book_title' => 'required|max:150',
        'author' => 'required|max:255',
        'description' => 'required|max: 150',
        'year' => 'required|max:4'

    ]);

    */

try {
    $id = $request->id;
    $book = BooksInfo::find($id);
    $book->update([
        'book_title' => $request->book_title,
        'author' => $request->author,
        'description' => $request->description,
        'year' => $request->year,

    ]);

    Session::flash('message', 'Successfully updated book information!');
} catch (Exception $e) {
    Session::flash('error', 'Something went wrong, please try again later!');
}
    return redirect('/booksinfo');


}

public function saveNewBook (Request $request)
{

    /*
    $validated = $request->validate([
        'book_title' => 'required|max:150',
        'author' => 'required|max:255',
        'description' => 'required|max: 150',
        'year' => 'required|max:4'

    ]); */

    try {

        $bok = BooksInfo::create([
            'book_title' => $request->book_title,
            'author' => $request->author,
            'description' => $request->description,
            'year' => $request->year
        ]);
        if (!is_null($bok)){
            Session::flash('message','Successfully added a new book information');
        } else {
            throw new Exception('Unable to create a new book information');
        }

    } catch (Exception $e) {
        Session::flash('error', 'Something went wrong, please try again later.');
    }


    return redirect('/booksinfo');
}

public function deleteBook($id)
{
    $book = BooksInfo::find($id);
    $book->delete();

    Session::flash('message', 'Successfully removed book');
    return redirect('/booksinfo');
}






}


