@extends('layouts.portal')

@section('title', trans('general.title.edit', ['type' => trans('auth.profile')]))

@section('content')
    <div class="card">
        {!! Form::model($user, [
            'url' => 'portal/profile/update',
            'id' => 'profile',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]) !!}

        <div class="card-body">
            <div class="row">
                {{ Form::textGroup('name', trans('general.name'), 'user') }}

                {{ Form::emailGroup('email', trans('general.email'), 'envelope') }}

                {{ Form::textGroup('tax_number', trans('general.tax_number'), 'percent', []) }}

                {{ Form::textGroup('phone', trans('general.phone'), 'phone', []) }}

                {{ Form::textareaGroup('address', trans('general.address')) }}

                {{ Form::passwordGroup('password', trans('auth.password.current'), 'key', []) }}

                {{ Form::passwordGroup('password_confirmation', trans('auth.password.current_confirm'), 'key', []) }}

                {{ Form::selectGroup('locale', trans_choice('general.languages', 1), 'flag', language()->allowed(), $user->locale) }}

                {{ Form::fileGroup('picture',  trans_choice('general.pictures', 1)) }}
            </div>
        </div>

        @permission(['update-portal-profile'])
            <div class="card-footer">
                <div class="row float-right">
                    {{ Form::saveButtons('portal') }}
                </div>
            </div>
        @endpermission

        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/portal/profile.js?v=' . version('short')) }}"></script>
@endpush

