@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <p>Welcome, <code style="color:black;">{{ Auth::user()->name }}</code>.</p>
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <a class="btn btn-primary" href="{{ route('roles.index') }}">
                                <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                        @endcanany
                        @canany(['create-user', 'edit-user', 'delete-user'])
                            <a class="btn btn-primary" href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Manage Users</a>
                        @endcanany
                        @canany(['create-baptism', 'edit-baptism', 'delete-baptism'])
                            <a class="btn btn-success" href="{{ route('baptisms.index') }}">
                                <i class="bi bi-droplet-half
                                "></i> Manage baptisms</a>
                        @endcanany
                        @canany(['create-marriage', 'edit-marriage', 'delete-marriage'])
                            <a class="btn btn-success" href="{{ route('marriages.index') }}">
                                <i class="bi bi-bookmark-heart"></i> Manage marriages</a>
                        @endcanany
                        @canany(['generate-report'])
                            <a class="btn btn-warning" href="{{ route('reports.index') }}">
                                <i class="bi bi-journal-text"></i> Reports</a>
                        @endcanany




                        <div class="container  mt-4">
                            @can('view-data-report')
                                <div class="row">

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total Baptised </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php
                                                        echo $approvedCount = DB::table('baptisms')
                                                            ->where('is_approved', true) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Total Married Couples</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php
                                                            echo $approvedMarriage = DB::table('marriages')
                                                            ->where('is_approved', true) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">marriage Rate
                                                        </div>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                    <?php
                                                                        
                                                                        $pendingCount = DB::table('baptisms')->where('is_approved', false)->count(); // Assuming 'is_approved' is a boolean column
                                                                        ?>
                                                                                                                                                    
                                                                        @if ($pendingCount==0)
                                                                            <?php echo $rate='100'.'% '; ?>
                                                                        @else
                                                                            <?php 
                                                                                $rate= ($approvedMarriage*100)/$pendingCount;
                                                                                echo $rate." % ";
                                                                                ?>
                                                                        @endif
                                                                        

                                                                    
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        style="width: 50%" aria-valuenow="<?php echo $rate; ?>" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pending Requests Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                            Pending Requests</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php echo $pending = DB::table('baptisms')->where('is_approved', false)->count(); // Assuming 'is_approved' is a boolean column  ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <!-- Baptism Card -->
                                    <div class="col-md-4">
                                        <div class="card  mb-3">
                                            <div class="card-header bg-secondary text-white">Baptism Requests</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Approved:
                                                    <strong>
                                                        <?php
                                                        echo $approvedCount = DB::table('baptisms')
                                                            ->where('is_approved', true) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                    </strong>
                                                </h5>
                                                <h5 class="card-title">Pending:
                                                    <strong>
                                                        <?php
                                                        echo $approvedCount = DB::table('baptisms')
                                                            ->where('is_approved', false) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                    </strong>
                                                </h5>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated: 3 mins ago</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Marriage Card -->
                                    <div class="col-md-4">
                                        <div class="card bg-secondary mb-3">
                                            <div class="card-header text-white">Marriage Requests</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Approved:
                                                    <strong>
                                                        <?php
                                                        echo $approvedCount = DB::table('marriages')
                                                            ->where('is_approved', true) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                    </strong>
                                                </h5>
                                                <h5 class="card-title">Pending:
                                                    <strong>
                                                        <?php
                                                        echo $approvedCount = DB::table('marriages')
                                                            ->where('is_approved', false) // Assuming 'is_approved' is a boolean column
                                                            ->count();
                                                        ?>
                                                    </strong>
                                                </h5>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated: 5 mins ago</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Users Card -->
                                    <div class="col-md-4">
                                        <div class="card bg-secondary mb-3">
                                            <div class="card-header text-white">Users</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Christians:
                                                    {{ $christianUsersCount }}
                                                </h5>
                                                <h5 class="card-title">Clergy Members: {{ $clergyUsersCount }}</h5>
                                                <h5 class="card-title">Admin Members: {{ $adminUsersCount }}</h5>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated: 10 mins ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                           <!-- Content Row -->
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
