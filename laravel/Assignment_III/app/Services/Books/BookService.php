<?php

namespace App\Services\Books;

use App\Contracts\Dao\Books\BookDaoInterface;
use App\Contracts\Services\Books\BookServiceInterface;

class BookService implements BookServiceInterface
{

    /**
     * Book dao
     */
    private $bookDao;
    /**
     * Class Constructor
     * @param bookDaoInterface
     * @return
     */
    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    /**
     * To get Books
     * @return $Books
     */
    public function getBooks()
    {
        return $this->bookDao->getBooks();
    }

    /**
     * Add new Book
     * @param $request
     */
    public function addBook($request)
    {
        $this->bookDao->addBook($request);
    }

    /**
     * update
     * @param $request, $Book
     */
    public function updateBook($request, $book)
    {
        $this->bookDao->updateBook($request, $book);
    }

    /**
     * delete
     * @param $book
     */
    public function deleteBook($book)
    {
        $this->bookDao->deleteBook($book);
    }

    /**
     * import Excel
     * @param $request
     */
    public function importExcel($request)
    {
        $this->bookDao->importExcel($request);
    }
     /**
     * search date
     * @param $request
     */
    public function searchDate($request)
    {
        $books = $this->bookDao->searchDate($request);
        return $books;
    }
    /**
     * search name
     * @param $request
     */
    public function searchName($request)
    {
        $books = $this->bookDao->searchName($request);
        return $books;
    }
    /**
     * search detail
     * @param $request
     */
    public function searchDetail($request)
    {
        $books = $this->bookDao->searchDetail($request);
        return $books;
    }
}
