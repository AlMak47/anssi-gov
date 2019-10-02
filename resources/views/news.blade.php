@extends('layouts.template')
<?php use Carbon\Carbon; ?>

@section('title')
Actualites
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
							<a href="{{url('/recrutement')}}" class="uk-button-link">Recrutement</a>
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
