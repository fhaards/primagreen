<html>

<head>
    <title><?= $title; ?></title>
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-family: 'Helvetica' !important;
            font-weight: 400;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        header {
            width: 100%;
        }

        /* HEADER  */
        .heading-1 {
            text-transform: uppercase;
        }

        .tet-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-xl {
            font-size: 2rem;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-gray {
            color: #6B7280;
        }

        .text-green {
            color: #059669;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .left-content .company {
            width: 50%;
        }


        .right-content {
            position: relative;
            float: left;
            height: 100px;
        }

        .right-content .right-subcontent {
            float: right;
            margin-top: 10px;
        }

        .right-content .right-subcontent .invoice-text {
            color: #9CA3AF;
            display: inline-block;
        }

        .right-content .right-subcontent .text {
            color: #6B7280;
        }

        /* MAIN  */

        main {
            margin-top: 30px;
        }

        .table-items {
            width: 100%;
            margin-top: 30px;
        }

        .table-items,
        .table-items tr td,
        .table-items tr th {
            border-style: solid;
            border-width: 0.5px;
            border-color: #D1D5DB;
            border-collapse: collapse;
        }

        .table-items tr td,
        .table-items tr th {
            padding: 5px;
        }

        .table-items tr th {
            background: #F3F4F6;
        }

        /* FOOTER  */
        footer {
            position: absolute;
            bottom: 0;
        }

        .footer-2 {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="column left-content">
                <div class="company">
                    <span class="text-lg heading-1 text-bold text-green"><?= getCompanyData()['comp_nm']; ?></span>
                    <div class="text text-xs text-bold text-gray">
                        <?= getCompanyData()['address']; ?> <?= getCompanyData()['telp']; ?>
                    </div>
                </div>
            </div>
            <div class="column right-content">
                <div class="right-subcontent">
                    <div class="text-xl invoice-text text-bold">INVOICE</div>
                    <p class="text text-sm">Order Number : <br> <span class="text-bold"><?= $getOrderDetail['no_pemesanan']; ?> </span></p>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="row">
            <div class="column left-content">
                <div class="billing-address">
                    <span class="text-bold text-sm">Billing Address</span>
                    <table class="text text-xs text-gray" width="80%">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?= $getOrderDetail['nama']; ?><br></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?= $getOrderDetail['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Telphone</td>
                            <td>:</td>
                            <td><?= $getOrderDetail['tlp']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="column right-content">
                <div class="delivery-address">
                    <div class="text-bold text-sm">Delivery Address</div>
                    <table class="text text-xs text-gray" width="80%">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?= $getOrderDetail['nama_t']; ?><br></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?= $getOrderDetail['alamat_t']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table-items text-sm">
                <thead>
                    <tr class="">
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $subTotalAllItems = 0; ?>
                    <?php $setTax = 4 / 100; ?>
                    <?php foreach ($getOrderList as $getOrderLists) : ?>
                        <?php
                        $hargaBarang = $getOrderLists['harga'];
                        $qtyBarang = $getOrderLists['qty_pesan'];
                        $subTotalBarang = $hargaBarang * $qtyBarang;
                        $subTotalAllItems += $subTotalBarang;
                        ?>
                        <tr class="text-center">
                            <td class=""><?= $getOrderLists['nm_barang']; ?></td>
                            <td class="align-center"><?= $qtyBarang; ?></td>
                            <td class="align-center">Rp. <?= number_format($hargaBarang); ?></td>
                            <td class="align-center">Rp. <?= number_format($subTotalBarang); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php $setTaxSubTotal = $subTotalAllItems * 4 / 100; ?>
                    <tr class="">
                        <td colspan="3" class="text-bold align-right">SUBTOTAL &nbsp;&nbsp; </td>
                        <td class="align-center text-bold">Rp. <?= number_format($subTotalAllItems); ?></td>
                    </tr>
                    <tr class="">
                        <td colspan="3" class="text-bold align-right">SHIPMENTS &nbsp;&nbsp;<BR><span class="text-xs text-gray">( <?= $getOrderDetail['nm_kurir']; ?> ) </span>&nbsp;&nbsp; </td>
                        <td class="align-center text-bold">Rp. <?= number_format($getOrderDetail['harga_kurir']); ?></td>
                    </tr>
                    <tr class="">
                        <td colspan="3" class="text-bold align-right">TAX &nbsp;&nbsp; </td>
                        <td class="align-center text-bold">Rp. <?= number_format($setTaxSubTotal); ?></td>
                    </tr>
                    <tr class="">
                        <td colspan="3" class="text-bold align-right text-green">TOTAL &nbsp;&nbsp; </td>
                        <td class="align-center text-bold text-green">Rp. <?= number_format($subTotalAllItems); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <footer>
            <div class="row footer">
                <span class="text-xs text-gray">
                    Make all cheques payable to Primagreen <br>
                    If you have any question concering this invoice , contact to us.
                </span>
            </div>
            <div class="row footer-2">
                <div class="align-center text-base text-bold">
                    THANK YOU FOR BUYING OUR PLANTS
                </div>
            </div>
        </footer>

    </main>
</body>

</html>