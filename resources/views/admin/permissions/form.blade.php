
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
  
        <div class="form-group{{ $errors->has('table') ? ' has-error' : '' }}">
            <label for="table" class="col-md-4 control-label">Table</label>
            <div class="col-md-6">
                <input id="table" type="text" class="form-control" name="table" value="{{ old('table') }}"  autofocus>

                @if ($errors->has('table'))
                    <span class="help-block">
                        <strong>{{ $errors->first('table') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>