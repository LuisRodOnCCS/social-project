@extends('layouts.template')

@section('scripts')

@endsection

@section('title', 'Social Project')

@section('header')
	@auth
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 text-end py-2">
					<a href="{{route('dashboard')}}" class="btn btn-dark btn-sm">Dashboard</a>
				</div>
			</div>
		</div>
	@endauth
	<header
	class="max-container"
	style="
		background-color: rgb(0, 0, 0);
		width: 100%;
		height: auto;
		position: relative;
	"
	>
		<div class="welcome" style="max-width: 1920px"">
			<h1 class="text-white mb-0 h1name">{{ explode(' ', $user['name'])[0] . ' ' . explode(' ', $user['name'])[2] }}</h1>
			@if(!empty($user['twitter']) || !empty($user['github']))
				<div class="d-flex justify-content-start align-items-center">
					<p>
						@if(!empty($user['github']))
							<a href="{{ $user['github'] }}" target="new" class="mx-2"><i class="bi bi-github"></i></a>
						@endif
						@if(!empty($user['twitter']))
							<a href="{{ $user['twitter'] }}" target="new" class="mx-2"><i class="bi bi-twitter"></i></a>
						@endif
					</p>
				</div>
			@endif
		</div>
	</header>
@endsection

@section('content')
	
@endsection

@section('footerScripts')

@endsection