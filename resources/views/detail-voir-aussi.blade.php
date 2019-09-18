@extends('layouts.template')


@section('title')
{{$details->titre}}
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha256-kIxwtDqhOVbQysWu0OpR9QfijdXCfqvXgAUJuv7Uxmg=" crossorigin="anonymous" />

<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>{{$details->titre}}</span></li>
		</ul>

		<div class="uk-grid-medium" uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				
				</div>

			<div class="uk-width-3-5@m">
				    <h3 class="uk-heading-divider">{{$details->titre}}</h3>
				    <p>{!!$details->contenu!!}</p>
						@if($details->tag == "administration" && $details->slug == "bonnes-pratiques")
						<h4 class="uk-heading-divider">Nos Guides</h4>
						@php
						$guides = App\Document::where('type','guide')->get();
						@endphp
						<ul class="uk-list">
							@if($guides)
							@foreach($guides as $key => $value)
							<li><a href="#" class="uk-button uk-button-text"><span uk-icon="icon : file-pdf"></span> {{$value->titre}}</a> </li>
							@endforeach
							@endif
						</ul>
						@endif
			</div>
			<div class="uk-width-1-5@m  uk-visible@l">
				<div class="" id="left-menu">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="#" class="uk-button-link">Cellule d'alerte</a>
							</li>
							<li class="uk-text-center">
								<a href="#" class="uk-button-link">Recrutement</a>
							</li>
						</ul>
					</div>
					<div class='uk-border-rounded uk-margin-top panel-right uk-box-shadow-small'>
						<div class='uk-text-bold uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Nous Contacter</div>
						<div class="uk-grid-small uk-padding  uk-child-width-1-3@m" uk-grid>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
							</div>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
							</div>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:red"><span uk-icon="icon:youtube ;"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js" integrity="sha256-RwTJwLtruVfpQ/9COgOgOoFtDQoDY92EqysD/ZMidS8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function () {
		$("#date_constat,#date_debut").datetimepicker({
			format : 'd/m/Y H:i',
			lang : 'fr',
			mask : true
		});
	})
</script>
@endsection
