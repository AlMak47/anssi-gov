@extends('layouts.template')

@section('title')
Outils
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Nos Outils</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m  uk-visible@l">
				<div class='uk-border-rounded panel-right ' id="right-menu">
					<!-- volet anssi guinee -->
					<ul class="uk-list uk-list-divider">
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/outils',['simples-utilisateurs'])}}"> Outils Simples Utilisateurs</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/outils',['professionnels'])}}"> Outils Professionnels</a></li>
					</ul>
				</div>
			</div>
			<div class="uk-width-3-5@m">
				@if($slug == "professionnels")
				<div class="uk-heading-divider uk-h3">Outils Professionnels</div>
				<ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-right">
				    <li><a href="#">{{App\Pages::where('slug','outils-daudit')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','proxy')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','intrusion-et-detection')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','firewal-pro')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','anti-spam')->first()->titre}}</a></li>
				</ul>
				<ul class="uk-switcher uk-margin">
				    <li>{!!App\Pages::where('slug','outils-daudit')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','proxy')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','intrusion-et-detection')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','firewal-pro')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','anti-spam')->first()->contenu!!}</li>
				</ul>
				@else
				<div class="uk-heading-divider uk-h3">Outils Simples Utilisateurs</div>
				<ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-right">
				    <li><a href="#">{{App\Pages::where('slug','outils-de-controle-parental')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','anti-virus')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','firewall')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','anti-spyware')->first()->titre}}</a></li>
				    <li><a href="#">{{App\Pages::where('slug','anti-spam')->first()->titre}}</a></li>
				</ul>
				<ul class="uk-switcher uk-margin">
				    <li>{!!App\Pages::where('slug','outils-de-controle-parental')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','anti-virus')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','firewall')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','anti-spyware')->first()->contenu!!}</li>
				    <li>{!!App\Pages::where('slug','anti-spam')->first()->contenu!!}</li>
				</ul>
				@endif
				<!-- outils -->

				<!-- // -->
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class="" id="left-menu">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="https://support.anssi.gov.gn" target="_blank" class="uk-button-link">Cellule d'alerte</a>
							</li>
							<li class="uk-text-center">
								<a href="voir-aussi/recrutement" class="uk-button-link">Recrutement</a>
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
								<a href="https://www.youtube.com/channel/UCmof-FnBWW2m8LAXrydUsJg/featured" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:red"><span uk-icon="icon:youtube ;"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
