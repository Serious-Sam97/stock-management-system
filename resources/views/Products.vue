<template>
    <div style="padding-top: 30px">
        <v-simple-table v-if="products.length > 0">
            <template v-slot:default>
            <thead>
                <tr>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    Price
                </th>
                  <th class="text-left">
                    Quantity
                </th>
                </tr>
            </thead>
            <tbody>
                <tr
                v-for="(product, productIndex) in products"
                :key="`product-${productIndex}`"
                >
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.quantity }}</td>
                </tr>
            </tbody>
            </template>
        </v-simple-table>
        <div v-else style="display: flex; justify-content: center;">
            <v-btn
            elevation="2"
            rounded
            ><i style="color: green;margin-right: 5px" class="fas fa-plus-circle fa-2x"></i>
            <h2>No products created</h2></v-btn>
            
            
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'Products',
        data() {
            return {
                products: [],
            }
        },
        mounted () {
            axios.get('/http://localhost:8000/api/test').then((data) => console.log(data.data));
        },
    }
</script>
