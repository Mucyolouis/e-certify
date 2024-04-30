<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Baptism Information
                </div>
                <div class="float-end">
                    <a href="{{ route('baptisms.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->address }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="mother_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Mother:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->mother_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="father_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Father:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->father_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="godparent" class="col-md-4 col-form-label text-md-end text-start"><strong>Godparent:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->godparent }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="clergy_name" class="col-md-4 col-form-label text-md-end text-start"><strong>clergy:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->clergy_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="church_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Parish:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->church_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start"><strong>Baptism date:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start"><strong>Certificate Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->is_approved ? 'Approved' : 'Pending' }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="created_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Requested_at:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $baptism->created_at }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection