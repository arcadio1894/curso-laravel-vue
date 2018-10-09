@extends('app')

@section('content')
    <div id="header-detail" class="row" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-xs-12">
            <h1 class="page-header"> MAESTRO DETALLE LARAVEL CON VUE</h1>
        </div>
        <div class="col-sm-7">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createSale">Nueva venta</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>TIPO</th>
                        <th>CLIENTE</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sale in sales">
                        <td width="10px">@{{sale.id}}</td>
                        <td >@{{sale.date}}</td>
                        <td >@{{sale.type}}</td>
                        <td >@{{sale.customer}}</td>
                        <td width="10px">
                            <a v-on:click.prevent="editSale(sale)" href="#" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <a v-on:click.prevent="deleteSale(sale)" href="#" class="btn btn-danger btn-sm">Eliminar</a>
                        </td >
                    </tr>
                </tbody>
            </table>

            @include('createSale')

        </div>
        <div class="col-sm-5">
            <pre>
                @{{ $data }}
            </pre>
        </div>
    </div>
@endsection