@extends('adminlte::page')

@section('title', 'Trade Import')

@section('content_header')

@stop

@section('content')
    @include('admin.includes.errors')
    <div class="page-content browse container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Upload Csv file
            </div>

            <div class="panel-body">
                <form action="{{ route('trade-import.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="trade_file">Trade csv file</label>
                        <input type="file" name="trade_file" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">
                                Upload
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('css')

@stop

@section('js')

@stop