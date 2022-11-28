@extends('layouts.app')

@section ('content')
    <div class="container">
        <div class="row text-center">
            <h1>{{ $data->name }}</h1>
        </div>
        <div class="row mt-5">
                <h3>{{ $data->description }}</h3>
        </div>
        <div class="row mt-5 text-center">
            <form action="{{ route( $prefix.'.delete', [ $prefix => $data->id]) }}" method="POST">
                @csrf
                @method ('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
                <a href="{{ route( $prefix.'.index') }}" class="btn btn-primary">Cancel</a>
            </form>
        </div>
    </div>
@endsection ( 'rnain')
