@extends('layouts.template')
<?php use Carbon\Carbon; ?>

@section('title')
NEWS
@endsection

@section('content')

<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Articles</span></li>
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
										<li><a href="{{asset(config('document.path').'/'.$value->file)}}" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
										<li><a href="#" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
										<li><a href="#" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
			@if($articles)
			<div class="uk-heading-divider uk-h3">TOUS LES ARTICLES</div>
			<div class="uk-child-width-1-2@m" uk-grid>
			@foreach($articles as $key => $values)
			<div>
				<article class="uk-article">

						    <h1 class="uk-article-title"><a class="uk-link-reset" href="{{url('/news',['slug'=>$values->slug])}}">{{str_limit($values->titre,50,'...')}}</a></h1>
						    <?php $date = new Carbon($values->created_at); ?>
						    <p class="uk-article-meta"> <a href="#">Admin</a> , {{$date->locale('fr_FR')->diffForHumans()}}.
									<!-- SHARE WITH FACEBOOK -->
						    	<span class="fb-like" data-href="{{url('/news',['slug'=>$values->slug])}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></span>
						    	<!-- // -->
								</p>
						    <img src="{{asset('article/'.$values->image)}}" width="600" class="uk-height-medium" uk-img>
						    <!-- <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p> -->

						    <p class="uk-text-small">{{str_limit(strip_tags($values->contenu),300,'...')}}</p>

						    <div class="uk-grid-small uk-child-width-auto" uk-grid>
						        <div>
						            <a class="uk-button uk-button-text" href="{{url('/news',['slug'=>$values->slug])}}">En savoir plus</a>
						        </div>
						        <!-- <div>
						            <a class="uk-button uk-button-text" href="#">5 Comments</a>
						        </div> -->
						    </div>

						</article>
				</div>
			@endforeach
			</div>
			@if($articles->hasMorePages())
			<ul class="uk-pagination uk-flex-center" uk-margin>
			    <li><a href="{{$articles->previousPageUrl()}}"><span uk-pagination-previous></span></a></li>
				@for($i = 0 ; $i < $articles->perPage() ; $i ++)
			    <li><a href="{{$articles->url($i+1)}}">{{$i+1}}</a></li>
			    @endfor
			    <li><a href="{{$articles->nextPageUrl()}}"><span uk-pagination-next></span></a></li>
			</ul>
			@endif

			@endif



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
