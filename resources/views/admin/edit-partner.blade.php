@extends('layouts.template')

@section('title')
ADMIN-PARTENAIRE
@endsection

@section('content')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<h3>EDITER</h3>
		<hr class="uk-divider-small">


	    	@if(session('success'))
	    	<div class="uk-alert uk-alert-success">
	    		<div>{{session('success')}}</div>
	    	</div>
	    	@endif
	    	@if($edit)
	    	{!!Form::open(['url'=>url()->current(),'id'=>'_form'])!!}
				{!!Form::text('organisation',$edit->organisation,['class'=>'uk-input uk-margin-small','placeholder'=>'Organisation'])!!}
				<!-- {!!Form::file('logo')!!} -->
				<br>
				<label for="">Tag</label>
				{!!Form::select('tag',[
				'strategique'	=>	'Strategique',
				'technique'	=>	'Technique',
				'financier'	=>	'Financier'
				],$edit->tag,['class'=>'uk-select'])!!}
				<hr class="uk-divider-small">
				<div id="editor-container" style="height : 300px">{!!$edit->description!!}</div>
				<input type="hidden" name="description" value="" id="description">
				{!!Form::submit('Envoyez',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
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
	$("#description").val(quill.root.innerHTML);
});
	});
</script>
@endsection
