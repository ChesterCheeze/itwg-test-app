@extends('components.app-layout')
@section('title', 'Import Excel')

@section('content')
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
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('data') as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['address'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
@endsection
