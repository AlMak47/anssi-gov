@extends('layouts.template')
<?php use Carbon\Carbon; ?>

@section('title')
Agence Nationale de la Securite des Systemes d'Information
@endsection
@section('content')
<!-- BANNIERE -->
<div class="uk-child-width-1-2@m" uk-grid>
<div class="uk-background-default" style="padding-top : 1rem">
  <!-- first column -->
  <div class="uk-heading uk-text-center uk-h4" style="background : url(asset('image/guinee.jpg'))">
    VOUS ETES UN(E)
  </div>
  <hr class="uk-divider-small uk-margin-small uk-text-center">
  <div class="uk-padding uk-margin-right uk-child-width-1-3@m" uk-grid>
    <!--  -->
    <div class="">
      <!-- administration -->
      <a href="{{url('/vous-etes/administration',['precautions-elementaires'])}}" class="uk-button-default">
        <div class="uk-padding uk-border-circle uk-overlay uk-overlay-primary uk-margin-left" style="width : 4.4rem !important;background : #900">
          <img src="{{asset('svg-icons/city-hall.svg')}}" style="color : #fff;" width="100%" class="img-svg"  uk-svg="stroke-animation : true">
        </div>
        <div class="uk-text-lead uk-text-center">
          Administration
          <hr class="uk-divider-small">
        </div>
      </a>
    </div>
    <div class="">
      <!-- entreprise -->

      <a href="{{url('vous-etes/entreprise',['precautions-elementaires'])}}" class="uk-button-default">
        <div class="uk-padding uk-border-circle uk-overlay uk-overlay-primary uk-margin-left" style="width : 4.4rem !important;background : #959000">
          <img src="{{asset('svg-icons/skycraper.svg')}}" style="color: #fff"  width="100%" uk-svg>
        </div>
        <div class="uk-text-lead uk-text-center">
          Entreprise
          <hr class="uk-divider-small">
        </div>
      </a>

    </div>
    <div class="">
    <!-- particulier -->
    <a href="{{url('vous-etes/particulier',['precautions-elementaires'])}}" class="uk-button-default">
      <div class="uk-padding uk-border-circle uk-overlay uk-overlay-primary uk-margin-left" style="width : 4.4rem !important;background : #009900">
        <img src="{{asset('svg-icons/home.svg')}}" style="color: #fff"  width="100%" uk-svg>
      </div>
      <div class="uk-text-lead uk-text-center">
        Particulier
        <hr class="uk-divider-small">
      </div>
    </a>
    </div>
  </div>
</div>
<div class="uk-padding-remove">
  <!-- banniere -->
  <div class="uk-visible@l" uk-slideshow="autoplay:true;autoplay-interval : 5000; max-height: 400">
      <ul class="uk-slideshow-items" >
      	@if($banniere)
      	@foreach($banniere as $key => $value)
          <li>
              <img src="{{asset('article/'.$value->image)}}" alt="" uk-cover>
            <a href="{{url('/news',['slug'=>$value->slug])}}">
              <div class="uk-overlay uk-overlay-default uk-position-bottom-right uk-position-small uk-transition-slide-bottom">
                  <h3 class="uk-margin-remove uk-width-xlarge">{{$value->titre}}</h3>
              </div>
            </a>
          </li>
          @endforeach
          @endif
      </ul>
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
  </div>
</div>
</div>
<!-- // -->
<!-- responsive sliders -->

<!-- // -->
<div class="uk-section-default uk-margin-small-bottom">
	<div class="uk-container uk-container-large">
    <!-- responsive content -->
    <div class="uk-hidden@l">
      <h3 class="uk-heading-divider"><a href="#">ACTUALITES</a></h3>
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
        <div class="" id="left-menu">
          <!-- facebook plugin                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->
        </div>
			</div>
		<!-- BULLETIN D'ACTUALITES -->
			<div class="uk-width-3-5@m">
				<h3 class="uk-heading-divider"><a class="uk-button-text" href="{{url('/news')}}" style="text-decoration : none;">Actualites</a></h3>
				@if($articles)
				@foreach($articles as $key => $values)
				<article class="uk-article">

				    <h1 class="uk-article-title"><a class="uk-link-reset" href="{{url('/news',['slug'=>$values->slug])}}">{{str_limit($values->titre,100,'...')}}</a></h1>
				    <?php $date = new Carbon($values->created_at); ?>
				    <p class="uk-article-meta"> <a href="#">Admin</a> , {{$date->toFormattedDateString()}}.</p>

				    <!-- <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p> -->

				    <p class="uk-text-lighter">{!!str_limit(strip_tags($values->contenu),300,'...')!!}</p>

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
				<div class="" id="right-menu">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">+224 627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="https://support.anssi.gov.gn" class="uk-button-link">Cellule d'alerte</a>
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

@section('scripts')
<script type="text/javascript">
	$(function () {

	});
</script>
@endsection
