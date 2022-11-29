<div class="footer-widgets widgets-area">
    <div class="contact-widget">
        <div class="container">
            <div class="row">
                <div class="contact col-md-3 col-xs-12 col-sm-12">
                    <a href="#" class="footer-logo"><img src="{{ asset('site\images\logo-light.png') }}"
                            alt="Footer Logo"></a>
                </div>
                <div class="contact col-md-3 col-xs-12 col-sm-12"><i class="flaticon-signs"></i>
                    <p>Address </p>
                    <h4>{{ $companyDetail->address }}</h4>
                </div>
                <div class="contact col-md-3 col-xs-12 col-sm-12"><i class="flaticon-phone-call "></i>
                    <p>Contact Number :</p>
                    <h4>+ {{ $companyDetail->phone }}</h4>
                </div>
                <div class="contact col-md-3 col-xs-12 col-sm-12"><i class="flaticon-clock-1"></i>
                    <p>Opening Hours :</p>
                    <h4>MON – FRI: 8AM – 5PM</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-sidebars">
        <div class="container">
            <div class="row">
                <div class="footer-sidebar footer-1 col-xs-12 col-sm-6 col-md-3">
                    <div class="widget widget_text">
                        <h4 class="widget-title">About Cargo</h4>
                        <div class="textwidget">
                            <p>Fair Ex Logistics Services is a global supplier of transport and logistics
                                solutions. We have offices in more than 20 countries and an international network of
                                partners and agents.</p>
                        </div>

                    </div>
                    <div class="widget cargohub-social-links-widget">
                        <div class="list-social style-1">
                            <a href="{{$socialmedia->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{$socialmedia->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{$socialmedia->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="{{$socialmedia->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-sidebar footer-2 col-xs-12 col-sm-6 col-md-3">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">Useful Links</h4>
                        <div class="menu-service-menu-container">
                            <ul class="menu">
                                <li><a href="">Contact</a></li>
                                <li><a href="{{ route('siteJoin.aboutUs.about') }}">About Us</a></li>
                                <li><a href="{{ route('siteJoin.testimonial') }}">Testimonial</a></li>
                                <li><a href="{{ route('siteJoin.service') }}">Services</a></li>
                                <li><a href="{{ route('siteJoin.faq') }}">Faq's</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-sidebar footer-3 col-xs-12 col-sm-6 col-md-3">
                    <div class="widget latest-project-widget">
                        <h4 class="widget-title">Special Service</h4>
                        <div class="latest-project-list clearfix">
                                
                            {{-- <div class="latest-project clearfix">
                                <div class="fp-widget-thumb">
                                    <a class="widget-thumb" href="#">
                                        <i class="fa fa-link" aria-hidden="true"></i>
                                        <img src="{{ asset('site\images\projects\fg1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div> --}}
                            {{-- @endforeach --}}

                      </div>
                    </div>
                </div>
                <div class="footer-sidebar footer-4 col-xs-12 col-sm-6 col-md-3">
                    <div class="widget widget_mc4wp_form_widget">
                        <h4 class="widget-title">Our Newsletter</h4>

                        <form id="news-form" class>
                            <div class="footform">
                                <div class="fh-form-field">
                                    <p>
                                        Sign up today for tips and latest news and exclusive special offers.
                                    </p>
                                    <div class="subscribe">
                                      

                                        <input type="email" value="" col="5" name="email"
                                            class="required email form-control" placeholder="Email Address"
                                            placeholder="Enter your email" id="email" type="text"  required>

                                        <input id="news-btn" col="3" class="btn btn-primary" type="submit"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Subscribe">
                                        <i class="uil uil-telegram-alt"></i>

                                       

                                    </div>

                                </div>
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value="">
                                    <span style="color:#fff"
                                    class="text-warning error-text email_error ml-5"></span>
                                </div>
                            </div>
                            

                        </form>


                        <div class="widget widget_text">
                            <div class="textwidget">
                                <p>We don’t do spam and Your mail id very confidential.</p>
                            </div>
                        </div>


                        <!-- / MailChimp for WordPress Plugin -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--footer sec end-->


<!--copyright sec-->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="footer-copyright col-md-6 col-sm-12 col-sx-12">
                <div class="site-info">Copyright @ 2017 <a href="#">Tech community Nepal</a>, All Right Reserved </div>
            </div>
        </div>
    </div>
</footer>


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>

<script>
    $(document).ready(function(){
       
            
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
    
           //store newsletter and send email to admin
           $('body').on('click', '#news-btn', function(e) {
            e.preventDefault();

            var email = $("#email").val();
            $.ajax({
                url: "{{ route('newsletters.subscribe') }}",
                // url: "/site/newsletters",
                type: "POST",
                data: {
                    email: email,
                },
                dataType: 'json',
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },

                success: function(data) {

                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });

                    } else {
                        // alertify.success(data.message);
                        $('#news-form')[0].reset();
                    }

                },
                error: function(data) {
                    console.log(data.error);
                }
            });
        });
        });
</script>

@endpush
<!--copyright sec end-->