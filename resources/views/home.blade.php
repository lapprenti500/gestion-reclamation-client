@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">{{ __('Success') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Votre réclamation a été recu et sera traité par l'équipe Assistancia!") }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
