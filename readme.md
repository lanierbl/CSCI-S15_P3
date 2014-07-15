# P3 - Brent Lanier - CSCI S-15 (Summer 2014)

## PROD URL
<http://p3.cscis15.lanier.us/>

## P3 Description

The objective of this project was to provide hands-on experience with the Laravel PHP framework, notably working with routes and views.  In addition to working with these items, I also needed to incorporate a new controller to handle my server-side processing.  All three of my "applications" are using AJAX and JSON and the PHP processing is handled by various functions in the P3 controller.

## Details for Instructor(s)

The URI's for the functions in the P3 controller are specified in the routes.php file and these PHP functions are called in the Javascript of each corresponding view.

The packages that were specified in the P3 spec for the random user / lorem ipsum generator were used - The methods of these packages are called in the P3 controller.  User options for each "application" are passed via JSON to the controller for processing.  The JSON response contains all data returned by the external packages.

In the lorem ipsum generator, the JSON object contains the paragraphs (# specified by user) and the client-side Javascript formats the paragraphs for display.

In the random user generator, the JSON object contains a two-dimensional array of user objects that the client-side Javascript loops through, pulling out each random user for display (displays only information that the user has selected).

For the XKCD password generator, the JSON object returns the requested password.

All forms POST is done via AJAX.

## Outside code
* jQuery:  http://jquery.com
* Laravel:  http://laravel.com
* badcow/lorem-ipsum Package:  https://packagist.org/packages/badcow/lorem-ipsum
* fzaninotto/faker package:  https://packagist.org/packages/fzaninotto/faker
* Stack Overflow:  http://www.stackoverflow.com

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
