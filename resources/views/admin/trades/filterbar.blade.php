<div class="col-md-4">
    <div class="form-group">
        <label for="filter_underlying" class="col-md-7 control-label">{{ 'Underlying' }}</label>
        <div class="col-md-5">
            <input class="form-control" name="filter_underlying" type="text" id="filter_underlying" value="{{ old('filter_underlying')}}" >
        </div>
    </div>

    <div class="form-group">
        <label for="filter_position_id" class="col-md-7 control-label">{{ 'Position Id' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="filter_position_id" id="filter_position_id">
                <option value="">---</option>
                @foreach($positions as $idx=>$p)
                    <option value="{{$p->id}}" @if(old('filter_position_id')==$p->id) selected @endif>{{$p->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filter_tactic_id" class="col-md-7 control-label">{{ 'Tactic' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="filter_tactic_id" id="filter_tactic_id">
                <option value="">---</option>
                @foreach($tactics as $idx=>$t)
                    <option value="{{$t->id}}" @if(old('filter_tactic_id')==$t->id) selected @endif>{{$t->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filter_status" class="col-md-7 control-label">{{ 'Status' }}</label>
        <div class="col-md-5 input-group">
            <select class="form-control" name="filter_status" id="filter_status">
                <option value="">---</option>
                @foreach($trade_types as $idx=>$tt)
                    <option value="{{$tt}}" @if(old('filter_status')==$tt) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if(Auth::user()->isSuperAdmin())
        <div class="form-group">
            <label for="filter_trader_id" class="col-md-7 control-label">{{ 'Trader' }}</label>
            <div class="col-md-5">
                <select class="form-control" name="filter_trader_id" id="filter_trader_id">
                    <option value="">---</option>
                    @foreach($traders as $idx=>$tr)
                        <option value="{{$tr->id}}" @if(old('filter_trader_id')==$tr->id) selected @endif>{{$tr->account_id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="filter_asset_class" class="col-md-7 control-label">{{ 'Asset Class' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="filter[asset_class]" id="filter_asset_class">
                <option value="">---</option>
                @foreach($asset_classes as $idx=>$ac)
                    <option value="{{$ac}}" @if(old('filter_asset_class')==$ac) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filter_action" class="col-md-7 control-label">{{ 'Action' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="filter_action" id="filter_action" >
                <option value="">---</option>
                @foreach($trade_actions as $idx=>$ta)
                    <option value="{{$ta}}" @if(old('filter_action')==$ta) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filter_strike" class="col-md-7 control-label">{{ 'Strike' }}</label>
        <div class="col-md-5">
            <input class="form-control" name="filter_strike" type="number" id="filter_strike" value="{{ old('filter_strike')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="filter_put_call" class="col-md-7 control-label">{{ 'Put Call' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="filter_put_call" id="filter_put_call">
                <option value="">---</option>
                @foreach($option_types as $idx=>$ot)
                    <option value="{{$ot}}" @if(old('filter_put_call')==$ot) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

<!--
<div class="col-md-2">
    <div class="form-group">
        <label for="filter_ask" class="col-md-3 control-label">{{ 'Ask' }}</label>
        <div class="col-md-9">
            <input class="form-control" name="filter_ask" type="number" id="filter_ask" value="{{ old('filter_ask')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="filter_bid" class="col-md-3 control-label">{{ 'Bid' }}</label>
        <div class="col-md-9">
            <input class="form-control" name="filter_bid" type="number" id="filter_bid" value="{{ old('filter_bid')}}" >
        </div>
    </div>

</div>-->
<div class="col-md-4 col-md-offset-1">
    <div class="form-group form-inline">
        <label for="filter_expiration_from" class="control-label">{{ 'Expiry' }}</label>
            <input class="form-control" name="filter_expiration_from" type="date" id="filter_expiration_from" value="{{ old('filter_expiration_from')}}" >
            - <input class="form-control" name="filter_expiration_to" type="date" id="filter_expiration_to" value="{{ old('filter_expiration_to')}}" >

    </div>
    <div class="form-group form-inline">
        <label for="filter_open_date_from" class="control-label">{{ 'Open' }}</label>
            <input class="form-control" name="filter_open_date_from" type="date" id="filter_open_date_from" value="{{ old('filter_open_date_from')}}" >
            - <input class="form-control" name="filter_open_date_to" type="date" id="filter_open_date_to" value="{{ old('filter_open_date_to')}}" >
    </div>
    <div class="form-group form-inline">
        <label for="filter_close_date_from" class="control-label">{{ 'Close' }}</label>
            <input class="form-control" name="filter_close_date_from" type="date" id="filter_close_date_from" value="{{ old('filter_close_date_from')}}" >
            - <input class="form-control" name="filter_close_date_to" type="date" id="filter_close_date_to" value="{{ old('filter_close_date_to')}}" >
    </div>
    <div class="form-group">
        <button class="btn btn-default right" type="submit">Search</button>
    </div>
</div>
