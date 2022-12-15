<!DOCTYPE html>
<html lang="en">

<head>
	@include('partials.head')
</head>

<body>
	<script>
		@if(session()->has('success'))
			Swal.fire({title:'Berhasil', text:'{{session('success')}}', icon:'success'})
		@endif
		@if(session()->has('error'))
			Swal.fire({title:'Error!', text:'{{session('error')}}', icon:'error'})
		@endif
		@if(session()->has('info'))
			Swal.fire({title:'Info', text:'{{session('info')}}', icon:'info'})
		@endif
		@if($errors->any())
			Swal.fire({title:'Error!', html:'{!! implode('', $errors->all(':message<br>')) !!}', icon:'error'})
		@endif
	</script>
	<main class="main">
		@include('partials.side_nav')
		<div class="content">
      @yield('content')
			@include('partials.footer')
		</div>
	</main>
	<script src="/assets/vendor/jquery/jquery-1.10.2.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>