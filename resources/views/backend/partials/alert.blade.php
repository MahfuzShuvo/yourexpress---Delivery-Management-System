<script>
	@if (session('success'))
		swal({
		  title: "Success!",
		  text: "{{ session('success') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif

	@if (session('error'))
		swal({
		  title: "Error!",
		  text: "{{ session('error') }}",
		  icon: "error",
		  button: "OK",
		});
	@endif

	@if (session('warning'))
		swal({
		  title: "Warning!",
		  text: "{{ session('warning') }}",
		  icon: "warning",
		  button: "OK",
		});
	@endif

	@if (session('message'))
		swal({
		  // title: "Info!",
		  text: "{{ session('message') }}",
		  icon: "info",
		  button: "OK",
		});
	@endif
	@if (session('delete'))
		swal({
		  title: "Removed!",
		  text: "{{ session('delete') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif
</script>