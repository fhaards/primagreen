<?php
    $str = 'Monstera Augela';
    $getSku = mb_substr($str, 0, 3);
    $getSkuCode = '0053' . 'PLNT' . strtoupper($getSku);
    echo $getSkuCode;
    echo (rand() . "<br>");
    echo (rand() . "<br>");
    echo (rand(100, 300) . "<br>");
    echo (rand(100, 300) . "<br>");
    echo (rand(100, 300) . "<br>");
    echo password_hash("google37", PASSWORD_DEFAULT);
?>

TEST FOREACH
<br><br><br>
<?php foreach ($newItems as $newItemsValue) { ?>
        <?php if ($newItemsValue['id_barang'] == $favItems['id_barang']) : ?>
            <?php echo $favItems['id_barang'];?> <br>
            <?php $ck='ilovethis';?>
        <?php else :?>
            <?php $ck='inotlovethis';?>
        <?php endif; ?>
    <?php echo $ck;?>
    <?php echo $newItemsValue['id_barang'];?> <br>
<?php } ?>