@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Kontak</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row">

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-phone"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Phone</h3>
                            <p class="mb-0">+6285798132505</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-envelope-open"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">E-Mail</h3>
                            <p class="mb-0">info@karmapack.id</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                <path fill-rule="evenodd"
                                    d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                            </svg></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Location</h3>
                            <p class="mb-0">Cianjur Selatan</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="spacer" data-height="50"></div>

            <!-- section header -->
            <div class="section-header">
                <h3 class="section-title">Send Message</h3>
                <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave" alt="wave" />
            </div>

            <!-- Contact Form -->
            <form id="contact-form" class="contact-form" method="post">

                <div class="messages"></div>

                <div class="row">
                    <div class="column col-md-6">
                        <!-- Name input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="InputName" id="InputName"
                                placeholder="Your name" required="required" data-error="Name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                placeholder="Email address" required="required" data-error="Email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="InputSubject" name="InputSubject"
                                placeholder="Subject" required="required" data-error="Subject is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <!-- Message textarea -->
                        <div class="form-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" placeholder="Your message here..."
                                required="required" data-error="Message is required."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit
                    Message</button>
                <!-- Send Button -->

            </form>
            <!-- Contact Form end -->
        </div>
    </section>
@endsection
