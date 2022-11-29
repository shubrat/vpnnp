<x-site-master-layout>
<!-- add active page -->
@push('stylesheet')
<style>
    .nav ul.menu>li.current-menu-colora>a {
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
                        <h1 class="page-title">About Us</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                        <nav class="breadcrumb">
                            <a class="home" href="{{route('siteJoin.index') }}"><span>Home</span></a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span>About Us</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header end-->

    <!--About us-->
    <section class="aboutsec-2 secpaddbig">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="abotimglft">
                        <img src="{{ asset('site\images\resources\aboutus-1.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="abotinforgt">
                        <div class="fh-section-title clearfix  text-left version-dark paddbtm30">
                            <h2>Who We are</h2>
                        </div>
                        <p>{!! $about->description !!} </p>
                        <img class="paddtop20" src="images\icon\signature-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About us end-->

    <!-- Feature sec -->
    <section class="features-3 bluebg">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="fh-feature-box "><span class="chars">M</span>
                        <h4 class="box-title">Our Mission</h4>
                        <div class="desc">We meet our customers’ demands for a personal &amp; profesional service by
                            offering innovative supply chain solutions.</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fh-feature-box "><span class="chars">V</span>
                        <h4 class="box-title">Our Vision</h4>
                        <div class="desc">We proactively and constantly look for new possibilities. Therefore, an
                            important part of our vision is to attract &amp; retain.</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fh-feature-box "><span class="chars">C</span>
                        <h4 class="box-title">Core Values</h4>
                        <div class="desc">Procedures, values and attitudes are crucial to our reputation – not to
                            mention the success we enjoy.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature sec end -->

    <!-- featured sec -->
    <section class="whychoos-3 secpadd">
        <div class="container">
            <div class="fh-section-title clearfix  text-center version-dark paddbtm30">
                <h2>Why Choose Us</h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="fh-icon-box  style-2 version-dark  icon-center">
                        <span class="fh-icon"><i class="flaticon-international-delivery"></i></span>
                        <h4 class="box-title"><span>24 Hours Support</span></h4>
                        <div class="desc">
                            <p>We are Specialises in international freight forwarding of merchandise.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="fh-icon-box  style-2 version-dark  icon-center">
                        <span class="fh-icon"><i class="flaticon-people"></i></span>
                        <h4 class="box-title"><span>Global supply Chain</span></h4>
                        <div class="desc">
                            <p>Efficiently unleash cross-media information without cross-media value.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="fh-icon-box  style-2 version-dark  icon-center">
                        <span class="fh-icon"><i class="flaticon-route"></i></span>
                        <h4 class="box-title"><span>Mobile Shipment Tracking</span></h4>
                        <div class="desc">
                            <p>We Offers intellgent concepts for road & tail well as complex special services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-md-offset-2">
                    <div class="fh-icon-box  style-2 version-dark  icon-center">
                        <span class="fh-icon"><i class="flaticon-open-cardboard-box"></i></span>
                        <h4 class="box-title"><span>Careful Handling</span></h4>
                        <div class="desc">
                            <p>Cargo HUB are transported at some stage of their journey along world’s roads.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="fh-icon-box  style-2 version-dark  icon-center">
                        <span class="fh-icon"><i class="flaticon-alarm-clock"></i></span>
                        <h4 class="box-title"><span>Time On Door Delivery</span></h4>
                        <div class="desc">
                            <p>We Offers intellgent concepts for road & tail well as complex special services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured sec end -->

    <!--Our Team section-->
    <section class="hometeam-1 graybg secpadd">
        <div class="container">
            <div class="fh-section-title clearfix f30  text-left version-dark">
                <h2>Meet Our Team</h2>
            </div>
            <div class="fh-team">
                <div class="team-list slideteam">
                    @foreach ($members as $member)

                    <div class="team-member ">
                        <div class="team-header"><img src="{{ $member->getFirstMediaUrl('image', 'thumb') }}"
                                class="attachment-full" alt="">
                            <ul class="team-social">
                                <li><a href="{{ $member->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{ $member->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ $member->instagram }}" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-info">
                            <h4 class="name">{{ $member->name }}</h4><span class="job">{{ $member->designation }}</span>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="teampara">
                We’re always looking for talented workers, creative directors and anyone has a
                <br> passion for the logistic service <a class="main-color" style="text-decoration: underline;"
                    href="#">join our team.</a>
            </div>
        </div>
    </section>
    <!--Our Team section end-->
</x-site-master-layout>