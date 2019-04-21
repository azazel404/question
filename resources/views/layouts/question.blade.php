@extends("app")
@section("content")
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8 col-12 m-auto">
			<div class="card shadow">
				<div class="card-body">
					<h4>Pertanyaan {{ $step }}</h4>
					<form class="mt-4" method="post" action="/submit-step{{ $step }}">
						@csrf
						@foreach($question as $key => $value)
							<h5 class="font-weight-bold">{{ $value->pertanyaan }}</h5>
							<div class="form-group">
								<input type="radio" name="{{ $value->id }}" value="YA">
								<label>YA</label>
								<br>
								<input type="radio" name="{{ $value->id }}" value="TIDAK">
								<label>TIDAK</label>
							</div>
						@endforeach
						<button type="submit" class="btn btn-primary mt-2">Selanjutnya</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection