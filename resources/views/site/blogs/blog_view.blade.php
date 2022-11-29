
<x-site-master-layout>
<!--Page Header-->
     <div class="page-header title-area">
        <div class="header-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 class="page-title">{{ \Illuminate\Support\Str::limit($blog->title, 60)}}</h1> </div>
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
                            <span>{{ \Illuminate\Support\Str::limit($blog->title, 60)}}</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header end-->

    <!--blog page sec-->
    <section class="blogpage single-post blog-classic  secpadd">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="hentry">
                        <header class="entry-header">
                            <div class="entry-thumbnail">
                                <img src="{{ $blog->getFirstMediaUrl('image', 'thumb') }}" alt="">
                                <div class="entry-time">
                                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                                    <span class="month">{{ $blog->created_at->format('M') }}</span>
    
                                </div>
                            </div>

                            <div class="entry-meta clearfix">
                                <span class="meta author vcard">by <a href="#">Admin</a></span>
                                {{-- <span class="meta cat-links"><a href="#">High Way</a>, <a href="#">Logistic</a></span> --}}
                            </div>
                            <!-- .entry-meta -->

                            <h2 class="entry-title">{{ $blog->title }}</h2>
                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <p>{!! $blog->content !!}</p>
                        </div>
                        <!-- .entry-content -->

                        {{-- <footer class="entry-footer clearfix">
                            <nav class="navigation post-navigation">
                                <div class="nav-links">
                                    <div class="nav-previous"><a href="#"><span class="meta-nav"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>Prev</a></div>
                                    <div class="nav-next"><a href="#">Next<span class="meta-nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a></div>
                                </div>
                                <!-- .nav-links -->
                            </nav>
                            <!-- .navigation -->
                        </footer> --}}
                        <!-- .entry-footer -->
                    </div>

                 
                </div>
                <div class="col-md-4">
                    <div class="tracksidebar">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <input class="search-field" placeholder="Search …" type="search">
                                </label>
                                <input class="search-submit" value="Search" type="submit">
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h4 class="widget-title">Blogs</h4>
                            <ul>                                    
                                <li><a href="#">Entrepreneurs</a></li>
                        </div>
                      

                        <div class="widget popular-posts-widget">
                            <h4 class="widget-title">Popular Post</h4>

                            @foreach ($allblogs as $singleBlog )
                                
                            <div class="popular-post post clearfix ">
                                <a class="widget-thumb" href="{{ route('siteJoin.singleBlog.blog', $singleBlog->slug) }}"><img src="{{ $singleBlog->getFirstMediaUrl('image', 'original') }}" alt="" height="75" width="75"></a>
                                <div class="mini-widget-title">
                                    <h4><a href="#">{{ $singleBlog->title }}</a></h4>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span class="entry-date">{{ $blog->created_at->isoFormat('LL') }}</span>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h4 class="widget-title">Tag Cloud</h4>
                            <div class="tagcloud">
                                <a href="#">Cargo</a>
                                <a href="#">Contact</a>
                                <a href="#">Ground</a>
                                <a href="#">Management</a>
                                <a href="#">Ocean</a>
                                <a href="#">Offers</a>
                                <a href="#">Safety</a>
                                <a href="#">Shipment</a>
                                <a href="#">Transporation</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--blog page end-->

</x-site-master-layout>