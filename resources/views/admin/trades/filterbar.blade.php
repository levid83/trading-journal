<form method="get" action="" accept-charset="UTF-8">
    {{ csrf_field() }}
    {{ method_field('GET') }}
<div class="col-sm-12 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="filterStatus" class="control-label">{{ 'Status' }}</label>
        <select class="form-control input-sm" name="filterStatus" id="filterStatus">
            <option value="">--All--</option>
            <option value="CLOSED" @if(old('filterStatus')=='CLOSED') selected @endif>CLOSED</option>
            <option value="OPEN" @if(old('filterStatus')=='OPEN') selected @endif>OPEN</option>
        </select>
    </div>
    @if(Auth::user()->isSuperAdmin())
    <div class="form-group">
        <label for="filterTrader" class="control-label">{{ 'Trader' }}</label>
        <select class="form-control input-sm" name="filterTrader" id="filterTrader">
            <option value="">---All---</option>
            @foreach($traders as $idx=>$tr)
                <option value="{{$tr->id}}" @if(old('filterTrader')==$tr->id) selected @endif>{{$tr->account_id}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-group">
        <label for="filterClient" class="control-label">{{ 'Client' }}</label>
        <select class="form-control input-sm" name="filterClient" id="filterClient">
            <option value="">---All---</option>
            @foreach($clients as $idx=>$c)
                <option value="{{$c->id}}" @if(old('filterClient')==$c->id) selected @endif>
                    {{$c->account_id}}@if($c->account_name!='' && $c->account_name!=$c->account_id) ({{$c->account_name}})@endif
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-sm-12 col-md-2 col-lg-2 ">
    <div class="form-group">
        <label for="filterUnderlying" class="control-label">{{ 'Underlying' }}</label>
        <input class="form-control input-sm" name="filterUnderlying" type="text" id="filterUnderlying" value="{{ old('filterUnderlying')}}" title="Use commas to search more underlyings at once">
    </div>
    <div class="form-group">
        <label for="filterPosition" class="control-label">{{ 'Position' }}</label>
        <select class="form-control input-sm" name="filterPosition" id="filterPosition">
            <option value="">--All--</option>
            <option value="0" @if(old('filterPosition')=='0') selected @endif>-Empty-</option>
            @foreach($positions as $idx=>$p)
                <option value="{{$p->id}}" @if(old('filterPosition')==$p->id) selected @endif>{{$p->id}} - {{$p->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="filterTactic" class="control-label">{{ 'Tactic' }}</label>
        <select class="form-control input-sm" name="filterTactic" id="filterTactic">
            <option value="">--All--</option>
            <option value="0" @if(old('filterTactic')=='0') selected @endif>-Empty-</option>
            @foreach($tactics as $idx=>$t)
                <option value="{{$t->id}}" @if(old('filterTactic')==$t->id) selected @endif>{{$t->name}}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="col-sm-12 col-md-2 col-lg-2 ">
    <div class="form-group">
        <label for="filterAssetClass" class="control-label">{{ 'Asset Class' }}</label>
        <select class="form-control input-sm" name="filterAssetClass" id="filterAssetClass">
            <option value="">--All--</option>
            @foreach($asset_classes as $idx=>$ac)
                <option value="{{$ac}}" @if(old('filterAssetClass')==$ac) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="filterAction" class="control-label">{{ 'Action' }}</label>
        <select class="form-control input-sm" name="filterAction" id="filterAction" >
            <option value="">--All--</option>
            @foreach($trade_actions as $idx=>$ta)
                <option value="{{$ta}}" @if(old('filterAction')==$ta) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="filterPutCall" class="control-label">{{ 'Put Call' }}</label>
        <select class="form-control input-sm" name="filterPutCall" id="filterPutCall">
            <option value="">--All--</option>
            @foreach($option_types as $idx=>$ot)
                <option value="{{$ot}}" @if(old('filterPutCall')==$ot) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>
</div>

<!--
<div class="col-sm-12 col-md-1 col-lg-1">
    <div class="form-group">
        <label for="filterAsk" class="control-label">{{ 'Ask' }}</label>
        <input class="form-control input-sm" name="filterAsk" type="number" id="filterAsk" value="{{ old('filterAsk')}}" >
    </div>
    <div class="form-group">
        <label for="filterBid" class="control-label">{{ 'Bid' }}</label>
        <input class="form-control input-sm" name="filterBid" type="number" id="filterBid" value="{{ old('filterBid')}}" >
    </div>

</div>-->
<div class="col-sm-12 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="filterStrikeFrom" class="control-label">{{ 'Strike' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filterStrikeFrom" type="text" pattern="\d+(\.\d{5})?" id="filterStrikeFrom" value="{{ old('filterStrikeFrom')}}" placeholder="from">
            <input class="form-control input-sm" name="filterStrikeTo" type="text" pattern="\d+(\.\d{5})?" id="filterStrikeTo" value="{{ old('filterStrikeTo')}}" placeholder="to">
        </div>
    </div>
    <div class="form-group">
        <label for="filterExpirationFrom" class="control-label">{{ 'Expiry' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filterExpirationFrom" type="date" id="filterExpirationFrom" value="{{ old('filterExpirationFrom')}}" >
            <input class="form-control input-sm" name="filterExpirationTo" type="date" id="filterExpirationTo" value="{{ old('filterExpirationTo')}}" >
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="filterOpenDateFrom" class="control-label">{{ 'Open' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filterOpenDateFrom" type="date" id="filterOpenDateFrom" value="{{ old('filterOpenDateFrom')}}" >
            <input class="form-control input-sm" name="filterOpenDateTo" type="date" id="filterOpenDateTo" value="{{ old('filterOpenDateTo')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="filterCloseDateFrom" class="control-label">{{ 'Close' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filterCloseDateFrom" type="date" id="filterCloseDateFrom" value="{{ old('filterCloseDateFrom')}}" >
            <input class="form-control input-sm" name="filterCloseDateTo" type="date" id="filterCloseDateTo" value="{{ old('filterCloseDateTo')}}" >
        </div>
    </div>
    <div class="form-group inline">
        <button class="btn btn-info btn-sm" type="submit">Search</button>
    </div>
</div>
</form>