@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table id="table-cars" class="table table-striped table-hover">
    <thead>
        <th class="text-center">Number</th>
        <th>Name</th>
        <th>Owned</th>
        <th>Colour</th>
        <th class="center">Photo</th>
        <th class="text-center">Year</th>
        <th>Type</th>
        <th>Series</th>
        <th class="text-center">Series Number</th>
        <th class="text-center">Treasure Hunt</th>
        <th class="text-center">Super Treasure Hunt</th>
        <th class="text-center"></th>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td class="text-center" width="5%">{{ $car->number }}</td>
                <td width="20%">{{ $car->name }}</td>
                <td class="text-center" width="5%">
                    <a href="#" class="owned-toggle" data-car-id="{{ $car->id }}" data-user-id="{{ $user->id }}" data-owned="{{ $owned->contains('id', $car->id) }}">
                        {!! $owned->contains('id', $car->id) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </a>
                </td>
                <td width="10%">{{ $car->colour }}</td>
                <td width="10%" class="text-center">
                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="{{ $car->name }}">
                        <img src="{{ $car->image ?? '/images/coming-soon.png' }}" class="img-fluid img-thumbnail"></td>
                    </a>
                <td width="5%" class="text-center">{{ $car->year }}</td>
                <td width="10%">{{ $car->type->name }}</td>
                <td width="15%">{{ $car->series->name }}</td>
                <td width="5%" class="text-center">{{ $car->series_number }}</td>
                <td width="5%" class="text-center">{!! $car->treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td width="5%" class="text-center">{!! $car->super_treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td width="5%" class="text-center">
                    <a id="notes-{{ $car->id }}" class="btn btn-app {{ is_null($car->notes) ? 'disabled' : '' }}"><i class="far fa-clipboard"></i>Notes</a>
                </td>
            </tr>    
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/dashboard.css">
@stop

@section('js')
    <script src="/js/dashboard.js"></script>
@stop
