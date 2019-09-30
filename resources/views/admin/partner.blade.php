@extends('layouts.template')

@section('title')
Admin-Partenaires
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>Partenaires</h3>
		<hr class="uk-divider-small">
		@if(session('success'))
		<div class="uk-alert-success" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{session('success')}}</p>
		</div>
		@endif
		@if($errors->has('organisation') || $errors->has('logo') || $errors->has('description'))
		<div class="uk-alert-danger" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{$errors->first('organisation')}}</p>
			<p>{{$errors->first('logo')}}</p>
			<p>{{$errors->first('description')}}</p>
		</div>
		@endif
		<ul uk-accordion>
		    <li class="uk-open">
		        <a class="uk-accordion-title" href="#">Ajouter</a>
		        <div class="uk-accordion-content">
							<!-- video for youtube form -->
							{!!Form::open(['url'=>'admin/partner/add','files'=>true,'id'=>'_form'])!!}
							{!!Form::text('organisation','',['class'=>'uk-input uk-margin-small','placeholder'=>'Organisation'])!!}
							{!!Form::file('logo')!!}
							<br>
							<label for="">Tag</label>
							{!!Form::select('tag',[
							'strategique'	=>	'Strategique',
							'technique'	=>	'Technique',
							'financier'	=>	'Financier'
							],null,['class'=>'uk-select'])!!}
							<hr class="uk-divider-small">
							<div id="editor-container" style="height : 300px"></div>
							<input type="hidden" name="description" value="" id="description">
							{!!Form::submit('Envoyez',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
							{!!Form::close()!!}
							<!-- // -->
						</div>
		    </li>
		    <li>
		        <a class="uk-accordion-title" href="#">TOUS LES MEDIAS</a>
		        <div class="uk-accordion-content">
							@if($partners)
							<ul class="uk-list uk-list-divider">
								@foreach($partners as $values)
								<li>
									<a class="uk-button uk-button-link" href="">{{$values->organisation}}</a>
									<span class="uk-align-right">
										 <a href="{{url('/admin/partners',[$values->slug,'edit'])}}" class="uk-alert-primary" uk-icon="icon:pencil;ratio:.8">edit</a>
										 {!!Form::open(['url'=>'/admin/partners/'.$values->slug.'/delete'])!!}
										 <button type="submit" class="uk-alert-danger" uk-icon="icon:trash;ratio:.8">delete</button>
										 {!!Form::close()!!}
									</span>
								</li>
								@endforeach
							</ul>
							@endif
						</div>
		    </li>
		</ul>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		var quill = new Quill('#editor-container',{
			modules: {
		    toolbar: true
		  },
		  placeholder: 'Redigez ici ...',
		  theme: 'snow'
		});

		$("#_form").on('submit',function() {
				$("#description").val(quill.root.innerHTML);
		});
	});
</script>
@endsection
