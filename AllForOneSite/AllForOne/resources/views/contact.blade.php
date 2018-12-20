@extends('layouts.app')
@section('pageAssets')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto mt-5">
                <div class="card ">
                    @if(isset($succes))

                        <div class="alert alert-success" role="alert">
                            Contant form is send to the it service we will contact you ass soon as possible
                        </div>

                        <a href="/" class="btn btn-success m-auto">Back</a>
                     @else

                        <form class="form-horizontal" action="/contact" method="post">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend class="text-center card-header mb-4">Contact us</legend>

                                @if(isset($error))
                                    <div class="alert alert-danger col-md-11 m-auto" role="alert">
                                        Error : {{$error}}
                                    </div>
                            @endif
                                <!-- Name input-->
                                <div class="form-group col-md-11 m-auto">
                                    <label class="control-label" for="name">Name</label>

                                    <input id="name" name="name" maxlength="32" pattern="[A-Za-z._%+- ]{1,32}" type="text" placeholder="Your name" class="form-control" required>

                                </div>

                                <!-- Email input-->
                                <div class="form-group  col-md-11 m-auto">
                                    <label class="control-label" for="email">Your E-mail</label>

                                    <input id="email" name="email" type="email" placeholder="Your email" class="form-control"  required>

                                </div>

                                <!-- Message body -->
                                <div class="form-group  col-md-11 m-auto">
                                    <label class="control-label" for="message">Your message</label>
                                    <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"  required></textarea>

                                </div>
                                <!-- Catpacha -->
                                <div class="form-group  col-md-11 m-auto mb-4">
                                    <label class=" control-label" for="catpacha"></label>
                                    <div class="g-recaptcha" id="Catpacha" data-sitekey="6LfHE4MUAAAAAIMyUoFQRIkAQfuO3RwA6cYWK_in"></div>
                                </div>
                                <!-- Form actions -->
                            <div class="form-group ">
                                    <div class="col-md-11 text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection