<html>
<head>
  <title>Kirim Email dengan CodeIgniter</title>
</head>
<body>
    <div style="padding: 5px 30px;">
        <h1>Kirim Email dengan Framework Codeigniter</h1>
        <hr />
    <?php echo form_open('foo/sendthismail') ?>
            <div style="margin-bottom: 10px;">
                <label>Kepada</label><br />
                <input type="email" name="email" placeholder="Email Penerima" style="margin-top: 5px;width: 400px" />
            </div>
            <div style="margin-bottom: 10px;">
                <label>Subjek</label><br />
                <input type="text" name="subjek" placeholder="Subjek" style="margin-top: 5px;width: 400px" />
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <textarea name="pesan" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"></textarea>
            </div>
            <hr />
            <button type="submit">KIRIM EMAIL</button>
        <?php echo form_close() ?>
    </div>
</body>
</html>
