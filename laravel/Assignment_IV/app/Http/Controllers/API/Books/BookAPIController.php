<?php

namespace App\Http\Controllers\API\Books;

use App\Contracts\Services\Books\BookServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookAPIController extends Controller
{
    /**
     * book Interface
     */
    private $bookInterface;

    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookInterface = $bookServiceInterface;
    }

    /**
     * This is to get book list.
     * @return Response json with post list
     */
    public function getBookList()
    {
        $bookList = $this->bookInterface->getBooks();
        return response()->json($bookList);
    }

    /**
     * To delete book by id via api
     * @param string $bookid user id
     * @return Response message
     */
    public function deleteBookById($bookId)
    {
        $deletedUserId = 1;
        $msg = $this->bookInterface->deleteBook($bookId, $deletedUserId);
        return response(['message' => $msg]);
    }

    /**
     * To create book via API
     * @param CreateProductRequest $request request via API
     * @return Response json created user
     */
    public function createBook(CreateProductRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $book = $this->bookInterface->addBook($validated);
        return response()->json($book);
    }

    /**
     * To Update book via API
     * @param bookEditAPIRequest $request request via API
     * @param string $bookId book id
     * @return Response json updated book.
     */
    public function updateBook(Request $request, $bookId)
    {
        // validation for request values
        // $validated = $request->validated();
        // $book = $this->bookInterface->updatedbookByIdAPI($validated, $bookId);
        $book = Book::find($bookId);
        $book->name = $request->name;
        $book->detail = $request->detail;
        $book->save();
        return response()->json($book);
    }

    /**
     * To get book by id via API
     * @param string $bookId book id
     * @return Response json book object
     */
    public function getBookById($bookId)
    {
        $book = $this->bookInterface->getBookById($bookId);
        return response()->json($book);
    }
}
