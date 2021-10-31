<?php

namespace App\Contracts\Dao\Books;

interface BookDaoInterface
{
    /**
     * To get Books
     * @return $Books
     */
    public function getBooks();


    /**
     * Add new book
     * @param $request
     */
    public function addBook($request);

    /**
     * update
     * @param $request, $book
     */
    public function updateBook($request, $book);

    /**
     * delete
     * @param $book
     */
    public function deleteBook($book);

    /**
     * import
     * @param $request
     */
    public function importExcel($request);
}
