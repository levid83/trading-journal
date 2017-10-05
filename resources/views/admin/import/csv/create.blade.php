@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Upload Csv file
        </div>

        <div class="panel-body">
            <form action="{{ route('import.csv.bulk-import.store') }}" method="post" enctype="multipart/form-data">
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
@stop