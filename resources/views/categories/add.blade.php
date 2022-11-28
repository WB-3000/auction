@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route($prefix.'.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="txtTitle">Name</label>
                    <input name="name" id="txtTitle" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}">
                    @error ('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="txtContent">Description</label>
                    <textarea name="description" id="txtContent"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="З">{{ old('description') }}</textarea>
                    @error ('description')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @isset($categories)
                    <div class="form-group">
                        <div class="row mt-2 p-3">
                            <h5 class="text-center">Choose lot categories:</h5>

                            @foreach ($categories as $category)
                                <div class="col-md-3 p-3">
                                    <input class="align-items-center @error('category') is-invalid @enderror"
                                           type="checkbox" id="is_show" value="1" name="cat[{{ $category->id }}]">
                                    <label class="align-items-center" for="is_show">{{ $category->name }}</label>
                                    @error ('category')
                                    <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endisset
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add">
                    <a href="{{ route($prefix.'.index') }}" class="btn btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection




