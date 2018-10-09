<form method="post" v-on:submit.prevent="updateProduct(editedProduct.id)" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Editar producto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input id="name" type="text" class="form-control" v-model="editedProduct.name">
                    </div>
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input id="price" type="text" class="form-control" v-model="editedProduct.price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input id="stock" type="number" class="form-control" v-model="editedProduct.stock">
                    </div>
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
