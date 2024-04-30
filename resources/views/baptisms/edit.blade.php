<div>
    <!-- He who is contented is rich. - Laozi -->
</div>
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Baptism
                </div>
                <div class="float-end">
                    <a href="{{ route('baptisms.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('baptisms.update', $baptism->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $baptism->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $baptism->address }}">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mother_name" class="col-md-4 col-form-label text-md-end text-start">mother_name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ $baptism->mother_name }}">
                            @if ($errors->has('mother_name'))
                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="father_name" class="col-md-4 col-form-label text-md-end text-start">father_name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ $baptism->father_name }}">
                            @if ($errors->has('father_name'))
                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="godparent" class="col-md-4 col-form-label text-md-end text-start">godparent</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('godparent') is-invalid @enderror" id="godparent" name="godparent" value="{{ $baptism->godparent }}">
                            @if ($errors->has('godparent'))
                                <span class="text-danger">{{ $errors->first('godparent') }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="mb-3 row">
                        <label for="clergy_name" class="col-md-4 col-form-label text-md-end text-start">clergy_name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('clergy_name') is-invalid @enderror" id="clergy_name" name="clergy_name" value="{{ $baptism->clergy_name }}">
                            @if ($errors->has('clergy_name'))
                                <span class="text-danger">{{ $errors->first('clergy_name') }}</span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <label for="church_name" class="col-md-4 col-form-label text-md-end text-start">church_name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('church_name') is-invalid @enderror" id="church_name" name="church_name" value="{{ $baptism->church_name }}">
                            @if ($errors->has('church_name'))
                                <span class="text-danger">{{ $errors->first('church_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start">date</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $baptism->date }}">
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update" style="background-color: black; color:white;">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection