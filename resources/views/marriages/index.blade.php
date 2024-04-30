<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Marriages List</div>
    <div class="card-body">
        @can('create-baptism')
            <a href="{{ route('marriages.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Marriage Request</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Bride Names</th>
                <th scope="col">Groom Names</th>
                <th scope="col">Address</th>
                <th scope="col">Mother Names</th>
                <th scope="col">Father Names</th>
                <th scope="col">Church</th>
                <th scope="col">Marriage Date</th>
                <th scope="col">Status</th>
                <th colspan="3" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($marriages as $marriage)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $marriage->bride_first_name }} {{ $marriage->bride_last_name }}</td>
                    <td>{{ $marriage->groom_first_name }} {{ $marriage->groom_last_name }}</td>
                    
                    <td>{{ $marriage->address }}</td>
                    <td>{{ $marriage->god_mother_name }}</td>
                    <td>{{ $marriage->god_father_name }}</td>
                    <td>{{ $marriage->church_name }}</td>
                    <td>{{ $marriage->date }}</td>
                    <td>
                        @can('can-download-pdf')
                                @if ($marriage->is_approved === 1)
                                    <a href="{{ route('generatemarriage-pdf', ['id' => $marriage->id]) }}" class="btn btn-primary">
                                        <i class="bi bi-cloud-arrow-down"></i>
                                        PDF</a>
                                @else
                                    <p class="disabled text-danger" disabled>Not approved yet</p>
                                @endif
                            @endcan
                    </td>
                    
                    <td>
                        <form action="{{ route('marriages.destroy', $marriage->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('marriages.show', $marriage->id) }}" class="btn btn-warning btn-sm" ><i class="bi bi-eye"></i> Show</a>

                            @can('edit-marriage')
                                <a href="{{ route('marriages.edit', $marriage->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-marriage')
                                <button type="submit" class="btn btn-danger btn-sm" style="background-color:red; color:white;" onclick="return confirm('Do you want to delete this marriage?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            @endcan
                            
                            
                        </form>
                        <form action="{{ route('marriages.approve', $marriage->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            @can('manage-marriage')
                                @if($marriage->is_approved != 1)
                                    <button type="submit" class="btn btn-success btn-sm" style="background-color:green; color:white;">
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
                            <strong>No Marriage Request Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $marriages->links() }}

    </div>
</div>
@endsection