@extends('home::layouts.master')
@section('extra_css')
    <link href="{{ asset('modules/home/sample/css/detail.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/home/sample/css/footer.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('title', $article->title . " | Parafesör | Paranıza Akıl Verir")
@section('seo_description', $article->seo_description)
@section('seo_title', $article->seo_title)
@section('seo_image', asset($article->image_path))
@section('site_url', url()->current())
@section('article_pub_date', \Carbon\Carbon::parse($article->article_date)->tz('Europe/Istanbul')->toAtomString())
@section('article_modified_date', \Carbon\Carbon::parse($article->updated_at)->tz('Europe/Istanbul')->toAtomString())

@section('content')
    @include('home::partials._header')
    <div class="container detail">
        <div class="detail-title col detail-title" style="text-align: center">
            <p>PARAFESÖR / {{strtoupper($article->articleType->title)}}</p>
            <h1>{{$article->title}}</h1>
            <div class="news-card-bottom mt-3">
                <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
            </div>
        </div>
        <div class="container">
            <div class="col mt-4">
                <div class="row summary ">
                <span>
                    {!! $article->summary !!}
                </span>
                </div>
            </div>
        </div>
        <div class="image mt-5 col d-block">
            <img src="{{asset($article->image_path)}}" class="rounded mx-auto d-block img-fluid" alt="...">
        </div>
        <div class="container detail-content">
            <div class="col mt-5">
                <div class="row">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container other-news">
        <div class="col mt-5">
            <div class="row">
                <h4>DİĞER {{strtoupper($article->articleType->title)}} HABERLERİ</h4>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/ab-ile-polonya-arasinda-anlasmazlik-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div
                                    style="background: url(https://cdnuploads.aa.com.tr/uploads/Contents/2022/01/14/thumbs_b_c_b82008d5e0d393839a7a687bee5d85ed.jpg)"
                                    alt="" class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>AB ile Polonya Arasında Anlaşmazlık</p>
                                    <div class="news-card-bottom"><span class="text-danger">14 Ocak • 17:45</span>
                                        <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/ssk-ve-bag-kur-odeme-gunlerine-duzenleme-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e18b4d3df2a.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>SSK ve Bağ-Kur Ödeme Günlerine Düzenleme</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 17:39</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/abdli-bankalar-bilancolarini-acikladilar-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e18337f3e16.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>ABD’li Bankalar Bilançolarını Açıkladılar</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 17:03</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/abdde-perakende-satislari-beklenti-alti-geldi-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e1806ec2f86.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>ABD&#039;de Perakende Satışları Beklenti Altı Geldi</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 16:53</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/ab-ile-polonya-arasinda-anlasmazlik-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div
                                    style="background: url(https://cdnuploads.aa.com.tr/uploads/Contents/2022/01/14/thumbs_b_c_b82008d5e0d393839a7a687bee5d85ed.jpg)"
                                    alt="" class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>AB ile Polonya Arasında Anlaşmazlık</p>
                                    <div class="news-card-bottom"><span class="text-danger">14 Ocak • 17:45</span>
                                        <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/ssk-ve-bag-kur-odeme-gunlerine-duzenleme-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e18b4d3df2a.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>SSK ve Bağ-Kur Ödeme Günlerine Düzenleme</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 17:39</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/abdli-bankalar-bilancolarini-acikladilar-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e18337f3e16.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>ABD’li Bankalar Bilançolarını Açıkladılar</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 17:03</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 col-12 mt-4">
                    <a href="https://parafesor.net/abdde-perakende-satislari-beklenti-alti-geldi-14-01-2022">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container">
                                <div style="background: url(https://parafesor.net/images/61e1806ec2f86.webp)" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>ABD&#039;de Perakende Satışları Beklenti Altı Geldi</p>
                                    <div class="news-card-bottom">
                                        <span class="text-danger">14 Ocak • 16:53</span> <span> • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section id="section-footer">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-24">
                        <a href="#"><img src="{{asset('modules/home/sample/img/parafesor-logo-light.svg')}}" alt="Parafesör Light Logo"></a>
                        <p>Paranıza Akıl Verir<br>Gündemin en önemli haberleri Parafesör’de! Borsa, hisse, şirket,
                            kripto, teknoloji ve yaşam haberleri.</p>
                        <p>İletişim: <a href="mailto:info@parafesor.net">info@parafesor.net</a></p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-24">
                        <h4>PARAFESÖR</h4>
                        <ul>
                            <li><a href="#">Gündem Haberleri</a></li>
                            <li><a href="#">Borsa Tube</a></li>
                            <li><a href="#">Twitter Yazıları</a></li>
                            <li><a href="#">Şirket Haberleri</a></li>
                            <li><a href="#">Borsa Haberleri</a></li>
                            <li><a href="#">Kripto Para Haberleri</a></li>
                            <li><a href="#">Hisse Önerileri</a></li>
                            <li><a href="#">Köşe Yazarları</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-24">
                        <h4>PARAFESÖR STİL</h4>
                        <ul>
                            <li><a href="#">Spor</a></li>
                            <li><a href="#">Teknoloji</a></li>
                            <li><a href="#">Yaşam</a></li>
                            <li><a href="#">Netkolik</a></li>
                            <li><a href="#">Otomobil</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-24">
                        <h4>PİYASALAR</h4>
                        <ul>
                            <li><a href="#">Döviz Piyasaları</a></li>
                            <li><a href="#">Dolar Haberleri</a></li>
                            <li><a href="#">Euro Haberleri</a></li>
                            <li><a href="#">Emtia Haberleri</a></li>
                            <li><a href="#">Bist100 Haberleri</a></li>
                            <li><a href="#">Bist30 Haberleri</a></li>
                            <li><a href="#">Viop Haberleri</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-24">
                        <h4>HİSSE RAPORLARI</h4>
                        <ul>
                            <li><a href="#">Zirvedeki Hisseler</a></li>
                            <li><a href="#">Hisse Raporları</a></li>
                            <li><a href="#">Aracı Kurum Tavsiyeleri</a></li>
                            <li><a href="#">Net Karı En Fazla Artan Şirketler</a></li>
                            <li><a href="#">Karı Sermayelerinden Yüksek Şirketler</a></li>
                            <li><a href="#">Son 5 Yılda Kaybettirmeyen Hisseler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-left col-lg-12 col-sm-24">
                        <span>Parafesör 2022 © Tüm Hakları Saklıdır.</span>
                        <span>Tasarım: <a href="#" target="_blank">emrealkac.com</a></span>
                    </div>
                    <div class="col-right col-lg-12 col-sm-24">
                        <a href="#"><img src="{{asset('modules/home/sample/img/anadolu-ajansi-logo.svg')}}" target="_blank"
                                         alt="Anadolu Ajansı Logo"></a>
                        <a href="#"><img src="{{asset('modules/home/sample/img/foreks-logo.svg')}}" target="_blank" alt="Foreks Logo"></a>
                    </div>
                </div>
            </div>
        </footer>
    </section>











    {{--  <div class="container">
          <div class="col-md-16 offset-md-4">
              <h1 style="display: block; text-align: center">{{$article->title}}</h1>
          </div>
          <div class="image mt-5 mx-auto d-block" style="max-width: 1000px;">
              <img
                  src="{{asset($article->image_path)}}"
                  class="rounded mx-auto d-block img-fluid" alt="...">
          </div>

          <div class="container">
              <div class="col-md-16 offset-md-4 mt-5">
                  <div class="row summary ">
              <span class="font-italic">
                  {!! $article->summary !!}
              </span>
                  </div>
                  <div class="news-card-bottom mt-5">
              <span
                  class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                  </div>
                  <div class="row mt-5">
                      {!! $article->body !!}

                  </div>
              </div>
          </div>
      </div>--}}
@endsection
