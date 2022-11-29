<x-site-master-layout>
    <!-- add active page -->
    @push('stylesheet')
    <style>
        .nav ul.menu>li.current-menu-colorser>a {
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
                            <h1 class="page-title">Services</h1> </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                            <nav class="breadcrumb">
                                <a class="home" href="{{ route('siteJoin.service') }}"><span>Home</span></a>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span>Services</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header end-->

        <!--services Welcome sec -->
        <div class="servwesec secpadd">
        
        <!-- Welcome sec   end-->

        <!-- services sec -->
        <div class="allservsec">
            <div class="container">
                <div class="fh-service  style-bordered">
                    <div class="service-list row">

                        @foreach ( $services as $service )
                            
                        <div class="item-service col-xs-12 col-sm-6 col-md-4">
                            <div class="service-content">
                                <div class="entry-thumbnail">
                                    <a href="{{ route('siteJoin.singleService.service', $service->slug) }}"><span class="icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                                    <img src="{{ $service->getFirstMediaUrl('image', 'original') }}" alt="">
                                </div>
                                <div class="summary">
                                    <h2 class="entry-title"><a href=""></a>{!! \Illuminate\Support\Str::limit($service->title, 160) !!}</h2>
                                    <p style="font-size:14px;">{!! \Illuminate\Support\Str::limit($service->description, 160) !!}</p>
                                    <a href="#" class="read-more">Read More...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                   
                    </div>
                </div>
            </div>
        </div>
        <!-- services sec end -->

        <!-- featured sec -->
        <section class="features-1 bluebg">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="frs1box">
                        <div class="fh-icon-box  style-3 version-dark hide-button icon-left">
                            <span class="fh-icon"><i class="flaticon-internet"></i></span>
                            <h4 class="box-title"><span>Fast worldwide delivery</span></h4>
                            <div class="desc">
                                <p>There are many variations of passages of available, but the majority have suffered alteration in some form, by or randomised slightly believable.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="frs1box">
                        <div class="fh-icon-box  style-3 version-dark hide-button icon-left">
                            <span class="fh-icon"><i class="flaticon-shield"></i></span>
                            <h4 class="box-title"><span>Safe and Secure Services</span></h4>
                            <div class="desc">
                                <p>There are many variations of passages of available, but the majority have suffered alteration in some form, by or randomised slightly believable.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="frs1box">
                        <div class="fh-icon-box  style-3 version-dark hide-button icon-left">
                            <span class="fh-icon"><i class="flaticon-technology"></i></span>
                            <h4 class="box-title"><span>24/7 customer support</span></h4>
                            <div class="desc">
                                <p>There are many variations of passages of available, but the majority have suffered alteration in some form, by or randomised slightly believable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured sec end -->

        <!-- about sec-->
        <section class="aboutsec-3 secpadd">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="abotimglft">
                            <img src="images\resources\about2.jpg" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="abotinforgt">
                            <div class="fh-section-title f30 clearfix  text-left version-dark paddbtm30">
                                <h2>The Complete Solution</h2>
                            </div>
                            <p>Our warehousing services are known nationwide to be one of the most reliable, safe and affordable, because we take pride in delivering the best of warehousing services, at the most reasonable prices.</p>
                            <p>Pleasure and praising pain was born and I will give you a complete account of system, and expound actual teachings occasionally circumstances.</p>
                            <a href="#" class="fh-button button  fh-btn margtop30">More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end-->

        <!-- Three steps-->
        <section class="three_steps secpadd graybg">
            <div class="container">
                <div class="fh-section-title clearfix f30  text-center version-dark margbtm40">
                    <h2>Three Step processing</h2>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="fh-icon-box  style-2 version-dark  icon-center  service-process">
                            <span class="fh-icon"><i class="flaticon-box-1"></i></span>
                            <h4 class="box-title"><span>Receive From Shipper</span></h4>
                            <div class="desc">
                                <p>Pursues or desires to obtain sed pain of it because it is pain circumstances.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="fh-icon-box  style-2 version-dark  icon-center  service-process">
                            <span class="fh-icon"><i class="flaticon-delivery-truck"></i></span>
                            <h4 class="box-title"><span>Safe & Secure Shipment</span></h4>
                            <div class="desc">
                                <p>Except to obtain some advantage from it but who has any rights too find fault with enjoy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="fh-icon-box  style-2 version-dark  icon-center  service-process">
                            <span class="fh-icon"><i class="flaticon-box-2"></i></span>
                            <h4 class="box-title"><span>Handover to Receiver </span></h4>
                            <div class="desc">
                                <p>At vero eos et accusamus et iusto sed odio dignissimos ducimus ut blanditiis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Three steps end-->

    </x-site-master-layout>