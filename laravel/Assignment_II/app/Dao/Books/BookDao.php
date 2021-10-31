<?php

namespace App\Dao\Books;

use App\Contracts\Dao\Books\BookDaoInterface;
use App\Models\Book;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;

class BookDao implements BookDaoInterface
{
    /**
     * To get Books
     * @return $Books
     * 
     */
    public function getBooks()
    {
        $Books = Book::latest()->paginate(10);
        return $Books;
    }

    /**
     * Add new Book
     * @param $request
     */
    public function addBook($request)
    {
        Book::create($request->all());
    }

    /**
     * update
     * @param $request, $Book
     */
    public function updateBook($request, $Book)
    {
        $Book->update($request->all());
    }

    /**
     * delete
     * @param $Book
     */
    public function deleteBook($Book)
    {
        $Book->delete();
    }

    /**
     * import
     * @param $request
     */
    public function importExcel($request)
    {
        Excel::import(new BooksImport, $request->file('file')->store('temp'));
    }
}
