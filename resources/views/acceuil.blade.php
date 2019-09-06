@extends('layouts.template')
<?php use Carbon\Carbon; ?>

@section('title')
ACCEUIL
@endsection
@section('content')
<!-- BANNIERE -->
<div class="uk-visible@l" uk-slideshow="autoplay:true;autoplay-interval : 5000; max-height: 400">
    <ul class="uk-slideshow-items" >
    	@if($banniere)
    	@foreach($banniere as $key => $value)
        <li>
            <img src="{{asset('article/'.$value->image)}}" alt="" uk-cover>
            <div class="uk-overlay uk-overlay-default uk-position-bottom-right uk-position-small uk-transition-slide-bottom">
                <h3 class="uk-margin-remove uk-width-xlarge">{{$value->titre}}</h3>
                <!-- <p class="uk-margin-remove">Lorem ipsum dolor sit amet.</p> -->
            </div>
        </li>
        @endforeach
        @endif
    </ul>
    <div class="uk-light">
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
</div>
<!-- // -->
<!-- responsive sliders -->

<!-- // -->
<div class="uk-section uk-section-default uk-margin-small">
	<div class="uk-container uk-container-large">
    <!-- responsive content -->
    <div class="uk-hidden@l">
      <h3 class="uk-heading-divider">BULLETIN D'ACTUALITES</h3>
      @if($mobiles)
      @foreach($mobiles as $key => $values)

        <article class="uk-article">
          <a class="uk-link-reset" href="{{url('/news',['slug'=>$values->slug])}}">
            <h1 class="uk-article-title">{{str_limit($values->titre,100,'...')}}</h1>
            <?php $date = new Carbon($values->created_at); ?>
            <p class="uk-article-meta"> <a href="#">Admin</a> , {{$date->toFormattedDateString()}}.</p>
            <img src="{{asset('article/'.$values->image)}}" class="uk-responsive-width uk-responsive-height" alt="" uk-img>
            <!-- <p class="uk-text-large">{!!str_limit(strip_tags($values->contenu),300,'...')!!}</p> -->
        </a>
      </article>

      @endforeach
      @endif

    </div>
    <!-- // -->
		<div class="uk-grid-medium uk-visible@l" uk-grid>
      <div class="uk-width-1-5@m">
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
		<!-- BULLETIN D'ACTUALITES -->
			<div class="uk-width-3-5@m">
				<h3 class="uk-heading-divider">BULLETIN D'ACTUALITES</h3>
				@if($articles)
				@foreach($articles as $key => $values)
				<article class="uk-article">

				    <h1 class="uk-article-title"><a class="uk-link-reset" href="{{url('/news',['slug'=>$values->slug])}}">{{str_limit($values->titre,100,'...')}}</a></h1>
				    <?php $date = new Carbon($values->created_at); ?>
				    <p class="uk-article-meta"> <a href="#">Admin</a> , {{$date->toFormattedDateString()}}.</p>

				    <!-- <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p> -->

				    <p class="uk-text-large">{!!str_limit(strip_tags($values->contenu),300,'...')!!}</p>

				    <div class="uk-grid-small uk-child-width-auto" uk-grid>
				        <div>
				            <a class="uk-button uk-button-text" href="{{url('/news',['slug'=>$values->slug])}}">En savoir plus</a>
				        </div>
				    </div>

				</article>
				@endforeach
				@endif
		<!-- // -->
			</div>
			<div class="uk-width-1-5@m">
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

@section('scripts')
<script type="text/javascript">
	$(function () {

	});
</script>
@endsection
