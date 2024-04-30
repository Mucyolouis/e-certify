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
                    <strong class="text-center">
                        Marriage Certificate Request Information
                    </strong>
                </div>
                <div class="float-end">
                    <a href="{{ route('marriages.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Bride Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->bride_first_name }}  {{ $marriage->bride_last_name }}
                        </div>
                    </div>

                    
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Groom Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->groom_first_name }}  {{ $marriage->groom_last_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="godparent" class="col-md-4 col-form-label text-md-end text-start"><strong>godparent:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->god_father_name }} <br>
                            {{ $marriage->god_mother_name }}

                        </div>
                    </div>

                    <div class="row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-end text-start"><strong>Contact phone:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->telephone }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->address }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start"><strong>Marriage date:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start"><strong>Certificate Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->is_approved ? 'Approved' : 'Pending' }}
                        </div>
                    </div>

                    

                    

                    <div class="row">
                        <label for="clergy_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Clergy:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->clergy_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="church_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Parish:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->church_name }}
                        </div>
                    </div>

                    
                    <div class="row">
                        <label for="requested_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Requested at:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $marriage->created_at }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection