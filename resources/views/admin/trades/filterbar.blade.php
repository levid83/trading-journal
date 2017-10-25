<div class="col-md-4">
    <div class="form-group">
        <label for="underlying" class="col-md-7 control-label">{{ 'Underlying' }}</label>
        <div class="col-md-5">
            <input class="form-control" name="underlying" type="text" id="underlying" value="{{ old('underlying')}}" >
        </div>
    </div>

    <div class="form-group">
        <label for="position_id" class="col-md-7 control-label">{{ 'Position Id' }}</label>
        <div class="col-md-5">
            <input class="form-control" name="position_id" type="number" id="position_id" value="{{ old('position_id')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="tactic_id" class="col-md-7 control-label">{{ 'Tactic' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="tactic_id" id="tactic_id">
                <option value="">---</option>
                @foreach($tactics as $idx=>$t)
                    <option value="{{$t->id}}" @if(old('tactic_id')==$t->id) selected @endif>{{$t->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="col-md-7 control-label">{{ 'Status' }}</label>
        <div class="col-md-5 input-group">
            <select class="form-control" name="status" id="status">
                <option value="">---</option>
                @foreach($trade_types as $idx=>$tt)
                    <option value="{{$tt}}" @if(old('status')==$tt) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="asset_class" class="col-md-7 control-label">{{ 'Asset Class' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="asset_class" id="asset_class">
                <option value="">---</option>
                @foreach($asset_classes as $idx=>$ac)
                    <option value="{{$ac}}" @if(old('asset_class')==$ac) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="action" class="col-md-7 control-label">{{ 'Action' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="action" id="action" >
                <option value="">---</option>
                @foreach($trade_actions as $idx=>$ta)
                    <option value="{{$ta}}" @if(old('action')==$ta) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="strike" class="col-md-7 control-label">{{ 'Strike' }}</label>
        <div class="col-md-5">
            <input class="form-control" name="strike" type="number" id="strike" value="{{ old('strike')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="put_call" class="col-md-7 control-label">{{ 'Put Call' }}</label>
        <div class="col-md-5">
            <select class="form-control" name="put_call" id="put_call">
                <option value="">---</option>
                @foreach($option_types as $idx=>$ot)
                    <option value="{{$ot}}" @if(old('put_call')==$ot) selected @endif>{{$idx}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

<!--
<div class="col-md-2">
    <div class="form-group">
        <label for="ask" class="col-md-3 control-label">{{ 'Ask' }}</label>
        <div class="col-md-9">
            <input class="form-control" name="ask" type="number" id="ask" value="{{ old('ask')}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="bid" class="col-md-3 control-label">{{ 'Bid' }}</label>
        <div class="col-md-9">
            <input class="form-control" name="bid" type="number" id="bid" value="{{ old('bid')}}" >
        </div>
    </div>

</div>-->
<div class="col-md-4 col-md-offset-1">
    <div class="form-group form-inline">
        <label for="expiration_from" class="control-label">{{ 'Expiry' }}</label>
            <input class="form-control" name="expiration_from" type="date" id="expiration_from" value="{{ old('expiration_from')}}" >
            - <input class="form-control" name="expiration_to" type="date" id="expiration_to" value="{{ old('expiration_to')}}" >

    </div>
    <div class="form-group form-inline">
        <label for="open_date_from" class="control-label">{{ 'Open' }}</label>
            <input class="form-control" name="open_date_from" type="date" id="open_date_from" value="{{ old('open_date_from')}}" >
            - <input class="form-control" name="open_date_to" type="date" id="open_date_to" value="{{ old('open_date_to')}}" >
    </div>
    <div class="form-group form-inline">
        <label for="close_date_from" class="control-label">{{ 'Close' }}</label>
            <input class="form-control" name="close_date_from" type="date" id="close_date_from" value="{{ old('close_date_from')}}" >
            - <input class="form-control" name="close_date_to" type="date" id="close_date_to" value="{{ old('close_date_to')}}" >
    </div>
    <div class="form-group">
        <button class="btn btn-default right" type="submit">Search</button>
    </div>
</div>
