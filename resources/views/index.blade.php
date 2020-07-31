@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th class="text-center">Number</th>
        <th>Name</th>
        <th>Colour</th>
        <th class="text-center">Year</th>
        <th>Type</th>
        <th>Series</th>
        <th class="text-center">Series Number</th>
        <th class="text-center">Treasure Hunt</th>
        <th class="text-center">Super Treasure Hunt</th>
        <th class="text-center">Owned</th>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td class="text-center">{{ $car->number }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->colour }}</td>
                <td class="text-center">{{ $car->year }}</td>
                <td>{{ $car->type->name }}</td>
                <td>{{ $car->series->name }}</td>
                <td class="text-center">{{ $car->series_number }}</td>
                <td class="text-center">{!! $car->treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td class="text-center">{!! $car->super_treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td class="text-center">{!! $car->owned ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
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
