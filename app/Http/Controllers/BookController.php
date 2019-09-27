<?php

namespace App\Http\Controllers;

use App\Entity\Sort;
use App\Repository\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BookController extends Controller
{
    private $perPage = 2;
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show(Request $request)
    {
        $sort = new Sort($request, $this->repository->getBooks());
        $books = $sort->sort()
            ->onlyIsActive()
            ->getCollection();

        if ($request->ajax()) {

            $page = $request->input('page', 2);
            return new LengthAwarePaginator($books->forPage($page, $this->perPage), $books->count(), $this->perPage, $page);
        }

        $books = $books->forPage(1, $this->perPage);
        return view('books.show', ['books' => $books, 'sort' => $sort]);
    }
}
