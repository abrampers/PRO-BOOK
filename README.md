<img src="docs/logo.png">

Pro-Book
&middot;
[![GitLab license](https://img.shields.io/github/license/Day8/re-frame.svg)](LICENSE)
![Build Pass](https://img.shields.io/badge/Linux%2FOSX%20Build-passing-brightgreen.svg)
![Downloads](https://img.shields.io/badge/downloads-1m-brightgreen.svg?longCache=true&style=flat)
=====
> A book is both a usually portable physical object and the body of immaterial representations or intellectual object whose material signs—written or drawn lines or other two-dimensional media—the physical object contains or houses. Pro-Book is an online book store that allows user to buy books and give reviews to their purchased books.

## Table Of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Run Pro-Book](#run-pro-book)
- [Features](#features)
- [Implemented Libraries](#implemented-libraries)
- [Authors](#authors)
- [Words From Authors](#words-from-authors)
- [References](#references)

## Introduction
This is an implementation of a web-based online book store using **PHP**. It is open-source and everyone can contribute to probook by creating pull request.

#### *Creating an online book store has never been so easy*
**Online Book Store Template** - This web-based online book store template is your one-stop solution to start your own online book store.

#### *What's the point of Pro-Book?*
Pro-Book wants to contribute to community by creating this open-source project about a web-based online book store. Young entrepreneurs can start their own online book store business by cloning this repository and deploy it on their own servers.

#### *Why should I care?*
Because Pro-Book is for *people* :tada:. You have contributed to the community by cloning or creating a pull request on this Pro-Book project.

## Installation
In order to run this web on your local server, you need to run it on **PHP 7.1** and install:

1. PHP 7.1
```
apt-get install php7.1
```
2. PDO Extension
```
apt-get install php7.1-pdo-mysql
```
3. mysql
```
apt-get install mysql
apt-get install mysql-server
```
4. Create .ethes file
```
cp ethes.sample .ethes
#edit .ethes file with your own setting
```

## Run Pro-Book
Run this command on your terminal
```
php -S localhost:5000
```
You can try to open Pro-Book on your browser with URL localhost:5000

## Features
- **Browse** : You can search any books that you want and view its detailed information that contains title, author, synopsis, cover, ratings, and list of reviews.
- **Order** : When you are on the book's detail page, you can order the book by choosing the amount of copies you want and click on the Order button.
- **History** : You can see your history of orders.
- **Review** : On your history page, you can click the **review** button in order to give a review about your purchased books. You can also give a rating and comment about the book.
- **View Profile** : You can view your profile details on the profile page.
- **Edit Profile** : On the profile page, you can click the **edit** button and change some personal information about you. You are allowed to change your profile picture, name, address, and phone number.

## Implemented Libraries
We build this project from **scratch**. We **create** our own library to support this project. They are scalable and easy to use. List of our own library:
- [**Router**](#router)
- [**Request**](#request)
- [**MarufDB**](#marufdb)
- [**jQowi**](#jqowi)
- [**Template Engine**](#templateengine)
- [**dotEthes**](#dotethes)
- [**JKWToken**](#jkwtoken)

Here is the documentation about our own library. We will tell you about it's functionality and how to use it.

### Router
Router is a library to simplify php routing. When user input a path to your server, Rather than following the projects directory hierarchy, Router will check their input path and redirect it using its controller policy.
Snippet of code example:
```php
//When user request a GET http method into /login, router will return a LoginGetController if the request pass the TokenValidationMiddleware and LoginRegisterMiddleware
$router->get('/login', function($request) {
  return LoginGetController::control($request);
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);
```

### Request
Request is a library that contains RequestInterface and a Request class that implements a RequestInterface that works as a class which save all request parameters ($_SERVER , GET, POST).

### MarufDB
This is the library for Pro-Book database. It is a PDO-MySQL Connection class that contains some functions to help us doing CRUD operations on our database.

#### Member Variables
```php
private $host
#MySQL host
private $dbName
#MySQL Database Name
private $dbUser
#MySQL Username
private $dbPassword
#MySQL Password
private $pdo
#PDO Object
```

#### Member Function
```php
public function __construct()
#Class Constructor. It will assign member variables with defined variables on .ethes file (environment file) and create pdo connection.
private function Connect()
#Create PDO Connection with member variables as parameters.
public function getUserId($token)
#Get current userId by their token cookies.
public function getUser($token)
#Get current user data from Users table by their token cookies.
public function getUsername($token)
#Get current username by their token cookies.
public function checkLogin($username, $password)
#Check whether user has the correct combination of username and password or not when they try to login into Pro-Book.
public function searchBook($title)
#Get all books where $title is a substring on their title.
public function addToken($user_id, $token)
#Add user token to Pro-Book Database, so user doesn't need to login as long as the cookie expired time.
public function checkToken($token)
#Validate user token whether the token has already expired or not.
public function validateUsername($username)
#Check if the username isn't on the database yet.
public function validateEmail($email)
#Check if the email isn't on the database yet.
public function orderBook($book_id, $user_id, $amount, $order_timestamp)
#Insert order detail into Orders Database when user purchases a book.
public function addProfile($name, $username, $email, $password, $address, $phonenumber)
#Register a new account into Users Database.
public function editProfile($name, $address, $phonenumber, $user_id)
#Save edited user's data into database.
public function getHistory($user_id)
#Get list of orders history users.
public function getBookIdByOrderId($order_id)
#Get BookId by OrderId.
public function getBookDetail($book_id)
#Get book detail by bookId,
public function addReview($user_id, $username, $book_id, $rating, $comment, $order_id)
#Insert user's review into database.
public function getReviews($book_id)
#Get list of reviews by bookId,
```
### jQowi
This library tries to solve much of the same problems as what jQuery is trying to solve--hence the name resemblance--by simplifying DOM element selection and AJAX request handling. We implemented jQowi as a simple wrapper for `Document.querySelector()` and `XMLHttpRequest` by providing simple and clear APIs.

#### DOM Element Selection
```javascript
// Select all elements with 'button' class
// Note that selecting by class result an array of elements
$$('.button').forEach((element) => {
  element.onmouseenter = () => {
    console.log('Hello, world!');
  };
});

// Select the element with 'submitButton' id
// Note that selecting by id results in just one element
$$('#submitButton').onmouseenter = () => {
  console.log('Hello, world!');
};
```
> Note: jQowi uses the same query syntax as `Document.querySelector()`

#### AJAX
```javascript
// Sending an AJAX GET request
xhttp = $$.ajax({
  method: 'GET',
  url: 'http://just.an/example',
  callback: (response) => {
    response = JSON.parse(response);
    console.log(response);
  }
});

// Sending an AJAX POST request
$$.ajax({
  method: 'POST',
  url: 'http://just.an/example',
  data: JSON.stringify(data),
  callback: (response) => {
    response = JSON.parse(response);
    console.log(response);
  },
});
```
> Note: Every instance of an AJAX request returns an `XMLHttpRequest` object for that request

### Template Engine
This library provides a simple and clear interface to serve a templated HTML page using PHP.

#### Format
You can get a pretty clear picture of the templating format by reading one of our implementation [here](src/view/search.php). In short, you just need to create a .php file implement a `render_template` function that takes whatever parameters you want for your template and returns an HTML string.
```php
<?php
function render_template(string $username) {
  return <<<HTML
    <h1>Hello {$username}</h1>
HTML;
}
```

#### Usage
```php
<?php
$template = new Template('path/to/template.php');
$username = 'mrjoko';
echo $template->render($username);
```

### dotEthes
dotEthes is a class that could read .ethes file that contains our environment variables and load it into **$_ENV** superglobal variable. dotEthes library has two main class:

#### DotEthes
DotEthes is one of the main class in dotEthes library that focuses on getting the .ethes filepath and then use Loader class to load all the environment variables into **$_ENV**.
##### Member Variables
```php
protected $filePath;
#path to .ethes file
protected $loader;
#loader class which can parse .ethes file
```
##### Member Functions
```php
public function __construct($path, $file = '.ethes')
#Set $filePath and create new Loader class for $loader variable
public function load()
#Load .ethes variable into $_ENV
public function getFilePath($path, $file)
#Convert to a valid File Path by using rtrim
protected function loadData()
#call $loader load() to parse .ethes file and load it into $_ENV
```

#### Loader
Loader is one of the main class in dotEthes library that focuses on parsing the .ethes file and load it into **$_ENV**.
##### Member Variables
```php
protected $filePath
#path to .ethes file
public $variableNames = array()
#container for all environment variables in .ethes file
```
##### Member Functions
```php
public function __construct($filePath)
#Set $filePath variable
public function load()
#Read from .ethes file per lines and set it as environment variables
protected function readLinesFromFile($filePath)
#Return an array of line on .ethes file
protected function isComment($line)
#Check whether line is a comment or an environment variable
protected function isSetter($line)
#Check whether a line is a setter for environment variable
public function setEnvironmentVariable($line)
#Set environment variable from .ethes into $_ENV
public function clearAllEnvironmentVariables()
#Clear all .ethes environment variables from $_ENV
public function getEnvironmentVariable($name)
#Check whether a variable is already exist or not
```

### JKWToken
JKWToken is a class to generate a 16-bytes random string that will be used as the user's token cookie.
#### Member Function
```php
public function generateJKWToken() {
    return bin2hex(openssl_random_pseudo_bytes((int)$_ENV['JKWTOKEN_BYTES_LENGTH']));
  }
#Generate random string using openssl_random_pseudo_bytes.
```

## Authors
1. Nicholas Rianto Putra - 13516020 - https://github.com/nicholaz99
2. Abram Perdanaputra - 13516083 - https://github.com/abrampers
3. Faza Fahleraz - 13516095 - https://github.com/ffahleraz

## Words from Authors
Thanks to our lovely lecturer Mr. Dr.Techn. Muhammad Zuhri Catur Candra ST,MT for his amazing project about [Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web](http://gitlab.informatika.org/IF3110-2018/tugasbesar1_2018).
> *"You already know how hard it is to build a software right? Do you still want to use pirated softwares?"*
> *- Dr.Techn. Muhammad Zuhri Catur Candra ST,MT*

## References
* [Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web](http://gitlab.informatika.org/IF3110-2018/tugasbesar1_2018)
* [World Wide Web Consortium (W3C)](https://www.w3.org/)
* [Mozilla Developer Network web docs](https://developer.mozilla.org/en-US/)
* [MIT 6.148 Web Development: IAP Class](http://webdevelopment.mit.edu/2018/)
* [CS193X: Web Programming Fundamentals](http://web.stanford.edu/class/cs193x/)
* [Flaticon](https://flaticon.com)
