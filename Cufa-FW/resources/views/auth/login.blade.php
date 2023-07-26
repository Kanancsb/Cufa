@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
            </x-slot>

            <x-validation-errors class="col-md-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <x-label for="email" value="{{ __('Email') }}" class="form-label"/>
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-3">
                    <x-label for="password" value="{{ __('Senha') }}" />
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="mb-3">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="form-check-label">{{ __('Lembre-se') }}</span>
                    </label>
                </div>

                <div class="mb-3">

                    <x-button class="btn btn-primary">
                        {{ __('Avançar') }}
                    </x-button>
                </div>
            </form>
            </div>
        </x-authentication-card>
    </x-guest-layout>

@endsection