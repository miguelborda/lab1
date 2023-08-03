(function(ns)
{
	ns.ComInvoicer = {
		template: `<div id="com-invoicer" style="position:relative;">
			<invoicer-top v-bind:puntosventa="puntosventa" v-bind:monedas="monedas" v-bind:invoice="invoice" 
				v-on:evento-activo="onActiveEvent" v-on:ops-clicked="showOps()" />
			<form ref="forminvoice" novalidate>
				<div class="container-fluid">
					
					<div class="row">
						<div class="col">
							<div class="mb-2">
								<label v-on:click="controlTributario('normal')" style="font-size:11px;">
									<input type="radio" name="im" value="normal" v-model="tipo_cliente" />
									Normal
								</label>
								<label v-on:click="controlTributario('control_tributario')" style="font-size:11px;">
									<input type="radio" name="im" value="control_tributario" v-model="tipo_cliente" />
									Control Tributario
								</label>
								<label v-on:click="controlTributario('ventas_menores')" style="font-size:11px;">
									<input type="radio" name="im" value="ventas_menores" v-model="tipo_cliente" />
									Ventas Menores del Dia
								</label>
								<label v-on:click="controlTributario('caso_especial')" style="font-size:11px;">
									<input type="radio" name="im" value="caso_especial" v-model="tipo_cliente" />
									Caso Especial
								</label>
							</div>
						</div>
					</div>
					<div class="row" v-show="activeEvent && [5, 6, 7].indexOf(activeEvent.evento_id) != -1">
						<div class="col-6 col-sm-3">
							<div class="mb-3">
								<label>Nro. Factura (talonario)</label>
								<input type="text" class="form-control" v-model="invoice.data.nro_factura" />
							</div>
						</div>
						<div class="col-6 col-sm-3">
							<div class="mb-3">
								<label>Fecha</label>
								<input type="date" class="form-control" ref="fecha" />
							</div>
						</div>
						<div class="col-6 col-sm-3">
							<div class="mb-3">
								<label>Hora</label>
								<input type="time" class="form-control" ref="hora" />
							</div>
						</div>
					</div>
					<template v-if="scom_detalle">
						<keep-alive>
							<component ref="headercom" v-bind:is="sector_com_detalle" v-bind:invoice="invoice"></component>
						</keep-alive>
					</template>
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="mb-3" style="position:relative;">
								
								<template v-if="products_list.length > 0">
									<div class="com-completion-results shadow" style="z-index:500;position:absolute;top:100%;width:100%;background:#fff;border:1px solid #ececec;max-height:250px;overflow:auto;" 
										v-bind:style="{display: products_list.length > 0 ? 'block' : 'none'}">
										<ul style="list-style:none;padding:0;margin:0;">
											<li v-for="(item, index) in products_list" v-on:click="selectProduct(item, index)" style="cursor:pointer;:hover:background:#ececec;padding:6px;border-bottom:1px solid #ececec;">
												<div class="container-fluid p-0 dropdown-item">
													<div class="row p-2 no-gutters">
														<div class="col-sm-2">
															<span class="rounded-circle img-fluid img-thumbnail" style="font-size:30px;">
																<i class="fa fa-box"></i>
															</span>
														</div>
														<div class="col-sm-10">
															<div class="search-item-title">({{ item.code }}) {{ item.name }}</div>
															<div class="search-item-excerpt"><b>Precio:</b> {{ item.price }}</div>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</template>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12"><h2>Detalle</h2></div>
					</div>
					<div class="row">
						<div class="col-12">Total items: {{ invoice.items.length }}</div>
					</div>
					<div class="row border-bottom">
						<div class="col-sm-6 text-center"><b>Item</b></div>
						<div class="col-sm-2 text-center"><b>Cant.</b></div>
						<div class="col-sm-2 text-center"><b>Precio</b></div>
						<div class="col-sm-2 text-center"><b>Total</b></div>
					</div>
					<template v-if="invoice.items.length > 0 ">
						<template v-for="(item, index) in invoice.items">
							<template v-if="item_edit == index">
								<div class="row">
									<div class="col-12 col-sm-2">
										<div class="mb-2">
											<label>Codigo</label><input type="text" class="form-control" required v-model="item.product_code" />
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="mb-2">
											<label>Producto</label>
											<!--
											<input type="text" class="form-control" required v-model="item.product_name" />
											-->
											<textarea class="form-control" required v-model="item.product_name"></textarea>
										</div>
									</div>
									<div class="col-12 col-sm-2">
										<div class="mb-2"><label>Cantidad</label><input type="number" class="form-control" v-model="item.quantity" /></div>
									</div>
									<div class="col-12 col-sm-2">
										<div class="mb-2"><label>Precio</label><input type="text" class="form-control" v-model="item.price" /></div>
									</div>
									<div class="col-12 col-sm-2">
										<div class="mb-2"><label>Descuento</label><input type="text" class="form-control" v-model="item.discount" /></div>
									</div>
									<template v-if="!item.product_id || item.product_id <= 0">
										<div class="col-12 col-sm-4">
											<div class="mb-2">
												<label class="">Actividad</label>
												<select class="form-control form-select" required v-model="item.codigo_actividad">
													<option value="">-- actividad --</option>
													<option v-for="(a, ai) in lista_actividades" v-bind:value="a.codigoCaeb">
														{{ a.descripcion }}
													</option>
												</select>
											</div>
										</div>
										<div class="col-12 col-sm-4">
											<div class="mb-2">
												<label class="">Tipo Producto</label>
												<select class="form-control form-select" required v-model="item.codigo_producto_sin">
													<option value="">-- producto SIN --</option>
													<option v-for="(sp, spi) in item_sin_products" v-bind:value="sp.codigoProducto">
														{{ sp.descripcionProducto }}
													</option>
												</select>
											</div>
										</div>
										<div class="col-12 col-sm-4">
											<div class="mb-2">
												<label>Unidad Medida</label>
												<select class="form-control form-select" v-model="item.unidad_medida">
													<template v-for="(um, umi) in unidadesMedida">
														<option v-bind:value="um.codigoClasificador">{{ um.descripcion }}</option>
													</template>
												</select>
											</div>
										</div>
									</template>
									<div class="col-12 col-sm-3">
										<div class="mb-2"><label>Num. Serie</label><input type="text" class="form-control" v-model="item.numero_serie" /></div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="mb-2"><label>Num. IMEI</label><input type="text" class="form-control" v-model="item.numero_imei" /></div>
									</div>
								</div>
								<template v-if="scom_item">
									<keep-alive>
										<component v-bind:is="sector_com_item" v-bind:invoice="invoice" v-bind:item="item" v-bind="sector_item_args"></component>
									</keep-alive>
								</template>
								<div class="row">
									<div class="col">
										<button type="button" class="btn btn-sm btn-primary" v-on:click="saveItem(index)">Guardar</button>
									</div>
								</div>
							</template>
							
							<div v-else class="row border-bottom p-2" style="position:relative;">
								<div class="col-12 col-sm-6">
									<div class="fw-bold text-primary" style="font-size:13px;">Codigo: {{ item.product_code }}</div>
									<div>{{ item.product_name }}</div>
								</div>
								<div class="col-12 col-sm-2"><div class="text-center">{{ item.quantity }}</div></div>
								<div class="col-12 col-sm-2"><div class="text-end">{{ item.price.toFixed(2) }}</div></div>
								<div class="col-12 col-sm-2"><div class="text-end">{{ item.total.toFixed(2) }}</div></div>
								<!--<div class="col-12 col-sm-12">
									<button type="button" class="btn btn-sm btn-primary" v-on:click="editItem(index)"><i class="fa fa-edit"></i></button>
									<button type="button" class="btn btn-sm btn-danger" v-on:click="removeItem(index)"><i class="fa fa-trash"></i></button>
								</div>-->
							</div>
						</template>
						<div class="row">
							<div class="col-12">Total items: {{ invoice.items.length }}</div>
						</div>
					</template>
					<div v-else><h5 class="text-primary p-3 text-center">Aun no existen items en su factura</h5></div>
					<div class="row border-bottom">
						<!--
						<div class="col-12 col-sm-9 text-end text-right"><b>Subtotal:</b></div>
						<div class="col-12 col-sm-3 text-end text-right"><b>{{ invoice.subtotal.toFixed(2) }}</b></div>
						
						<template v-if="with_giftcard">
							<div class="col-12 col-sm-9 text-end text-right"><div style="line-height:37px;"><b>Monto Gift Card:</b></div></div>
							<div class="col-12 col-sm-3">
								<input type="text" class="form-control text-end text-right" v-model="invoice.monto_giftcard" required />
							</div>
						</template>						
						<div class="col-12 col-sm-9 text-right text-end"><div style="line-height:37px;"><b>Descuento:</b></div></div>
						<div class="col-12 col-sm-3">
							<input type="text" class="form-control text-end text-right" v-model="invoice.discount"/>
						</div>
							
						<div class="col-12 col-sm-9 text-end text-right"><b>Total Base Credito Fiscal:</b></div>
						<div class="col-12 col-sm-3 text-end text-right"><b>{{ invoice.total.toFixed(2) }}</b></div>
						
						<div class="col-12 col-sm-9 text-end text-right"><b>Crédito fiscal:</b></div>
						<div class="col-12 col-sm-3 text-end text-right"><b>{{ invoice.total_tax.toFixed(2) }}</b></div>
						-->
						
						<template v-if="!com_sector_totals">
							<div class="col-12 col-sm-9 text-end"><b>Subtotal:</b></div>
							<div class="col-12 col-sm-3 text-end"><b>{{ invoice.subtotal.toFixed(2) }}</b></div>
							
								<div class="col-12 col-sm-9 text-end"><div style="line-height:37px;"><b>Monto Gift Card:</b></div></div>
								<div class="col-12 col-sm-3">
									<input type="text" class="form-control text-end" v-model="invoice.monto_giftcard" required />
								</div>
							
							<div class="col-12 col-sm-9 text-end"><div style="line-height:37px;"><b>Descuento:</b></div></div>
							<div class="col-12 col-sm-3">
								<input type="text" class="form-control text-end" v-model="invoice.discount"/>
							</div>
								
							<div class="col-12 col-sm-9 text-end"><b>Total Base Credito Fiscal:</b></div>
							<div class="col-12 col-sm-3 text-end"><b>{{ invoice.total.toFixed(2) }}</b></div>
							
							<div class="col-12 col-sm-9 text-end"><b>Crédito fiscal:</b></div>
							<div class="col-12 col-sm-3 text-end"><b>{{ invoice.total_tax.toFixed(2) }}</b></div>
						</template>
						
						<template v-else>
							<keep-alive>
								<component v-bind:is="sector_com_totals" v-bind:invoice="invoice" v-bind="com_sector_totals_args"></component>
							</keep-alive>
						</template>
					</div>
					<div class="row">	
						<div class="col-12 col-sm-6 text-end">&nbsp;</div>
						<div class="col-12 col-sm-6 text-end">
							<div class="form-group mb-2">
								<label><b>Metodo de pago:</b></label>
								<sb-dropdown
									class="bg-warning" 
									v-model="invoice.codigo_metodo_pago"
									placeholder="Buscar..."
									v-bind:options="metodos_pago.map( mp => {return {text: mp.descripcion, value: mp.codigoClasificador};} )" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="mt-3"><button type="button" class="btn btn-primary" v-on:click="save()">Generar Factura</button></div>
						</div>
					</div>
				</div>
			</form>
			<siat-customer-form ref="customer_form" />
			<div ref="modaldatostarjeta" class="modal fade">
				<form ref="formtarjeta" novalidate>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header"><h5 class="modal-title">Datos Tarjeta</h5></div>
							<div class="modal-body">
								<p>Ingrese los datos de la tarjeta de cr&eacute;dito/d&eacute;bito</p>
								<div class="mb-3">
									<label>Nro. de Tarjeta</label>
									<div class="input-group">
										<span class="input-group-addon input-group-text "><i class="fa fa-credit-card"></i></span>
										<input type="text" class="form-control" required pattern="[0-9]{16}" maxlength="16" ref="inputcard" />
										<div class="invalid-feedback">Debe ingresar un n&uacute;mero de tarjeta v&aacute;lido</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-primary" v-on:click="save()">Continuar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			
			<div ref="modalops" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content" novalidate>
						<div class="modal-header">
							<h5 class="modal-title">Opciones de Facturacion</h5>
							<button class="close btn-close" type="button" data-bs-dismiss="modal" data-coreui-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-grooup mb-3">
								<label>Sucursal</label>
								<select class="form-control form-select" v-model="invoice.codigo_sucursal">
									<option value="0">Sucursal Principal 0 (por defecto)</option>
									<option v-bind:value="s.code" v-for="(s, si) in sucursales">{{ s.name }}</option>
								</select>
							</div>
							<div class="form-group mb-3">
								<label>Documento Sector</label>
								<select class="form-control form-select" v-model="documento_sector">
									<option v-bind:value="ds.com" v-for="(ds, ids) in sectores">{{ ds.nombre }}</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			<div ref="modalimprimir" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content" novalidate>
						<div class="modal-header">
							<h5 class="modal-title">Impresion</h5>
							<button class="close btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body row">
							<div class="col-3 text-center">
								<i class="fa fa-print" style="font-size:50px;"></i>
							</div>
							<div class="col-9">
								<p>La factura fue generada correctamente</p>
								<p>Desea imprimir la factura?</p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal">Cerrar</button>
							<a v-if="generatedInvoice" 
								v-bind:href="generatedInvoice.print_url" 
								target="_blank" 
								class="btn btn-primary"
								v-on:click="closeModal(modalImprimir)">
								Imprimir
							</a>
							<a v-if="generatedInvoice" 
								v-bind:href="generatedInvoice.print_url + '?tpl=rollo'" 
								target="_blank" 
								class="btn btn-warning"
								v-on:click="closeModal(modalImprimir)">
								Imprimir Ticket
							</a>
						</div>
					</div>
				</div>
			</div>
			<div ref="modalexcepcion" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content" novalidate>
						<div class="modal-header">
							<h5 class="modal-title">Verificacion de NIT</h5>
							<button class="close btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body row">
							<div class="col-3 text-center">
								<i class="fa fa-exclamation" style="font-size:50px;"></i>
							</div>
							<div class="col-9">
								<p>El NIT del cliente no es valido</p>
								<p>Desea generar la factura de todas formas?</p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal">Cerrar</button>
							<button type="button" data-dismiss="modal" data-bs-dismiss="modal" data-coreui-dismiss="modal"
								class="btn btn-primary"
								v-on:click="invoice.excepcion = 1;save()">
								Generar Factura
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>`,
		components: {
			'sb-dropdown': SBFramework.Components.ComDropdown,
			'invoicer-top': ns.ComInvoicerTop, 
			'hospital_item': ns.ItemHospital,
			'hospital_detalle': ns.DetalleHospital,
			'financiera_item': ns.ItemFinanciera,
			'financiera_detalle': ns.DetalleFinanciera,
			'financiera_totals': ns.FinancieraTotals,
			
			'siat-customer-form': ns.ComCustomerForm,
		},
		mixins: [/*SBFramework.Mixins.SiatOnlineStatus*/SBFramework.Mixins.Common, SBFramework.Mixins.Events],
		data()
		{
			return {
				sectores: [
					{nombre: 'Compra Venta', com: null, codigo: 1},
					{nombre: 'Entidades Financieras', com: 'financiera', codigo: 15},
					{nombre: 'Hospitales y Clinicas', com: 'hospital', codigo: 17},
					{nombre: 'Compra Venta Moneda Extranjera', com: 'cvext', codigo: 28},
				],
				documento_sector: null,
				keyword: '',
				itemfound: null,
				item_edit: -1,
				sucursales: [],
				puntosventa: [],
				tipos_productos: [],
				modalCustomer: null,
				modalDatosTarjeta: null,
				modalCerrarEvento: null,
				modelImprimir: null,
				modalExcepcion: null,
				modalOps: null,
				invoice: new SBFramework.Models.Invoice(),
				generatedInvoice: null,
				currentCustomer: {id: 0, customer_id: 0,},
				searchTimeout: null,
				searchProdTimeout: null,
				keyword_customer: '',
				keyword_nit: '',
				customers_list: [],
				products_list: [],
				unidadesMedida: [],
				monedas: [],
				tipos_documentos: [],
				metodos_pago: [],
				lista_actividades: [],
				activeEvent: null,
				tipo_cliente: 'normal',
				with_giftcard: true,
				scom_detalle: null,
				scom_item: null,
				isOnline: true,
				service: new SBFramework.Services.ServiceInvoices(),
				serviceCustomers: new SBFramework.Services.ServiceCustomers(),
				allow_payment_methods: [], //1,2,3,7],
				com_sector_totals: null,
				com_sector_totals_args: null,
			};
		},
		computed:
		{
			tipos_productos_filter()
			{
				if( !this.actividad_economica )
					return this.tipos_productos;
				return this.tipos_productos.filter( tp => tp.codigoActividad == this.actividad_economica );
				//return this.tipos_productos
			},
			sector_com_detalle()
			{
				return this.scom_detalle;
			},
			sector_com_item()
			{
				return this.scom_item;
			},
			sector_com_totals()
			{
				return this.com_sector_totals;
			},
			current_doc_sector()
			{
				let doc_sector = this.sectores.find( ds => ds.com == this.documento_sector);
				return doc_sector ? doc_sector.codigo : 1;
			},
			item_sin_products()
			{
				if( this.item_edit <= -1 )
					return [];
				return this.filterSinProducts(this.invoice.items[this.item_edit].codigo_actividad);
			}
		},
		watch:
		{
			documento_sector()
			{
				console.log('documento_sector', this.documento_sector);
				this.invoice.codigo_documento_sector = 1; //compra venta
				this.invoice.tipo_factura_documento = 1; //credito fiscal
				this.scom_detalle = null;
				this.scom_item 	= null;
				this.sector_item_args = {};
				this.com_sector_totals = null;
				this.com_sector_totals_args = null;
				this.invoice.items = [];
				if( !this.documento_sector )
				{
					this.calculateTotals();
					return;
				}
				this.invoice.codigo_documento_sector = this.current_doc_sector;
				this.sector_item_args = {};
				this.com_sector_totals_args = {metodos_pago: this.metodos_pago};
				if( [6, 8, 28].indexOf(this.invoice.codigo_documento_sector) != -1 )
				{
					this.invoice.tipo_factura_documento = 2; //sin credito fiscal
				}
				console.log(this.invoice.codigo_documento_sector, this.invoice.tipo_factura_documento);
				this.scom_detalle 		= this.documento_sector + '_detalle';
				this.scom_item 			= this.documento_sector + '_item';
				console.log(ns._ids, this.documento_sector + '_totals');
				console.log(this.scom_detalle, this.scom_item);
				this.com_sector_totals 	= (ns._ids.indexOf(this.documento_sector + '_totals') != -1) ? this.documento_sector + '_totals' : null;
				this.calculateTotals();
			},
			'invoice.punto_venta'()
			{
				this.checkActiveEvent(this.invoice.codigo_sucursal, this.invoice.punto_venta);
			},
			'invoice.monto_giftcard'()
			{
				if( isNaN(parseFloat(this.invoice.monto_giftcard)) )
				{
					this.invoice.monto_giftcard = 0;
					return;
				}
				this.invoice.monto_giftcard = parseFloat(parseFloat(this.invoice.monto_giftcard).toFixed(2));
				/*
				if( isNaN(parseFloat(this.invoice.total)) )
				{
					this.invoice.total = 0; 
				}
				this.invoice.total = parseFloat(parseFloat(this.invoice.total).toFixed(2));
				this.invoice.total -= this.invoice.monto_giftcard;
				*/
			},
			'invoice.codigo_metodo_pago'()
			{
				this.invoice.monto_giftcard = 0;
				const metodo_pago 			= this.buscarMetodoPago(this.invoice.codigo_metodo_pago);
				if( metodo_pago.descripcion.toUpperCase().indexOf('GIFT') != -1 )
				{
					this.with_giftcard = true;
					return true;
				}
				this.with_giftcard = false;
			},
			'invoice.discount'()
			{
				if( isNaN(parseFloat(this.invoice.discount)) )
				{
					this.invoice.discount = 0;
					//return;
				}	
				this.calculateTotals();
			},
			'invoice.monto_giftcard'()
			{
				/*
				if( this.invoice.monto_giftcard.toString().trim() <= 0 )
				{
					this.calculateTotals();
					return;
				}	
				*/	
				if( isNaN(parseFloat(this.invoice.monto_giftcard)) )
				{
					this.invoice.monto_giftcard = 0;
				}	
				this.calculateTotals();
			},
		},
		methods: 
		{
			options_metodos_pago()
			{
				let ops = [];
				ops = this.metodos_pago.map( mp => {console.log(mp);return {text: mp.codigoClasificador, 'value': codigo.descripcion};} );
				console.log('ops', ops);
				return ops;
			},
			onActiveEvent(event)
			{
				this.activeEvent = event;
			},
			async getSucursales()
			{
				const res = await this.service.obtenerSucursales();
				this.sucursales = res.data
			},
			buscarMetodoPago(codigo)
			{
				return this.metodos_pago.find( mp => mp.codigoClasificador == codigo );
			},
			filterSinProducts(codigoActividad)
			{
				return this.tipos_productos.filter( tp => tp.codigoActividad == codigoActividad );
			},
			addItem(e, prod)
			{
				e ? e.preventDefault() : null;
				if( this.keyword.trim().length <= 0 )
					return false;
					
				let item_name = this.keyword;
				if( this.itemfound )
				{
					item_name = this.itemfound;
				}
				let found = this.invoice.items.find( item => prod && item.product_id == prod.id);
				if( typeof(found) != 'undefined' )
				{
					found.quantity++;
					found.total = (found.price * found.quantity) - found.discount;
				}
				else
				{
					this.invoice.items.push(
						{
							item_id: 0,
							invoice_id: 0,
							product_id: prod ? prod.id : 0,
							product_code: prod ? prod.code : '',
							product_name: prod ? prod.name : item_name,
							price: prod ? prod.price : 0,
							quantity: 1,
							total: prod ? prod.price : 0,
							unidad_medida: prod ? prod.unidad_medida : 58,
							numero_serie: prod ? prod.numserie : '',
							numero_imei: prod ? prod.imei : '',
							codigo_producto_sin: prod ? prod.codigo_sin : '',
							codigo_actividad: prod ? prod.codigo_actividad : '',
							discount: 0,
							data: {custom_fields: {}}
						}
					);
				}
				
				this.keyword = '';
				this.calculateTotals();
			},
			removeItem(index)
			{
				this.invoice.items.splice(index, 1);
				this.calculateTotals();
			},
			calculateTotals()
			{
				let total = 0;
				for(let item of this.invoice.items)
				{
					total += item.total;
				}
				this.invoice.subtotal = total;
				this.invoice.total = this.invoice.subtotal - this.invoice.discount - this.invoice.monto_giftcard;
				if( [6, 8, 28].indexOf(this.invoice.codigo_documento_sector) == -1 )
					this.invoice.total_tax = this.invoice.total * 0.13;
				else
					this.invoice.total_tax = 0;
			},
			editItem(index)
			{
				this.item_edit = index;
			},
			saveItem(index)
			{
				const item 		= this.invoice.items[index];
				item.quantity 	= isNaN(parseFloat(item.quantity)) ? 0 : parseFloat(item.quantity);
				item.price 		= isNaN(parseFloat(item.price)) ? 0 : parseFloat(item.price);
				item.discount 	= isNaN(parseFloat(item.discount)) ? 0 : parseFloat(item.discount);
				item.total 		= (item.quantity * item.price) - item.discount;
				this.calculateTotals();
				this.item_edit = -1;
			},
			async addItemRecuperado()
			{
				const res = await this.service.obtenerItem(document.getElementById("recibo").value);	
				//console.log(res[6][0].precioU);
				console.log(res);
				for(var i=0;i<res.length;i++){
					var descripcion=res[i][0].descripcion;
					var precioU=parseFloat(res[i][0].precioU);
					var total=parseFloat(res[i][0].total);
					var cant=parseFloat(res[i][0].cant);
						this.invoice.items.push(
							{
								item_id: 0,
								invoice_id: 0,
								product_id: res[i][0].IdPro,
								product_code: res[i][0].codigo,
								product_name: descripcion,
								price: precioU,
								quantity: cant,
								total: total,
								unidad_medida: 58,
								numero_serie: '',
								numero_imei:  '',
								codigo_producto_sin: res[i][0].CodProSin,
								codigo_actividad: res[i][0].CodActividad,
								discount: 0,
								data: {custom_fields: {}}
							}
						);
				}
							      		
					
				this.calculateTotals();return false;
			},
			async getPuntosVenta()
			{
				const res = await this.service.obtenerPuntosVenta();
				this.puntosventa = res.data;
			},
			async tiposProductos()
			{
				const res = await this.service.obtenerProductosServicios();
				this.tipos_productos = res.data.RespuestaListaProductos.listaCodigos;
			},
			async getUnidadesMedida()
			{
				const res = await this.service.obtenerUnidadesMedida();
				this.unidadesMedida = res.data.RespuestaListaParametricas.listaCodigos;	
			},
			async getMonedas()
			{
				const res = await this.service.obtenerMonedas();
				this.monedas = res.data.RespuestaListaParametricas.listaCodigos;	
			},
			async getTiposDocumentosIdentidad()
			{
				const res = await this.service.obtenerDocumentosIdentidad();
				this.tipos_documentos = res.data.RespuestaListaParametricas.listaCodigos;	
			},
			async getMetodosPago()
			{
				const res = await this.service.obtenerMetodosPago();
				//this.metodos_pago = res.data.RespuestaListaParametricas.listaCodigos;
				this.metodos_pago = [];
				for(let pm of res.data.RespuestaListaParametricas.listaCodigos)
				{
					if( this.allow_payment_methods.length > 0 && this.allow_payment_methods.indexOf(pm.codigoClasificador) != -1 )
						this.metodos_pago.push( pm );
					else
						this.metodos_pago.push( pm );
				}		
			},
			async getListaActividades()
			{
				const res = await this.service.obtenerActividades();
				this.lista_actividades = Array.isArray(res.data.RespuestaListaActividades.listaActividades) ?
					res.data.RespuestaListaActividades.listaActividades : [res.data.RespuestaListaActividades.listaActividades];
				if( this.lista_actividades.length > 0 )
					this.actividad_economica = this.lista_actividades[0].codigoCaeb;	
			},
			crearCliente()
			{
				this.$refs.customer_form.showModal();
			},
			buscarCliente(by)
			{
				if( this.searchTimeout )
					clearTimeout(this.searchTimeout);
				let keyword = '';
				if( by == 'customer' )
					keyword = this.keyword_customer;
				else 
					keyword = this.keyword_nit;
				if( keyword.trim().length <= 0 )
					return;
				this.searchTimeout = setTimeout(async () => 
				{
					try
					{
						const res = await this.serviceCustomers.search(keyword);
						this.customers_list = res.data;
						
					}
					catch(e)
					{
						console.log(e);
					}
				}, 500);
			},
			selectCustomer(item, index)
			{
				this.currentCustomer 	= item;
				this.keyword_customer	= '';
				if( item.first_name || item.firstname )
					this.keyword_customer = item.first_name || item.firstname;
				if( item.last_name )
					this.keyword_customer += item.first_name ? ` ${item.last_name}` : item.last_name;
				if( item.lastname )
					this.keyword_customer += item.firstname ? ` ${item.lastname}` : item.lastname;
				this.keyword_nit 		= item.tax_number || item.nit_ruc_nif; //item.meta && item.meta._nit_ruc_nif ? item.meta._nit_ruc_nif : '';
				this.customers_list 	= [];
			},
			buscarProducto(by)
			{
				if( this.searchProdTimeout )
					clearTimeout(this.searchProdTimeout);
				let keyword = this.keyword;
				if( keyword.trim().length <= 0 )
					return;
				this.searchProdTimeout = setTimeout(async () => 
				{
					try
					{
						const res = await this.service.buscarProducto(keyword);
						this.products_list = res.data;
						
					}
					catch(e)
					{
						console.log(e);
					}
				}, 500);
			},
			selectProduct(item, index)
			{
				//item.price = isNaN(parseFloat(item.price.toString())) ? 0 : parseFloat(item.price.toString());
				this.addItem(null, item);
				this.products_list = [];
			},
			async save()
			{
				this.closeModal(this.modalExcepcion);
				this.closeModal(this.modalDatosTarjeta);
				this.$refs.forminvoice.classList.remove('was-validated');
				this.$refs.formtarjeta.classList.remove('was-validated');
				try
				{
					this.closeModal(this.modalDatosTarjeta);
					if( !this.$refs.forminvoice.checkValidity() )
					{
						this.$refs.forminvoice.classList.add('was-validated');
						return;
					}
					if( document.getElementById("name").value=='' || document.getElementById("name").value==0)
						throw {error: 'Dato cliente no valido'};
					if( document.getElementById("ci").value=='' || document.getElementById("ci").value==0)
						throw {error: 'Dato Cedula de Identidad no valido'};
						
					if( this.activeEvent && [5, 6, 7].indexOf( parseInt(this.activeEvent.evento_id) ) != -1)
					{
						if( !this.$refs.fecha )
							throw {error: 'Debe seleccionar la fecha de la factura'};
						if( !this.$refs.hora )
							throw {error: 'Debe seleccionar la hora de la factura'};
						if( !this.invoice.data.nro_factura )
							throw {error: 'Debe ingresar el numero de factura'};
							
						this.invoice.invoice_date_time = new Date(`${this.$refs.fecha.value} ${ this.$refs.hora.value}`);
						//this.evento.fecha_inicio.setSeconds((new Date()).getSeconds());
					}
					
					if( [6, 16].indexOf(this.invoice.codigo_documento_sector) != -1 )
					{
						this.invoice.data.custom_fields['fechaIngresoHospedaje'] = this.$refs.headercom.getFechaHoraIngreso();
					}
					//if( this.invoice.total <= 0 )
					//	throw {error: 'El monto de la factura no puede ser cero'};
					const metodo_pago = this.buscarMetodoPago(this.invoice.codigo_metodo_pago);
					if( metodo_pago.descripcion.toUpperCase().indexOf( 'TARJETA' ) != -1 ) 
					{
						this.invoice.numero_tarjeta = this.$refs.inputcard.dataset.realvalue || null;
						this.$refs.formtarjeta.classList.add('was-validated');
						if( !this.invoice.numero_tarjeta )
						{
							this.openModal(this.modalDatosTarjeta);
							return;
						}
						if( !this.$refs.formtarjeta.checkValidity() )
						{
							this.openModal(this.modalDatosTarjeta);
							throw {error: 'Datos de tarjeta invalidos'};
						}
					}
					//CONSULTAR SI EXISTE CLIENTE O SINO CREAR

					const id_cliente = await this.service.consultaCliente(document.getElementById("ci").value,document.getElementById("name").value);
					
					this.invoice.customer_id 			= id_cliente.data;//id_cliente
					this.invoice.customer				= document.getElementById("name").value;//nombre cliente
					//this.invoice.customer 				= this.currentCustomer.name; //`${this.currentCustomer.first_name} ${this.currentCustomer.last_name}`;
					this.invoice.nit_ruc_nif 			= document.getElementById("ci").value;//ci cliente
					this.invoice.actividad_economica	= this.actividad_economica;
					
					this.$root.$processing.show('Procesando factura...');console.log(this.invoice);
					const res = await this.service.crearFactura(this.invoice);
					if( res.data && res.data.id )
					{
						this.generatedInvoice = res.data;
						this.openModal(this.modalImprimir);
					}
					else
					{
						this.$root.$toast.ShowSuccess('La factura fue generada correctamente');
					}
					this.activeEvent = null;
					await this.checkActiveEvent(this.invoice.codigo_sucursal, this.invoice.punto_venta);
					this.$root.$processing.hide();
					
					this.reset();
					
				}
				catch(e)
				{
					this.$root.$processing.hide();
					if( e.response == 'error_nit' )
						this.openModal(this.modalExcepcion);
					else
						this.$root.$toast.ShowError(e.error || e.message || 'Error desconocido');
				}
			},
			reset()
			{
				const pv = this.invoice.punto_venta;
				this.invoice = 	new SBFramework.Models.Invoice();
				this.invoice.codigo_documento_sector = null;
				this.invoice.codigo_documento_sector = this.current_doc_sector;
				this.invoice.punto_venta = pv;
				this.invoice.numero_tarjeta = null;
				this.currentCustomer = {id: 0, customer_id: 0};
				this.$refs.inputcard.value = '';
				this.$refs.inputcard.dataset.realvalue = '';
			},
			controlTributario(val)
			{
				if( val == 'control_tributario' )
				{
					this.keyword_customer = 'Control Tributario';
					this.keyword_nit = 99002;
				}
				else if( val == 'ventas_menores' )
				{
					this.keyword_customer = 'Ventas Menores del Dia';
					this.keyword_nit = 99003;
				}
				else if( val == 'caso_especial' )
				{
					this.keyword_customer = '';
					this.keyword_nit = 99001; 
				}
				else
				{
					this.keyword_customer = '';
					this.keyword_nit = '';
				}
			},
			async searchProduct()
			{
				
			},
			setInputCardEvents()
			{
				this.$refs.inputcard.addEventListener('keydown', function(e)
				{
					if( e.keyCode == 8 )
						return true;
					if( this.dataset.realvalue && this.dataset.realvalue.length >= 16 || this.readOnly )
					{
						e.preventDefault();
						return false;
					}
					if( (e.keyCode >= 48 && e.keyCode <= 57 ) || e.keyCode == 8 )
						return true;
					e.preventDefault();
					return false;
				});
				this.$refs.inputcard.addEventListener('keyup', function(e)
				{
					if( typeof this.dataset.realvalue == 'undefined')
						this.dataset.realvalue = '';
					if( e.keyCode == 8 && this.dataset.realvalue )
					{
						this.dataset.realvalue = this.dataset.realvalue.substring(0, this.dataset.realvalue.length - 1);
						return true;
					}
					if( this.dataset.realvalue && this.dataset.realvalue.length >= 16 )
					{
						return false;
					}
					//console.log(e);
					if( !this.value || this.value.length <= 0 )
					{
						this.dataset.realvalue = '';
						return true;
					}
					
					//const lastChar = this.value.substr(-1);
					this.dataset.realvalue += this.value.substr(-1);
					this.value = '';
					
					for(let i in this.dataset.realvalue)
					{
						if( typeof i == 'undefined' || isNaN(i))
							continue;
						console.log('i -> ', i);
						if( i > 3 && i < 12 )
							this.value += '0';
						else
							this.value += this.dataset.realvalue[i];
					}
					
				});
			},
			showOps()
			{
				this.openModal(this.modalOps);
			}
		},
		async mounted()
		{
			const frame = (window.bootstrap || window.coreui);
			if( frame )
			{
				//this.modalCustomer 		= frame.Modal.getOrCreateInstance(this.$refs.modalcustomer);
				this.modalDatosTarjeta 	= frame.Modal.getOrCreateInstance(this.$refs.modaldatostarjeta);
				//this.modalCerrarEvento	= frame.Modal.getOrCreateInstance(this.$refs.modalcerrarevento);
				this.modalImprimir 		= frame.Modal.getOrCreateInstance(this.$refs.modalimprimir);
				this.modalExcepcion 	= frame.Modal.getOrCreateInstance(this.$refs.modalexcepcion);
				this.modalOps		 	= frame.Modal.getOrCreateInstance(this.$refs.modalops);
			}
			else
			{
				//this.modalCustomer 		= jQuery(this.$refs.modalcustomer);
				this.modalDatosTarjeta 	= jQuery(this.$refs.modaldatostarjeta);
				//this.modalCerrarEvento 	= jQuery(this.$refs.modalcerrarevento);
				this.modalImprimir 		= jQuery(this.$refs.modalimprimir);
				this.modalExcepcion 	= jQuery(this.$refs.modalexcepcion);
				this.modalOps		 	= jQuery(this.$refs.modalops);
			}
			this.setInputCardEvents();
			//this.startInterval();
			let evt = new CustomEvent('invoicer_built', {detail: {com: this}});
			window.document.dispatchEvent(evt);
		},
		async created()
		{
			try
			{
				this.$root.$processing.show('Estableciendo datos...');
				await Promise.all([
					this.getSucursales(),
					this.getPuntosVenta(), 
					this.getUnidadesMedida(), 
					this.getMonedas(), 
					this.getTiposDocumentosIdentidad(),
					this.tiposProductos(),
					this.getMetodosPago(),
					this.getListaActividades(),
					this.addItemRecuperado(),
					//this.checkActiveEvent(),
					//this.checkOnlineStatus(),
				]);
				this.$root.$processing.hide();
				
				
			}
			catch(e)
			{
				this.$root.$processing.hide();
				console.log('ERROR', e);
			}
			
		}
	};
	SBFramework.AppComponents = {
		'siat-invoicer': ns.ComInvoicer, 
	};
})(SBFramework.Components.Siat);
