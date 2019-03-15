@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Episodes for {{ $show->name }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Episode</th>
                                {{-- <th scope="col">Responsible</th>
                                <th scope="col">Season</th> --}}
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($episodes as $episode)
                                <tr class="{{ $episode->active === 0 ? 'inactive' : '' }}">
                                    <td>{{ $episode->name }}</td>
                                    @if ($episode->episode_number != null)
                                        <td>{{ $episode->episode_number }}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                </tr>
                            @empty
                                No current shows.
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div style="margin: 12px;"></div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new show</div>
                <div class="card-body">
                    <form action="/shows/{{ $show->id }}/episodes" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
