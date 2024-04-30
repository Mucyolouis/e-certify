<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Baptisms List</div>
    <div class="card-body">
        @can('create-baptism')
            <a href="{{ route('baptisms.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Baptism</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Names</th>
                <th scope="col">Address</th>
                <th scope="col">Mother Names</th>
                <th scope="col">Father Names</th>
                <th scope="col">God Parent</th>
                <th scope="col">Church</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th colspan="3" scope="col">Action</th>
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
                    <td>
                        @can('can-download-pdf')
                                @if ($baptism->is_approved === 1)
                                    <a href="{{ route('generate-pdf', ['id' => $baptism->id]) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-cloud-arrow-down"></i>
                                        PDF</a>
                                @else
                                    <p class="disabled text-danger" disabled>Not approved yet</p>
                                @endif
                            @endcan
                    </td>
                    
                    <td>
                        <form action="{{ route('baptisms.destroy', $baptism->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('baptisms.show', $baptism->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-baptism')
                                <a href="{{ route('baptisms.edit', $baptism->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-baptism')
                                <button style="background-color:red; color:white;" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this baptism?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            @endcan
                            
                            
                            
                        </form>
                        <form action="{{ route('baptisms.approve', $baptism->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            @can('manage-baptism')
                            @if($baptism->is_approved != 1)
                                <button style="background-color:green; color:white;" type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Approve
                                </button>
                            @endif 
                            @endcan 
                        </form>
                    </td>
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

        {{ $baptisms->links() }}

    </div>
</div>
@endsection