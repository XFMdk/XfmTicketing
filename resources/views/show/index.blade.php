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
                                <th scope="col">Season</th>
                                <th scope="col">Episodes</th>
                                <th scope="col">Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shows as $show)
                                <tr class="{{ $show->active === 0 ? 'inactive' : '' }}">
                                    <td>{{ $show->name }}</td>
                                    <td>{{ $show->user->name }}</td>
                                    @if ($show->season != null)
                                        <td>{{ $show->season }}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                    @if ($show->season != null)
                                        <td>{{ sizeof($show->episodes) }}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                    <td style="width: 30%;">{{ $show->description }}</td>
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

        <div style="margin: 12px;"></div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new show</div>
                <div class="card-body">
                    <form action="shows" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="createShowName">Name of show</label>
                            <input type="text" class="form-control" id="createShowName" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="createShowSeason">Season</label>
                            <input type="text" class="form-control" id="createShowSeason" name="season" />
                        </div>
                        <div class="form-group">
                            <select name="user_id" class="form-control">
                                <option selected>Choose...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="active" id="createShowActive" class="form-check-input">
                            <label for="createShowActive">Active</label>
                        </div>
                        <div class="form-group">
                            <label for="createShowDescription"></label>
                            <textarea name="description" id="createShowDescription" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
