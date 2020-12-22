<?php if($this->session->flashdata('InputMsg')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Sukses",
	      text: "Data Berhasil Ditambahkan",
	      type: 'success',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>


<?php if($this->session->flashdata('deleteMsg')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Sukses ",
	      text: "Data Berhasil Dihapus",
	      type: 'success',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('errorMsg')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Error ",
	      text: "Ops, something Wrong",
	      type: 'error',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('cannotDelete')): ?>
   	<script type="text/javascript"> 
	swal({
	      type: 'error',
  		  title: 'Gagal menghapus data',
          text: 'Produk terdapat pada Laporan',
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('editMsg')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Sukses ",
	      text: "Data Berhasil Diubah",
	      type: 'success',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('loginMsg')): ?>
	<script type="text/javascript"> 
	swal({
	      title: "Login Berhasil",
	      text: "Selamat Datang",
	      type: 'success',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('errloginMsg')): ?>
	<script type="text/javascript"> 
	swal({
	      type: 'error',
  		  title: 'Oops...',
          text: 'Wrong, Username or Password',
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>

<?php if($this->session->flashdata('emptyCart')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Wooops ! ",
	      text: "Cart is empty",
	      type: 'error',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>


<?php if($this->session->flashdata('SuccessCheckout')): ?>
    <script type="text/javascript"> 
	swal({
	      title: "Order Success",
	      text: "Continue youre order process",
	      type: 'success',
	      timer: 3000,
	      imageWidth: 50,
	      allowOutsideClick: false,
	      confirmButtonText: "OK",
	    })
	</script>
<?php endif; ?>