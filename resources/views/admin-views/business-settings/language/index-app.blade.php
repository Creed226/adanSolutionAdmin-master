@extends('layouts.back-end.app')

@section('title','Language')

@push('css_or_js')
    <link href="{{ asset('public/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/back-end/css/custom.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">{{trans('messages.Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{trans('messages.language_setting')}} for App</li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="alert alert-warning sticky-top" id="alert_box" style="display:none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Warning!</strong> Follow the documentation to setup from app end, <a
                        href="https://documentation.6amtech.com/sixvalley-ecommerce/docs/1.0/app-setup#section3" target="_blank">click
                        here</a>.
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Select Languages for {{trans('messages.product')}} {{trans('messages.and')}} {{trans('messages.category')}}</h4>
                        <label class="badge badge-danger">* For mobile app only</label>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.business-settings.web-config.update-language')}}" method="post">
                            @csrf
                            @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                            @php($language = json_decode($language->value,true) ?? [])

                            <div class="form-group">
                                <select name="language[]" id="language" onchange="$('#alert_box').show();"
                                        data-maximum-selection-length="3" class="form-control js-select2-custom"
                                        required multiple=true>
                                    <option value="en" {{in_array('en',$language)?'selected':''}}>English(default)</option>
                                    <option value="af" {{in_array('af',$language)?'selected':''}}>Afrikaans</option>
                                    <option value="sq" {{in_array('sq',$language)?'selected':''}}>Albanian - shqip</option>
                                    <option value="am" {{in_array('am',$language)?'selected':''}}>Amharic - ????????????</option>
                                    <option value="ar" {{in_array('ar',$language)?'selected':''}}>Arabic - ??????????????</option>
                                    <option value="an" {{in_array('an',$language)?'selected':''}}>Aragonese - aragon??s</option>
                                    <option value="hy" {{in_array('hy',$language)?'selected':''}}>Armenian - ??????????????</option>
                                    <option value="ast" {{in_array('ast',$language)?'selected':''}}>Asturian - asturianu</option>
                                    <option value="az" {{in_array('az',$language)?'selected':''}}>Azerbaijani - az??rbaycan dili</option>
                                    <option value="eu" {{in_array('eu',$language)?'selected':''}}>Basque - euskara</option>
                                    <option value="be" {{in_array('be',$language)?'selected':''}}>Belarusian - ????????????????????</option>
                                    <option value="bn" {{in_array('bn',$language)?'selected':''}}>Bengali - ???????????????</option>
                                    <option value="bs" {{in_array('bs',$language)?'selected':''}}>Bosnian - bosanski</option>
                                    <option value="br" {{in_array('br',$language)?'selected':''}}>Breton - brezhoneg</option>
                                    <option value="bg" {{in_array('bg',$language)?'selected':''}}>Bulgarian - ??????????????????</option>
                                    <option value="ca" {{in_array('ca',$language)?'selected':''}}>Catalan - catal??</option>
                                    <option value="ckb" {{in_array('ckb',$language)?'selected':''}}>Central Kurdish - ?????????? (???????????????? ????????????)</option>
                                    <option value="zh" {{in_array('zh',$language)?'selected':''}}>Chinese - ??????</option>
                                    <option value="zh-HK" {{in_array('zh-HK',$language)?'selected':''}}>Chinese (Hong Kong) - ??????????????????</option>
                                    <option value="zh-CN" {{in_array('zh-CN',$language)?'selected':''}}>Chinese (Simplified) - ??????????????????</option>
                                    <option value="zh-TW" {{in_array('zh-TW',$language)?'selected':''}}>Chinese (Traditional) - ??????????????????</option>
                                    <option value="co" {{in_array('co',$language)?'selected':''}}>Corsican</option>
                                    <option value="hr" {{in_array('hr',$language)?'selected':''}}>Croatian - hrvatski</option>
                                    <option value="cs" {{in_array('cs',$language)?'selected':''}}>Czech - ??e??tina</option>
                                    <option value="da" {{in_array('da',$language)?'selected':''}}>Danish - dansk</option>
                                    <option value="nl" {{in_array('nl',$language)?'selected':''}}>Dutch - Nederlands</option>
                                    <option value="en-AU" {{in_array('en-AU',$language)?'selected':''}}>English (Australia)</option>
                                    <option value="en-CA" {{in_array('en-CA',$language)?'selected':''}}>English (Canada)</option>
                                    <option value="en-IN" {{in_array('en-IN',$language)?'selected':''}}>English (India)</option>
                                    <option value="en-NZ" {{in_array('en-NZ',$language)?'selected':''}}>English (New Zealand)</option>
                                    <option value="en-ZA" {{in_array('en-ZA',$language)?'selected':''}}>English (South Africa)</option>
                                    <option value="en-GB" {{in_array('en-GB',$language)?'selected':''}}>English (United Kingdom)</option>
                                    <option value="en-US" {{in_array('en-US',$language)?'selected':''}}>English (United States)</option>
                                    <option value="eo" {{in_array('eo',$language)?'selected':''}}>Esperanto - esperanto</option>
                                    <option value="et" {{in_array('et',$language)?'selected':''}}>Estonian - eesti</option>
                                    <option value="fo" {{in_array('fo',$language)?'selected':''}}>Faroese - f??royskt</option>
                                    <option value="fil" {{in_array('fil',$language)?'selected':''}}>Filipino</option>
                                    <option value="fi" {{in_array('fi',$language)?'selected':''}}>Finnish - suomi</option>
                                    <option value="fr" {{in_array('fr',$language)?'selected':''}}>French - fran??ais</option>
                                    <option value="fr-CA" {{in_array('fr-CA',$language)?'selected':''}}>French (Canada) - fran??ais (Canada)</option>
                                    <option value="fr-FR" {{in_array('fr-FR',$language)?'selected':''}}>French (France) - fran??ais (France)</option>
                                    <option value="fr-CH" {{in_array('fr-CH',$language)?'selected':''}}>French (Switzerland) - fran??ais (Suisse)</option>
                                    <option value="gl" {{in_array('gl',$language)?'selected':''}}>Galician - galego</option>
                                    <option value="ka" {{in_array('ka',$language)?'selected':''}}>Georgian - ?????????????????????</option>
                                    <option value="de" {{in_array('de',$language)?'selected':''}}>German - Deutsch</option>
                                    <option value="de-AT" {{in_array('de-AT',$language)?'selected':''}}>German (Austria) - Deutsch (??sterreich)</option>
                                    <option value="de-DE" {{in_array('de-DE',$language)?'selected':''}}>German (Germany) - Deutsch (Deutschland)</option>
                                    <option value="de-LI" {{in_array('de-LI',$language)?'selected':''}}>German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                    <option value="de-CH" {{in_array('de-CH',$language)?'selected':''}}>German (Switzerland) - Deutsch (Schweiz)</option>
                                    <option value="el" {{in_array('el',$language)?'selected':''}}>Greek - ????????????????</option>
                                    <option value="gn" {{in_array('gn',$language)?'selected':''}}>Guarani</option>
                                    <option value="gu" {{in_array('gu',$language)?'selected':''}}>Gujarati - ?????????????????????</option>
                                    <option value="ha" {{in_array('ha',$language)?'selected':''}}>Hausa</option>
                                    <option value="haw" {{in_array('haw',$language)?'selected':''}}>Hawaiian - ????lelo Hawai??i</option>
                                    <option value="he" {{in_array('he',$language)?'selected':''}}>Hebrew - ??????????</option>
                                    <option value="hi" {{in_array('hi',$language)?'selected':''}}>Hindi - ??????????????????</option>
                                    <option value="hu" {{in_array('hu',$language)?'selected':''}}>Hungarian - magyar</option>
                                    <option value="is" {{in_array('is',$language)?'selected':''}}>Icelandic - ??slenska</option>
                                    <option value="id" {{in_array('id',$language)?'selected':''}}>Indonesian - Indonesia</option>
                                    <option value="ia" {{in_array('ia',$language)?'selected':''}}>Interlingua</option>
                                    <option value="ga" {{in_array('ga',$language)?'selected':''}}>Irish - Gaeilge</option>
                                    <option value="it" {{in_array('it',$language)?'selected':''}}>Italian - italiano</option>
                                    <option value="it-IT" {{in_array('it-IT',$language)?'selected':''}}>Italian (Italy) - italiano (Italia)</option>
                                    <option value="it-CH" {{in_array('it-CH',$language)?'selected':''}}>Italian (Switzerland) - italiano (Svizzera)</option>
                                    <option value="ja" {{in_array('ja',$language)?'selected':''}}>Japanese - ?????????</option>
                                    <option value="kn" {{in_array('kn',$language)?'selected':''}}>Kannada - ???????????????</option>
                                    <option value="kk" {{in_array('kk',$language)?'selected':''}}>Kazakh - ?????????? ????????</option>
                                    <option value="km" {{in_array('km',$language)?'selected':''}}>Khmer - ???????????????</option>
                                    <option value="ko" {{in_array('ko',$language)?'selected':''}}>Korean - ?????????</option>
                                    <option value="ku" {{in_array('ku',$language)?'selected':''}}>Kurdish - Kurd??</option>
                                    <option value="ky" {{in_array('ky',$language)?'selected':''}}>Kyrgyz - ????????????????</option>
                                    <option value="lo" {{in_array('lo',$language)?'selected':''}}>Lao - ?????????</option>
                                    <option value="la" {{in_array('la',$language)?'selected':''}}>Latin</option>
                                    <option value="lv" {{in_array('lv',$language)?'selected':''}}>Latvian - latvie??u</option>
                                    <option value="ln" {{in_array('ln',$language)?'selected':''}}>Lingala - ling??la</option>
                                    <option value="lt" {{in_array('lt',$language)?'selected':''}}>Lithuanian - lietuvi??</option>
                                    <option value="mk" {{in_array('mk',$language)?'selected':''}}>Macedonian - ????????????????????</option>
                                    <option value="ms" {{in_array('ms',$language)?'selected':''}}>Malay - Bahasa Melayu</option>
                                    <option value="ml" {{in_array('ml',$language)?'selected':''}}>Malayalam - ??????????????????</option>
                                    <option value="mt" {{in_array('mt',$language)?'selected':''}}>Maltese - Malti</option>
                                    <option value="mr" {{in_array('mr',$language)?'selected':''}}>Marathi - ???????????????</option>
                                    <option value="mn" {{in_array('mn',$language)?'selected':''}}>Mongolian - ????????????</option>
                                    <option value="ne" {{in_array('ne',$language)?'selected':''}}>Nepali - ??????????????????</option>
                                    <option value="no" {{in_array('no',$language)?'selected':''}}>Norwegian - norsk</option>
                                    <option value="nb" {{in_array('nb',$language)?'selected':''}}>Norwegian Bokm??l - norsk bokm??l</option>
                                    <option value="nn" {{in_array('nn',$language)?'selected':''}}>Norwegian Nynorsk - nynorsk</option>
                                    <option value="oc" {{in_array('oc',$language)?'selected':''}}>Occitan</option>
                                    <option value="or" {{in_array('or',$language)?'selected':''}}>Oriya - ???????????????</option>
                                    <option value="om" {{in_array('om',$language)?'selected':''}}>Oromo - Oromoo</option>
                                    <option value="ps" {{in_array('ps',$language)?'selected':''}}>Pashto - ????????</option>
                                    <option value="fa" {{in_array('fa',$language)?'selected':''}}>Persian - ??????????</option>
                                    <option value="pl" {{in_array('pl',$language)?'selected':''}}>Polish - polski</option>
                                    <option value="pt" {{in_array('pt',$language)?'selected':''}}>Portuguese - portugu??s</option>
                                    <option value="pt-BR" {{in_array('pt-BR',$language)?'selected':''}}>Portuguese (Brazil) - portugu??s (Brasil)</option>
                                    <option value="pt-PT" {{in_array('pt-PT',$language)?'selected':''}}>Portuguese (Portugal) - portugu??s (Portugal)</option>
                                    <option value="pa" {{in_array('pa',$language)?'selected':''}}>Punjabi - ??????????????????</option>
                                    <option value="qu" {{in_array('qu',$language)?'selected':''}}>Quechua</option>
                                    <option value="ro" {{in_array('ro',$language)?'selected':''}}>Romanian - rom??n??</option>
                                    <option value="mo" {{in_array('mo',$language)?'selected':''}}>Romanian (Moldova) - rom??n?? (Moldova)</option>
                                    <option value="rm" {{in_array('rm',$language)?'selected':''}}>Romansh - rumantsch</option>
                                    <option value="ru" {{in_array('ru',$language)?'selected':''}}>Russian - ??????????????</option>
                                    <option value="gd" {{in_array('gd',$language)?'selected':''}}>Scottish Gaelic</option>
                                    <option value="sr" {{in_array('sr',$language)?'selected':''}}>Serbian - ????????????</option>
                                    <option value="sh" {{in_array('sh',$language)?'selected':''}}>Serbo-Croatian - Srpskohrvatski</option>
                                    <option value="sn" {{in_array('sn',$language)?'selected':''}}>Shona - chiShona</option>
                                    <option value="sd" {{in_array('sd',$language)?'selected':''}}>Sindhi</option>
                                    <option value="si" {{in_array('si',$language)?'selected':''}}>Sinhala - ???????????????</option>
                                    <option value="sk" {{in_array('sk',$language)?'selected':''}}>Slovak - sloven??ina</option>
                                    <option value="sl" {{in_array('sl',$language)?'selected':''}}>Slovenian - sloven????ina</option>
                                    <option value="so" {{in_array('so',$language)?'selected':''}}>Somali - Soomaali</option>
                                    <option value="st" {{in_array('st',$language)?'selected':''}}>Southern Sotho</option>
                                    <option value="es"{{in_array('es',$language)?'selected':''}}>Spanish - espa??ol</option>
                                    <option value="es-AR" {{in_array('en-AR',$language)?'selected':''}}>Spanish (Argentina) - espa??ol (Argentina)</option>
                                    <option value="es-419" {{in_array('en-419',$language)?'selected':''}}>Spanish (Latin America) - espa??ol (Latinoam??rica)</option>
                                    <option value="es-MX" {{in_array('en-MX',$language)?'selected':''}}>Spanish (Mexico) - espa??ol (M??xico)</option>
                                    <option value="es-ES" {{in_array('en-ES',$language)?'selected':''}}>Spanish (Spain) - espa??ol (Espa??a)</option>
                                    <option value="es-US" {{in_array('en-US',$language)?'selected':''}}>Spanish (United States) - espa??ol (Estados Unidos)</option>
                                    <option value="su" {{in_array('su',$language)?'selected':''}}>Sundanese</option>
                                    <option value="sw" {{in_array('sw',$language)?'selected':''}}>Swahili - Kiswahili</option>
                                    <option value="sv" {{in_array('sv',$language)?'selected':''}}>Swedish - svenska</option>
                                    <option value="tg" {{in_array('tg',$language)?'selected':''}}>Tajik - ????????????</option>
                                    <option value="ta" {{in_array('ta',$language)?'selected':''}}>Tamil - ???????????????</option>
                                    <option value="tt" {{in_array('tt',$language)?'selected':''}}>Tatar</option>
                                    <option value="te" {{in_array('te',$language)?'selected':''}}>Telugu - ??????????????????</option>
                                    <option value="th" {{in_array('th',$language)?'selected':''}}>Thai - ?????????</option>
                                    <option value="ti" {{in_array('ti',$language)?'selected':''}}>Tigrinya - ????????????</option>
                                    <option value="to" {{in_array('to',$language)?'selected':''}}>Tongan - lea fakatonga</option>
                                    <option value="tr" {{in_array('tr',$language)?'selected':''}}>Turkish - T??rk??e</option>
                                    <option value="tk" {{in_array('tk',$language)?'selected':''}}>Turkmen</option>
                                    <option value="tw" {{in_array('tw',$language)?'selected':''}}>Twi</option>
                                    <option value="uk" {{in_array('uk',$language)?'selected':''}}>Ukrainian - ????????????????????</option>
                                    <option value="ur" {{in_array('ur',$language)?'selected':''}}>Urdu - ????????</option>
                                    <option value="ug" {{in_array('ug',$language)?'selected':''}}>Uyghur</option>
                                    <option value="uz" {{in_array('uz',$language)?'selected':''}}>Uzbek - o???zbek</option>
                                    <option value="vi" {{in_array('vi',$language)?'selected':''}}>Vietnamese - Ti???ng Vi???t</option>
                                    <option value="wa" {{in_array('wa',$language)?'selected':''}}>Walloon - wa</option>
                                    <option value="cy" {{in_array('cy',$language)?'selected':''}}>Welsh - Cymraeg</option>
                                    <option value="fy" {{in_array('fy',$language)?'selected':''}}>Western Frisian</option>
                                    <option value="xh" {{in_array('xh',$language)?'selected':''}}>Xhosa</option>
                                    <option value="yi" {{in_array('yi',$language)?'selected':''}}>Yiddish</option>
                                    <option value="yo" {{in_array('yo',$language)?'selected':''}}>Yoruba - ??d?? Yor??b??</option>
                                    <option value="zu" {{in_array('zu',$language)?'selected':''}}>Zulu - isiZulu</option>
                                </select>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right ml-3">{{trans('messages.Save')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
