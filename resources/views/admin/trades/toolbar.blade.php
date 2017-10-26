<div class="form-group">
<ul class="list-inline">
    <li>
        <select name="tactic_id" id="tactic_id" class="form-control">
            <option value="">Select a tactic</option>
            @foreach($tactics as $idx=>$t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
    </li>
    <li>
        <button  name="add_tactic" type="submit" class="btn btn-info" title="Update the selected trades with the selected tactic">Update tactic</button>
    </li>
    <li>
        <button  name="remove_tactic" type="submit" class="btn btn-danger" title="Remove the tactics from tge selected trades">Remove tactic</button>
    </li>
    <li>
        <select name="position_id" id="position_id" class="form-control">
            <option value="">Select a position</option>
            @foreach($positions as $idx=>$p)
                <option value="{{$p->id}}" title="{{$p->name}}">{{$p->id}}</option>
            @endforeach
        </select>
    </li>
    <li>
        <button  name="add_to_position" type="submit" class="btn btn-info" title="Add the selected trades to the selected position">Add to position</button>
    </li>
    <li>
        <button  name="add_new_position" type="submit" class="btn btn-info" title="Add the selected trades to a new position">Create a new position</button>
    </li>
</ul>
</div>