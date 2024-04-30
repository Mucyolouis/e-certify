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
                    Edit marriage
                </div>
                <div class="float-end">
                    <a href="{{ route('marriages.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('marriages.update', $marriage->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="bride_first_name" class="col-md-4 col-form-label text-md-end text-start">Bride's Name</label>
                        <div class="col-md-6">
                            
                            <input type="text" class="form-control @error('bride_first_name') is-invalid @enderror" id="bride_first_name" name="bride_first_name" value="{{ $marriage->bride_first_name }}">
                                @if ($errors->has('bride_first_name'))
                                    <span class="text-danger">{{ $errors->first('bride_first_name') }}</span>
                                @endif
                            
                            <input type="text" class="form-control mt-3 @error('bride_last_name') is-invalid @enderror" id="bride_last_name" name="bride_last_name" value="{{ $marriage->bride_last_name }}">
                                @if ($errors->has('bride_last_name'))
                                    <span class="text-danger">{{ $errors->first('bride_last_name') }}</span>
                                @endif
                        </div>
                            
                        
                    </div>

                    <div class="mb-3 row">
                        <label for="groom_first_name" class="col-md-4 col-form-label text-md-end text-start">Groom's Name</label>
                        <div class="col-md-6">
                            
                            <input type="text" class="form-control @error('groom_first_name') is-invalid @enderror" id="groom_first_name" name="groom_first_name" value="{{ $marriage->groom_first_name }}">
                                @if ($errors->has('groom_first_name'))
                                    <span class="text-danger">{{ $errors->first('groom_first_name') }}</span>
                                @endif
                            
                            <input type="text" class="form-control mt-3 @error('groom_last_name') is-invalid @enderror" id="groom_last_name" name="groom_last_name" value="{{ $marriage->groom_last_name }}">
                                @if ($errors->has('groom_last_name'))
                                    <span class="text-danger">{{ $errors->first('groom_last_name') }}</span>
                                @endif
                        </div>
                            
                        
                    </div>

                    <div class="mb-3 row">
                        <label for="god_father_name" class="col-md-4 col-form-label text-md-end text-start">God Parents Name</label>
                        <div class="col-md-6">
                            
                            <input type="text" class="form-control @error('god_father_name') is-invalid @enderror" id="god_father_name" name="god_father_name" value="{{ $marriage->god_father_name }}">
                                @if ($errors->has('god_father_name'))
                                    <span class="text-danger">{{ $errors->first('god_father_name') }}</span>
                                @endif
                            
                            <input type="text" class="form-control mt-3 @error('god_mother_name') is-invalid @enderror" id="god_mother_name" name="god_mother_name" value="{{ $marriage->god_mother_name }}">
                                @if ($errors->has('god_mother_name'))
                                    <span class="text-danger">{{ $errors->first('god_mother_name') }}</span>
                                @endif
                        </div>
                            
                        
                    </div>

                    <div class="mb-3 row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-end text-start">telephone</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $marriage->telephone }}">
                            @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $marriage->address }}">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="col-md-4 col-form-label text-md-end text-start">date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $marriage->date }}">
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="church_name" class="col-md-4 col-form-label text-md-end text-start">Parish</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('church_name') is-invalid @enderror" id="church_name" name="church_name" value="{{ $marriage->church_name }}">
                            @if ($errors->has('church_name'))
                                <span class="text-danger">{{ $errors->first('church_name') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    {{-- <div class="mb-3 row">
                        <label for="is_approved" class="col-md-4 col-form-label text-md-end text-start">Decision</label>
                        <div class="col-md-6">
                            <select id="is_approved" name="is_approved" class="form-select @error('is_approved') is-invalid @enderror">
                                <option value="">Decision</option>
                                <option value="0" {{ $marriage->is_approved == '0' ? 'selected' : '' }}>pending</option>
                                <option value="1">Approved</option>
                            </select>
                            @if ($errors->has('is_approved'))
                                <span class="text-danger">{{ $errors->first('is_approved') }}</span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update" style="background-color: black; color:white;">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection