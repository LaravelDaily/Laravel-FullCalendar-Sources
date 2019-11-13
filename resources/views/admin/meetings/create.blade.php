@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.meeting.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.meetings.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('attendees') ? 'has-error' : '' }}">
                <label for="attendees">{{ trans('cruds.meeting.fields.attendees') }}</label>
                <input type="text" id="attendees" name="attendees" class="form-control" value="{{ old('attendees', isset($meeting) ? $meeting->attendees : '') }}">
                @if($errors->has('attendees'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attendees') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.meeting.fields.attendees_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.meeting.fields.start_time') }}</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($meeting) ? $meeting->start_time : '') }}">
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.meeting.fields.start_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection