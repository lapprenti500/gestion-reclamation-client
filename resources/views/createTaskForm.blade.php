@extends('layouts.app')

@section('content')
@include('layouts.header')
    <div class="content">
        <div class="animated fadeIn">


            <div class="row">


                <div class="col-lg-9 offset-lg-1">
                    <div class="card justify-content-center">
                        <div class="card-header">
                            <h4 class="card-title" ><strong>Formulaire De Réclamation</strong></h4>
                        </div>
                        <form action="{{ route('createNewTask') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group"><label for="titre" class=" form-control-label">Objet</label><input
                                    type="text" id="titre" name="titre"
                                    placeholder="Entrer l'objet de votre réclamation" class="form-control"></div>

                        
                            <div class="form-group text-area  "><label for="description"
                                    class=" form-control-label">Description</label><input rows="5" type="text" id="description"
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
    @include('layouts.footer')
@endsection
