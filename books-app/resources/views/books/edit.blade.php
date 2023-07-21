<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

@include('layouts.header')

<div class="mt-3 border-bottom">
    <h2 class="ms-5 mb-3">
        <span class="text-danger">{{strtoupper($book->title)}}</span> - izmjeni detalje
    </h2>
</div>

<div class="container mt-3">
    <form method="POST" action="{{route('books.update', $book->id)}}">
        @csrf
        @method('PUT')
        <div class="row ">
            <div class="col-6 border-end border-secondary-subtle">
                <h2 class="mb-3 text-info text-center">Osnovni detalji</h2>

                <label for="title" class="form-label">
                    Naziv knjige<span class="text-danger">*</span>
                </label>
                <input name="title" value="{{$book->title}}" class="form-control" required/>
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="author" class="form-label mt-2">
                    Izaberite autore<span class="text-danger">*</span>
                </label>
                <select name="author[]" class="form-control" multiple required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                                @if($book->authors->contains('id', $author->id)) selected @endif
                        >
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
                @error('author')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="category" class="form-label mt-2">
                    Izaberite kategorije<span class="text-danger">*</span>
                </label>
                <select name="category[]" class="form-control" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($book->categories->contains('id', $category->id)) selected @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="genre" class="form-label mt-2">
                    Izaberite zanrove<span class="text-danger">*</span>
                </label>
                <select name="genre[]" class="form-control" multiple required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}"
                                @if($book->genres->contains('id', $genre->id)) selected @endif
                        >
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="publisher" class="form-label mt-2">
                    Izdavac<span class="text-danger">*</span>
                </label>
                <select name="publisher" class="form-control" required>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" @if($publisher->id === $book->publisher->id) selected @endif>
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
                @error('publisher')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="year" class="form-label mt-2">
                    Godina izdavanja<span class="text-danger">*</span>
                </label>
                <input name="year" value="{{$book->year}}" class="form-control" required/>
                @error('year')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-6">
                <h2 class="mb-3 text-info text-center">Specifikacija</h2>
                <label for="pages" class="form-label">
                    Broj strana<span class="text-danger">*</span>
                </label>
                <input name="pages" value="{{$book->page_count}}" class="form-control" required/>
                @error('pages')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="letter" class="form-label mt-2">
                    Pismo<span class="text-danger">*</span>
                </label>
                <select name="letter" class="form-control" required>
                    @foreach($letters as $letter)
                        <option value="{{ $letter->id }}" @if($letter->id === $book->letter->id) selected @endif>
                            {{ $letter->name }}
                        </option>
                    @endforeach
                </select>
                @error('letter')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="binding" class="form-label mt-2">
                    Povez<span class="text-danger">*</span>
                </label>
                <select name="binding" class="form-control" required>
                    @foreach($bindings as $binding)
                        <option value="{{ $binding->id }}" @if($binding->id === $book->binding->id) selected @endif>
                            {{ $binding->name }}
                        </option>
                    @endforeach
                </select>
                @error('binding')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="format" class="form-label mt-2">
                    Format<span class="text-danger">*</span>
                </label>
                <select name="format" class="form-control" required>
                    @foreach($formats as $format)
                        <option value="{{ $format->id }}" @if($format->id === $book->format->id) selected @endif>
                            {{ $format->name }}
                        </option>
                    @endforeach
                </select>
                @error('format')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="language" class="form-label mt-2">
                    Jezik<span class="text-danger">*</span>
                </label>
                <select name="language" class="form-control" required>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" @if($language->id === $book->language->id) selected @endif>
                            {{ $language->name }}
                        </option>
                    @endforeach
                </select>
                @error('language')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">Potvrdi</button>
                    <a href="{{route('books.index')}}" class="btn btn-danger">Otkazi</a>
                </div>
            </div>
        </div>
    </form>
</div>
