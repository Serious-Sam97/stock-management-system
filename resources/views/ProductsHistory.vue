<template>
    <div>
         <div style="padding-top: 30px">
             <v-simple-table v-if="products.length > 0" fixed-header>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Id
                            </th>
                            <th class="text-left">
                                Product Id
                            </th>
                            <th class="text-left">
                                Product name
                            </th>
                            <th class="text-left">
                                Quantity
                            </th>
                            <th class="text-left">
                                Time
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                        v-for="(product, productIndex) in products"
                        :key="`product-${productIndex}`"
                        >
                            <td>{{product.id}}</td>
                            <td>{{product.product_id}}</td>
                            <td>{{product.product === null ? '(Product deleted)' : product.product.name}}</td>
                            <td>{{product.quantity}}</td>
                            <td>{{new Date(product.created_at)}}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
            <div v-else style="display: flex; justify-content: center; margin-top: -20px">
                <h3>No products created</h3>
            </div>
         </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'ProductsHistory',
        data() {
            return {
                products: [],
            }
        },
        mounted () {
            this.getProductQuantityHistory();
        },
        methods: {
            getProductQuantityHistory() {
                axios.get('/api/product-quantity-history').then(({data}) => this.products = data.sort((a, b) => a.id > b.id ? -1 : 1));
            }
        },
    }
</script>
