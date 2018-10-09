@extends('app')

@section('content')
    <div id="crud" class="row" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-xs-12">
            <h1 class="page-header"> CRUD LARAVEL CON VUE JS</h1>
        </div>
        <div class="col-sm-7">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nuevo producto</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>STOCK</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products">
                        <td width="10px">@{{product.id}}</td>
                        <td >@{{product.name}}</td>
                        <td >@{{product.price}}</td>
                        <td >@{{product.stock}}</td>
                        <td width="10px">
                            <a v-on:click.prevent="editProduct(product)" href="#" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <a v-on:click.prevent="deleteProduct(product)" href="#" class="btn btn-danger btn-sm">Eliminar</a>
                        </td >
                    </tr>
                </tbody>
            </table>

            @include('create')
            @include('edit')

        </div>
        <div class="col-sm-5">
            <pre>
                @{{ $data }}
            </pre>
        </div>
    </div>
@endsection