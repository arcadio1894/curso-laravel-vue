<form method="post" v-on:submit.prevent="storeSale" xmlns:v-on="http://www.w3.org/1999/xhtml"
      xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="modal fade" id="createSale">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Crear Venta</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Datos de la cabecera</div>
                        <div class="panel-body">
                            <div class="form-group col-sm-6">
                                <label for="date">Fecha:</label>
                                <input v-model="dateSale" id="date" type="date" class="form-control" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="type">Tipo de documento:</label>
                                <input v-model="typeSale" id="type" type="text" class="form-control" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="customers">Elegir cliente:</label>
                                <select name="customers" id="customers" class="form-control">
                                    <option v-for="customer in customers"
                                            v-bind:value="customer.id"
                                            value="">@{{ customer.name }}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">Datos de los detalles</div>
                            <div class="panel-body">
                                <div class="form-group col-sm-6">
                                    <label for="products">Elegir producto:</label>
                                    <select name="products" id="products" class="form-control">
                                        <option v-for="product in products"
                                                v-bind:value="product.id"
                                                value="">@{{ product.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="date">Cantidad:</label>
                                    <input v-model="current_quantity" id="date" type="text" class="form-control" >
                                </div>
                            </div>
                            <button type="button" v-on:click="addRow" class="btn btn-primary btn-block">Agregar</button>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUCTO</th>
                                    <th>CANTIDAD</th>
                                    <th>PRECIO</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="selectedProduct in selectedProducts">
                                        <td>@{{ selectedProduct.id }}</td>
                                        <td>@{{ selectedProduct.name }}</td>
                                        <td>@{{ selectedProduct.quantity }}</td>
                                        <td>@{{ selectedProduct.price }}</td>
                                        <td width="10px">
                                            <a v-on:click.prevent="deleteItem(sale)" href="#" class="btn btn-danger btn-sm">Quitar</a>
                                        </td >
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
