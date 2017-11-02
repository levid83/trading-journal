<div class="col-sm-12 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="filter_status" class="control-label">{{ 'Status' }}</label>
        <select class="form-control input-sm" name="filter_status" id="filter_status">
            <option value="">--All--</option>
            <option value="CLOSED" @if(old('filter_status')=='CLOSED') selected @endif>CLOSED</option>
            <option value="OPEN" @if(old('filter_status')=='OPEN') selected @endif>OPEN</option>
        </select>
    </div>
    @if(Auth::user()->isSuperAdmin())
    <div class="form-group">
        <label for="filter_trader_id" class="control-label">{{ 'Trader' }}</label>
        <select class="form-control input-sm" name="filter_trader_id" id="filter_trader_id">
            <option value="">---All---</option>
            @foreach($traders as $idx=>$tr)
                <option value="{{$tr->id}}" @if(old('filter_trader_id')==$tr->id) selected @endif>{{$tr->account_id}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-group">
        <label for="filter_client_id" class="control-label">{{ 'Client' }}</label>
        <select class="form-control input-sm" name="filter_client_id" id="filter_client_id">
            <option value="">---All---</option>
            @foreach($clients as $idx=>$c)
                <option value="{{$c->id}}" @if(old('filter_client_id')==$c->id) selected @endif>
                    {{$c->account_id}}@if($c->account_name!='' && $c->account_name!=$c->account_id) ({{$c->account_name}})@endif
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-sm-12 col-md-2 col-lg-2 ">
    <div class="form-group">
        <label for="filter_underlying" class="control-label">{{ 'Underlying' }}</label>
        <input class="form-control input-sm" name="filter_underlying" type="text" id="filter_underlying" value="{{ old('filter_underlying')}}" title="Use commas to search more underlyings at once">
    </div>
    <div class="form-group">
        <label for="filter_position_id" class="control-label">{{ 'Position Id' }}</label>
        <select class="form-control input-sm" name="filter_position_id" id="filter_position_id">
            <option value="">--All--</option>
            <option value="0" @if(old('filter_position_id')=='0') selected @endif>-Empty-</option>
            @foreach($positions as $idx=>$p)
                <option value="{{$p->id}}" @if(old('filter_position_id')==$p->id) selected @endif>{{$p->id}} - {{$p->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="filter_tactic_id" class="control-label">{{ 'Tactic' }}</label>
        <select class="form-control input-sm" name="filter_tactic_id" id="filter_tactic_id">
            <option value="">--All--</option>
            <option value="0" @if(old('filter_tactic_id')=='0') selected @endif>-Empty-</option>
            @foreach($tactics as $idx=>$t)
                <option value="{{$t->id}}" @if(old('filter_tactic_id')==$t->id) selected @endif>{{$t->name}}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="col-sm-12 col-md-2 col-lg-2 ">
    <div class="form-group">
        <label for="filter_asset_class" class="control-label">{{ 'Asset Class' }}</label>
        <select class="form-control input-sm" name="filter_asset_class" id="filter_asset_class">
            <option value="">--All--</option>
            @foreach($asset_classes as $idx=>$ac)
                <option value="{{$ac}}" @if(old('filter_asset_class')==$ac) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="filter_action" class="control-label">{{ 'Action' }}</label>
        <select class="form-control input-sm" name="filter_action" id="filter_action" >
            <option value="">--All--</option>
            @foreach($trade_actions as $idx=>$ta)
                <option value="{{$ta}}" @if(old('filter_action')==$ta) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="filter_put_call" class="control-label">{{ 'Put Call' }}</label>
        <select class="form-control input-sm" name="filter_put_call" id="filter_put_call">
            <option value="">--All--</option>
            @foreach($option_types as $idx=>$ot)
                <option value="{{$ot}}" @if(old('filter_put_call')==$ot) selected @endif>{{$idx}}</option>
            @endforeach
        </select>
    </div>
</div>

<!--
<div class="col-sm-12 col-md-1 col-lg-1">
    <div class="form-group">
        <label for="filter_ask" class="control-label">{{ 'Ask' }}</label>
        <input class="form-control input-sm" name="filter_ask" type="number" id="filter_ask" value="{{ old('filter_ask')}}" >
    </div>
    <div class="form-group">
        <label for="filter_bid" class="control-label">{{ 'Bid' }}</label>
        <input class="form-control input-sm" name="filter_bid" type="number" id="filter_bid" value="{{ old('filter_bid')}}" >
    </div>

</div>-->
<div class="col-sm-12 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="filter_strike_from" class="control-label">{{ 'Strike' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filter_strike_from" type="text" pattern="\d+(\.\d{5})?" id="filter_strike_from" value="{{ old('filter_strike_from')}}" placeholder="from">
            <input class="form-control input-sm" name="filter_strike_to" type="text" pattern="\d+(\.\d{5})?" id="filter_strike_to" value="{{ old('filter_strike_to')}}" placeholder="to">
        </div>
    </div>
    <div class="form-group">
        <label for="filter_expiration_from" class="control-label">{{ 'Expiry' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filter_expiration_from" type="date" id="filter_expiration_from" value="{{ old('filter_expiration_from')}}" >
            <input class="form-control input-sm" name="filter_expiration_to" type="date" id="filter_expiration_to" value="{{ old('filter_expiration_to')}}" >
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="filter_open_date_from" class="control-label">{{ 'Open' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filter_open_date_from" type="date" id="filter_open_date_from" value="{{ old('filter_open_date_from')}}" >
            <input class="form-control input-sm" name="filter_open_date_to" type="date" id="filter_open_date_to" value="{{ old('filter_open_date_to')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="filter_close_date_from" class="control-label">{{ 'Close' }}</label>
        <div class="form-group form-inline">
            <input class="form-control input-sm" name="filter_close_date_from" type="date" id="filter_close_date_from" value="{{ old('filter_close_date_from')}}" >
            <input class="form-control input-sm" name="filter_close_date_to" type="date" id="filter_close_date_to" value="{{ old('filter_close_date_to')}}" >
        </div>
    </div>
    <div class="form-group inline">
        <button class="btn btn-info btn-sm" type="submit">Search</button>
    </div>
</div>
