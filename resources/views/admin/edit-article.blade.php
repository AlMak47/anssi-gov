@extends('layouts.template')

@section('title')
ADMIN-ARTICLE
@endsection

@section('content')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3><a href="{{url()->previous()}}" uk-tooltip="retour"><span uk-icon="icon:arrow-left"></span></a>EDITER</h3>
		<hr class="uk-divider-small">


	    	@if(session('success'))
	    	<div class="uk-alert-success" uk-alert>
					<a href="#" class="uk-alert-close" uk-close></a>
					<p>{{session('success')}}</p>
	    	</div>
	    	@endif
				@if($errors->has('titre') || $errors->has('slug') || $errors->has('file') || $errors->has('contenu'))
				<div class="uk-alert-danger" uk-alert	>
					<a href="#" class="uk-alert-close" uk-close></a>
					<p>{{$errors->first('titre')}}</p>
					<p>{{$errors->first('slug')}}</p>
					<p>{{$errors->first('file')}}</p>
					<p>{{$errors->first('contenu')}}</p>
				</div>
				@endif
				@if(session("_errors"))
				<div class="uk-alert-danger" uk-alert>
					<a href="#" class="uk-alert-close" uk-close></a>
					<p>{{session('_errors')}}</p>
				</div>
				@endif
	    	@if($edit)
	    	{!!Form::open(['url'=>url()->current(),'id'=>'_form','files'=>true])!!}
				<div uk-lightbox>
			    <a class="uk-button-default" href="{{asset('article/'.$edit->image)}}"><span uk-icon="icon:image"></span>  Voir l'image</a>
				</div>
				{!!Form::label('cliquez pour modifier l\'image')!!}
				{!!Form::hidden('slug',$edit->slug)!!}
				{!!Form::file('image')!!}
	    	{!!Form::text('titre',$edit->titre,['class'=>'uk-input uk-margin-small','placeholder'=>'TITRE'])!!}
	    	<!-- Create the editor container -->
	    	<input type="hidden" name="contenu" id="contenu"/>
				<div id="editor-container" style="height: 300px">{!!$edit->contenu!!}</div>
	    	<!-- // -->
	    	{!!Form::submit('submit',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
	    	{!!Form::close()!!}
	    	@endif
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
		  ['blockquote', 'code-block'],

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
