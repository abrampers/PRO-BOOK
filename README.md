<img src="https://i.imgur.com/mutklIu.png">

Pro-Book 
&middot;
[![GitLab license](https://img.shields.io/github/license/Day8/re-frame.svg)](license.txt)
![Build Pass](https://img.shields.io/badge/Linux%2FOSX%20Build-passing-brightgreen.svg)
![Downloads](https://img.shields.io/badge/downloads-1m-brightgreen.svg?longCache=true&style=flat)
=====
> A book is both a usually portable physical object and the body of immaterial representations or intellectual object whose material signs—written or drawn lines or other two-dimensional media—the physical object contains or houses. Pro-Book is an online book store that allows user to buy books and give reviews to their purchased books.

## Table Of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Run Pro-Book](#run-pro-book)
- [Features and advantages of this project](#features-and-advantages-of-this-project)
- [Authors](#authors)
- [Words From Authors](#words-from-authors)
- [References](#references)

## Introduction
This is the implementation of a web-based online book store using **PHP**. It is open-source and everyone could contribute to probook by creating pull request.
#### *Creating an online book store has never been so easy*
**Online Book Store Template** - This web-based online book store template is your solution to start your own online book store.

#### *What's the point of Pro-Book?*
Pro-Book wants to contribute to community by creating this open-source project about web-based online book store. Young entrepreneurs can start their own online book store business by cloning this repository and deploy it on their own servers. 

#### *Why should I care?*
Because Pro-Book is for *people* :tada:. You have contributed to community by cloning or creating a pull request on this Pro-Book projects.

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

## Run Pro-Book
Run this command on your terminal
```
php -S localhost:5000
```

## Features and Advantages of This Project
#### List of Features
- **Browse** : You can search any books do you want and view its detail. The detail contains title, author, synopsis, cover, ratings, and list of reviews. 
- **Order** : When you on the book's detail page, you can order the book by choosing the amount of the book and click on the Order Button.
- **History** : You can see your history of orders.
- **Review** : On your history page, you can click **review** button in order to give review about your purchased books. You can give the rating and comment about the book.
- **View Profile** : You can view your profile on the profile page.
- **Edit Profile** : On the profile page, you can click **edit** button and change some personal information about you. You are allowed to change your profile picture, name, address, and phone number.

#### Advantages of this project
We build this project from **scratch**. We **create** our own library to support this project. They are scalable and easy to use. List of our own library:
- [**Router**](#router)
- [**Request**](#request)
- [**MarufDB**](#marufdb)
- [**jQowi**](#jQowi)
- [**Template Engine**](#templateengine)
- [**dotEthes**](#dotethes)
- [**JKWToken**](#jkwtoken)

#### List of Libraries
Here is the documentation about our own library. We will tell you about its functionality and how to use it.
##### Router
##### Request
##### MarufDB
This is the library for Pro-Book Database. It is a PDO-MySQL Connection Class that contains some functions to help us doing CRUD Operation on our Database.
###### Member Variables
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

###### Member Function
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
public function checkLogin($username, $password) #Check whether user has the correct combination of username and password or not when they try to login into Pro-Book.
public function searchBook($title) #Get all books where $title is a substring on their title.
public function addToken($user_id, $token) #Add user token to Pro-Book Database, so user doesn't need to login as long as the cookie expired time.
public function checkToken($token) #Validate user token whether the token has already expired or not.
public function validateUsername($username) #Check if the username isn't on the database yet.
public function validateEmail($email) #Check if the email isn't on the database yet.
public function orderBook($book_id, $user_id, $amount, $order_timestamp) #Insert order detail into Orders Database when user purchases a book.
public function addProfile($name, $username, $email, $password, $address, $phonenumber) #Register a new account into Users Database.
public function editProfile($name, $address, $phonenumber, $user_id) #Save edited user's data into database.
public function getHistory($user_id) #Get list of orders history users.
public function getBookIdByOrderId($order_id) #Get BookId by OrderId.
public function getBookDetail($book_id) #Get book detail by bookId,
public function addReview($user_id, $username, $book_id, $rating, $comment, $order_id) #Insert user's review into database.
public function getReviews($book_id) #Get list of reviews by bookId,
```
##### jQowi
##### Template Engine
##### dotEthes
##### JKWToken

## Authors
1. Nicholas Rianto Putra - 13516020 - https://github.com/nicholaz99
2. Abram Perdanaputra - 13516083 - https://github.com/abrampers
3. Faza Fahleraz - 13516095 - https://github.com/ffahleraz

## Words from Authors
Thanks to our lovely lecturer Mr. Dr.Techn. Muhammad Zuhri Catur Candra ST,MT for his amazing project about [Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web](http://gitlab.informatika.org/IF3110-2018/tugasbesar1_2018).
> *"You already know how hard it is to build a software right? Do you still want to use pirated softwares?" - Dr.Techn. Muhammad Zuhri Catur Candra ST,MT*

## References
* [Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web](http://gitlab.informatika.org/IF3110-2018/tugasbesar1_2018)
* [World Wide Web Consortium (W3C)](https://www.w3.org/)
* [Mozilla Developer Network web docs](https://developer.mozilla.org/en-US/)
* [MIT 6.148 Web Development: IAP Class](http://webdevelopment.mit.edu/2018/)
* [CS193X: Web Programming Fundamentals](http://web.stanford.edu/class/cs193x/)
* [Flaticon](https://flaticon.com)