<template>
	<div class="client-reservation">
		<h3>Reservable Event Places ( Visible to only Admin(s) )</h3>
		<draggable :list="eventsAll" :options="{animation: 300, group: 'reservable'}" :element="'div'" class="row" style="border: 1px solid black; padding: 40px;" @add="addFunc($event, true)">
			<div class="col-md-4" v-for="(reservation, index) in eventsAll" :key="index" :data-id="reservation.id">
				<div class="event_places">
					<h5>{{ reservation.name }}</h5>
					<form action="reservations" method="POST">
						<input type="hidden" name="_method" value="PATCH" />
						<input type="hidden" name="_token" :value="csrf">
						<input type="hidden" name="id" :value="reservation.id">
						<div v-if="reservation.reserved">
							<h1 class="text text-success">Reserved</h1>
						</div>
						<div v-else>
							<button type="submit" class="btn btn-success">Reserve</button>
						</div>
						<div v-if="reservation.reserved && reservation.user_id == userid">
							<button type="submit" class="btn btn-default">Remove Reservance</button>
						</div>
					</form>
				</div>
			</div>
		</draggable>
	</div>
</template>
<script>
import draggable from 'vuedraggable'
export default {
	components: {
		draggable,
	},
	props: {
		reservations: {
			type: Array,
			required: true
		},
		userid: {
			type: Number,
			required: true
		}
	},
	data () {
		return {
			eventsAll: this.reservations,
			csrf: document.head.querySelector('meta[name="csrf-token"]').content
		}
	},
	methods: {
		addFunc (event, reservable) {
			let id = event.item.getAttribute('data-id');
			axios.patch('event_place/reserve/' + id, {
				reservable: reservable
			}).then(response => {
				// 
			})
		}
	}
}
</script>