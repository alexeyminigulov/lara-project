@extends('layouts.app')

@section('content')

    <table id="list-books" class="table table-bordered table-striped">
        <tbody>
        <tr>
            @if ($sort->isAsc('age'))
                <th><a href="?age=desc">age asc</a></th>
            @else
                <th><a href="?age=asc">age desc</a></th>
            @endif

            @if ($sort->isAsc('eyeColor'))
                <th><a href="?eyeColor=desc">eyeColor asc</a></th>
            @else
                <th><a href="?eyeColor=asc">eyeColor desc</a></th>
            @endif

            @if ($sort->isAsc('name'))
                <th><a href="?name=desc">name asc</a></th>
            @else
                <th><a href="?name=asc">name desc</a></th>
            @endif

            @if ($sort->isAsc('gender'))
                <th><a href="?gender=desc">gender asc</a></th>
            @else
                <th><a href="?gender=asc">gender desc</a></th>
            @endif

            @if ($sort->isAsc('company'))
                <th><a href="?company=desc">company asc</a></th>
            @else
                <th><a href="?company=asc">company desc</a></th>
            @endif

            @if ($sort->isAsc('email'))
                <th><a href="?email=desc">email asc</a></th>
            @else
                <th><a href="?email=asc">email desc</a></th>
            @endif

            @if ($sort->isAsc('phone'))
                <th><a href="?phone=desc">phone asc</a></th>
            @else
                <th><a href="?phone=asc">phone desc</a></th>
            @endif

            @if ($sort->isAsc('address'))
                <th><a href="?address=desc">address asc</a></th>
            @else
                <th><a href="?address=asc">address desc</a></th>
            @endif
        </tr>

        @foreach($books as $key => $book)
            <tr>
                <td>
                    {{ $book['age'] }}
                </td>
                <td>
                    {{ $book['eyeColor'] }}
                </td>
                <td>
                    {{ $book['name'] }}
                </td>
                <td>
                    {{ $book['gender'] }}
                </td>
                <td>
                    {{ $book['company'] }}
                </td>
                <td>
                    {{ $book['email'] }}
                </td>
                <td>
                    {{ $book['phone'] }}
                </td>
                <td>
                    {{ $book['address'] }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <a class="btn btn-success load-books" href="#">Read More</a>
@endsection
