<template>
    <div style="padding-top: 30px">
        <v-simple-table v-if="products.length > 0">
            <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">
                        Id
                    </th>
                    <th class="text-left">
                        Name
                    </th>
                    <th class="text-left">
                        Price
                    </th>
                    <th class="text-left">
                        Quantity
                    </th>
                    <th class="text-left"></th>
                    <th class="text-left"></th>
                </tr>
            </thead>
            <tbody>
                <tr
                v-for="(product, productIndex) in products"
                :key="`product-${productIndex}`"
                >
                    <td>{{ product.id }}</td>
                    <td>
                        <v-text-field style="margin-top: -15px"
                            hide-details="auto"
                            v-model="product.name"
                            @input="product.save = true"
                        ></v-text-field>
                    </td>
                    <td>
                        <v-text-field style="margin-top: -15px"
                            v-model.lazy="product.price" v-money="money"
                            hide-details="auto"
                            @blur="product.save = true"
                        ></v-text-field>
                    </td>
                    <td>  
                        <v-text-field style="margin-top: -15px;max-width: 90px;"
                            v-mask="'######'"
                            v-model="product.quantity"
                            hide-details="auto"
                            @blur="product.save = true"
                        ></v-text-field>
                    </td>
                    <td><i v-if="product.save" @click="saveProduct(productIndex)" class="fas fa-save fa-lg" style="color: green; cursor:pointer"></i></td>
                    <td><i v-if="product.id !== 0" @click="deleteProduct(productIndex)" class="fas fa-trash-alt fa-lg" style="color: red; cursor:pointer"></i></td>
                </tr>
            </tbody>
            </template>
        </v-simple-table>
        <div v-else style="display: flex; justify-content: center; margin-top: -20px">
            <h3>No products created</h3>
        </div>

        <div style="display: flex; justify-content: center; margin-top: 5px">
            <v-btn @click="addProduct"
            elevation="2"
            rounded
            ><i style="color: green;margin-right: 5px" class="fas fa-plus-circle fa-2x"></i>
            <h3>Create product</h3></v-btn>
        </div>
        <v-alert style="margin-top: 30px; cursor:pointer" v-if="alert"
        @click="alert = false"
        border="left"
        icon="$mdiAccount"
        type="error"
        >{{alertMessage}}</v-alert>
    </div>
</template>

<script>
    import {VMoney} from 'v-money'
    import axios from 'axios';
    export default {
        name: 'Products',
        data() {
            return {
                products: [],
                alert: false,
                alertMessage: '',
                 money: {
                    decimal: '.',
                    thousands: ',',
                    prefix: '$ ',
                    precision: 2,
                    masked: false
                },
            }
        },
        mounted () {
            this.getProducts();
        },
        methods: {
            addProduct() {
                this.products.push({
                    'id': 0,
                    'name': '',
                    'price': 0,
                    'quantity': 0,
                    'save': false,
                });
            },
            saveProduct(productIndex){
                const price = this.products[productIndex].price.replace('$','').replaceAll(',', '');

                if(this.products[productIndex].id !== 0){
                    axios.put(`/api/products/${this.products[productIndex].id}`, {...this.products[productIndex], price})
                    .finally(() => this.products[productIndex].save = false);
                    return false;
                }
                axios.post('/api/products', {...this.products[productIndex], price}).then(({data}) => {
                    this.products[productIndex].id = data.id;
                }).finally(() => this.products[productIndex].save = false);
            },
            getProducts(){
                axios.get('/api/products').then(({data}) => this.products = data.map((product) => {
                    return {...product, save: false};
                }).sort((a, b) => a.id > b.id ? 1 : - 1));
            },
            deleteProduct(productIndex){
                axios.delete(`/api/products/${this.products[productIndex].id}`)
                .then(() => this.$delete(this.products, productIndex)
                );
            }
        },
    }
</script>
