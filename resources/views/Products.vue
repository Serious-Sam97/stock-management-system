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
                            :rules="rules"
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
                    <td><i v-if="product.id !== 0" class="fas fa-trash-alt fa-lg" style="color: red; cursor:pointer"></i></td>
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
            axios.get('/api/products').then((data) => console.log(data.data));
        },
        methods: {
            addProduct() {
                this.products.push({
                    'id': 0,
                    'name': '',
                    'price': 0,
                    'quantity': 0,
                });
            },
            rules(productIndex){
                const product = this.products[productIndex];
                
                return [
                    name => !!product.name || 'Required.',
                    name => (product.name && product.name.length >= 3) || 'Min 3 characters',
                ];
            },
            saveProduct(productIndex){
                axios.post('/api/products', this.products[productIndex]);
            },
        },
    }
</script>
