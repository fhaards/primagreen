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
            padding: 15px;
            width: 100%;
            border-style: solid;
            border-width: 0.5px;
            border-color: #D1D5DB;
            border-collapse: collapse;
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
            margin-top: 10px;
        }

        .table-items {
            width: 100%;
            margin-top: 10px;
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
            text-align: center;
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
                    <div class="text-lg text-bold">REPORT ORDER PURCHASED</div>
                    <?php $getDate = $getOrderCounted['tgl_pesan'] ; ?>
                    <p class="text text-sm text-bold" style="margin-bottom:-15px;">Month : <?=  strftime("%B", strtotime($getDate));?></p>
                    <p class="text text-sm text-bold">Year  : <?=  strftime("%Y", strtotime($getDate));?></p>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <main>
        <table class="text text-xs text-gray table-items">
            <tr>
                <th>No</th>
                <th>Order Number</th>
                <th>Total Qty</th>
                <th>Subtotal Items<br>(Rp)</th>
                <th>Tax 4%<br>(Rp)</th>
                <th>Courier <br>(Rp)</th>
                <th>Subtotal <br>(Rp)</th>
                <!-- <th>Subtotal</th> -->
            </tr>
            <?php $no = 0; $setTotalAll=0; ?>
            <?php foreach ($getOrderList as $row) : ?>
                <?php $no++; ?>
                <?php
                $subtotalItems = $row['tharga'];
                $subtotalAll = $row['total_harga'];
                $setTaxSubTotal = $subtotalItems * 0.04;
                $setTotalAll += $subtotalAll;
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['no_pemesanan']; ?></td>
                    <td><?= $row['tqty']; ?></td>
                    <td><?= number_format($subtotalItems); ?></td>
                    <td><?= number_format($setTaxSubTotal); ?></td>
                    <td><?= $row['nm_kurir']; ?> <br> ( <?= number_format($row['hrg_kurir']); ?> )</td>
                    <td><?= number_format($subtotalAll); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="6" style="padding:10px;">Total Purchased Order this <?=  strftime("%B", strtotime($getDate));?> / <?=  strftime("%Y", strtotime($getDate));?></th>
                <th><?= number_format($setTotalAll); ?></th>
            </tr>
        </table>
    </main>
</body>

</html>