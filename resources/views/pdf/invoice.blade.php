<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Example 2</title>
        <style>
            @font-face {
                font-family: DejaVu Sans;
            }

            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }

            a {
              color: #0087C3;
              text-decoration: none;
            }

            body {
              position: relative;
              width: 21cm;
              height: 29.7cm;
              margin: 0 auto;
              color: #555555;
              background: #FFFFFF;
              font-family: Arial, sans-serif;
              font-size: 14px;
              font-family: DejaVu Sans;
            }

            .header {
              padding: 10px 0;
              margin-bottom: 20px;
              border-bottom: 1px solid #AAAAAA;
            }

            #logo {
              float: left;
              margin-top: 8px;
            }

            #logo img {
              height: 70px;
            }

            #company {
              float: right;
              text-align: right;
            }


            #details {
              margin-bottom: 50px;
            }

            #client {
              padding-left: 6px;
              border-left: 6px solid #0087C3;
              float: left;
            }

            #client .to {
              color: #777777;
            }

            h2.name {
              font-size: 1.4em;
              font-weight: normal;
              margin: 0;
            }

            #invoice {
              float: right;
              text-align: right;
            }

            #invoice h1 {
              color: #0087C3;
              font-size: 2.4em;
              line-height: 1em;
              font-weight: normal;
              margin: 0  0 10px 0;
            }

            #invoice .date {
              font-size: 1.1em;
              color: #777777;
            }

            table {
              width: 100%;
              border-collapse: collapse;
              border-spacing: 0;
              margin-bottom: 20px;
            }

            table th,
            table td {
              padding: 20px;
              background: #EEEEEE;
              text-align: center;
              border-bottom: 1px solid #FFFFFF;
            }

            table th {
              white-space: nowrap;
              font-weight: normal;
            }

            table td {
              text-align: right;
            }

            table td h3{
              color: #57B223;
              font-size: 1.2em;
              font-weight: normal;
              margin: 0 0 0.2em 0;
            }

            table .no {
              color: #FFFFFF;
              font-size: 1.6em;
              background: #57B223;
            }

            table .desc {
              text-align: left;
            }

            table .unit {
              background: #DDDDDD;
            }

            table .qty {
            }

            table .total {
              background: #57B223;
              color: #FFFFFF;
            }

            table td.unit,
            table td.qty,
            table td.total {
              font-size: 1.2em;
            }

            table tbody tr:last-child td {
              border: none;
            }

            table tfoot td {
              padding: 10px 20px;
              background: #FFFFFF;
              border-bottom: none;
              font-size: 1.2em;
              white-space: nowrap;
              border-top: 1px solid #AAAAAA;
            }

            table tfoot tr:first-child td {
              border-top: none;
            }

            table tfoot tr:last-child td {
              color: #57B223;
              font-size: 1.4em;
              border-top: 1px solid #57B223;

            }

            table tfoot tr td:first-child {
              border: none;
            }

            #thanks{
              font-size: 2em;
              margin-bottom: 50px;
            }

            #notices{
              padding-left: 6px;
              border-left: 6px solid #0087C3;
            }

            #notices .notice {
              font-size: 1.2em;
            }

            .footer {
              color: #777777;
              width: 100%;
              height: 30px;
              position: absolute;
              bottom: 0;
              border-top: 1px solid #AAAAAA;
              padding: 8px 0;
              text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="header clearfix">
            <div id="logo">
                {{--  <img src="{{ asset("images/logo.png") }}">  --}}
            </div>
            <div id="company">
                <h2 class="name">PYRAMIDE HOTEL</h2>
                <div>455 Foggy Heights, AZ 85004, US</div>
                <div>(602) 519-0450</div>
                <div><a href="mailto:info@pyramide-hotel.com">info@pyramide-hotel.com</a></div>
            </div>
        </div>

        <div>
            <div id="details" class="clearfix">
                <div id="client">
                    <div class="to">INVOICE TO:</div>
                    <h2 class="name">{{ $reservation->client->present()->fullName() }}</h2>
                    <div class="address">{{ $reservation->client->profile->address }}</div>
                    <div class="tel">{{ $reservation->client->profile->phone_number }}</div>
                    <div class="email">
                        <a href="{{ $reservation->client->present()->email }}">
                            {{ $reservation->client->present()->email }}
                        </a>
                    </div>
                </div>
                <div id="invoice">
                    <h1>INVOICE #{{ $reservation->id }}</h1>
                    <div class="date">Date of Invoice: {{ now()->format('d-m-Y') }}</div>
                    <div class="date">Due Date: $reservation->checkout </div>
                </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">DESCRIPTION</th>
                        <th class="unit">UNIT PRICE</th>
                        <th class="qty">QUANTITY</th>
                        <th class="total">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="no">01</td>
                        <td class="desc">
                            <h3>Occupation chambre</h3>
                            Chambre $reservation->room->present()->name du _$reservation->checkin_ au _$reservation->checkout_
                        </td>
                        <td class="unit">$ $reservation->room->base_price</td>
                        <td class="qty">1</td>
                        <td class="total">$ $reservation->room->base->price * 1</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>$5,200.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">TAX 25%</td>
                        <td>$1,300.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td>$6,500.00</td>
                    </tr>
                </tfoot>
            </table>

            <div id="thanks">Thank you!</div>

            <div id="notices">
                <div>Note:</div>
                <div class="notice">A charge sera ajouté sur des factures impayés apres 30 jours.</div>
            </div>
        </div>

        <div class="footer">
            Facture créée automatiquement à partir d'un ordinateur, ainsi valide sans une signature ou un sceau.
        </div>
    </body>
</html>