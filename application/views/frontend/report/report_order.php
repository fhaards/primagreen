<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 5px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .flex {
            position: relative;
            display: flex;
            width: 100%;
            height: auto;
        }

        /* HEADER  */
        .heading-1 {
            font-size: 1.4rem;
            color: #1F2937;
            font-weight: bold;
        }

        .text {
            font-size: 0.9rem;
        }

        .left-content .company {
            width: 50%;
        }

        .left-content .company .text {
            color: #6B7280;
            font-weight: bold;
        }

        .right-content {
            position: relative;
            float: left;
        }

        .right-content .right-subcontent .invoice-text {
            background-color: #1F2937;
            padding: 10px;
            color: #fff;
            display: inline-block;
        }

        .right-content .right-subcontent .text {
            color: #6B7280;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="column left-content">
                <div class="company">
                    <span class="heading-1"><?= getCompanyData()['comp_nm']; ?></span>
                    <span class="text"><?= getCompanyData()['address']; ?></span>
                </div>
            </div>
            <div class="column right-content">
                <div class="right-subcontent">
                    <div class="heading-1 invoice-text">INVOICE</div>
                    <div class="text">Order Number : <br> 123124123213 </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>