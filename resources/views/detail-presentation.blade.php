@extends('layouts.template')

@section('title')
ANSSI-GUINEE-
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb uk-visible@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/anssi-guinee')}}">Anssi Guinee</a></li>
		    <li><span>{{$details->titre}}</span></li>
		</ul>
		<ul class="uk-breadcrumb uk-hidden@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/anssi-guinee')}}">Anssi Guinee</a></li>
		    <li><span>{{str_limit($details->titre,10,'...')}}</span></li>
		</ul>

		<div class="" uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>DOCUMENTATION</div>
					<ul uk-accordion="multiple : true">
						<li>
								<a class="uk-accordion-title" href="#">Lois</a>
								@php
								use Illuminate\Support\Facades\Storage;
								$lois = App\Document::getLois();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($lois as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" href="" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
						<li>
								<a class="uk-accordion-title" href="#">Decrets</a>
								@php
								$docs = App\Document::getDecrets();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($docs as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,20,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
						<li>
								<a class="uk-accordion-title" href="#">Arrete</a>
								@php
								$docs = App\Document::getArrete();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($docs as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,20,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
					</ul>
				</div>
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>AUTRES LIENS</div>
					<ul class='uk-list'>
						<li><a class='uk-button uk-button-text' href="https://www.arpt.gov.gn" target="_blank" uk-tooltip="Autorite de Regulation des Postes et Telecommunication"><span uk-icon='icon:check;ratio:.8'></span> ARPT</a></li>

						<li><a class='uk-button uk-button-text' href="https://www.mpten.gov.gn/" target="_blank" uk-tooltip="Ministere des Postes et Telecommunication et de l'Economie Numerique"><span uk-icon='icon:check;ratio:.8'></span> MPTEN</a></li>


					</ul>
				</div>
			</div>
			<div class="uk-width-3-5@m">
				    <h3 class="uk-heading-divider">{{$details->titre}}</h3>
				    <p class="uk-text-justify">{!!$details->contenu!!}</p>
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>A VOIR AUSSI</div>
					<ul class='uk-list'>
						<?php App\Http\Controllers\AcceuilController::voirAussi(); ?>
					</ul>
				</div>

				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>LIENS</div>
					<ul class='uk-list'>
						<li><a class='uk-button uk-button-text uk-text-left' href="https://cve.mitre.org/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Common Vulnerability and Exposures</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://www.exploit-db.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Exploit Database</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://nvd.nist.gov/vuln/detail/CVE" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> NIST</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://www.cvedetails.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> CVE Details</a></li>

					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
