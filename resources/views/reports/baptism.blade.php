<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')
<a href="{{ route('baptism-pdf') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-filetype-pdf"></i> Download</a>

    
        <div class="text-center">
            <h2>Baptisms List Report</h2>
        </div>
        <table class="table table-bordered">
            
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Names</th>
                <th scope="col">Address</th>
                <th scope="col">Mother Names</th>
                <th scope="col">Father Names</th>
                <th scope="col">God Parent</th>
                <th scope="col">Church</th>
                <th scope="col">Baptismal Date</th>
                <th scope="col">Created At</th>
                
                </tr>
            </thead>
            <tbody>
                @forelse ($baptisms as $baptism)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $baptism->name }}</td>
                    <td>{{ $baptism->address }}</td>
                    <td>{{ $baptism->mother_name }}</td>
                    <td>{{ $baptism->father_name }}</td>
                    <td>{{ $baptism->godparent }}</td>
                    <td>{{ $baptism->church_name }}</td>
                    <td>{{ $baptism->date }}</td>
                    <td>{{ $baptism->created_at }}</td>
                </tr>
                @empty
                    <td colspan="10">
                        <span class="text-danger">
                            <strong>No Baptism Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection