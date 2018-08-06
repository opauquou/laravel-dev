<!-- Tasks: style can be found in dropdown.less -->
<li class="">
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <a href="javascript:void(0);" class="lang" hreflang="fr" data-lang="fr">
            <span style="float: right; padding-left: 5px;">Français</span>
            <img src="{{asset('assets/img/flags/french.png')}}" alt="flag-french" width="22">
        </a>
    @else
        <a href="javascript:void(0);" class="lang" hreflang="en" data-lang="en">
            <span style="float: right; padding-left: 5px;">English</span>
            <img src="{{asset('assets/img/flags/usa.png')}}" alt="flag-english" width="22">
        </a>
    @endif
</li>
