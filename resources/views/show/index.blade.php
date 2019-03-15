@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Shows
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Responsible</th>
                                <th scope="col">Episodes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shows as $show)
                                <tr class="{{ $show->active === 0 ? 'inactive' : '' }}">
                                    <td>{{ $show->name }}</td>
                                    <td>{{ $show->user->name }}</td>
                                    <td>{{ sizeof($show->episodes) }}</td>
                                    <td><a href="/shows/{{ $show->id }}/episodes">Go to show</a></td>
                                </tr>
                            @empty
                                No current shows.
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
