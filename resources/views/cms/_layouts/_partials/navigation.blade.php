<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('cms.dashboard') }}"> <i data-feather="home"></i> <span>Dashboard</span> </a>
                </li>
                
                <!--category and sub cateogry-->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i>
                        <span>Categories</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('cms.categories.index') }}"> <span>Show Category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('cms.subCategories.index') }}"> <span>Add Sub Category</span> </a>
                        </li>
                    </ul>
                </li>

                <!-- Special Services -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i> <span>
                            Services</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('cms.specialServices.create') }}"> <span>Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cms.specialServices.index') }}"> <span>View Services</span> </a>
                        </li>
                    </ul>
                </li>

                <!-- Services -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i> <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('cms.products.create') }}"> <span>Add New Product</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('cms.products.index') }}"> <span>View Products</span> </a>
                        </li>
                    </ul>
                </li>

                <!-- members -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i> <span>Our
                            Members</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('cms.members.create') }}"> <span>Add Member</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('cms.members.index') }}"> <span>View Member</span> </a>
                        </li>
                    </ul>
                </li>

                <!-- partners -->


                <!-- Blog -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i>
                        <span>Blogs</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li> <a href="{{ route('cms.blogs.create') }}"> <span>Add New Blog Type</span> </a> </li>
                        <li> <a href="{{ route('cms.blogs.index') }}"> <span>View Blog Type</span> </a>
                        </li>
                    </ul>
                </li>



                <!-- Pages -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <!--Abouts Us -->
                        <li><a href="{{ route('cms.edit.about') }}" data-key="t-starter-page"> About Us</a> </li>

                        <li><a href="{{ route('cms.faqs.index') }}">FAQ</a></li>
                        <li><a href="{{ route('cms.privacy.edit')}}" data-key="t-privacy">Privacy &
                                Policy</a></li>

                        <!--Services -->
                        <li><a href="{{ route('cms.services.create') }}" data-key="t-blogs"> Services</a></li>

                        <!--terms and condition -->
                        <li><a href="{{ route('cms.term.edit')}}" data-key="t-Terms">Terms &
                                Condition</a></li>
                        <!--Testimonials -->
                        <li><a href="{{ route('cms.testimonials.index') }}" data-key="t-blogs">Testimonials</a></li>
                    </ul>
                </li>


                <!-- Setting -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="users"></i>
                        <span>Settings</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('cms.location.create')}}"> Google Map </a></li>
                        <li><a href="{{ route('cms.detail.create')}}"> Company Details </a></li>
                        <li><a href="{{ route('cms.social.create')}}"> Social Media </a></li>
                        <!-- <li><a href="#"> Google Map </a></li> -->
                    </ul>
                </li>

                <!-- Enquiry -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-enquiry">Enquiry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!--Abouts Us -->
                        <!-- <li><a href="#" data-key="t-starter-page">Contact Us</a> -->
                        <li><a href="{{ route('cms.contactUs.list')}}" data-key="t-starter-page">Contact Us</a>
                        <li><a href="{{ route('cms.newsletter.create') }}" data-key="t-starter-page">News Letter</a>
                        </li>
                        <!--Contact Us-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>