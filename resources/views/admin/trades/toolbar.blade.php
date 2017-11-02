    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <select name="tactic_id" id="tactic_id" class="form-control input-sm">
                <option value="">Select a tactic</option>
                @foreach($tactics as $idx=>$t)
                    <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
            </select>
            <button  name="add_tactic" type="submit" class="btn btn-info btn-sm" title="Update the selected trades with the selected tactic">Update tactic</button>
            <button  name="remove_tactic" type="submit" class="btn btn-danger btn-sm" title="Remove the tactics from the selected trades">Remove tactic</button>
        </div>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="form-group">
            <select name="position_id" id="position_id" class="form-control input-sm">
                <option value="">Select a position</option>
                @foreach($positions as $idx=>$p)
                    <option value="{{$p->id}}" title="{{$p->name}}">{{$p->id}} - {{$p->name}}</option>
                @endforeach
            </select>
            <button  name="add_new_position" type="submit" class="btn btn-info btn-sm" title="Add the selected trades to a new position">Add new position</button>
            <button  name="remove_position" type="submit" class="btn btn-danger btn-sm" title="Remove the positions from the selected trades">Remove position</button>
        </div>
    </div>