<template>
<div class="row">

    <div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-2">
        <div class="card">
            <div class="card-header">
                <h2>bestellingen van tafel {{ reservation.table_nr }}</h2>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Hoeveelheid</th>
                            <th>Prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in product_ordered">
                            <td>{{ order.product[0].product_description }}</td>
                            <td>{{ order.total }}X</td>
                            <td>&#8364; {{ order.product[0].price * order.total }}.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">totaal prijs</td>
                            <td>&#8364; {{ total }}.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-2">
        <div class="card">
            <div class="card-header">
                <h2>Nieuwe bestelling</h2>
            </div>
            <div class="card-body p-0">
                <div class="card-body">
                    <div class="card-text" v-model="message">
                        {{message}}
                    </div>
                    <form method="POST" action="/bestellingen/new" @submit.prevent="onSubmit" >
                        <div class="form-row">
                            <h3 class="col m-0 display-5">Overzicht</h3>
                            <input type="submit" name="submit" value="Voeg toe" class="col btn btn-success" style="float:right;">
                        </div>
                        <div class="form-row py-2" v-for="order in product">
                            <div class="col-9">
                                {{ order.product.product_description }}
                            </div>
                            <div class="col-2">
                                <input type="text" name="total" v-model="order.total" class="form-control">
                            </div>
                            <div class="col-1">
                                <span style="float: right;">
                                    <i class="fas fa-minus-square fa-2x" v-on:click="remove(order)"></i>
                                </span>
                            </div>
                        </div>
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
            order: '',
            message: '',
            url: '',
            product_ordered: [],
            price_total: []
        }
    },
    methods: {
        add: function (product) {
            this.product.push({
                product_nr: product.product_nr, 
                product: product,
                total: '1',
                reservation_nr: this.reservation.reservation_nr,
                table_nr: this.reservation.table_nr,
            });
        },
        remove: function (order) {
            for (var i = 0;i < this.product.length; i++) {
                if (order.product_nr == this.product[i].product_nr) {
                    this.$delete(this.product, i);
                }
            }
        },
        get_all_orders: function () {
            this.url = '/bestellingen/' + this.reservation.reservation_nr;
            axios.get(this.url)
                .then((response) => {
                    this.product_ordered = response.data.product_ordered;
                    for (var i = 0; i < this.product_ordered.length; i++) {
                        this.price_total.push({
                            price: parseInt(this.product_ordered[i].product[0].price),
                            total: parseInt(this.product_ordered[i].total),
                        });
                        // this.price_total.reduce((sum, item) => sum + item.price,0);
                    }
                        console.log(this.price_total);
                });
        },
        onSubmit() {
            axios.post('/bestellingen/new', {
                product: this.product,
            })
            .then((response) => {
                this.message = response.data.message;
                this.product = [];
                this.get_all_orders();
            })
            .catch((error) => {
                this.message = error.response.data.message;
            });
        }
    },
    mounted() {
        this.get_all_orders();
    },
    computed: {
        total () {
            return this.price_total.reduce( (total, item) => {
                return total += (item.total * item.price);
            }, 0);
        }
    }
}
</script>