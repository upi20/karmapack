<!-- footer -->
<footer class="mt-0">
    <div class="container-xl">
        <div class="footer-inner">
            <div class="row d-flex align-items-center gy-4">
                <!-- copyright text -->
                <div class="col-md-4">
                    <span class="copyright">© 2021 Karmapack.
                        <br>Persembahan Dari
                        <a href="http://github.com/iseplutpinur">Isep Lutpi Nur</a>
                        Bidang Kominfo.</span>
                </div>

                <!-- social icons -->
                <div class="col-md-4 text-center">
                    <ul class="social-icons list-unstyled list-inline mb-0">
                        @foreach ($list_sosmed as $sosmed)
                            <li class="list-inline-item">
                                <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                    <i class="{{ $sosmed['icon'] }}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- go to top button -->
                <div class="col-md-4">
                    <a href="#" id="return-to-top" class="float-md-end">
                        <i class="icon-arrow-up"></i>Back to Top
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
