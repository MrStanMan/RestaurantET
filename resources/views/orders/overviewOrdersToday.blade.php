<div class="card">
	<div class="card-header">
		<h2>Overzicht van {{ \Carbon\Carbon::now()->toFormattedDateString() }}</h2>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<thead>
				<tr>
					<th>Klant naam</th>
					<th>Klant nummer</th>
					<th>Tafel nummer</th>
					<th>Aankomst tijd</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reservation as $res)
				<tr>
					<td>{{ $res->user->first_name }}</td>
					@role('administrator')
						<td><a href="/profile/{{ $res->user->customer_nr }}/bestelling/{{$res->reservation_nr}}">{{ $res->customer_nr }}</a>
					@endrole
					@role('employee')
						<td><a href="{{ url('bestelling')}}/{{$res->reservation_nr }}">{{ $res->customer_nr }}</a></td>
					@endrole
					<td>{{ $res->table_nr }}</td>
					<td>{{ $res->time_in }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
