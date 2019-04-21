@extends('app')
@section('content')

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8 col-12 m-auto">
			<div class="card shadow">
				<div class="card-body">
					<h4>Hasil</h4>
					<h5 class="font-weight-bold mt-4">Kekuatan</h5>
					<p>{{ $result->kekuatan }}</p>
					<h5 class="font-weight-bold mt-1">Kelemahan</h5>
					<p>{{ $result->kelemahan }}</p>
					<h5 class="font-weight-bold mt-1">Ciri - ciri</h5>
					<p>{{ $result->ciri }}</p>
					<a href="/step1" class="btn btn-primary mt-4">TEST ULANG</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection