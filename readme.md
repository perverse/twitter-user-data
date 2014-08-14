## Twitter User Data Grabber

This is a simple web app built upon Laravel 4.2 to meet the business requirements of a coding task.

The task is as follows:

>Write a program that accepts a twitter username as input, and returns the last 5 tweets, plus number of Tweets, Following, and Followers for that twitter username.

I have provided 2 interfaces which can both meet all of the criteria above.

### Dependancies

* PHP 5.4, with Mcrypt extension installed and enabled
* [Composer package manager](http://getcomposer.org)

#### Optional
* A web server, if access to HTTP API is required

### Installation

1. Clone this repository using git clone (git clone git@github.com:perverse/twitter-user-data.git)
2. Browse to the root of the repository and use [composer](http://getcomposer.org) to install dependancies (composer install)
4. Ensure /app/storage is writable by the current user and by your web server
3. Done!

### Configuration

This application has 2 ways of seeking Twitter User Data:

1. Via the Twitter REST API 1.1
2. Via a built-in page scraper

The app will default to the page scraping method until a Twitter Application's OAuth details are entered into the services config file, which can be found at:
> /app/config/services.php

Once these configuration options are filled in, the app will utilize the faster, more reliable RESTful API.

### CLI Interface

To begin using the CLI interface, go to your installations root directory and type "/path/to/your/php artisan twitter:getuser username".

### HTTP Interface

1. Direct an Apache Virtual Host/Nginx Server Block/IIS Website to the repositories /public directory.
2. Access the HTTP API via http://your-virtual-host/twitter?username=username

### License

The MIT License (MIT)

Copyright (c) 2014 Ronnie Pyne
Laravel Copyright (c) 2014 Taylor Otwell

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
