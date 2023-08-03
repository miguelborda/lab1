(function(ns)
{
	ns.InvoiceListing = {
		template: `<div id="com-siat-invoice-listing">
			<p class="h3">Listado de Facturas</p>
			<div class="form-group mb-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Buscar factura..." v-model="keyword" />
					<select class="form-select" v-model="branch_code">
						<option value="-1">-- sucursal --</option>
						<option value="0">Sucursal Principal (0)</option>
						<option v-bind:value="b.code" v-for="b in branches">{{ b.name }}</option>
					</select>
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary" v-on:click="search()"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
			<pager v-if="total_pages > 1" 
				v-bind:currentPage="current_page" 
				v-bind:totalPages="total_pages" 
				v-on:pager-change-page="changePage" 
				v-on:pager-previous-page="prevPage"
				v-on:pager-next-page="nextPage" />
			<div class="panel card border shadow" v-for="(invoice, index) in items">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 col-sm-7">
								<div class="mb-1">
									<span class="border rounded p-1 bg-primary text-white">ID: {{ invoice.id }}</span>
									<span class="border rounded p-1 bg-info text-white">Factura Nro: {{ invoice.invoice_number }}</span>
									<span class="border rounded p-1 bg-secondary text-white" v-if="invoice.invoice_number_cafc">Nro. CAFC: {{ invoice.invoice_number_cafc }}</span>
									<span class="border rounded p-1 bg-warning btn-warning text-white" v-if="invoice.event_id">
										<b>Evento:</b> {{ invoice.event_id }}
									</span>
								</div>
								<div><b>Cliente:</b> {{ invoice.customer }}</div>
								<div>
									<b>Sucursal:</b> {{ invoice.codigo_sucursal }}
									|
									<b>Punto Venta:</b> {{ invoice.codigo_puntoventa }}
								</div>
								<div><b>Fecha emision:</b> {{ invoice.invoice_datetime }}</div>
								<div><b>CUF:</b> {{ invoice.cuf }}</div>
								<div>
									<span class="label text-white p-1 rounded" 
										v-bind:class="{'label-success bg-success': invoice.status == 'ISSUED', 'label-warning bg-warning': invoice.status == 'ERROR', 'label-danger bg-danger': invoice.status == 'VOID'}">
										{{ getStatus(invoice.status) }}
									</span>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div><b>Sector:</b> {{ invoice.codigo_documento_sector }}</div>
								<div><b>Impuesto:</b> {{ invoice.tax }}</div>
								<div><b>Total:</b> {{ invoice.total }}</div>
							</div>
							<div class="col-12 col-sm-2">
								<a v-bind:href="viewUrl(invoice)" target="_blank" class="btn btn-sm btn-warning w-100 mb-1 btn-block">Imprimir</a>
								<a v-bind:href="viewUrl(invoice) + '?tpl=rollo'" target="_blank" class="btn btn-sm btn-warning w-100 mb-1 btn-block">Imprimir Ticket</a>
								<template v-if="invoice.siat_id && invoice.siat_url">
									<a v-bind:href="invoice.siat_url" target="_blank" class="btn btn-sm btn-info w-100 mb-1 btn-block">Siat Url</a>
								</template>
								<!--
								<a href="javascript:;" class="btn btn-sm btn-primary w-100 mb-1">Editar</a>
								-->
								<template v-if="invoice.status == 'ISSUED'">
									<a href="javascript:;" class="btn btn-sm btn-danger w-100 mb-1 btn-block" v-on:click="anular(invoice, index)">Anular</a>
								</template>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-2 mb-2">
				<pager v-if="total_pages > 1" 
					v-bind:currentPage="current_page" 
					v-bind:totalPages="total_pages" 
					v-on:pager-change-page="changePage" 
					v-on:pager-previous-page="prevPage"
					v-on:pager-next-page="nextPage" />
			</div>
			<div ref="modalvoid" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Anular Factura</h5>
						</div>
						<div class="modal-body">
							<template v-if="currentInvoice">
								<siat-void-invoice ref="comvoid" v-bind:invoice="currentInvoice"
									v-on:void-success="onVoidSuccess" />
							</template>
						</div>
						<div class="modal-footer">
							<template v-if="!processingVoid">
								<button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-primary" v-on:click="submit($event)">Anular Factura</button>
							</template>
							<template v-else>
								<span class="spinner-border text-primary" role="status">
								  <span class="visually-hidden">Loading...</span>
								</span>
								Procesando...
							</template>
						</div>
					</div>
				</div>
			</div>
		</div>`,
		components: {
			'pager': SBFramework.Components.ComPager,
			'siat-void-invoice': ns.VoidInvoice,
		},
		mixins: [SBFramework.Mixins.Common],
		data()
		{
			return {
				keyword: '',
				branch_code: '-1',
				branches: [],
				total_pages: 0,
				current_page: 0,
				statuses: {
					'ISSUED': 'Emitida',
					'ERROR': 'Error',
					'VOID': 'Anulada',
				},
				currentInvoice: null,
				items: [],
				modalVoid: null,
				processingVoid: false,
				service: new SBFramework.Services.ServiceInvoices(),
			};	
		},
		methods:
		{
			viewUrl(invoice)
			{
				return lt.baseurl + '/siat/facturas/'+ invoice.id  +'/view';
			},
			changePage(page)
			{
				this.getInvoices(page);
			},
			prevPage(page)
			{
				this.getInvoices(page);
			},
			nextPage(page)
			{
				this.getInvoices(page);
			},
			async getInvoices(page)
			{
				const res = await this.service.obtenerFacturas(page);
				this.items = res.data;
				this.current_page = page;
				this.total_pages = parseInt(res.headers.get("total-pages"));
			},
			async getBranches()
			{
				const res = await this.service.obtenerSucursales();
				this.branches = res.data;
			},
			getStatus(status)
			{
				return this.statuses[status] || 'Desconocido';
			},
			anular(invoice, index)
			{
				this.currentInvoice = invoice;
				this.openModal(this.modalVoid);
			},
			async submit($event)
			{
				try
				{
					this.processingVoid = true;
					await this.$refs.comvoid.submit();
					this.processingVoid = false;
				}
				catch(e)
				{
					this.processingVoid = false;
				}
			},
			onVoidSuccess(xhr_res)
			{
				this.closeModal(this.modalVoid);
				this.currentInvoice = null;
				let invoice = this.items.find((inv) => inv.invoice_id == xhr_res.data.invoice_id );
				console.log(invoice);
				if( !invoice )
					return false;
				invoice = xhr_res.data;
				this.$root.$toast.ShowSuccess('La factura fue anulada correctamente');
				this.getInvoices();
			},
			async search()
			{
				try
				{
					const res = await this.service.buscar(this.keyword, this.branch_code);
					this.items = res.data;
					this.current_page 	= 1;
					this.total_pages	= 1;
				}
				catch(e)
				{
					alert(e.error || e.message || 'Error desconocido');
				}
			}
		},
		async mounted()
		{
			const frame = (window.bootstrap || window.coreui);
			if( frame )
			{
				this.modalVoid = frame.Modal.getOrCreateInstance(this.$refs.modalvoid);
			}
			else
			{
				this.modalVoid = jQuery(this.$refs.modalvoid);
			}
			
				
			this.$root.$processing.show('Obteniendo datos...');
			await Promise.all([this.getInvoices(1), this.getBranches()]);
			this.$root.$processing.hide();
		},
		async created()
		{
			
			
		}
	};
	SBFramework.AppComponents = {
		'siat-invoice-listing': ns.InvoiceListing, 
	};
})(SBFramework.Components.Siat);