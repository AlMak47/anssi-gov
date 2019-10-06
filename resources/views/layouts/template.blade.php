<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/png" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<style type="text/css">
		html , body {
            margin : 0;
            padding : 0;
        }
	</style>
</head>
<body>
	<!-- facebook plugin -->
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v4.0&appId=2005235842908607&autoLogAppEvents=1"></script>
	<!-- // -->
	<!-- NAVBAR -->
<div uk-sticky="animation:uk-animation-slide-top" class="all-nav">

	<!-- responsive menu -->
	<div class="uk-box-shadow-small uk-hidden@l">
		<nav class="uk-navbar uk-navbar-container uk-margin-remove uk-padding-remove" style="background : #fff">
			<div class="uk-navbar-left">
				<a href="#" class="uk-navbar-toggle uk-text-secondary" uk-toggle="target : #responsive-menu"><span uk-icon="icon:menu"></span></a>
				<a href="{{url('/')}}" class="uk-navbar-item uk-logo">
	            <img src="{{asset('image/logo.png')}}" class="uk-margin-remove responsive-logo uk-responsive-height uk-responsive-width" uk-img>
	            <div class="responsive-sigle"><div>ANSSI</div><div class="responsive-sigle-mini">GUINEE</div></div>
	            <div class="responsive-denom">Agence Nationale de la Sécurité des Systèmes d'Information</div>
	        </a>
			</div>
		</nav>

</div>
	<!-- off canvas -->
	<div id="responsive-menu" uk-offcanvas="overlay: true;mode : reveal ">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column" style="background:rgba(0, 16, 10,1) !important;">
			<ul class="uk-nav uk-nav-default uk-text-lighter uk-nav-parent-icon" uk-nav>
				@if(Auth::check())
					<li class="uk-parent">
							<a href="#">{{Auth::user()->name}}</a>

							<ul class="uk-nav-sub">
								<li class="uk-active"><a href="{{url('admin/articles')}}">Articles</a></li>
								<li><a href="{{url('admin/documents')}}">Documents</a></li>
								<li><a href="{{url('admin/anssi-guinee')}}">ANSSI GUINEE</a></li>
								<li><a href="{{url('admin/voir-aussi')}}">VOIR AUSSI</a></li>
								<li><a href="{{url('admin/partners')}}">Partenaires</a></li>
								<li><a href="{{url('admin/settings')}}">parametres</a></li>
								<li>
										<a href=""  onclick="event.preventDefault();
																												 document.getElementById('logout-form').submit();">
																						{{ __('Logout') }} <span uk-icon="icon:sign-out;ratio:.8"> </span>
										 </a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
												</form>

								</li>
							</ul>
					</li>
					@endif
					<li class="uk-parent">
							<a href="#">Anssi Guinee</a>
							<ul class="uk-nav-sub">
								<?php  $presentations = App\Pages::where('tag','presentation')->get(); ?>
										@if($presentations->count() > 0)
												<li class="uk-active"><a href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','edito-du-ministre')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','edito-du-ministre')->first()->titre}}</a></li>
												<li class="uk-active"><a href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','edito-du-dg')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','edito-du-dg')->first()->titre}}</a></li>
												<li class="uk-active"><a href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','missions-et-attributions')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','missions-et-attributions')->first()->titre}}</a></li>
												<li class="uk-active"><a href="{{url('/anssi-guinee',['slug'=>App\Pages::where('slug','cybersecurite-en-guinee')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','cybersecurite-en-guinee')->first()->titre}}</a></li>
										@endif
							</ul>
					</li>
					<!-- <li class=""><a href="{{url('/news')}}">Cadre Legal</a></li> -->
					<li class="uk-parent">
					<a href="#">Cadre Legal</a>
					<ul class="uk-nav-sub">
						<?php  $presentations = App\Pages::where('tag','cadre_legal')->get(); ?>
								@if($presentations->count() > 0)
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['documents-strategiques'])}}"><span uk-icon="icon : minus"></span> {{App\Pages::where('slug','documents-strategiques')->first()->titre}}</a></li>
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['lois'])}}"><span uk-icon="icon : minus"></span> {{App\Pages::where('slug','lois')->first()->titre}}</a></li>
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal',['decrets-et-arretes'])}}"><span uk-icon="icon : minus"></span> {{App\Pages::where('slug','decrets-et-arretes')->first()->titre}}</a></li>
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/cadre-legal','decision')}}"><span uk-icon="icon : minus"></span> {{App\Pages::where('slug','decision')->first()->titre}}</a></li>
								@endif
					</ul>
				</li>
					<li class="uk-parent">
					<a href="#">Outils</a>
					<ul class="uk-nav-sub">
						<li class="uk-active"><a href="{{url('/outils',['simples-utilisateurs'])}}"><span uk-icon="icon:minus"></span> Outils Simple Utilisateur</a></li>
						<li class="uk-active"><a href="{{url('/outils',['professionnels'])}}"><span uk-icon="icon:minus"></span> Outils Professionnel</a></li>
					</ul>
				</li>
				<li class=""><a href="{{url('/partenariats')}}">Partenariats</a></li>
				<!-- <li class=""><a href="{{url('/formation')}}">Formation</a></li> -->
				<li class="uk-parent">
					<a href="#">Documents et Formations</a>
					<ul class="uk-nav-sub">
						<?php  $presentations = App\Pages::where('tag','doc_form')->get(); ?>
								@if($presentations->count() > 0)
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/documents-et-formations',['slug'=>App\Pages::where('slug','documentation')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','documentation')->first()->titre}}</a></li>
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/documents-et-formations',['slug'=>App\Pages::where('slug','chartes')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','chartes')->first()->titre}}</a></li>
										<li class="uk-active"><a class="uk-button-link" style="text-decoration : none !important ;" href="{{url('/documents-et-formations',['slug'=>App\Pages::where('slug','model-cc')->first()->slug])}}"><span uk-icon="icon:minus"></span> {{App\Pages::where('slug','model-cc')->first()->titre}}</a></li>
								@endif
					</ul>
				</li>
				<li class=""><a href="{{url('/contact-us')}}">Contact</a></li>
			</ul>
			<hr class="uk-divider-small">
			<ul class="uk-navbar-nav">
				<li class="uk-margin-small-left"><a href="https://www.facebook.com/ANSSI-Guin%C3%A9e-123887145678620/" class="uk-button uk-border-rounded" style="color:#fff;background : darkblue"><span uk-icon="icon:facebook"></span></a></li>
				<li class="uk-margin-small-left"><a href="https://twitter.com/AnssiGuinee" class="uk-button uk-border-rounded" style="color:#fff;background :skyblue "><span  uk-icon="icon:twitter"></span></a></li>
				<li class="uk-margin-small-left"><a href="https://www.youtube.com/channel/UCmof-FnBWW2m8LAXrydUsJg/featured" class="uk-button uk-border-rounded" style="color:#fff;background : red"><span  uk-icon="icon:youtube"></span></a></li>
				<li class="uk-margin-small-left"><a href="" class="uk-button uk-border-rounded" style="color:#fff;background : grey"><span  uk-icon="icon:linkedin"></span></a></li>
			</ul>
			<hr class="uk-divider-small">
			<p>&copy; ANSSI GUINEE {{date('Y')}}</p>
    </div>
</div>
	<!-- // -->
	<!-- // -->
<nav class="uk-navbar-container uk-navbar uk-visible@l" style="background : #fff" uk-navbar>
    <div class="uk-navbar-left uk-margin-small-left" style="padding : 20px;" id="logo-box">
	    <a href="{{url('/')}}" class="uk-navbar-item uk-logo">
            <img src="{{asset('image/logo.png')}}" class="uk-margin-remove logo" uk-img>
            <div class="sigle"><div>ANSSI</div><div class="sigle-mini">GUINEE</div></div>
            <div class="denom">Agence Nationale de la Sécurité des Systèmes d'Information</div>
        </a>
    </div>
    <div class="menu-connex">
    	<ul class="">
    		<li><a href="https://www.facebook.com/ANSSI-Guin%C3%A9e-123887145678620/" target="_blank" class="uk-button-primary uk-border-rounded"><span uk-icon="icon:facebook"></span></a></li>
    		<li><a href="https://twitter.com/AnssiGuinee" target="_blank" class="uk-button-primary uk-border-rounded" style="background:skyblue"><span  uk-icon="icon:twitter"></span></a></li>
    		<li><a href="https://www.youtube.com/channel/UCmof-FnBWW2m8LAXrydUsJg/featured" target="_blank" class="uk-button-primary uk-border-rounded" style="background: red"><span  uk-icon="icon:youtube"></span></a></li>
				<li class="uk-margin-small-left"><a href="https://www.linkedin.com/company/anssiguinee/" class="uk-button-default uk-border-rounded" target="_blank" style="color:#fff;background : #0073b1"><span  uk-icon="icon:linkedin"></span></a></li>
<?php $voir = App\Pages::where('tag','voir_aussi')->orderBy('created_at','asc')->get(); ?>
	@if($voir)
    @foreach($voir as $key => $value)
            <li><a href="{{url('/voir-aussi',['slug'=>$value->slug])}}" class="uk-button-link uk-button">{{$value->titre}}</a></li>
    @endforeach
		<!-- <li><a href="{{url('/recrutement')}}" class="uk-button-link uk-text-lighter">Recrutement</a> </li> -->
    @endif
    	</ul>
    </div>
</nav>
<nav class="uk-navbar-container uk-padding-small uk-light uk-visible@l" style="background:rgb(0, 116, 180);" uk-navbar>
	<div class="uk-navbar-left">
     <span class="uk-text-bold uk-text-normal uk-button" style="color :#fff;">
			  <span uk-icon="icon:receiver;ratio:1.5" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">+224 627 537 012</span>
			</span>
    </div>
    <div class="uk-navbar-center" style="width : 60%">

        <ul class="uk-navbar-nav">
            @if(Auth::check())
            <li>
                <a href="#">{{Auth::user()->name}} <span uk-icon="icon:triangle-down;ratio:.8"></span></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="{{url('admin/articles')}}">Articles</a></li>
                        <li><a href="{{url('admin/documents')}}">Documents</a></li>
                        <li><a href="{{url('admin/anssi-guinee')}}">ANSSI GUINEE</a></li>
                        <li><a href="{{url('admin/voir-aussi')}}">VOIR AUSSI</a></li>
                        <li><a href="{{url('admin/partners')}}">Partenaires</a></li>
                        <li><a href="{{url('admin/settings')}}">parametres</a></li>
                        <li>
                            <a href=""  onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }} <span uk-icon="icon:sign-out;ratio:.8"> </span>
                             </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>

                        </li>
                    </ul>
                </div>
            </li>
            @endif

						<li class="uk-active"><a href="{{url('anssi-guinee',['slug'=>App\Pages::where('slug','missions-et-attributions')->first()->slug])}}">Anssi Guinee</a></li>

                <!-- MENU PRESENTATIONS -->
                <?php  $presentations = App\Pages::where('tag','presentation')->get(); ?>
						<li class="uk-active"><a href="{{url('/cadre-legal',['documents-strategiques'])}}">Cadre Legal</a></li>
						<li class="uk-active"><a href="{{url('/outils',['simples-utilisateurs'])}}">Outils</a></li>
            <li class="uk-active"><a href="{{url('/partenariats')}}">Partenariats</a></li>
            <li class="uk-active"><a href="{{url('/documents-et-formations',['documentation'])}}">Documents et Formations</a></li>
            <li class="uk-active"><a href="{{url('/contact-us/')}}">Contact</a></li>

        </ul>

    </div>
</nav>
</div>
<!-- responsive bottom menu-->
<nav class="uk-navbar uk-navbar-container uk-margin-remove uk-padding-remove uk-position-bottom uk-position-fixed uk-position-z-index uk-hidden@m" style="background : rgba(255,255,255,0.9)">
	<div class="uk-navbar-center">
			<?php $voir = App\Pages::where('tag','voir_aussi')->orderBy('created_at','asc')->get(); ?>
			<!-- <div class="uk-child-width-1-3" uk-grid> -->
			<div class="uk-button-group">
				@foreach($voir as $key => $value)
								<button class="uk-button uk-button-default uk-button-small" style="border : none;"><a class="" style="color : #000;" href="{{url('/voir-aussi',['slug'=>$value->slug])}}"><span uk-icon="icon:link"></span>{{$value->titre}}</a></button>
				@endforeach
		</div>
				<!-- </div> -->
	</div>
</nav>
<!-- // -->
<!-- SEARCH MODAL -->

<!-- /// -->
	<!-- // -->
<!-- CONTENT -->
@yield('content');
<!-- // -->
<!-- FOOTER -->
<!-- get footer contents -->
@php
$administration = App\Pages::where('tag','administration')->orderBy('created_at','desc')->get();
@endphp
<div class="uk-section uk-section-secondary uk-padding-small uk-margin-top-large" style="background: rgb(0, 116, 180);">
	<div class="uk-container">
		<!-- responsive footer -->
		@if($administration)
		<ul class="uk-hidden@l" uk-accordion="multiple: true">
	    <li class="uk-open">
	        <a class="uk-accordion-title" href="#">ADMINISTRATION</a>
	        <div class="uk-accordion-content">
	            <ul class="uk-list">
								@foreach($administration as $key=>$value)
								<li><a href="{{url('vous-etes/administration',[$value->slug])}}">{{$value->titre}}</a></li>
								@endforeach
	            </ul>
	        </div>
	    </li>
	    <li class="">
	        <a class="uk-accordion-title" href="#">ENTREPRISES</a>
	        <div class="uk-accordion-content">
	            <ul class="uk-list">
								@foreach($administration as $key=>$value)
								<li><a href="{{url('vous-etes/entreprise',[$value->slug])}}">{{$value->titre}}</a></li>
								@endforeach
	            </ul>
	        </div>
	    </li>
	    <li class="">
	        <a class="uk-accordion-title" href="#">PARTICULIERS</a>
	        <div class="uk-accordion-content">
	            <ul class="uk-list">
								@foreach($administration as $key=>$value)
								<li><a href="{{url('vous-etes/particulier',[$value->slug])}}">{{$value->titre}}</a></li>
								@endforeach
	            </ul>
	        </div>
	    </li>
	    <li class="">
	        <a class="uk-accordion-title" href="#">PARTENAIRES</a>
	        <div class="uk-accordion-content">
						@php
						$partners =App\Partners::all();
						@endphp
						<ul class="uk-list">
							@foreach($partners as $key=>$value)
							<li><a>{{$value->organisation}}</a></li>
							@endforeach
						</ul>
	        </div>
	    </li>
		</ul>
		@endif
		<!-- // -->
		@if($administration)
		<div class="uk-grid-collapse uk-child-width-1-4@m uk-visible@l" uk-grid>
			<div>
				<h3>ADMINISTRATION</h3>
				<ul class="uk-list">
					@foreach($administration as $key=>$value)
					<li><a href="{{url('/vous-etes/administration',['precautions-elementaires'])}}">{{$value->titre}}</a></li>
					@endforeach
				</ul>
			</div>
			<div>
				<h3>ENTREPRISES</h3>
				<ul class="uk-list">
					@foreach($administration as $key=>$value)
					<li><a href="{{url('/vous-etes/entreprise',['precautions-elementaires'])}}">{{$value->titre}}</a></li>
					@endforeach
				</ul>
			</div>
			<div>
				<h3>PARTICULIERS</h3>
				<ul class="uk-list">
					@foreach($administration as $key=>$value)
					<li><a href="{{url('/vous-etes/particulier',['precautions-elementaires'])}}">{{$value->titre}}</a></li>
					@endforeach
				</ul>
			</div>
			<div>
				<h3>PARTENAIRES</h3>
				@php
				$partners =App\Partners::all();
				@endphp
				<ul class="uk-list">
					@foreach($partners as $key=>$value)
					<li><a>{{$value->organisation}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- messenger -->

<!-- // -->
<a href="#" style="display:none;" class="uk-button-secondary uk-border-rounded uk-padding-small to-top" uk-totop uk-scroll></a>
<div class="uk-text-center copy uk-padding-remove uk-visible@l">&copy; ANSSI GUINEE {{date('Y')}} | Developp&eacute; par <a href="https://www.smartechguinee.com" target="_blank">Smartech</a></div>
<div class="uk-text-center copy uk-margin-xlarge-bottom uk-padding-remove uk-hidden@l">&copy; ANSSI GUINEE {{date('Y')}}</div>

<!-- // -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- UIkit JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js" integrity="sha256-BuxrUdr/4YoztQLxT6xmdO6hSQw2d6BtBUY1pteGds4=" crossorigin="anonymous"></script>
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>

<script type="text/javascript">
    $(function () {
        anime({
            targets : '.phone-icone',
            rotateY :360,
            translateY : 5,
            loop : true ,
            delay : 500,
            duration : 2000,
            direction: 'alternate',
            easing : 'easeInOutSine',
        });


        anime({
            targets : '.phone-number',
            translateY : 1,
            loop : true,
            duration : 1000,
            easing : 'easeInOutSine'
        });

        $(window).scroll(function (){
            if($(this).scrollTop() >= 40) {
								$(".all-nav").addClass("uk-box-shadow-large");
                $(".logo").animate({
                    'width':'40px'
                },0,800);

                $(".denom").animate({
                    'width' : '260px',
                    'font-size' : '1.rem'
                },0),800;

                $(".sigle").animate({
                    'font-size':'1.6rem',
                    'width' : '80px'
                },0,800);

                $('.sigle-mini').animate({
                    'font-size' : '0.5rem',
                    'letter-spacing': '8px'
                },0,800);

                $("#logo-box").animate({
                    'padding' : '0px'
                },{duration : 100,queue :false});

            } else {
								$(".all-nav").removeClass('uk-box-shadow-large');
                $(".logo").animate({
                    'width':'80px'
                },0,800);

                 $(".denom").animate({
                    'width' : '230px',
                    'font-size' : '1rem'
                },0,800);

                $(".sigle").animate({
                    'font-size':'2.5rem',
                    'width' : '120px'
                },0,800);

                $('.sigle-mini').animate({
                    'font-size' : '1rem',
                    'letter-spacing': '10px'
                },0,800);

                $("#logo-box").animate({
                    'padding' : '20px'
                },{duration : 100,queue :true},'linear');
            }
        });

				$(window).scroll(function () {
					if($(this).scrollTop() > 200) {
						$("#right-menu").addClass('right-menu test');
						$("#left-menu").addClass('right-menu test');
						$(".to-top").show(300);
					} else {
						$("#right-menu").removeClass('right-menu test');
						$("#left-menu").removeClass('right-menu test');
						$(".to-top").hide(300);
					}
				});
    });
</script>
	@yield('scripts')
</body>
</html>
