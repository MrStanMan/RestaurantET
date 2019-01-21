<template>
<div class="card">
	<div class="card-header">
		<h2>bestellingen van tafel {{ reservation.table_nr }} </h2>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Hoeveelheid</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="ord in order">
					<td>{{ ord.product }}</td>
					<td>{{ ord.total_ordered }}x</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</template>

<script>
export default {
    props: ['reservation', 'order', 'product'],
    data: function() {
        return {
            product: [],
            product_total: '',
        }
    },
    methods: {

    },
    mounted() {
        console.log('Component mounted.');
        console.log(this.reservation.order);
    }
}
</script>