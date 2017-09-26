<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<style>
		table, .th, td {
			border-collapse: collapse;
			border: solid 1px #000;
		}

		table#invoice {
			width: 100%;
			margin: auto;
		}

		table.no_border, table.no_border td, table.no_border .th {
			border-color: transparent;
		}

		table.border, table.border td, table.border .th {
			border-color: #ccc;
		}

		.center {
			margin: auto;
		}

		.text-left {
			text-align: left;
		}

		.text-right {
			text-align: right;
		}

		.text-center {
			text-align: center;
		}

		.va-top {
			vertical-align: top;
		}

		.pd-r {
			padding-right: 10px;
		}

		.invoice_body__client {
			margin-top: 20px;
			margin-left: 40px;
			margin-bottom: 10px;
		}

		.invoice_table {
			margin-top: 30px;
			margin-bottom: 50px;
		}

		.invoice_table .th {
			min-width: 50px;
			padding: 10px 0;
			text-align: center;
			background: #ccc;
		}

		.pd {
			padding: 10px 0;
		}

		.invoice_table td {
			padding: 10px 5px;
		}
	</style>
</head>
<body>
	{{-- <h1>Reservation no {{ $reservation->id }}</h1> --}}

	<table id="invoice" class="no_border">
		<tr>
			<td class="th">
				<table class="invoice_head center no_border">
					<tr>
						<td class="logo text-center">
							LOGO
						</td>
					</tr>

					<tr>
						<td class="invoice_head__title">
							<h1>FACTURE no. XXXX/YYYY</h1>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr class="invoice_body">
			<td class="invoice_body__client">
				<table class="no_border">
					<tr>
						<td>Nom</td>
						<td>: <strong>{{ $reservation->client->present()->fullName }}</strong></td>
					</tr>
					
					<tr>
						<td>Service</td>
						<td>: <strong>Occupation chambre</strong></td>
					</tr>
					<tr>
						<td>Date</td>
						<td>: <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td>
				<table class="invoice_table center border">
					<tr>
						<td class="th p-2">#</td>
						<td class="th">Desciption</td>
						<td class="th">Prix</td>
						<td class="th">QTE</td>
						<td class="th">Total</td>
					</tr>
					<tr>
						<td class="va-top text-center">1</td>
						
						<td  class="va-top">
							Occupation chambre <strong>{{ $reservation->room->code }}</strong> - <strong>{{ $reservation->room->type->name }}</strong>

							<ul>
								<li>Entree : {{ $reservation->present()->dateIn }}</li>
								<li>Sortie : {{ $reservation->present()->dateOut }}</li>
							</ul>
						</td>

						<td  class="va-top">
							${{ $reservation->room->type->base_price }}
						</td>

						<td  class="va-top text-center">
							{{ $reservation->present()->days }}
						</td>

						<td  class="va-top">
							${{ $reservation->total_price }}
						</td>
					</tr>

					<tr>
						<td colspan="4" class="text-right pd-r">
							Sous-total : 
						</td>

						<td>
							${{ $reservation->total_price }}
						</td>
					</tr>

					<tr>
						<td colspan="4" class="text-right pd-r">
							TVA : 
						</td>

						<td>
							0%
						</td>
					</tr>

					<tr>
						<td colspan="4" class="text-right pd-r">
							Grand Total : 
						</td>

						<td>
							${{ $reservation->total_price }}
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td class="text-center">
				Ceci est le pied de page de la facture.
			</td>
		</tr>
	</table>
</body>
</html>