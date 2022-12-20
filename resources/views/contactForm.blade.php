@extends('layouts.app')

@section('content')
@include('layouts.header')
    <div class="content">
        <div class="animated fadeIn">


            <div class="row">


                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header"><small> Formulaire de</small><strong>Réclamation</strong></div>
                        @foreach ($task as $t)
                            <!--when we click on edit, it will send the information to this route -->
                            <form action="#" method="POST">
                                {{ csrf_field() }}

                                <!-- we need this input so that the controller can access this id via this input. but don't want to display the id, becuase we don't want the user to modify it. this id will be used in the controller-->
                                <input type="hidden" name="id" value="{{ $t->id }}">

                                <div class="form-group"><label for="titre"
                                        class=" form-control-label">Objet</label><input type="text" id="titre"
                                        name="titre" value="{{ $t->titre }}"
                                        placeholder="Entrer l'objet de la réclamation" class="form-control"></div>


                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="5"  placeholder="Entrer les raisons du rejet"></textarea>
                                  </div>

                                

                                <div class="form-group">

                                    <button class="btn btn-primary" type="submit" value="edit">Envoyer</button>


                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>




        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
@include('layouts.footer')
    @endsection
