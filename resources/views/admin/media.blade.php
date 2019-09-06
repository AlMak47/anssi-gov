@extends('layouts.template')

@section('title')
ADMIN-MEDIAS
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>MEDIAS</h3>
		<hr class="uk-divider-small">

		<ul uk-accordion>
		    <li>
		        <a class="uk-accordion-title" href="#">NOUVEAU MEDIAS</a>
		        <div class="uk-accordion-content">
							<!-- video for youtube form -->
							{!!Form::open(['url'=>'admin/media/add-video'])!!}
							{!!Form::text('titre','',['class'=>'uk-input uk-margin-small','placeholder'=>'Titre de la video'])!!}
							{!!Form::text('link','',['class'=>'uk-input uk-margin-small','placeholder'=>'Lien youtube'])!!}
							{!!Form::textarea('description','',['class'=>"uk-textarea uk-margin-small",'placeholder'=>'Description'])!!}
							{!!Form::submit('Envoyez',['class'=>'uk-button uk-button-default'])!!}
							{!!Form::close()!!}
							<!-- // -->
						</div>
		    </li>
		    <li>
		        <a class="uk-accordion-title" href="#">TOUS LES MEDIAS</a>
		        <div class="uk-accordion-content"></div>
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
