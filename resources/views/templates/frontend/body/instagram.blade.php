<!-- instagram feed -->
<div class="instagram  mt-5 mb-0 py-5 bg-light">
    <div class="container-xl">
        <!-- button -->
        <a href="https://instagram.com/orda_karmapack"
            class="btn btn-default btn-instagram">{{ '@' . 'Karmapack on Instagram' }}</a>
        <!-- images -->
        <div class="instagram-feed d-flex flex-wrap">
            @foreach ($footerInstagram as $instagram)
                <div class="insta-item col-sm-2 col-6 col-md-2">
                    <a href="{{ $instagram['url'] }}" target="_blank">
                        <img src="{{ $instagram['foto'] }}" alt="{{ $instagram['nama'] }}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
