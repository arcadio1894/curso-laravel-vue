/**
 * Created by Usuario on 6/10/2018.
 */
if( document.getElementById("crud") ) {
    var vm = new Vue({
        el:'#crud',
        created: function () {
            this.getProducts();
        },
        data:{
            products:[],
            nameProduct: '',
            priceProduct: 0,
            stockProduct: 0,
            editedProduct: {id: '', name: '', price: '', stock:''},
            errors: ''
        },
        methods:{
            getProducts: function () {
                this.products = [];
                var urlProducts = 'products';
                axios.get(urlProducts)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        for (var i=0; i<response.data.length; ++i)
                            vm.products.push({
                                id: response.data[i].id,
                                name: response.data[i].name,
                                price: response.data[i].price,
                                stock: response.data[i].stock
                            });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteProduct: function (product) {
                var url = 'products/'+product.id;
                axios.delete(url)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);

                        vm.getProducts();
                        toastr.success('Eliminado correctamente');
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            storeProduct: function () {
                var url = 'products';
                axios.post(url, {
                    name: vm.nameProduct,
                    price: vm.priceProduct,
                    stock: vm.stockProduct
                })
                    .then(function (response) {
                        console.log(response);
                        vm.nameProduct = '';
                        vm.priceProduct = 0;
                        vm.stockProduct = 0;
                        $('#create').modal('hide');
                        vm.getProducts();
                        toastr.success('Nuevo producto creado');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            editProduct: function (product) {
                vm.editedProduct.id = product.id;
                vm.editedProduct.name = product.name;
                vm.editedProduct.price = product.price;
                vm.editedProduct.stock = product.stock;
                $('#edit').modal('show');
            },
            updateProduct: function (id) {
                var url = "products/"+id;
                axios.put(url, vm.editedProduct)
                    .then(function (response) {
                        vm.getProducts();
                        vm.editedProduct = {id: '', name: '', price: '', stock:''};
                        $('#edit').modal('hide');
                        toastr.success('Producto actualizado correctamente');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    });
}


if( document.getElementById("header-detail") ) {
    var vm2 = new Vue({
        el:'#header-detail',
        created: function () {
            this.getProducts();
            this.getCustomers();
            this.getSales();
        },
        data:{
            products:[],
            sales:[],
            customers:[],
            dateSale: '',
            typeSale: '',
            selectedProducts: [],
            customer_id:'',
            current_quantity:0
        },
        methods:{
            getProducts: function () {
                this.products = [];
                var urlProducts = 'products';
                axios.get(urlProducts)
                    .then(function (response) {
                        // handle success
                        //console.log(response.data);
                        for (var i=0; i<response.data.length; ++i)
                            vm2.products.push({
                                id: response.data[i].id,
                                name: response.data[i].name,
                                price: response.data[i].price,
                                stock: response.data[i].stock
                            });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            getSales: function () {
                this.sales = [];
                var urlsales = 'sales';
                axios.get(urlsales)
                    .then(function (response) {
                        // handle success
                        console.log(response.data[0]);
                        for (var i=0; i<response.data.length; ++i)
                            vm2.sales.push({
                                id: response.data[i].id,
                                date: response.data[i].date,
                                type: response.data[i].type,
                                customer: response.data[i].customer.name
                            });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            getCustomers: function () {
                this.customers = [];
                var urlcustomers = 'customers';
                axios.get(urlcustomers)
                    .then(function (response) {
                        // handle success

                        for (var i=0; i<response.data.length; ++i)
                            vm2.customers.push({
                                id: response.data[i].id,
                                name: response.data[i].name
                            });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            addRow: function () {
                var product_id = $('#products').val();
                var url = '/getProductByID/'+product_id;
                axios.get(url)
                    .then(function (response) {
                        // handle success
                        console.log(response.data.id);
                        vm2.selectedProducts.push({
                            id: response.data.id,
                            name: response.data.name,
                            quantity: vm2.current_quantity,
                            price: response.data.price
                        });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })

            },
            storeSale: function () {
                var customer_id = $('#customers').val();
                axios.post('/sales', {
                        date: vm2.dateSale,
                        type: vm2.typeSale,
                        customer: customer_id,
                        details: vm2.selectedProducts
                    })
                    .then(function (response) {
                        console.log(response);
                        vm2.selectedProducts = [];
                        vm2.dateSale = '';
                        vm2.typeSale = '';
                        vm2.current_quantity = 0;
                        $('#createSale').modal('hide');
                        toastr.success('Venta registrada correctamente');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        }
    });
}


