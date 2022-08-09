<section class="layout-pt-md layout-pb-md bg-purple-1">
    <div class="container">
        <div class="row y-gap-20 justify-between items-center">
            <div class="col-xl-7 col-lg-8">
                <h2 class="text-30 lh-15 text-white">
                    Bergabung dengan kami <span class="text-green-1"> Lebih dari Ratusan alumni mahasiswa dan pelajar
                    </span> Cianjur Kidul
                </h2>
            </div>

            <div class="col-auto">
                <a href="#" class="button -md -green-1 text-dark-1">Daftar Poesaka</a>
            </div>
        </div>
    </div>
</section>

<footer class="footer -type-1 bg-dark-1 -green-links mt-0">
    <div class="container">
        <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="footer-header__logo">
                        <img src="{{ asset('assets/templates/admin/images/brand/logo-hd.png') }}" alt="logo"
                            style="width: 250px">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-white">Follow us on social media</div>
                        <div class="footer-header-socials__list">

                            @foreach ($list_sosmed as $sosmed)
                                <li class="list-inline-item">
                                    <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                        <i class="{{ $sosmed['icon'] }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-columns">
            <div class="row y-gap-30">
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">ABOUT</div>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="about-1.html">About Us</a>
                        <a href="blog-list-1.html">Learner Stories</a>
                        <a href="instructor-become.html">Careers</a>
                        <a href="blog-list-1.html">Press</a>
                        <a href="#">Leadership</a>
                        <a href="contact-1.html">Contact Us</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-8">
                    <div class="text-17 fw-500 text-white uppercase mb-25">CATEGORIES</div>
                    <div class="row justify-between y-gap-20">
                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="courses-single-1.html">Development</a>
                                <a href="courses-single-2.html">Business</a>
                                <a href="courses-single-3.html">Finance & Accounting</a>
                                <a href="courses-single-4.html">IT & Software</a>
                                <a href="courses-single-5.html">Office Productivity</a>
                                <a href="courses-single-6.html">Design</a>
                                <a href="courses-single-1.html">Marketing</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="courses-single-1.html">Lifiestyle</a>
                                <a href="courses-single-2.html">Photography & Video</a>
                                <a href="courses-single-3.html">Health & Fitness</a>
                                <a href="courses-single-4.html">Music</a>
                                <a href="courses-single-5.html">UX Design</a>
                                <a href="courses-single-6.html">Seo</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 offset-xl-1 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">SUPPORT</div>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="terms.html">Documentation</a>
                        <a href="help-center.html">FAQS</a>
                        <a href="dashboard.html">Dashboard</a>
                        <a href="contact-1.html">Contact</a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">GET IN TOUCH</div>
                    <div class="footer-columns-form">
                        <div>We don’t send spam so don’t worry.</div>
                        <form action="https://creativelayers.net/themes/educrat-html/post">
                            <div class="form-group">
                                <input type="text" placeholder="Email...">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-30 border-top-light-15">
            <div class="row justify-between items-center y-gap-20">
                <div class="col-auto">
                    <div class="d-flex items-center h-100 text-white">
                        © 2022 Karmapack. Persembahan Dari <a class="text-primary px-3"
                            href="{{ url('iseplutpinur') }}">Isep
                            Lutpi Nur</a> Bidang Kominfo.
                    </div>
                </div>

                <div class="col-auto">
                    <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                        <div>
                            <div class="d-flex x-gap-15 text-white">
                                <a href="help-center.html">Help</a>
                                <a href="terms.html">Privacy Policy</a>
                                <a href="terms.html">Cookie Notice</a>
                                <a href="terms.html">Security</a>
                                <a href="terms.html">Terms of Use</a>
                            </div>
                        </div>

                        <div>
                            <a href="#" id="return-to-top"
                                class="button px-30 h-50 -dark-6 rounded-200 text-white" style="border: 0">
                                <i class="fas fa-arrow-up"></i>Back to Top
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
