<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
</body>
</html>