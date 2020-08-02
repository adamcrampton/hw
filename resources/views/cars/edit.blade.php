@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Edit Car:</strong> {{ $car->name }}</h1>
    <hr>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Car Details</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Car Name</label>
                                <input type="text" value="{{ $car->name }}" class="form-control" id="name" placeholder="Enter name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="colour">Colour</label>
                                <input type="text" value="{{ $car->colour }}" class="form-control" id="colour" placeholder="Enter colour" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="form-control" name="year">
                                    <option value="">Select a year</option>
                                    
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="treasure-hunt" {{ $car->treasure_hunt ? 'checked' : '' }}>
                                <label class="form-check-label" for="treasure-hunt">Treasure Hunt</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="super-treasure-hunt" {{ $car->super_treasure_hunt ? 'checked' : '' }}>
                                <label class="form-check-label" for="super-treasure-hunt">Super Treasure Hunt</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Car Photo</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Upload new photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                              </div>
                            <img src="{{ $car->image ?? '/images/coming-soon.png' }}" class="img-fluid img-thumbnail">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/dashboard.css">
@stop

@section('js')
    <script src="/js/dashboard.js"></script>
@stop

