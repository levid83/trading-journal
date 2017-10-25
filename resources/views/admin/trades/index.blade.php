@extends('voyager::master')


@section('content')
<div class="page-content browse container-fluid">
    <form method="post" action="{{ url('/admin/trades') }}" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    @include ('admin.trades.toolbar')
    <div class="panel-group" id="accordion">
        <div class="panel panel-default" id="trades_filter_panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-target="#trades_filterbar" href="#trades_filterbar" class="collapsed">FilterBar</a>
                </h5>
            </div>
            <div id="trades_filterbar" class="panel-collapse collapse">
                <div class="panel-body">@include ('admin.trades.filterbar')</div>
            </div>
        </div>
        <div class="panel panel-default" id="trades_lsit_panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-target="#trades_list" href="#trades_list" >Trades</a>
                </h5>
            </div>
            <div id="trades_list" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="pagination-wrapper"> {!! $trades->appends(Request::except(array('page')))->render() !!} </div>
                        <table class="table-condensed table-borderless ">
                            <thead>
                            <tr>
                                <th></th>
                                <th>@sortablelink('id')</th>
                                <th>@sortablelink('underlying','Underlying')</th>
                                <th>Position Id</th>
                                <th>Tactic Id</th>
                                <th>@sortablelink('asset_class','Asset Class')</th>
                                <th>@sortablelink('action','Action')</th>
                                <th>Quantity</th>
                                <th>@sortablelink('expiration','Expiry')</th>
                                <th>@sortablelink('strike','Strike')</th>
                                <th>@sortablelink('put_call','Put Call')</th>
                                <th>Ask</th>
                                <th>Bid</th>
                                <th>Comm. Open</th>
                                <th>Comm. Close</th>
                                <th>@sortablelink('profit','Profit')</th>
                                <th>@sortablelink('open_date','Open Date')</th>
                                <th>@sortablelink('close_date','Close Date')</th>
                                <th>@sortablelink('Status')</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trades as $item)
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input name="id[{{$item->id}}]" type="checkbox" value="1">
                                        </label>
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->underlying }}</td>
                                <td>@if($item->position){{$item->position->counter }}@endif</td>
                                <td>@if($item->tactic){{$item->tactic->name }}@endif</td>
                                <td>{{ $item->asset_class }}</td>
                                <td>{{ $item->action }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ date('Y-m-d',strtotime($item->expiration)) }}</td>
                                <td>{{ $item->strike }}</td>
                                <td>{{ $item->put_call }}</td>
                                <td>{{ $item->ask }}</td>
                                <td>{{ $item->bid }}</td>
                                <td>{{ $item->commission_open }}</td>
                                <td>{{ $item->commission_close }}</td>
                                <td>{{ $item->profit }}</td>
                                <td>{{ $item->open_date }}</td>
                                <td>{{ $item->close_date }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                   <a href="{{ url('/admin/trades/' . $item->id . '/edit') }}" title="Edit trade"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $trades->appends(Request::except(array('page')))->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
