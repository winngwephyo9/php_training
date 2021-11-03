<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Books\BookServiceInterface;
use App\Http\Requests\CreateProductRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    private $bookInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookInterface = $bookServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookInterface->getBooks();

        return view('books.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $this->bookInterface->addBook($request);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Book $book)
    {
        $validated = $request->validated();
        $this->bookInterface->updateBook($request, $book);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId)
    {
              
        $deletedUserId = 1;
    $msg = $this->postInterface->deleteBook($bookId, $deletedUserId);
    return redirect()->route('books.index');
   // return response(['message' => $msg]);
    }

    /**
     * Export to excel
     *
     */
    public function export()
    {
        return Excel::download(new BooksExport, 'Books.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        $this->bookInterface->importExcel($request);
        return back();
    }
}
