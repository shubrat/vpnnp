<x-site-master-layout>
    <!-- add active page -->
    @push('stylesheet')
    <style>
        .nav ul.menu>li.current-menu-colorp>a {
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
                        <h1 class="page-title">Testimonials</h1> </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                        <nav class="breadcrumb">
                            <a class="home" href="{{ route('siteJoin.index') }}"><span>Home</span></a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span>Testimonials</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header end-->

    
    <!--faq pagesec-->
    <section class="textmpagesec secpadd">
        <div class="container">
            <div class="fh-testimonials-grid fh-testimonials ">
                <div class="testi-list row">
                    @foreach ($testimonials as $testimonial )
                       
                    <div class="col-md-12">
                        <div class="testi-item">
                            <span class="testi-icon"><i class="flaticon-quotations "></i></span>
                            <div class="testi-content">
                              
                                <div class="testi-des">{{ $testimonial->description }}</div>
                                <div class="info clearfix">
                                    <span class="testi-name">{{ $testimonial->name }}</span>
                                    <span class="testi-job">{{ $testimonial->position }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

               
                </div>
            </div>
        </div>
    </section>
    <!--faqpagesec end-->

</x-site-master-layout>