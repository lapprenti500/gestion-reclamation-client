@extends('layouts.app')

@section('content')
@include('header-login-register')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <!-- /Widgets -->

            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Administrateurs </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>

                                                <th>#id</th>
                                                <th>En cours de traitement</th>
                                                <th>En attente</th>
                                                <th>Rejetées</th>
                                                <th>Complétées</th>
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
                                                        <!--va dans l'url edittaskfrm et lui passe la valeu de l'id du task a modifier key=>value et on va passer la cle id dans l'url de la route-->
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
        <div class="clearfix"></div>
    @endsection
