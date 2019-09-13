@extends('layouts.template')

@section('title')
ANSSI-GUINEE-
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb uk-visible@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','missions-et-attributions')->first()->slug])}}">Anssi Guinee</a></li>
		    <li><span>{{$details->titre}}</span></li>
		</ul>
		<ul class="uk-breadcrumb uk-hidden@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/anssi-guinee')}}">Anssi Guinee</a></li>
		    <li><span>{{str_limit($details->titre,10,'...')}}</span></li>
		</ul>

		<div class="" uk-grid>
			<div class="uk-width-1-5@m  uk-visible@l">
				<div class='uk-border-rounded panel-right ' id="right-menu">
					<!-- volet anssi guinee -->
					<ul class="uk-list uk-list-divider">
						<?php  $presentations = App\Pages::where('tag','presentation')->get(); ?>
								@if($presentations->count() > 0)
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','edito-du-ministre')->first()->slug])}}"> {{App\Pages::where('slug','edito-du-ministre')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','edito-du-dg')->first()->slug])}}"> {{App\Pages::where('slug','edito-du-dg')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','missions-et-attributions')->first()->slug])}}">{{App\Pages::where('slug','missions-et-attributions')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','cybersecurite-en-guinee')->first()->slug])}}"> {{App\Pages::where('slug','cybersecurite-en-guinee')->first()->titre}}</a></li>
								@endif
					</ul>
				</div>

			</div>
			<div class="uk-width-3-5@m">
				    <h3 class="uk-heading-divider">{{$details->titre}}</h3>
				    <p class="uk-text-justify">{!!$details->contenu!!}</p>
			</div>

			<div class="uk-width-1-5@m">
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
								<a href="{{url('/recrutement')}}" class="uk-button-link">Recrutement</a>
							</li>
						</ul>
					</div>
					<div class='uk-border-rounded uk-margin-top panel-right uk-box-shadow-small'>
						<div class='uk-text-bold uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Nous Contacter</div>
						<div class="uk-grid-small uk-padding  uk-child-width-1-3@m" uk-grid>
							<div class="">
								<a href="https://www.facebook.com/anssi.guinee.3" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
							</div>
							<div class="">
								<a href="https://www.twitter.com/AnssiGuinee" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
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
<script type="text/javascript">
	$(function () {

	})
</script>
@endsection
