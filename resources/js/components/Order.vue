<template>
<div class="card">
    <div class="card-header">
        <h2>Nieuwe bestelling</h2>
    </div>
    <div class="card-body p-0">
        <div class="card-title p-2">
            <h3 class=" m-0">Overzicht</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/bestellingen/new" @submit.prevent="onSubmit" >
                <span v-for="order in product">
                    <p class="card-text">{{ order.product.product_description }}<input type="text" name="total" v-model="order.total"><span style="float: right;"><i class="fas fa-minus-square" v-on:click="remove(order)"></i></span></p>
                </span>
                <input type="submit" name="submit" value="Voeg toe">
            </form>
            
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products">
                    <td>{{ product.product_nr }}</td>
                    <td>{{ product.product_description }}</td>
                    <td><i class="fas fa-plus-square fa-1x" v-on:click="add(product)" style="cursor: pointer;"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    props: ['products', 'reservation'],
    data: function() {
        return {
            product: [],
            product_total: '',
        }
    },
    methods: {
        add: function (product) {
            console.log(this.product);
            // this.product.push( product);
            this.product.push({
                product_nr: product.product_nr, 
                product: product,
                total: '1',
                reservation_nr: this.reservation.reservation_nr,
                table_nr: this.reservation.table_nr,
            });
            // Vue.set(this.product, 'namvm.results =  vm.results.concat(response.data.data);e', product);
        },
        remove: function (order) {
            for (let field in this.product) {
                console.log(field);
                if (this.product) {
                    console.log(this.product);
                }
            } 
        },
        onSubmit() {
            axios.post('/bestellingen/new', {
                product: this.product,
            })
            .then((response) => {
                console.log(response);
            });
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
