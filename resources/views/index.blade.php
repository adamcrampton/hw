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
        <th>Colour</th>
        <th clas="center">Photo</th>
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
                <td width="10%">{{ $car->colour }}</td>
                <td width="10%" class="text-center"><img src="{{ $car->image ?? '/images/coming-soon.png' }}" class="img-fluid img-thumbnail"></td>
                <td width="5%" class="text-center">{{ $car->year }}</td>
                <td width="15%">{{ $car->type->name }}</td>
                <td width="15%"d>{{ $car->series->name }}</td>
                <td width="5%" class="text-center">{{ $car->series_number }}</td>
                <td width="5%" class="text-center">{!! $car->treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td width="5%" class="text-center">{!! $car->super_treasure_hunt ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td width="5%" class="text-center"><a id="notes-{{ $car->id }}" class="btn btn-app"><i class="far fa-clipboard"></i>Notes</a></td>
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
