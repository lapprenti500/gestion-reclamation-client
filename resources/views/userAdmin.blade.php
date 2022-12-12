@extends('layouts.app')

@section('content')
@include('layouts.header')
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
                                    <table class="table justify-center table-striped"">
                                        <thead>
                                            <tr>


                                                <th scope="col">#id</th>

                                                    <th scope="col">traitee</th>

                                                        <th scope="col" >rejetee</th>

                                                            <th scope="col">en attente</th>
                                                            <th scope="col">en cours de traitement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--permet d'afficher les taches de la base de donnes dans chaque ligne-->
                                            {{-- @foreach ($tasks as $task) --}}
                                                <tr>
                                                    <td class="serial">name</td>
                                                    <!--the task id-->
                                                    <td> 54 </td>

                                                    <td> 65 </td>

                                                    <td> 96 </td>

                                                    <td>035</td>


                                                </tr>
                                            {{-- @endforeach --}}

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
        @include('layouts.footer')
    @endsection
