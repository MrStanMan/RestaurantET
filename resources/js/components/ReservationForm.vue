<template>
	<form method="POST" action="reserveer" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name" v-model="name"/>
			<span class="help is-danger" v-if="errors.has('name')" v-text="errors.get('name')"></span>
		</div>
  
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" name="email" id="email" v-model="email"/>
			<span class="help is-danger" v-if="errors.has('email')" v-text="errors.get('email')"></span>
		</div>

		<button type="submit" class="btn btn-primary" :disabled="errors.any()">Send message</button>
	</form>
</template>
<script>

class Errors{
	constructor() {
		this.errors = {};
	}

	get(field) {
		if (this.errors[field]) {
			return this.errors[field][0];
		}
	}

	has(field) {
		return this.errors.hasOwnProperty(field);
	}

	any() {
		return Object.keys(this.errors).length > 0;
	}

	record(errors) {
		this.errors = errors;
	}

	clear(field) {
		delete this.errors[field];
	}
	/**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

	resetForm(data) {
		for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
	}
}

export default {
  	props: ['reservations'],
  	data: () => {
		return {
			name: '',
			email: '',
	  		errors: new Errors(),
		};
	},
  	methods: {
		onSubmit() {
			axios.post('/reserveer', {
				name: this.name,
				email: this.email
			})
			.then((response) => {
				this.error.resetForm({ 
					name: this.name, 
					email:this.email
				});
				console.log(response);
			})
			.catch((error) => {
				console.log(error);
				this.errors.record(error.response.data.errors);
			});
		}
  	}
}

</script>