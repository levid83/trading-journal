@if($vue_js == true)
    @extends('admin.layouts.vuejs-admin')
@else

@endif

@section('content')
    @include('admin.includes.styles')

<div class="page-content browse container-fluid">
    <form method="post" action="" accept-charset="UTF-8">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    <div class="panel-group" id="accordion">
        <div class="panel panel-default" id="trades_filter_panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-target="#trades_filterbar" href="#trades_filterbar">Filters</a>
                </h5>
            </div>
            <div id="trades_filterbar" class="panel-collapse collapse in">
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

                    <div class="table table-responsive">
                            <div class="col-sm-12 col-md-10 col-lg-10">
                                @include ('admin.trades.toolbar')
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <div class="pagination-wrapper"> {!! $trades->appends(Request::except(array('page','trade')))->render() !!} </div>
                            </div>

                        @if($vue_js == true)
                            <trades-page></trades-page>
                        @else
                          <table class="table-bordered table-striped table-condensed small" id="responsive-grid">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-nowrap">@sortablelink('id')</th>
                                @if(Auth::user()->isSuperAdmin())
                                <th class="text-nowrap">@sortablelink('trader.name','Trader')</th>
                                @endif
                                <th class="text-nowrap">@sortablelink('client.name','Client')</th>
                                <th class="text-nowrap">@sortablelink('underlying','Asset')</th>
                                <th class="text-nowrap">@sortablelink('position_id','Position')</th>
                                <th class="text-nowrap">@sortablelink('tactic.name','Tactic')</th>
                                <th class="text-nowrap">@sortablelink('asset_class','Class')</th>
                                <th class="text-nowrap">@sortablelink('action','Action')</th>
                                <th class="text-nowrap">@sortablelink('quantity','Qty.')</th>
                                <th class="text-nowrap">@sortablelink('expiration','Expiry')</th>
                                <th class="text-nowrap">@sortablelink('strike','Strike')</th>
                                <th class="text-nowrap">@sortablelink('put_call','P/C')</th>
                                <th class="text-nowrap">@sortablelink('ask','Ask')</th>
                                <th class="text-nowrap">@sortablelink('bid','Bid')</th>
                                <th>Open Comm.</th>
                                <th>Close Comm.</th>
                                <th class="text-nowrap">@sortablelink('profit','P/L')</th>
                                <th class="text-nowrap">@sortablelink('open_date','Opened')</th>
                                <th class="text-nowrap">@sortablelink('close_date','Closed')</th>
                                <th class="text-nowrap">@sortablelink('status','Status')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trades as $item)
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input name="trade[{{$item->id}}]" id="trade_{{$item->id}}" type="checkbox" value="{{$item->id}}">
                                        </label>
                                    </div>
                                </td>
                                <td data-title="Id">{{ $item->id }}</td>
                                @if(Auth::user()->isSuperAdmin())
                                <td data-title="Trader">{{ $item->trader->account_id }}</td>
                                @endif
                                <td data-title="Client">{{ $item->client->account_id }}</td>
                                <td data-title="Asset">{{ $item->underlying }}</td>
                                <td data-title="Position" title="@if($item->position){{$item->position->name}}@endif">@if($item->position){{$item->position->id }}@endif</td>
                                <td data-title="Tactic">@if($item->tactic){{$item->tactic->name }}@endif</td>
                                <td data-title="Class">{{ $item->asset_class }}</td>
                                <td data-title="Action">{{ $item->action }}</td>
                                <td data-title="Qty.">{{ $item->quantity }}</td>
                                <td data-title="Expiry">{{ $item->expiration }}</td>
                                <td data-title="Strike">{{ $item->roundedStrike }}</td>
                                <td data-title="P/C">{{ $item->put_call }}</td>
                                <td data-title="Ask">{{ $item->roundedAsk }}</td>
                                <td data-title="Bid">{{ $item->roundedBid }}</td>
                                <td data-title="Open Comm.">{{ $item->commission_open }}</td>
                                <td data-title="Close Comm.">{{ $item->commission_close }}</td>
                                <td data-title="P/L">{{ $item->roundedProfit }}</td>
                                <td data-title="Opened">{{ $item->open_date }}</td>
                                <td data-title="Closed">{{ $item->close_date }}</td>
                                <td data-title="Status">{{ $item->status }}</td>
                                <td>
                                   <a href="{{ url('/admin/trades/' . $item->id . '/edit') }}" title="Edit trade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        <div class="pagination-wrapper"> {!! $trades->appends(Request::except(array('page','trade')))->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
