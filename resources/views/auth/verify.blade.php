@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header">{{ __('Veuillez Vérifier Votre Adresse Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification vous a été envoyé à votre adresse email.') }}
                        </div>
                    @endif

                    {{ __("Avant de continuer, veuillez s'il vous plait, confirmer votre email.") }}
                    {{ __("Si vous n'avez pas reçu d'email") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __("Cliquer ici pour en recevoir un autre") }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
