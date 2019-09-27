<?php

namespace App\Repository;

use Illuminate\Support\Collection;

class BookRepository
{
    public function getBooks(): Collection
    {
        $values = json_decode(file_get_contents(base_path('resources/json/books.json')), true);
        $books = [];

        foreach ($values as $value) {
            $books[] = $value['item'][0];
        }

        return collect($books);
    }
}
