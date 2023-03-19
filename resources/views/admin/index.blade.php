@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    House Listings
                                </div>
                                <div class="card-body text-center">
                                    <strong>Count:</strong>
                                    <span>{{ $houses->count() }}</span>
                                    <br>
                                    <a href="{{ route('house.index') }}" class="btn btn-outline-secondary mt-3">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection