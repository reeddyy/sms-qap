@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.statusAda.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.status-adas.update", [$statusAda->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="status_name">{{ trans('cruds.statusAda.fields.status_name') }}</label>
                <input class="form-control {{ $errors->has('status_name') ? 'is-invalid' : '' }}" type="text" name="status_name" id="status_name" value="{{ old('status_name', $statusAda->status_name) }}" required>
                @if($errors->has('status_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statusAda.fields.status_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.statusAda.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $statusAda->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statusAda.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection