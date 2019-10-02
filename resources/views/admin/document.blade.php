@extends('layouts.template')

@section('title')
ADMIN-DOCUMENTS
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>DOCUMENTS</h3>
		<hr class="uk-divider-small">
		@if(session('success'))
		<div class="uk-alert-success" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{session('success')}}</p>
		</div>
		@endif
		@if($errors->has('type') || $errors->has('titre') || $errors->has('fichier'))
		<div class="uk-alert-danger" uk-alert>
			<a href="#" class="uk-alert-close" uk-close></a>
			<p>{{$errors->first('type')}}</p>
			<p>{{$errors->first('titre')}}</p>
			<p>{{$errors->first('fichier')}}</p>
		</div>
		@endif
		<ul uk-accordion>
		    <li class="uk-open">
		        <a class="uk-accordion-title" href="#">NOUVEAU DOCUMENT</a>
		        <div class="uk-accordion-content">
							<!-- document add form -->
							{!!Form::open(['url'=>'admin/documents/add','files'=>true])!!}
							{!!Form::select('type',['loi'=>'Lois','arrete'=>'Arrete','decret'=>'Decret','decision'=>'Decision','guide'=>'Guide','autre'=>'Autres'],null,['class'=>'uk-select uk-margin-small'])!!}
							{!!Form::text('titre','',['class'=>'uk-input uk-margin-small','placeholder'=>'titre du document'])!!}
							{!!Form::file('fichier')!!}
							{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
							{!!Form::close()!!}
						</div>
		    </li>
		    <li>
		        <a class="uk-accordion-title" href="#">TOUS LES DOCUMENTS</a>
		        <div class="uk-accordion-content">
							@if($docs)
							<ul class="uk-list uk-list-striped">
								@foreach($docs as $doc)
								<li>
		        			<a class="uk-button uk-button-link" href="">{{str_limit($doc->titre,100)}}</a>
		        			<span class="uk-align-right">
				        		 <!-- <a href="{{url('/admin/articles',[$doc->slug,'edit'])}}" class="uk-alert-primary" uk-icon="icon:pencil;ratio:.8">edit</a> -->
										 {!!Form::open(['url'=>'/admin/articles/'.$doc->slug.'/delete'])!!}
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


	});
</script>
@endsection
