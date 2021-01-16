<html>
<head>
    <title>Kirim Email dengan CodeIgniter</title>
</head>
<body>
    <div style="padding: 5px 30px;">
        <h1>Kirim Email dengan Framework Codeigniter</h1>
        <hr />
        <?php echo form_open('foo/sendthismail_regist') ?>
        <div style="margin-bottom: 10px;">
            <input type="text" name="name" placeholder="Name" style="margin-top: 5px;width: 400px" />
        </div>
        <div style="margin-bottom: 10px;">
            <input type="email" name="email" placeholder="Email" style="margin-top: 5px;width: 400px" />
        </div>
        <div style="margin-bottom: 10px;">
            <input type="password" name="password" placeholder="Password" style="margin-top: 5px;width: 400px" />
        </div>
        <hr />
        <button type="submit">KIRIM EMAIL</button>
        <?php echo form_close() ?>
    </div>
</body>
</html>