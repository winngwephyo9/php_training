<?php

namespace App\Contracts\Services\Books;

interface BookServiceInterface
{
    /**
     * To get Book
     * @return $Book
     */
    public function getBooks();

    /**
     * Add new Book
     * @param $request
     */
    public function addBook($request);

    /**
     * update
     * @param $request, $Book
     */
    public function updateBook($request, $Book);

    /**
     * delete
     * @param $Book
     */
    public function deleteBook($Book);

    /**
     * import
     * @param $request
     */
    public function importExcel($request);
}
