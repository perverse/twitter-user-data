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

### CLI Interface

To begin using the CLI interface, go to your installations root directory and type "/path/to/your/php artisan twitter:grabuser username" and follow the instructions.

### HTTP Interface

1. Direct an Apache Virtual Host/Nginx Server Block/IIS Website to the repositories /public directory.
2. Access the HTTP API via http://your-virtual-host/twitter?username=username

### License

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

For more information, please refer to [http://unlicense.org/](http://unlicense.org/)
