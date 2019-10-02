@extends('layouts.template')

@section('title')
ADMIN-ARTICLE
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>ARTICLES</h3>
		<hr class="uk-divider-small">
		@if(session('success'))
		<div class="uk-alert uk-alert-success">
			<div>{{session('success')}}</div>
		</div>
		@endif
		@if(session('error'))
		<div class="uk-alert uk-alert-danger">
			<div>{{session('error')}}</div>
		</div>
		@endif
		<ul uk-accordion="collapsible: true">
		    <li>
		        <a class="uk-accordion-title" href="#">NOUVEL ARTICLE</a>
		        <div class="uk-accordion-content">
		        	<!-- ARTICLE FORM -->
		        	@if($errors->has('titre') || $errors->has('image') || $errors->has('contenu'))
		        	<div class="uk-alert uk-alert-danger">
		        		<div>{{$errors->first('titre')}}</div>
		        		<div>{{$errors->first('image')}}</div>
		        		<div>{{$errors->first('contenu')}}</div>
		        	</div>
		        	@endif
		        	{!!Form::open(['url'=>'/admin/post-article','files'=>true,'id'=>'_form'])!!}
		        	{!!Form::text('titre','',['class'=>'uk-input uk-margin-small','placeholder'=>'TITRE'])!!}
		        	{!!Form::file('image',['class'=>'uk-margin-small'])!!}
		        	<!-- Create the editor container -->
		        	<input type="hidden" name="contenu" id="contenu"/>
					<div id="editor-container" style="height: 300px"></div>
		        	{!!Form::submit('submit',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
		        	{!!Form::close()!!}
		        </div>
		    </li>
		    <li class="uk-open">
		        <a class="uk-accordion-title" href="#">TOUS LES ARTICLES</a>
		        <div class="uk-accordion-content">
		        	<ul class="uk-list uk-list-striped">
		        	@foreach($articles as $key => $values)
		        		<li>
		        			<a class="uk-button uk-button-link" href="">{{str_limit($values->titre,100)}}</a>
		        			<span class="uk-align-right">
				        		 <a href="{{url('/admin/articles',[$values->slug,'edit'])}}" class="uk-button-primary" uk-icon="icon:pencil;ratio:.8">edit</a>
										 {!!Form::open(['url'=>'/admin/articles/'.$values->slug.'/delete'])!!}
				        		 <button type="submit" class="uk-button-danger" uk-icon="icon:trash;ratio:.8">delete</button>
										 {!!Form::close()!!}
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
    toolbar: [
			['bold', 'italic', 'underline', 'strike','link'],        // toggled buttons
		  ['blockquote', 'code-block','image'],

		  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
		  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
		  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
		  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
		  [{ 'direction': 'rtl' }],                         // text direction

		  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
		  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

		  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
		  [{ 'font': [] }],
		  [{ 'align': [] }],

		  ['clean']
		]
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
