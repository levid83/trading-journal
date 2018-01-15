@extends('adminlte::page')

@section('title', 'Trade List')

@section('content_header')

@stop

@section('content')
<div id="app">
    <trades-page inline-template>
        <div class="page-content browse container-fluid" >
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
                    <form method="post" action="{{ route('trades.update',['trade'=>0])}}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="panel panel-default" id="trades_list_panel">
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

                                    <trade-list trades="{{ json_encode($trades) }}"
                                                positions="{{ json_encode($positions) }}"
                                                tactics="{{ json_encode($tactics) }}"
                                                inline-template>
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

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="trade in getTrades" inline-template>
                                                <trade-item :trade="trade"
                                                            :positions="getPositions"
                                                            :tactics="getTactics">

                                                </trade-item>
                                            </template>
                                        </tbody>
                                    </table>
                                    </trade-list>
                                    <div class="pagination-wrapper"> {!! $trades->appends(Request::except(array('page','trade')))->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
    </trades-page>
</div>
@endsection

@section('css')
    @include('admin.includes.styles')
@stop

@section('js')
    <script src="{{ asset('js/admin/main.js')}}"></script>
@stop
