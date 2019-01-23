<template>
<div class="row">
    <div class="col-12">
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
</div>
</template>

<script>
export default {
    props: ['products', 'reservation'],
    data: function() {
        return {
            product_total: '',
            order: '',
            message: '',
            url: '',
            price_total: []
        }
    },
    methods: {
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