@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.events.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.event.fields.name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.event.fields.start_time') }}</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}">
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('venue_id') ? 'has-error' : '' }}">
                <label for="venue">{{ trans('cruds.event.fields.venue') }}</label>
                <select name="venue_id" id="venue" class="form-control select2">
                    @foreach($venues as $id => $venue)
                        <option value="{{ $id }}" {{ (isset($event) && $event->venue ? $event->venue->id : old('venue_id')) == $id ? 'selected' : '' }}>{{ $venue }}</option>
                    @endforeach
                </select>
                @if($errors->has('venue_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('venue_id') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection