<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    
                    Add New Baptism Certificate Request
                </div>
                <div class="float-end">
                    <a href="{{ route('baptisms.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('baptisms.store') }}" method="post">
                    @csrf
                    <input type="hidden" name = "user_id" value = "{{ Auth::user()->id }}">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Names</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mother_name" class="col-md-4 col-form-label text-md-end text-start">Mother name</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name">{{ old('mother_name') }}</textarea>
                            @if ($errors->has('mother_name'))
                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="father_name" class="col-md-4 col-form-label text-md-end text-start">Father name</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name">{{ old('father_name') }}</textarea>
                            @if ($errors->has('father_name'))
                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="godparent" class="col-md-4 col-form-label text-md-end text-start">Godparent</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('godparent') is-invalid @enderror" id="godparent" name="godparent">{{ old('godparent') }}</textarea>
                            @if ($errors->has('godparent'))
                                <span class="text-danger">{{ $errors->first('godparent') }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="mb-3 row">
                        <label for="clergy_name" class="col-md-4 col-form-label text-md-end text-start">Clergy Name</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('clergy_name') is-invalid @enderror" id="clergy_name" name="clergy_name">{{ old('clergy_name') }}</textarea>
                            @if ($errors->has('clergy_name'))
                                <span class="text-danger">{{ $errors->first('clergy_name') }}</span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <label for="church_name" class="col-md-4 col-form-label text-md-end text-start">Church Name</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('church_name') is-invalid @enderror" id="church_name" name="church_name">{{ old('church_name') }}</textarea>
                            @if ($errors->has('church_name'))
                                <span class="text-danger">{{ $errors->first('church_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start">date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">{{ old('date') }}</input>
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Baptism" style="background-color: black; color:white;">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection