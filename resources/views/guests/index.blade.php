@extends('layouts.default')
@section('content')
    <style>
    table thead tr th,
    table tbody tr td{ white-space: nowrap;}
   </style>
    <div class="content">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header text-white bg-dark">
                <div class="pt-1 float-left">Guests({{ count($data) }})</div>
                <a href="{{ route('guests.create') }}">
                    <button class="btn btn-success btn-sm float-right" type="submit">Add</button>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th class="text-center">Gender</th>
                                <th>Address</th>
                                <th colspan="2" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $guest)
                                <tr>
                                    <td class="pt-2">{{ $guest->first_name }}</td>
                                    <td class="pt-2">{{ $guest->last_name }}</td>
                                    <td class="pt-2">{{ $guest->email }}</td>
                                    <td class="pt-2">{{ $guest->phone_number }}</td>
                                    <td class="text-center pt-2">{{ $guest->gender }}</td>
                                    <td class="pt-2">{{ $guest->address }}</td>
                                    <td>
                                        <a href="{{ route('guests.edit',$guest->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm btn-block">Edit</button>
                                        </a>
                                    </td>
                                    <td class="">
                                        <form role="form" method="post" action="{{ route('guests.destroy',$guest->id) }}">
                                            {{csrf_field()}}
                                            @method('DELETE') 
                                            <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="100%">No data found.</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection