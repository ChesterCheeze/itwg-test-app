<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel Data</title>
</head>
<body>
    <!-- post data to control -->
    <form action="/import" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Import Data</button>

    </form>
    <div class="alert alert-success">
        @if(session('success'))
            {{ session('success') }}
        @endif
    </div>
    <div>
    @if(session('data'))
        <ul>
            @foreach(session('data') as $item)
                <li>{{ $item->name }} - {{ $item->email }}</li>
            @endforeach
        </ul>
    @endif
    </div>
</body>