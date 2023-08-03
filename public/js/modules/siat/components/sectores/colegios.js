(function(ns)
{
	ns.DetalleColegio = {
		removeFields: ['numero_serie', 'imei'],
		template: `<div class="hotel-detalle">
			<div class="row">
				<div class="col-12 col-sm-6">
					<div class="mb-2">
						<label>Nombre Estudiante</label>
						<input type="text" class="form-control" required v-model="invoice.data.custom_fields.nombreEstudiante" />
					</div>
				</div>
				<div class="col-13 col-sm-6">
					<div class="mb-2">
						<label>Periodo Facturado</label>
						<input type="date" class="form-control" required v-model="invoice.data.custom_fields.periodoFacturado" />
					</div>
				</div>
			</div>
		</div>`,
		props: {
			invoice: {type: Object, required: true},
		},
		data()
		{
			return {
			};
		},
		mounted()
		{
			
		},
		created()
		{
			this.invoice.data.custom_fields.periodoFacturado = sb_formatdate(new Date(), 'Y-m-d');
		}
	};
	ns.ItemColegio = {
		
	};
})(SBFramework.Components.Siat);