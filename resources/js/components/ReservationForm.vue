<template>
<div class="">
<div v-if="admin ? true : ''">
	<p>Wanneer je als admin een bestelling doet word de tafel status op gereserveerd staan. De tafels zijn vrij te geven op Deze pagina.</p>
</div>
<form action="/reserveer" method="POST" id="resr" @submit.prevent="checkAdmin">
	<div class="alert alert-primary" role="alert" v-if="message != ''" v-model="message">
		{{ message }}
	</div>
	<div class="form-row col-12">
    	<div class="form-group col-md-4 col-sm-12 col-12 ">
    		<label for="customer_nr">Klantnummer</label>
            <input type="text" name="customer_nr" class="form-control" :value="customer_nr" disabled="">
            <br>
    		<label for="date">Datum en tijd</label><br>
            <date-picker filter="moment" v-model="reservation_date" lang="en" type="datetime" value-type="format" format="YYYY-MM-DD HH:mm:ss" :time-picker-options="{ start: '10:00', step: '01:00', end: '22:00' }" confirms :not-before="new Date()"></date-picker>
            <br>
			<label for="total_guests">Aantal personen</label>
			<template v-if="admin == true">
				<input type="number" class="form-control" name="total_guests" v-model="total_guests"  max="80" min="0">
			</template>
			<template v-else>
				<input type="number" class="form-control" name="total_guests" v-model="total_guests"  max="8" min="0">
			</template>
			<label for="extra_info">Extra info ( Allergieën, dieet etc. )</label>
			<textarea form="resr" class="form-control" name="extra_info" v-model="extra_info"></textarea>
        </div>
		<div class="form-group col-md-4 col-sm-12 col-12 ">
			<label for="table_nr">Selecteer uw tafel</label>
			<select class="custom-select" size="10"  style="overflow:hidden;" v-model="selected_table">
				<option v-for="table in tables" v-if="table.status ? 1 : 0" :value="table.table_nr">Tafel: {{ table.table_nr }} stoelen : {{ table.total_chairs }}</option>
			</select>
		</div>
		<div class="col-12 align-items-end">
			<input type="submit" name="submit" value="Reserveer" class="btn btn-primary" >
		</div>
    </div>

</form>
</div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import moment from 'vue-moment';

export default {
	components: { DatePicker, moment },
  	props: ['reservations', 'tables', 'user'],
  	data: () => {
		return {
			admin: false,
			reservation_date: new Date(),
			selected_time: '',
			total_guests: '',
			selected_table: '',
			customer_nr: '',
			extra_info: '',
			reservation: {
				reservation_nr: '',
				total_guests: '',
				table_nr: '',
				customer_nr: '',
				extra_info: '',
			},
			message: '',
		}
	},
  	methods: {
  		checkAdmin() {
  			axios.post('/profile/api', {
  			customer_nr: this.user.customer_nr,
	  		})
			.then((response) => {
				if (response.data.admin.first_name == 'Administrator') {
					this.admin = true;
				}
			});
			this.onSubmit();
  		},
  		onSubmit() {
  			// console.log(this.user);
  			this.reservation = Object.assign({}, this.reservation, {
	  				reservation_nr: this.reservation_date + ' ' + this.selected_time,
	  				time_in: this.selected_time,
	  				date: this.reservation_date,
	  				total_guests: parseInt(this.total_guests),
	  				table_nr: parseInt(this.selected_table),
	  				customer_nr: parseInt(this.customer_nr),
					extra_info: this.extra_info
  			});

			axios.post('/reserveer', {
				reservation: this.reservation,
			}).then((response) => {
				console.log(response);
				this.message = response.data.message;
			}).catch((error) => {
				console.log(error);
				this.message = error.response.data.message;
			})
  		}
  	},
  	mounted: function () {
  		this.customer_nr = this.user.customer_nr;
  		// console.log(new Date().format('Y-mm-dd'));

  	},
}

</script>
