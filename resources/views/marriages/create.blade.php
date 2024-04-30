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
                    Add New Marriage Certificate Request
                </div>
                <div class="float-end">
                    <a href="{{ route('marriages.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('marriages.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label for="bride_first_name">Bride's First Name</label>
                        <input type="text" class="form-control" id="bride_first_name" name="bride_first_name">
                    </div>
                    <div class="form-group">
                        <label for="bride_last_name">Bride's Last Name</label>
                        <input type="text" class="form-control" id="bride_last_name" name="bride_last_name">
                    </div>
                    <div class="form-group">
                        <label for="groom_first_name">Groom's First Name</label>
                        <input type="text" class="form-control" id="groom_first_name" name="groom_first_name">
                    </div>
                    <div class="form-group">
                        <label for="groom_last_name">Groom's Last Name</label>
                        <input type="text" class="form-control" id="groom_last_name" name="groom_last_name">
                    </div>
                    <div class="form-group">
                        <label for="god_mother_name">God Mother's Name</label>
                        <input type="text" class="form-control" id="god_mother_name" name="god_mother_name">
                    </div>
                    <div class="form-group">
                        <label for="god_father_name">God Father's Name</label>
                        <input type="text" class="form-control" id="god_father_name" name="god_father_name">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="clergy_name">Clergy Name</label>
                        <input type="text" class="form-control" id="clergy_name" name="clergy_name">
                    </div>
                    <div class="form-group">
                        <label for="church_name">Church Name</label>
                        <input type="text" class="form-control" id="church_name" name="church_name">
                    </div>

                    
                    <div class="mb-3 row">
                        <input  style="background-color: black; color:white;" type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Send Marriage Request">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection