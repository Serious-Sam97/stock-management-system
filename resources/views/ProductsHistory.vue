<template>
    <div>
         <div style="padding-top: 30px">
             <v-simple-table v-if="products.length > 0">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Product Id
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
                            <td>{{product.product_id}}</td>
                            <td>{{product.quantity}}</td>
                            <td>{{product.created_at}}</td>
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
                axios.get('/api/product-quantity-history').then(({data}) => this.products = data);
            }
        },
    }
</script>
