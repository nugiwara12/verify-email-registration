@extends('layouts.app')
  
@section('title', 'Home ActivityLogs')
  
@section('contents')
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Description</th>
                <th>Date Time</th>
            </tr>
        </thead>
        <tbody>
            @if($activity_logs->count() > 0)
                @foreach($activity_logs as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">{{ $rs->date_time }}</td>  
                        <td class="align-middle">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Logs</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection