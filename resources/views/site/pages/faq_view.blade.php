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
                            <h1 class="page-title">FAQ’S</h1> </div>
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
                                <span>FAQ’S</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header end-->

        <!--faq pagesec-->
        <section class="faqpagesec secpadd">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="servdtlaccord margbtm40">
                            <div class="panel-group" id="accordion">
                                @foreach ($faqs as $faq )
                                    
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq{{ $faq->id }}">
									  {{ $faq->question }}
									</a>
								  </h4>
                                    </div>

                                    <div id="faq{{ $faq->id }}" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            {{ $faq->answer }}

                                        </div>
                                    </div>
                                </div>

                                @endforeach


                   
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">

                            <div class="fh-section-title clearfix  text-left version-dark paddbtm40">
                                <h2>Contact Us</h2>
                            </div>
                            <form>
                                <div class="fh-form-1 fh-form">
                                    <div class="row fh-form-row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <select>
                                                    <option value="Services">Services</option>
                                                    <option value="Services 1">Services 1</option>
                                                    <option value="Services 2">Services 2</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <input name="delivery-city" value="" placeholder="Delivery City*" type="text">
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <input name="distance" value="" placeholder="Distance*" type="text">
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <input name="weight" value="" placeholder="Weight*" type="text">
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <input name="your-name" value="" placeholder="Name*" type="text">
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <p class="field">
                                                <input name="your-email" value="" placeholder="Email*" type="email">
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <p class="field single-field">
                                                <textarea cols="40" placeholder="Message*"></textarea>
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p class="field submit">
                                                <input value="Submit" class="fh-btn" type="submit">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!--faqpagesec end-->


</x-site-master-layout>