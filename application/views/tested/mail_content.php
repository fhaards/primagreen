<body style="width:100%;position:relative;padding:5px;">
    <div style="background:#F9FAFB;border:1px solid #E5E7EB;width:50%;margin-left:auto;margin-right:auto;padding:50px;">
        <div style="width:90%;margin-left:auto;margin-right:auto;padding:10px;">
            <h1 style="text-align:center;font-style:bold;color:#10B981;"> THANK YOU FOR REGISTRATION </h1>
        </div>
        <div style="width:90%;margin-left:auto;margin-right:auto;padding:10px;">
            <p style="color:#374151;"><strong>Welcome to Primagreen , <?php echo $name; ?> . </strong> To log in when visiting our site just click Login at the top of every page, and then enter your e-mail address and password.</p>
            <!-- <p style="color:#374151;"></p> -->
            <ul style="color:white;background:#1F2937;list-style-type:none;margin:0;padding:15px;">
                <li style="padding:1px;"><strong> When you log in to your account, you will be able to do the following : </strong></li>
                <li style="padding:1px;"> > Proceed through checkout faster when making a purchase</li>
                <li style="padding:1px;"> > Check the status of orders</li>
                <li style="padding:1px;"> > View past orders</li>
                <li style="padding:1px;"> > Make changes to your account information</li>
                <li style="padding:1px;"> > Change your password</li>
            </ul>
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