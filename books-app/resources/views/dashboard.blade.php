<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <title>Online Biblioteka</title>
</head>

<body >
    @include('layouts.header')

    <div class="mt-4 border-bottom">
        <h1 class="ms-5 mb-4">
            Knjige
        </h1>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col ">
                <a href="{{ route('books.create') }}" class="btn btn-primary ">Dodaj knjigu</a>
            </div>
           <div class="col-6">
               <form action="{{ route('books.search') }}" method="GET" class="text-center">
                   <input type="text" name="title" class="form-control form-input w-50 d-inline" placeholder="Pretrazi po naslovu knjige...">
                   <button type="submit" class="form-control text-white bg-success w-25 d-inline">Trazi</button>
               </form>
           </div>
        </div>
    </div>

    <main class="container mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr class="table-light text-center">
                <th>Naziv knjige</th>
                <th>Autor</th>
                <th>Zanr</th>
                <th>Kategorija</th>
                <th>Akcije</th>
            </tr>
            </thead>
            <tbody>

            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach($book->authors as $author)
                            {{ $author->name }}
                            @unless($loop->last)
                                ,
                            @endunless
                        @endforeach
                    </td>
                    <td>
                        @foreach($book->genres as $genre)
                            {{ $genre->name }}
                            @unless($loop->last)
                                ,
                            @endunless
                        @endforeach
                    </td>
                    <td>
                        @foreach($book->categories as $category)
                            {{ $category->name }}
                            @unless($loop->last)
                                ,
                            @endunless
                        @endforeach
                    </td>
                    <td>
                        <div class="text-center">
                            <a href="{{route('books.show', $book)}}" class="col-3 btn btn-info">Detalji</a>
                            <a href="{{route('books.edit', $book->id)}}" class="col-3 ms-3 me-3 btn btn-warning">Uredi</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="col-md-3 btn btn-danger">Izbrisi</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </main>
</body>
