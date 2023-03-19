@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('house.create') }}" class="btn btn-outline-secondary">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">House Listings</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Lot Area</th>
                                    <th>Date Built</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($houses as $house)
                                <tr>
                                    <td>{{ $house->name }}</td>
                                    <td>{{ $house->address }}</td>
                                    <td>{{ number_format($house->price) }}</td>
                                    <td>{{ $house->lot_area }}</td>
                                    <td>{{ $house->date_built }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('single.house', $house->id) }}" class="btn btn-sm btn-warning text-white" title="View page"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('house.show', $house->id) }}" class="btn btn-sm btn-success" title="Show details"><i class="fa fa-circle-info"></i></a>
                                            <a href="{{ route('house.edit', $house->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $house->id }}" title="Delete">
                                                <i class="fa fa-trash"></i>
                                                <form id="form{{ $house->id }}" action="{{ route('house.destroy', $house->id) }}" class="d-none" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </a>                                            
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">No house listings yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection