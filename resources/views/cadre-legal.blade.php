@extends('layouts.template')

@section('title')
Cadre Legal
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Cadre Legal</span></li>
		    <li><span>{{$cadre->titre}}</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m">
				<!-- volet cadre legal -->
				<div class='uk-border-rounded panel-right ' id="right-menu">
					<!-- volet anssi guinee -->
					<ul class="uk-list uk-list-divider">
						<?php  $presentations = App\Pages::where('tag','cadre_legal')->get(); ?>
								@if($presentations->count() > 0)
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['documents-strategiques'])}}"> {{App\Pages::where('slug','documents-strategiques')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['lois'])}}"> {{App\Pages::where('slug','lois')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['decrets-et-arretes'])}}"> {{App\Pages::where('slug','decrets-et-arretes')->first()->titre}}</a></li>
										<li><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal','decision')}}"> {{App\Pages::where('slug','decision')->first()->titre}}</a></li>

								@endif
					</ul>
				</div>
			</div>
			<div class="uk-width-3-5@m">
				@if($cadre)
				<div class="uk-heading-divider uk-h3">{{$cadre->titre}}</div>
				<p>{!!$cadre->contenu!!}</p>
				<!-- documents pdf -->

				@php

				$files = App\Document::getFile($tab[$cadre->slug]);
				@endphp
				@foreach($files as $key=>$value)
				<div class=" uk-button-group uk-width-1-1">
					<a class="uk-button uk-button-default uk-width-1-1@m uk-text-left uk-margin-small-bottom" uk-tooltip="{{$value->titre}}">{{str_limit($value->titre,86,'...')}}</a>
				    <div class="uk-inline">
				        <!-- The button toggling the dropdown -->
				        <a href="{{asset('documents/'.$value->file)}}" target="_blank" style="background : rgb(0, 116, 180);color:#fff" class="uk-button uk-button-default" type="button"> <span uk-icon="icon:download"></span></a>
				    </div>
				</div>
				@endforeach
				<!-- // -->
				@endif
			</div>
			<div class="uk-width-1-5@m uk-position-z-index">
				<div class="" id="left-menu" class="test">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="https://support.anssi.gov.gn" class="uk-button-link">Cellule d'alerte</a>
							</li>
							<li class="uk-text-center">
								<a href="{{url('voir-aussi/recrutement')}}" class="uk-button-link">Recrutement</a>
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
