<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')
<a href="{{ route('marriage-pdf') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-filetype-pdf"></i> Download</a>
    <div class="text-center">
        <h2>Marriages List Report</h2>
    </div>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Bride Names</th>
                <th scope="col">Groom Names</th>
                <th scope="col">Address</th>
                <th scope="col">Mother Names</th>
                <th scope="col">Father Names</th>
                <th scope="col">Church</th>
                <th scope="col">Clergy</th>
                <th scope="col">Marriage Date</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
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
                    <td>{{ $marriage->clergy_name ?? 'N/A' }}</td>

                    <td>{{ $marriage->date }}</td>
                    <td>@if ($marriage->is_approved === 0)
                        Pending
                    @elseif ($marriage->is_approved === 1)
                        Approved
                    @endif
                    </td>
                    <td>{{ $marriage->created_at }}</td>

                    
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

@endsection