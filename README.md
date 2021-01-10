# reCAPTCHA Contact form package

### This form will store Users queries and messages with google reCAPTCHA verification in Laravel v8.


* **Installation** \
Add package using composer<br />
`composer require anshul/contact` 

* **Add service provider**\
Edit config/app.php, add the following file to Application Service Providers section. \
`Anshul\Contact\ContactServiceProvider::class` 

* **Publish the resources** \
`php artisan vendor:publish` 

* **Migrate contact table to Database** \
`php artisan migrate`

### Usage
Edit `config/recaptcha.php`. Add Your google reCAPTCHA frontend and backend keys in it.  
`return [
    'key' => '',
    'secret' => ''
];`





 



