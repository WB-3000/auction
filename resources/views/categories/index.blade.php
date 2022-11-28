@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-6 text-start">
                        <h1>{{ $h1 }}</h1>
                    </div>
                    <div class="col-6 text-end add-btn">
                        <a href="{{ route($prefix.'.add')  }}" class="btn btn-primary">Add new {{ $prefix }}</a>
                    </div>
                </div>
            </div>

            @if (count($data) > 0)
                <table class="table table-striped my-articles-table">
                    <thead>
                    <tr>
                        <th class="align-middle">Id</th>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $unit)
                            <tr>
                                <td class="align-middle">{{ $unit->id }}</td>
                                <td class="align-middle">{{ $unit->name }}</td>
                                <td class="align-middle">{{ \Illuminate\Support\Str::limit($unit->description, 200, $end='...') }}</td>
                                <td class="align-middle text-end"><a class="btn btn-primary"
                                       href="{{ route($prefix.'.edit', [ $prefix => $unit->id]) }}">Edit</a></td>
                                <td class="align-middle text-end"><a class="btn btn-primary"
                                       href="{{ route($prefix.'.view' , [ $prefix => $unit->id]) }}">View/Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

