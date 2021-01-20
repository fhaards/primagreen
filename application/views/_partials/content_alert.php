<?php if ($this->session->flashdata('InputMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Success",
			text: "Youre input was success",
			type: 'success',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
			icon: "success",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('deleteMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Success",
			text: "Youre Data was deleted",
			type: 'success',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
			icon: "success",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('errorMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Error ",
			text: "Ops, something Wrong",
			type: 'error',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
			icon: "error",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('errorMsgInput')) : ?>
	<script type="text/javascript">
		swal({
			title: "Error , Something Wrong",
			text: "Check again the form, noted: check one of features",
			type: 'error',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
			icon: "error",
		})
	</script>
<?php endif; ?>



<?php if ($this->session->flashdata('cannotDelete')) : ?>
	<script type="text/javascript">
		swal({
			type: 'error',
			title: 'Oops',
			text: 'The data cannot delete',
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('editMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Success",
			text: "Successfully edit a data",
			type: 'success',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('dataNotFound')) : ?>
	<script type="text/javascript">
		swal({
			title: "Ops",
			text: "Data Not Found , sorry",
			type: 'error',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('loginMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Welcome",
			text: "Login Success",
			type: 'success',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('errloginMsg')) : ?>
	<script type="text/javascript">
		swal({
			type: 'error',
			title: 'Oops...',
			text: 'Wrong, Email or Password',
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('registMsg')) : ?>
	<script type="text/javascript">
		swal({
			title: "Welcome",
			text: "Registration Success",
			type: 'success',
			timer: 3000,
			imageWidth: 50,
			allowOutsideClick: false,
			confirmButtonText: "OK",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('emptyCart')) : ?>
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


<?php if ($this->session->flashdata('SuccessCheckout')) : ?>
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

<!-- MESSAGES -->

<?php if ($this->session->flashdata('errorInputMsgs')) : ?>
	<script type="text/javascript">
		swal({
			title: "Erros",
			text: "Youre input was error, check again the field",
			type: 'error',
			timer: 3000,
			icon: "error",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('successInputMsgs')) : ?>
	<script>
		swal({
			title: "Success",
			text: "Thankyou for send us messages",
			buttons:false,
			timer: 1500,
			icon: "success",
		})
	</script>
<?php endif; ?>

<!-- ACCOUNT MODIFIED -->

<?php if ($this->session->flashdata('successEditAccount')) : ?>
	<script type="text/javascript">
		swal({
			title: "Success",
			text: "Success edit account",
			type: 'success',
			timer: 3000,
			allowOutsideClick: false,
			icon: "success",
		})
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('errorEditAccount')) : ?>
	<script type="text/javascript">
		swal({
			title: "Error",
			text: "Ops, something wrong",
			type: 'error',
			timer: 3000,
			allowOutsideClick: false,
			icon: "error",
		})
	</script>
<?php endif; ?>
