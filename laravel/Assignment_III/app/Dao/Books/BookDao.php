<?php

namespace App\Dao\Books;

use App\Contracts\Dao\Books\BookDaoInterface;
use App\Models\Book;
use Carbon\Carbon;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


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
     /**
     * search date
     * @param $request
     */
    public function searchDate($request)
    {
        $start_date = Carbon::parse($request->start_date)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
            ->toDateTimeString();

        $books = DB::table('books')
            ->select('*')
            ->whereRaw(
                "(created_at >= ? AND created_at <= ?)",
                [
                    $start_date . " 00:00:00",
                    $end_date . " 23:59:59",
                ]
            )
            ->get();
        return $books;
    }
    /**
     * search name
     * @param $request
     */
    public function searchName($request)
    {
        $name = $request->get('name');
        $books = DB::table('books')
            ->select('*')
            ->where('name', '=', $name)
            ->get();
        return $books;
    }
    /**
     * search detail
     * @param $request
     */
    public function searchDetail($request)
    {
        $detail = $request->get('detail');
        $books = DB::table('books')
            ->select('*')
            ->where('detail', '=', $detail)
            ->get();

        return $books;
    }
}
