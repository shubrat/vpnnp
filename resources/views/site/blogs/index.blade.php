<x-site-master-layout>
    <!-- add active page -->
    @push('stylesheet')
    <style>
        .nav ul.menu>li.current-menu-colorb>a {
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
                    <h1 class="page-title">Blog</h1> </div>
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
                        <span>Blog</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Page Header end-->

<!--blog page sec-->
<section class="blogpage blog-grid  secpadd">
    <div class="container">
        <div class="row">

            @foreach ($blogs as $blog )
                
            <div class="blog-wrapper col-xs-12 col-sm-6 col-md-4 col-3">
                <div class="wrapper">
                    <div class="entry-thumbnail">
                        <a href="{{ route('siteJoin.singleBlog.blog',$blog->slug) }}"><img src="{{ $blog->getFirstMediaUrl('image', 'thumb-sm') }}" alt=""></a>
                        <div class="entry-time">
                            <span class="month">{{ $blog->created_at->format('M') }}</span>
                            <span class="month">{{ $blog->created_at->format('d') }}</span>
                        </div>
                    </div>
                    
                    <header class="entry-header">
                        <div class="entry-meta clearfix">
                            <span class="meta author vcard">by <a href="#">Admin</a></span>
                            <span class="meta cat-links"><a href="#">High Way</a>, <a href="#">Logistic</a></span>
                        </div>
                        <h2 class="entry-title"><a href="#">{{ $blog->title }}</a></h2>
                    </header>
                    <!-- .entry-header -->
                    {{-- <div class="entry-content clearfix"> --}}
                    </header>
                            <p>{!! \Illuminate\Support\Str::limit($blog->content, 160) !!}</p>

                    </div>
                    <!-- .entry-content -->
                    <footer class="entry-footer clearfix">
                        <br /> &nbsp;

                        <a href="#">Read More...</a>
                    </footer>
                </div>
            </div>
            @endforeach
           

        </div>
        <nav class="navigation paging-navigation numeric-navigation">
            <span class="page-numbers current">1</span>
            <a class="page-numbers" href="#">2</a>
            <a class="next page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </nav>
    </div>
</section>
<!--blog page end-->

</x-site-master-layout>