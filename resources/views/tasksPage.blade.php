@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-hourglass"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $waitingTask }}</span></div>
                                        <div class="stat-heading">En attente</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-like2"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $completedTask }}</span></div>
                                        <div class="stat-heading">Traitées</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-trash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $rejectedTask }}</span></div>
                                        <div class="stat-heading">Rejetées</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->


            <div class="container-fluid justify-content-center">
                <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l justify-content-end"
                        href="#">par moi
                        </a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg justify-content-end"
                        href="#">
                        trier par moi</a>

                @if (Route::currentRouteName() == 'tasksPage')

                    <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l"
                        href="{{ route('waitingTask') }}">En
                        attente</a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg"
                        href="{{ route('inProgressTask') }}">En
                        traitement</a>
                    <a name="" id="" role="button" class="btn btn-outline-danger m-2 shadow-lg"
                        href="{{ route('rejectedTask') }}"> Rejetées
                    </a>
                    <a name="" id="" role="button" class="btn btn-outline-warning m-2 shadow-lg"
                        href="{{ route('completedTask') }}"> Traitées
                    </a>
                @elseif (Route::currentRouteName() == 'waitingTask')
                <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l"
                        href="{{ route('tasksPage') }}">Toute les taches
                        </a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg"
                        href="{{ route('inProgressTask') }}">En
                        traitement</a>
                    <a name="" id="" role="button" class="btn btn-outline-danger m-2 shadow-lg"
                        href="{{ route('rejectedTask') }}"> Rejetées
                    </a>
                    <a name="" id="" role="button" class="btn btn-outline-warning m-2 shadow-lg"
                        href="{{ route('completedTask') }}"> Traitées
                    </a>

                @elseif (Route::currentRouteName() == 'inProgressTask')
                <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l"
                        href="{{ route('waitingTask') }}">En
                        attente</a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg"
                        href="{{ route('tasksPage') }}">Toute les taches
                        </a>
                    <a name="" id="" role="button" class="btn btn-outline-danger m-2 shadow-lg"
                        href="{{ route('rejectedTask') }}"> Rejetées
                    </a>
                    <a name="" id="" role="button" class="btn btn-outline-warning m-2 shadow-lg"
                        href="{{ route('completedTask') }}"> Traitées
                    </a>
                    @elseif (Route::currentRouteName() == 'rejectedTask')
                    <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l"
                        href="{{ route('waitingTask') }}">En
                        attente</a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg"
                        href="{{ route('inProgressTask') }}">En
                        traitement</a>
                    <a name="" id="" role="button" class="btn btn-outline-danger m-2 shadow-lg"
                        href="{{ route('tasksPage') }}"> Toute les taches
                    </a>
                    <a name="" id="" role="button" class="btn btn-outline-warning m-2 shadow-lg"
                        href="{{ route('completedTask') }}"> Traitées
                    </a>
                    @elseif (Route::currentRouteName() == 'completedTask')
                    <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l"
                        href="{{ route('waitingTask') }}">En
                        attente</a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg"
                        href="{{ route('inProgressTask') }}">En
                        traitement</a>
                    <a name="" id="" role="button" class="btn btn-outline-danger m-2 shadow-lg"
                        href="{{ route('rejectedTask') }}"> Rejetées
                    </a>
                    <a name="" id="" role="button" class="btn btn-outline-warning m-2 shadow-lg"
                        href="{{ route('tasksPage') }}"> Toute les taches
                    </a>

                @endif

                <a name="" id="" role="button" class="btn btn-outline-secondary m- shadow-l justify-content-lg-end"
                        href="#">par moi
                        </a>
                    <a name="" id="" role="button" class="btn btn-outline-success m-2 shadow-lg justify-content-lg-end"
                        href="#">
                        trier par moi</a>
            </div>




            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Réclamations </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>

                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--permet d'afficher les taches de la base de donnes dans chaque ligne-->
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <td class="serial">{{ $task->id }}</td>
                                                    <!--the task id-->
                                                    <td> <span class="name"> {{ $task->titre }} </span> </td>
                                                    <td> <span class="product">{{ $task->description }}</span> </td>
                                                    <td>
                                                        {{-- on change la couleur dependant du status --}}
                                                        @switch($task->status)
                                                            @case('Traitée')
                                                                <span class="badge badge-pending" style="background: green;">
                                                                    {{ $task->status }}</span>
                                                            @break

                                                            @case('Rejetée')
                                                                <span class="badge badge-pending" style="background: brown;">
                                                                    {{ $task->status }}</span>
                                                            @break

                                                            @case('En attente')
                                                                <span class="badge badge-pending" style="background: yellow ;">
                                                                    {{ $task->status }}</span>
                                                            @break

                                                            @default
                                                                <span class="badge badge-pending"> {{ $task->status }}</span>
                                                        @endswitch

                                                    </td>
                                                    <td>
                                                        <!--va dans l'url edittaskfrm et lui passe la valeur de l'id du task a modifier key=>value et on va passer la cle id dans l'url de la route-->
                                                        <span class="badge badge-complete"> <a style="color: white"
                                                                href="{{ route('editTaskForm', ['id' => $task->id]) }}">
                                                                Modifier </a> </span>
                                                    </td>



                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->


                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->

        </div>
        <!-- /.content -->
        {{ $tasks->links() }}

        <div class="clearfix"></div>
        @include('layouts.footer')
    @endsection
