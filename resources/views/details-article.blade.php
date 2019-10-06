@extends('layouts.template')
<?php use Carbon\Carbon; ?>

@section('title')
{{$details->titre}}
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb uk-visible@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/news')}}">Articles</a></li>
		    <li><span>{{str_limit($details->titre,100,'...')}}</span></li>
		</ul>
		<ul class="uk-breadcrumb uk-hidden@l">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="{{url('/news')}}">Articles</a></li>
		    <li><span>{{str_limit($details->titre,10,'...')}}</span></li>
		</ul>
<div class="" uk-grid>
	<div class="uk-width-1-5@m uk-visible@l">
		<div class="" id="">
			<div
			class="fb-page"
			data-href="https://www.facebook.com/ANSSI-Guin%C3%A9e-123887145678620/?__tn__=%2Cd%2CP-R&amp;eid=ARCi7SQPj9kFWkmBOxa7643aBMd9cbQsWtwNeC98sI_cMpWXcvBa1IjckVoyH1fcXmydI3Zd7VRTO5Qp" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ANSSI-Guin%C3%A9e-123887145678620/?__tn__=%2Cd%2CP-R&amp;eid=ARCi7SQPj9kFWkmBOxa7643aBMd9cbQsWtwNeC98sI_cMpWXcvBa1IjckVoyH1fcXmydI3Zd7VRTO5Qp"
			class="fb-xfbml-parse-ignore">
			<a href="https://www.facebook.com/ANSSI-Guin%C3%A9e-123887145678620/?__tn__=%2Cd%2CP-R&amp;eid=ARCi7SQPj9kFWkmBOxa7643aBMd9cbQsWtwNeC98sI_cMpWXcvBa1IjckVoyH1fcXmydI3Zd7VRTO5Qp">ANSSI Guinée</a></blockquote></div>
		</div>
		<hr class="uk-divider-small">
		<div class="">
			<a class="twitter-timeline" data-lang="fr" data-theme="light" href="https://twitter.com/AnssiGuinee?ref_src=twsrc%5Etfw">Tweets by AnssiGuinee</a>
		</div>
	</div>
	<div class="uk-width-3-5@m">
		<article class="uk-article">

		    <h1 class="uk-article-title">{{$details->titre}}</h1>
		    <?php $date = new Carbon($details->created_at); ?>
		    <p class="uk-article-meta"> <a href="#">Admin</a> , {{$date->locale('fr_FR')->diffForHumans()}} ,

		    	<!-- SHARE WITH FACEBOOK -->
		    	<span class="fb-like" data-href="{{url()->current()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></span>
		    	<!-- // -->
					<!-- share with twitter -->
					<span class="uk-align-right">
						<a href="https://twitter.com/AnssiGuinee?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-lang="fr" data-size="large" data-show-count="true">Follow @AnssiGuinee</a>
					</span>
					<!-- // -->

		    </p>
		    <img src="{{asset('article/'.$details->image)}}" width="" class="uk-border-rounded" height="">
		    <p class="uk-text-justify">{!!$details->contenu!!}</p>
				<div class="fb-comments" data-href="{{url()->current()}}" data-width="auto" data-numposts="10"></div>
		</article>
		<ul class="uk-pagination">
		@foreach($articles as $key => $values)
			@if($values->slug == $details->slug)
				@if($loop->last)
					<?php
					 $next = $loop->first;
					 $prev = $loop->index-1;
					?>
				@elseif($loop->first)
					<?php
					 $next = $loop->index+1;
					 $prev = null;
					?>
				@else
				<?php
					 $next = $loop->index+1;
					 // $prev = $loop->index-1;
					?>
				@endif
			@endif
		@endforeach
		</ul>
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
				<div class="uk-grid-small uk-padding-small uk-margin-top uk-child-width-1-4@m" uk-grid>
					<div class="">
						<a href="" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
					</div>
					<div class="">
						<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
					</div>
					<div class="">
						<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:red"><span uk-icon="icon:youtube ;"></span></a>
					</div>
					<div class="">
						<a href="https://www.linkedin.com/company/anssiguinee/" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:#0073b1"><span uk-icon="icon:linkedin ;"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	</div>
</div>
@endsection
