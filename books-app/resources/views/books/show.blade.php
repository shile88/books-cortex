<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

@include('layouts.header')

<div class="mt-3 border-bottom">
    <h2 class="ms-5 mb-3">
        Knjiga - detalji
    </h2>
</div>
<a href="{{route('books.index')}}" class="btn btn-primary ms-5 mt-3">Nazad</a>

<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="card" >
                <div class="card-header fw-bold">
                    Osnovni detalji
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-secondary">Naziv knjige: <span class="fw-semibold fs-5 text-danger">{{$book->title}}</span></li>
                    <li class="list-group-item text-secondary">Kategorija:
                    @foreach ($book->categories as $category)
                        <span class="fw-semibold fs-5 text-danger">{{$category->name}}</span>
                            @unless($loop->last)
                                ,
                            @endunless
                    @endforeach
                    </li>
                    <li class="list-group-item text-secondary">Zanr:
                    @foreach ($book->genres as $genre)
                         <span class="fw-semibold fs-5 text-danger">{{$genre->name}}</span>
                            @unless($loop->last)
                                ,
                            @endunless
                    @endforeach
                    </li>
                    <li class="list-group-item text-secondary">Autor/i:
                    @foreach ($book->authors as $author)
                         <span class="fw-semibold fs-5 text-danger">{{ $author->name }}</span>
                            @unless($loop->last)
                                ,
                            @endunless
                    @endforeach
                    </li>
                    <li class="list-group-item text-secondary">Izdavac: <span class="fw-semibold fs-5 text-danger">{{$book->publisher->name}}</span></li>
                    <li class="list-group-item text-secondary">Godina: <span class="fw-semibold fs-5 text-danger">{{$book->year}}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header fw-bold">
                    Specifikacija
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-secondary">Broj strana: <span class="fw-semibold fs-5 text-danger">{{$book->page_count}}</span></li>
                    <li class="list-group-item text-secondary">Pismo: <span class="fw-semibold fs-5 text-danger">{{$book->letter->name}}</span></li>
                    <li class="list-group-item text-secondary">Jezik: <span class="fw-semibold fs-5 text-danger">{{$book->language->name}}</span></li>
                    <li class="list-group-item text-secondary">Povez: <span class="fw-semibold fs-5 text-danger">{{$book->binding->name}}</span></li>
                    <li class="list-group-item text-secondary">Format: <span class="fw-semibold fs-5 text-danger">{{$book->format->name}}</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
