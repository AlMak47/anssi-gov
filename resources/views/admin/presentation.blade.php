@extends('layouts.template')

@section('title')
ADMIN-PRESENTATION
@endsection

@section('content')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>ANSSI GUINEE</h3>
		<hr class="uk-divider-small">

		<ul uk-accordion>
		    <!-- <li class="uk-open">
		        <a class="uk-accordion-title" href="#">NOUVEAU VOLET</a>
		        <div class="uk-accordion-content">
		        	@if(session('success'))
		        	<div class="uk-alert uk-alert-success">
		        		<div>{{session('success')}}</div>
		        	</div>
		        	@endif
		        	{!!Form::open(['url'=>'/admin/post-page','id'=>'_form'])!!}
		        	{!!Form::text('titre','',['class'=>'uk-input uk-margin-small','placeholder'=>'TITRE'])!!} -->
		        	<!-- Create the editor container -->
		        	<!-- <input type="hidden" name="contenu" id="contenu"/>
							<div id="editor-container" style="height: 300px"></div>
		        	<input type="hidden" name="tag" value="presentation"> -->
		        	<!-- // -->
		        	<!-- {!!Form::submit('submit',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
		        	{!!Form::close()!!}
		        </div>
		    </li> -->
		    <li class="uk-open">
		        <a class="uk-accordion-title" href="#">TOUS LES VOLETS</a>
		        <div class="uk-accordion-content">
		        	<ul class="uk-list">
		        	@foreach($presentations as $key => $values)
		        		<li><a class="uk-button uk-button-link" href="">{{str_limit($values->titre,100)}}</a>
		        			<span class="uk-align-right">
			        		 <a href="{{url('admin/edit-page',['slug'=>$values->slug])}}" class="uk-alert-primary" uk-icon="icon:pencil;ratio:.8">edit</a>
			        		 <!-- <a href="" class="uk-alert-danger" uk-icon="icon:trash;ratio:.8">delete</a> -->
		        			</span>
		        		</li>
		        	@endforeach
		        	</ul>
		        </div>
		    </li>
		</ul>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		// console.log($("#summary-ckeditor"));

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: true
  },
  placeholder: 'Redigez ici ...',
  theme: 'snow'
});

$("#_form").on('submit',function() {
	$("#contenu").val(quill.root.innerHTML);
});
	});
</script>
@endsection
