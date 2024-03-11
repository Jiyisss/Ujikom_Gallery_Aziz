<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>

        @if ($results->isEmpty())
            <p>No results found.</p>
        @else
            <div class="row">
                @foreach ($results as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('img/' . $post->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('singlepage', ['id' => $post->id]) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $results->links() }}
            </div>
        @endif
    </div>
</body>
</html>