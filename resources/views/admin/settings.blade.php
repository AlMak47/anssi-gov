@extends('layouts.template')

@section('title')
ADMIN-Parametres
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>Parametres</h3>
		<hr class="uk-divider-small">
		@if(session("success"))
		<div class="uk-alert-success" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{session('success')}}</p>
		</div>
		@endif
		@if(session("_errors"))
		<div class="uk-alert-danger" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{session('_errors')}}</p>
		</div>
		@endif
		@if($errors->any())
		@foreach($errors->all() as $error)
		<div class="uk-alert-danger" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{$error}}</p>
		</div>
		@endforeach
		@endif
		<ul uk-accordion>
		    <li class="uk-open">
		        <a class="uk-accordion-title" href="#">Modifier le Mot de passe</a>
		        <div class="uk-accordion-content">
							<!--Change admin password -->
							{!!Form::open(['url'=>'admin/settings/change-password-admin'])!!}
							{!!Form::label('Username')!!}
							{!!Form::text('username','',['class'=>'uk-input uk-margin-small'])!!}
							{!!Form::label('Ancien Mot de pass')!!}
							{!!Form::text('old_password','',['class'=>'uk-input uk-margin-small'])!!}
							{!!Form::label('Nouveau mot de pass')!!}
							{!!Form::password('new_password',['class'=>'uk-input uk-margin-small'])!!}
							{!!Form::label("Confirmer le Nouveau Mot de Passe")!!}
							{!!Form::password('new_password_confirmation',['class'=>'uk-input uk-margin-small'])!!}
							{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default'])!!}
							{!!Form::close()!!}
							<!-- // -->
						</div>
		    </li>

		</ul>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {


	});
</script>
@endsection
