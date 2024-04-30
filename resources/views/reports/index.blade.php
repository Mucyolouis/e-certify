<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="background-color: #f0f0f0;">
                <div class="card-body">
                    <h5 class="card-title">
                        
                        Baptism
                    </h5>
                    <p class="card-text">Click below to generate all baptism Report.</p>
                    <a href="{{ url('/baptism-report') }}" class="btn btn-primary">
                        <i class="bi bi-journals"></i>
                        Baptism report
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background-color: #f0f0f0;">
                <div class="card-body">
                    <h5 class="card-title">
                        
                        Marriage</h5>
                    <p class="card-text">Click below to generate marriage Report.</p>
                    <a href="{{ url('/marriage-report') }}" class="btn btn-primary">
                        <i class="bi bi-journals"></i>
                        Marriage report
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background-color: #f0f0f0;">
                <div class="card-body">
                    <h5 class="card-title">
                        
                        Users</h5>
                    <p class="card-text">click below to generate users report.</p>
                    <a href="{{ url('/user-report') }}" class="btn btn-primary">
                        <i class="bi bi-journals"></i>
                        Users report
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
