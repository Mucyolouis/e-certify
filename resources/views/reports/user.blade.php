<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')

<a href="{{ route('user-pdf') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-filetype-pdf"></i> Download</a>
<div class="text-center">
    <h2>Users List Report</h2>
</div>        
        <table class="table  table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Created At</th>

                
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                            {{ $role }}
                        @empty
                        @endforelse
                    </td>
                    <td>{{ $user->created_at }}</td>
                    
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No User Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        

    
@endsection