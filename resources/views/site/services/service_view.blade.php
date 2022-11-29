<x-site-master-layout>

    @push('stylesheet')
    <style>
        .nav ul.menu>li.current-menu-colorh>a {
            color: #ff6200 !important;
        }
    </style>
    @endpush

       <!--Page Header-->
       <div class="page-header title-area">
        <div class="header-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 class="page-title">Worldwide Transport</h1> </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                        <nav class="breadcrumb">
                            <a class="home" href="#"><span>Home</span></a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span>Worldwide Transport</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header end-->

    <!--services Welcome sec -->
    <div class="service_dtl1 secpadd">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget services-menu-widget">
                        <h4 class="widget-title">Our Services</h4>
                        <ul class="menu service-menu">
                @foreach ( $serviceType as $serve )
                            @if($serve != $service)
                                 <li><a  href="{{ route('siteJoin.singleService.service',$serve->slug) }}">{{ $serve->title }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget_text widget widget_custom_html">
                        <h4 class="widget-title">Contact Us</h4>
                        <div class="textwidget custom-html-widget">
                            <div class="cargo-contact-widget">
                                <div class="detail address">
                                    <i class="flaticon-signs"></i>
                                    <h5>Visit our office</h5>
                                    <p>{{ $companyDetail->address  }}</p>
                                </div>

                                <div class="detail phone">
                                    <i class="flaticon-phone-call"></i>
                                    <h5>Call us on</h5>
                                    <p>Office: +{{ $companyDetail->phone  }}    </p>
                                    <p>Tollfree: 1800-123-45-6789</p>
                                </div>

                                <div class="detail email">
                                    <i class="flaticon-message-1"></i>
                                    <h5>Mail Us at</h5>
                                    <p>{{ $companyDetail->email  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="servdtlimg margbtm30">
                        <img src="{{ $service->getFirstMediaUrl('image', 'original') }}" alt="">
                    </div>
                    <div class="row paddsec">
                        <div class="col-md-12">
                            <div class="abotinforgt">
                                <div class="fh-section-title clearfix f25  text-left version-dark paddbtm40">
                                    <h2>{{ $service->title }}</h2>
                                </div>

                                <p>{!! $service->description!!}</p>
                            </div>
                        </div>
                        
                    </div>
                    <hr class="margtb40">
                    <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                        <h2>Safety Transportation</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="fh-service-box-2   box-style-1  no-thumb">
                                <div class="box-thumb"></div>
                                <div class="box-wrapper">
                                    <div class="box-header clearfix"><span class="fh-icon"><i class="flaticon-transport-7"></i></span>
                                        <h4 class="box-title">Full Container Load</h4><span class="sub-title main-color">Cargo Hub Ocean Direct</span></div>
                                    <div class="box-content">
                                        <p>There anyone who loves or pursue desire to obtain pains of itself, because it is pain, but occasionally circumstances.</p>
                                        <ul>
                                            <li>Consignee direct delivery</li>
                                            <li>Suitable for all kinds of commodities</li>
                                            <li>Tailored alternatives available</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="fh-service-box-2  box-style-1  no-thumb">
                                <div class="box-thumb"></div>
                                <div class="box-wrapper">
                                    <div class="box-header clearfix"><span class="fh-icon"><i class="flaticon-transport-10"></i></span>
                                        <h4 class="box-title">Less than Container</h4><span class="sub-title main-color">Cargo Hub Ocean Direct</span></div>
                                    <div class="box-content">
                                        <p>There anyone who loves or pursue desire to obtain pains of itself, because it is pain, but occasionally circumstances.</p>
                                        <ul>
                                            <li>Consignee direct delivery</li>
                                            <li>Suitable for all kinds of commodities</li>
                                            <li>Tailored alternatives available</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                        <h2>Benefits of Service</h2>
                    </div>
                    <div class="servdtlaccord margbtm40">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading active-panel">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                      Fast Worldwide delivery
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because seds those who do not know how to pursue pleasure.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                      End-to-end solution available
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because seds those who do not know how to pursue pleasure.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                      Safety & Compliance
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because seds those who do not know how to pursue pleasure.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                        <h2>Words From Partners</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 delservtest">
                            <div class="fh-testimonials-grid fh-testimonials ">
                                <div class="testi-list row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="testi-item">
                                            <span class="testi-icon"><i class="flaticon-quotations "></i></span>
                                            <div class="testi-content">
                                                <div class="testi-star">
                                                    <i class="fa fa-star fa-md"></i>
                                                    <i class="fa fa-star fa-md"></i>
                                                    <i class="fa fa-star fa-md"></i>
                                                    <i class="fa fa-star fa-md"></i>
                                                    <i class="fa fa-star fa-md"></i>
                                                </div>
                                                <div class="testi-des">These guys are just the coolest company ever! They were aware of our transported for road and tail and well as complex transport services.</div>
                                                <div class="info clearfix">
                                                    <span class="testi-name">Magdelana Donowan</span>
                                                    <span class="testi-job">CFD Engineer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="fh-partner clearfix margbtm30">
                                <div class="list-item partener_slide2">
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client1.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client2.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client3.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client4.png') }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fh-partner clearfix">
                                <div class="list-item  partener_slide2">
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client4.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client3.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client2.png') }}"></a>
                                        </div>
                                    </div>
                                    <div class="partner-item">
                                        <div class="partner-content">
                                            <a href="#" target="_self"><img alt="" src="{{ asset('site\images\partener\client1.png') }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome sec   end-->

</x-site-master-layout>