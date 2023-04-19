@extends('layouts.frontend.master')
@section('content')
    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between">
                <div class="col-lg-4">
                    <h3 class="text-24 fw-500">{{ settings()->get('setting.contact.list.title') }}</h3>
                    <p class="mt-25">{{ settings()->get('setting.contact.list.sub_title') }}</p>

                    <div class="y-gap-30 pt-60 lg:pt-40">
                        {{-- contact list --}}
                        @foreach ($contacts as $v)
                            <div class="d-flex items-center">
                                <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                    <i class="{{ $v->icon }} " style="font-size: 1.7em"></i>
                                </div>
                                <div class="ml-20"><a href="{!! $v->url !!}">{!! $v->keterangan !!}</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="text-24 fw-500">{{ settings()->get('setting.contact.message.title') }}</h3>
                    <p class="mt-25">{{ settings()->get('setting.contact.message.sub_title') }}</p>

                    <form class="contact-form row y-gap-30 pt-60 lg:pt-40" action="#" id="message_form">
                        <div class="col-md-6">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                {{ settings()->get('setting.contact.message.name') }}
                            </label>
                            <input type="text" name="nama"
                                placeholder="{{ settings()->get('setting.contact.message.name_placeholder') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                {{ settings()->get('setting.contact.message.email') }}
                            </label>
                            <input type="email" name="email"
                                placeholder="{{ settings()->get('setting.contact.message.email_placeholder') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                {{ settings()->get('setting.contact.message.message') }}
                            </label>
                            <textarea name="message"rows="8"
                                placeholder="{{ settings()->get('setting.contact.message.message_placeholder') }}" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                                {{ settings()->get('setting.contact.message.button_text') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if ($faqs->count())
        <section class="layout-pt-lg layout-pb-lg bg-light-4">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get('setting.contact.faq.title') }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get('setting.contact.faq.sub_title') }}</p>
                        </div>
                        <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                            @foreach ($faqs as $v)
                                @if ($v->type == 2)
                                    <a href="{{ $v->link }}">
                                @endif
                                <div class="accordion__item">
                                    <div class="accordion__button">
                                        <div class="accordion__icon">
                                            @if ($v->type == 2)
                                                <div class="icon" data-feather="send"></div>
                                                <div class="icon" data-feather="send"></div>
                                            @else
                                                <div class="icon" data-feather="plus"></div>
                                                <div class="icon" data-feather="minus"></div>
                                            @endif
                                        </div>
                                        <span class="text-17 fw-500 text-dark-1">{{ $v->nama }}</span>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="accordion__content__inner">
                                            <p>{{ $v->jawaban }}</p>
                                        </div>
                                    </div>



                                </div>
                                @if ($v->type == 2)
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#message_form').submit(function(e) {
                const form = this;
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]',
                    `Sending...`);
                $.ajax({
                    type: "POST",
                    url: "{{ route('kontak.send') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Message send successfully',
                            showConfirmButton: true,
                            timer: 4500
                        })
                        $(form).trigger("reset");
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit]',
                            `{{ settings()->get('setting.contact.message.button_text') }}`,
                            false);
                    }
                });
            });
        });

        function setBtnLoading(element, text, status = true) {
            const el = $(element);
            if (status) {
                el.attr("disabled", "");
                el.html(
                    `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true">
                                </span> <span>${text}</span>`
                );
            } else {
                el.removeAttr("disabled");
                el.html(text);
            }
        }
    </script>
@endsection
