<!-- JavaScript -->
<script src="{{ asset('public/assets/js/bundle.js')}}"></script>
<script src="{{ asset('public/assets/js/scripts.js')}}"></script>
<script src="{{ asset('public/assets/js/charts/gd-invest.js')}}"></script>

{{-- Sweet alert CDN --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


{{-- alert --}}

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