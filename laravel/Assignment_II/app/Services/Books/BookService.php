<?php

namespace App\Services\Books;

use App\Contracts\Dao\Books\BookDaoInterface;
use App\Contracts\Services\Books\BookServiceInterface;

class BookService implements BookServiceInterface
{

    /**
     * Book dao
     */
    private $BookDao;
    /**
     * Class Constructor
     * @param BookDaoInterface
     * @return
     */
    public function __construct(BookDaoInterface $BookDao)
    {
        $this->BookDao = $BookDao;
    }

    /**
     * To get Books
     * @return $Books
     */
    public function getBooks()
    {
        return $this->BookDao->getBooks();
    }

    /**
     * Add new Book
     * @param $request
     */
    public function addBook($request)
    {
        $this->BookDao->addBook($request);
    }

    /**
     * update
     * @param $request, $Book
     */
    public function updateBook($request, $Book)
    {
        $this->BookDao->updateBook($request, $Book);
    }

    /**
     * delete
     * @param $Book
     */
    public function deleteBook($Book)
    {
        $this->BookDao->deleteBook($Book);
    }

    /**
     * import Excel
     * @param $request
     */
    public function importExcel($request)
    {
        $this->BookDao->importExcel($request);
    }
}
