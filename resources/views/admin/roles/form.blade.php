
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6"> 
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <strong>
                    <label class="">
                        <input type="checkbox" name="#checkTodos" id="checkTodos">
                        Select All
                    </label>
                </strong>
            </div>
        </div>
        <?php
            $perm = (isset($role)) ? $role->permissions->pluck('name')->toArray() : [];
        ?>
        <div class="form-group">
            @foreach ($permissions as $key => $value)
            <div class="col-md-3">
                <label for="permission-{{ $key }}" class="check control-label"> 
                        <input type="checkbox" id="permission-{{$key}}" onClick="checked" name="permissions[]" class="the-permission" value="{{$key}}" @if(in_array($key, $perm)) checked @endif>
                        {{ $key }}
                </label>
            </div>
            @endforeach
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>