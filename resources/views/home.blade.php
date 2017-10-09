<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="animated_favicon1.gif">
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
		.th, #gras{
			font-weight: bold;
		}
		.fooer{
			padding-bottom: 15px;
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
      		border-collapse: separate;
      		border-spacing: 0px;
      		border-radius: 3px 3px 0px 0px ;
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

	<table id="invoice" class="no_border">
		<tr>
			<td class="th">
				<table class="invoice_head center no_border">
					<tr>
						<td class="logo text-left">
							<img src="{{asset('images/logo/logo.png')}}"> <strong>LEDYA PYRAMIDE HOTEL</strong> <br>
							 35 Avenue Nguma , Macampagne, Kinshasa <br>
							 Contacte : +243 820005454 ; 82005464	
						</td>
					</tr>

					<tr>
						<td class="invoice_head__title " style="font-style: center;">
							<h3>FACTURE no. {{ $reservation->id }} / {{ $reservation->room->code }} </h3>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr class="invoice_body">
			<td class="invoice_body__client">
				<table class="no_border">

					<tr>
						<td> - Adressée à -</td>
					</tr>
					<tr>
						<td>Nom</td>
						<td>: <strong>{{ $reservation->client->present()->fullName }}</strong></td>
					</tr>

					<tr>
						<td>Téléphone</td>
						<td>: <strong>{{ $reservation->client->profile->phone_number }}</strong></td>
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
						<td class="th p-2">Réf.</td>
						<td class="th">Desciption</td>
						<td class="th">Prix</td>
						<td class="th">QTE</td>
						<td class="th">Total</td>
					</tr>
					<tr>
						<td class="va-top text-center"><strong>{{ $reservation->room->code }}</strong></td>
						
						<td  class="va-top">
							Occupation chambre  - <strong>{{ $reservation->room->type->name }}</strong>

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
				<td colspan="2" class="text-left pd-r">
				
					<label>A payer :</label> <input type="message" name="" > 
					<label style="padding-left: 5em;"> Reste: </label><input type="message" name="" >
				</td> 
			</tr>

			

		<tr>
			<td></td>
		</tr>
		<tr>	
			<td></td>
		</tr>
		
			<tr>
				<td class="text-center">
					<hr>
						Nous sommes ravi de votre passage au sein de Ledya Pyramide HOTEL. Nous serons encore ravi de vous compter parmis nous et vous offrir nos services.
				</td>
			</tr>
			<tr><td></td></tr>
			
			<tr>
				<td class="text-center">CONTACTER NOUS AUX ADRESSES SUIVANT : </td>

			</tr>
			<tr><td></td></tr>


			<tr>
				<td class="text-center">
					Adresse :  35 Avenue Nguma , Macampagne, Kinshasa
				</td>
			</tr>


	        <tr>
	            <td class="text-center">
	             	Téléphone : +243 820005454 ; 82005464	
	             </td>
	             

	        </tr>


	        <tr>
	             <td class="text-center">
	             	E-mail : info@pyramide-hotel.com
	             </td>
	        </tr>


	        <tr>
	            <td class="text-center">
	             	Site internet: www.pyramide-hotel.com
	            </td>
	        </tr>
	
	</table>
</body>
</html>