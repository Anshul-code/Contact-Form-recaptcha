<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Contact us</title>
</head>
<body class="bg-light" >
    <div class="row">
        <div class="text-success py-2 text-center">
            @if(session()->get('success') !== "")
                {{ session()->get('success') }}
            @endif
        </div>
        <div class="text-danger py-2 text-center">
            @if(session()->get('error') !== "")
                {{ session()->get('error') }}
            @endif
        </div>
        <div class="col-lg-5 mx-auto border my-4 rounded" style="background-color: rgb(240, 240, 240)">
            <h2 class="text-center py-2">Contact Us - Package Development</h2>
            <form action="{{ route('contactSubmit') }}" method="post" class="p-4">
                @csrf
                <div class="form-group p-2">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" >
                </div>
                @error('name')
                    <small class="text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </small>
                @enderror
                <div class="form-group p-2">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your Email Address" value="{{ old('email') }}" >
                </div>
                @error('email')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
                <div class="form-group p-2 ">
                  <label for="message" >Message</label>
                  <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="3" style="resize:none;" placeholder="Enter your message" >{{ old('message') }}</textarea>
                </div>
                @error('message')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
                
                <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ config('recaptcha.key')  }}"></div>

                @error('g-recaptcha-response')
                <small class="text-danger">
                    <strong>Please check reCAPTCHA</strong>
                </small>
                @enderror
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
