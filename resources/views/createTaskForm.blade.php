@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="animated fadeIn">


            <div class="row">


                <div class="col-lg-9 offset-lg-1>
                    <div class="card">
                        <div class="card-header"><strong>Formulaire De Réclamation</strong></div>
                        <form action="{{ route('createNewTask') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group"><label for="titre" class=" form-control-label">Objet</label><input
                                    type="text" id="company" name="titre"
                                    placeholder="Entrer l'objet de votre réclamation" class="form-control"></div>
                            <div class="form-group"><label for="description"
                                    class=" form-control-label">Description</label><input type="text" id="vat"
                                    name="description" placeholder="Entrer les détails de votre réclamation"
                                    class="form-control"></div>
                                    <input type="hidden" name="status" value="En attente">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" value="Soumettre">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
@endsection
