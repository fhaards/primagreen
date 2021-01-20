<body style="width:100%;position:relative;padding:5px;">
    <div style="background:#F9FAFB;border:1px solid #E5E7EB;width:50%;margin-left:auto;margin-right:auto;padding:50px;">
        <div style="width:90%;margin-left:auto;margin-right:auto;padding:10px;">
            <h1 style="text-align:center;font-style:bold;color:#10B981;"> Modify Account Information </h1>
        </div>
        <div style="width:90%;margin-left:auto;margin-right:auto;padding:10px;">
            <p style="color:#374151;"><strong>Hello , <?= $name; ?> . </strong>
                You just changed your account information, on <?= $date; ?>.
                Please be careful when changing your account, make sure this is an action that you do yourself.
            </p>
            <hr />
            <p style="font-size:0.7rem;color:#6B7280;">
                If you have any questions about your account or any other matter, <br />
                please feel free to contact us at : <br />
                Phone : <strong> <?= getCompanyData()['telp']; ?> </strong> <br>
                Instagram : <strong> <?= getCompanyData()['instagram']; ?> </strong> <br>
            </p>
        </div>
        <div style="width:90%;margin-left:auto;margin-right:auto;background:#E5E7EB;padding:1px;color:#1F2937;font-size:0.7rem;">
            <p style="text-align:center;">Thank you again | <strong> Primagreen </strong> </p>
        </div>
    </div>
</body>