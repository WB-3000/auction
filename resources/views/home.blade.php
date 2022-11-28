@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center text-center">
                <h1>Available lots</h1>
                <div class="row">

                    <div class="col-3 text-start">
                        <h3>Categories</h3>
                        <form action="{{ route('home')  }}" method="GET">
                            <div class="d-block mt-3">
                                <input id="all_cat" type="checkbox" value="all_cat" name="cat['all_cat']"
                                       @if (in_array('all_cat', $current_cats)) checked="checked" @endif onchange="setFries('all')">
                                <label class="align-items-center" for="cat['all_cat']">All categories</label>
                            </div>
                            <div class="d-block mt-3">
                                <input id="un_cat" type="checkbox" value="un_cat" name="cat['un_cat']"
                                       @if (in_array('un_cat', $current_cats)) checked="checked" @endif onchange="setFries('un_cat')">
                                <label class="align-items-center" for="cat['un_cat']">Uncategorized</label>
                            </div>
                            @foreach ($categories as $category)
                                <div class="d-block mt-3">
                                    <input class="align-items-center advance-input"
                                           type="checkbox" id="categories" value="{{ $category->id }}"
                                           name="cat[]" @if (in_array($category->id, $current_cats)) checked="checked" @endif
                                           onchange="setFries()">
                                    <label class="align-items-center" for="cat[{{ $category->id }}]">{{ $category->name }}</label>
                                </div>
                            @endforeach
                            <button class="mt-4 btn-primary" type="submit">Apply</button>
                        </form>
                    </div>

                    <div class="col-9 text-start">
                        <h3>Lots</h3>
                            @if (count($lots) > 0)
                                <table class="table table-striped my-articles-table">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Id</th>
                                            <th class="align-middle">Name</th>
                                            <th class="align-middle">Description</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($lots as $lot)
                                            <tr>
                                                <td class="align-middle">{{ $lot->id }}</td>
                                                <td class="align-middle">{{ $lot->name }}</td>
                                                <td class="align-middle">{{ \Illuminate\Support\Str::limit($lot->description, 200, $end='...') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3> No lots available </h3>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
