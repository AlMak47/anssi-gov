@extends('layouts.template')

@section('title')
Nos Partenaires
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Nos Partenaires</span></li>
		</ul>
		<div uk-grid>
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
          <a class="twitter-timeline" data-lang="fr" data-theme="light" href="https://twitter.com/AnssiGuinee?ref_src=twsrc%5Etfw">Tweets by AnssiGuinee</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
			</div>
			<div class="uk-width-3-5@m">
				<div class="uk-heading-divider uk-h3">Nos Partenaires</div>
				<ul class="uk-list uk-list-divider">
					<li>
						<!-- strategique -->
						<div class="uk-child-width-1-2@m" uk-grid>
							@if($partners)
							@foreach($partners as $key=>$value)
							<div>
				        <div class="">
				            <div class="uk-card-media-top">
				                <img src="{{asset('/partners/'.$value->logo)}}" alt="" style="height: 180px">
				            </div>
				            <div class="uk-card-body">
				                <h3 class="uk-card-title">{{$value->organisation}}</h3>
				                <p>{!!$value->description!!}</p>
				            </div>
				        </div>
				    </div>
						@endforeach
						@endif
						</div>
					</li>
					<li>
						<!-- technique -->
						<div class="uk-child-width-1-2@m" uk-grid>
						@if($partnert)
						@foreach($partnert as $key=>$value)
						<div>
							<div class="">
									<div class="uk-card-media-top">
											<img src="{{asset('/partners/'.$value->logo)}}" alt="" style="height: 150px">
									</div>
									<div class="uk-card-body">
											<h3 class="uk-card-title">{{$value->organisation}}</h3>
											<p>{!!$value->description!!}</p>
									</div>
							</div>
					</div>
					@endforeach
					@endif
				</div>
					</li>
				</ul>
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class="" id="right-menu">
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
	              <a href="{{url('voir-aussi/recrutement')}}" class="uk-button-link">Recrutement</a>
	            </li>
	          </ul>
	        </div>
					<div class='uk-border-rounded uk-margin-top panel-right uk-box-shadow-small'>
						<div class='uk-text-bold uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Nous Contacter</div>
						<div class="uk-grid-small uk-padding-small uk-margin-top  uk-child-width-1-4@m" uk-grid>
							<div class="">
								<a href="https://www.facebook.com/anssi.guinee.3" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
							</div>
							<div class="">
								<a href="https://www.twitter.com/AnssiGuinee" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
							</div>
							<div class="">
								<a href="https://www.youtube.com/channel/UCmof-FnBWW2m8LAXrydUsJg/featured" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:red"><span uk-icon="icon:youtube ;"></span></a>
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
