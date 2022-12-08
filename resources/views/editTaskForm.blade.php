@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="animated fadeIn">


            <div class="row">


                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header"><small> Formulaire de</small><strong>Réclamation</strong></div>
                        <!-- we have an array so to access the element in he array we need to loop through he array-->
                        @foreach ($task as $t)
                            <!--when we click on edit, it will send the information to this route -->
                            <form action="{{ route('editTask') }}" method="POST">
                                {{ csrf_field() }}

                                <!-- we need this input so that the controller can access this id via this input. but don't want to display the id, becuase we don't want the user to modify it. this id will be used in the controller-->
                                <input type="hidden" name="id" value="{{ $t->id }}">

                                <div class="form-group"><label for="titre"
                                        class=" form-control-label">Objet</label><input type="text" id="company"
                                        name="titre" value="{{ $t->titre }}"
                                        placeholder="Entrer l'objet de la réclamation" class="form-control"></div>
                                <div class="form-group"><label for="description"
                                        class=" form-control-label">Description</label><input type="text" id="vat"
                                        name="description" value="{{ $t->description }}"
                                        placeholder="Entrer la description de la réclamation" class="form-control"></div>

                                <div class="form-group">
                                    <div class="col col-md-3"><label for="select"
                                            class=" form-control-label">Status</label></div>
                                    <div class="col-12 col-md-9">
                                        <select id="select" class="form-control" name="status">
                                            @switch($t->status)
                                                @case('En attente')
                                                    {{-- in each case we add other options but without the selected. they will be available so that the user can change the status if he wishes to  --}}
                                                    <option value="En attente" selected>En attente</option>
                                                    <option value="En cours de traitement">En cours de traitement</option>
                                                    <option value="Rejetée">Rejetée</option>
                                                    <option value="Traitée">Traitée</option>
                                                @break

                                                @case('En cours de traitement')
                                                    <option value="En cours de traitement" selected>En cours de traitement</option>
                                                    <option value="En attente">En attente</option>
                                                    <option value="Rejetée">Rejetée</option>
                                                    <option value="Traitée">Traitée</option>
                                                @break

                                                @case('Rejetée')
                                                    <option value="Rejetée" selected>Rejetée</option>
                                                    <option value="En attente">En attente</option>
                                                    <option value="En cours de traitement">En cours de traitement</option>
                                                    <option value="Traitée">Traitée</option>
                                                @break

                                                @default
                                                    <option value="Traitée" selected>Traitée</option>
                                                    <option value="En attente">En attente</option>
                                                    <option value="En cours de traitement">En cours de traitement</option>
                                                    <option value="Rejetée">Rejetée</option>
                                            @endswitch




                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" value="edit">Modifier</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>




        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
@endsection
