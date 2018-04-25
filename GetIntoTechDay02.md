# Get Into Tech: Day 2 #

## Email ##

The information about an email address was sent with a bang path (now deprecated):
```
peter!uxcit2!hey!abc
```

Bang paths were used to specify hops to get from some assumed-reachable location to the addressee, each hop is signified by a bang sign.

The path `...!bigsite!foovax!barbox!me` directs people to route their mail to bigsite (presumably a well-known location accessible to everybody) and from there to foovax, and to the account of user me on barbox.

The problem with this is that if we remove some of the information, then it's impossible to know where the email is going:

```
peter!uxcit2!*missing*!abc
```
<br/>

### SMTP: Location-independent addressing ###

Created by Jon Bruce Postel, it's the email standard we use nowadays, known as *Simple Mail Transfer Protocol* (SMTP).

**MX:** Mail exchanger. The Mail Exchanger Record is in the DNS and specifies responsible for accepting email addresses sent to an address. We use an IP address to get a mail provider that handles our email (i.e. @google).

**A:** Address. The actual address to which we send the email (i.e. natalia.fpintos).

All email goes through port 25. The protocol starts with `HELO` instead of `GET` like HTTP. When we finish the connection, it finishes responding with `Bye`.
<br/>
<br/>

## Ports, Hosts and services ##

You can have different machines that run your own DNS, web services, email services. But you can also have everything in the same server, and that's when ports are used in order to send information to the right places.

- **HTTP** is agnostic, it doesn't remember you (forgetful).
- To remember things in the web we use **global sessions**.
- **DNS** and **SMTP** instead can remember you in successive requests.
<br/>

### Ports ###

In programming, a port is a connection point and the way a client program specifies which server program it wishes to target. Port numbers range from 0 to 65535. Ports 0 to 1024 are reserved for use by certain privileged services.

The ports information is in the root, in a folder named **etc**.
`/etc/services` is the file that contains all the ports.
If we edit this the ports for each service can be changed.

- **20 - FTP-data:** to send data through FTP
- **21 - FTP:** to communicate with an FTP server
- **22 - SSH:** Secure shell, an encrypted terminal
- **23 - telnet:** is a protocol that you can use to access any protocol
- **25 - SMTP:** (email)
- **53 - DNS**
- **80 - HTTP**
- **123 - network time:** the most accurate time
- **443 - HTTPS**
- **512 - WKS (well known services):** a list of services that need to be remembered.
- **666 - Doom:** Port for Doom game
- **8080:** a port that is generally unused, so we normally use it to run our web services.

`/etc/hosts` is the file that contains the hosts information. It should contain the localhost IP. In the early years of the internet, it was used as an "address book" to keep the hosts addresses with the names assigned to them (i.e. 10.21.31.1 Claire). That way we can simply ping Claire and that will ping that IP address.

All technological devices have a hosts file. This file is checked before the DNS in case there's an address there instead. This way, if we substitute our localhost address with another domain, we can remove access to it:

```
 127.0.0.1 www.facebook.com
```
This would impede access to facebook.

```
8.8.8.8 www.facebook.com
```
This will redirect facebook enquiries to google.

This can be overridden by typing the IP address of the website we want to access in the address bar instead.
<br/>
<br/>

### TCP vs. UDP ###
UDP is a very quick but inaccurate/less safe delivery service, TCP is slower but very accurate/safer, has guaranteed delivery.

We normally use port 53 (DNS) with UDP as it's quicker and we don't need to visit it with such detail every time.

i.e. when some packets are lost (via UDP) we might get a blurry image when we stream a movie, or bad sound in a Skype call. UPD doesn't send back the missing packets, it just tries to send quickly the information as there's no point in sending it later.

i.e. if we send an Excel file (via TCP) if a packet doesn't arrive and it's not re-sent, the file is corrupted.
<br/>
<br/>

### MAC address ###
This is the actual individual address of the device. It is a criminal offence to change the MAC address of a device in the UK.
<br/>
<br/>

### VPN ###
**Point to point VPN:** Connections that are from one device to another directly, the transfer of information is encrypted.

**Remote access VPN:** These connect individual hosts to private networks, also in an encrypted way.

VPN can be used to create a network of many devices that protect each other for privacy. It's known as **The Onion Router (TOR)** due to the layers it has protecting it. It is a legal service per se.
The network implies that the devices are used to send information across, so when you join, other people's data is sent encrypted through it.
<br/>
<br/>

### Proxy ###

It's a device that acts on your behalf. It acts as an intermediary between an endpoint device, such as a computer, and another server from which a user or client is requesting a service.
<br/>
<br/>

### Torrents ###

Each device in the network shares a bit of the data downloaded. These can be infected by including malicious software inside the downloaded data (like a movie with a trojan).

This is known as **Steganography**, that is, the practice of concealing a file, message, image, or video within another file, message, image, or video.
<br/>
<br/>

## HTTP requests ##

### GET ###

Requests sent through GET can be seen in the URL, the data is public.
GET requests can be used to request and receive data.
As the data is public, it's changed in the URL too.
There is a limit as how much data we can send un an URL so it's also a problem to use GET to send a lot of information.

GET requests look like this:

```
GET /folder/file.html HTTP/1.1
```

- **GET** -> the request method
- **/folder/file.html** -> what we are requesting
- **HTTP/1.1** -> what language we are speaking and the version

The response we receive is:

```
HTTP/1.1 200 OK
Date: Thu, 31 Mar 2016 23:59:59 GMT
Content-Type: text/html
Content-Length: 1354

<html><body><h1>The file!</h1></body></html>
```

- **HTTP/1.1** -> the language we confirm to respond in
- **200** -> the response code
- **OK** -> the description of the response code
- The following lines are a **MIME-like** (Multipurpose Internet Mail Extension, since 1993, enabled sending pictures) messages.
- We have an **empty line**, and then the **contents** we requested.
<br/>

### POST ###

POST requests send packets to send the information in a secure and private way. These requests are not cached, cannot be bookmarked and don't have length restrictions.
<br/>
<br/>

### Web clients and Web servers ###

**Web client software:** Chrome, Firefox, Safari, IE and Opera.

The purpose these is to send HTTP requests and to display the response. If it's a web page, the data is parsed and displayed to the user as a website. Web browsers live on machines we call *"clients"*.

**Web server software:** Apache, Microsoft’s Internet Information Server (IIS), Google Web Server (GWS) and nginx (pronounced Engine X).

These receive HTTP requests and determine what HTTP response should be sent. Web server software lives on machines called *"web servers"*.
<br/>
<br/>

## PHP ##

The original acronym of PHP was **Personal Home Page**.
PHP now stands for **PHP Hypertext Pre-processor**.

Web servers speak HTTP to send documents written in HTML (and others).

On a server there will classically be installed four pieces of technology: an operating system, a web server, a programming language interpreter and a database.

In the PHP world these four are often known as "LAMP": Linux, Apache, PHP, MySQL.

1. When a client sends a request to a server, the operating system receives the bytes sent across the network. The operating system then passes these on to the web server (e.g. Apache) to handle.

2. If it is a request for a PHP website, Apache will ask the PHP interpreter to run the commands associated with this request.

3. PHP may then itself query a database to gather or save data relevant to the web site. PHP may also process files from the file system such as reading or writing files and PHP may interact with a mail server to send an email.

4. When PHP is done it sends its output back to the web server which sends it (via the operating system) across the network back to the client.

The request starts at the client machine, flows through the web server’s OS, through PHP which may request services from other parts of the system and then PHP formulates a response which it sends back to the web server which in turn sends the response to the client where the browser software will parse and display the results.

PHP is an **interpreter**.

PHP powers Wordpress and 80% of the web.
<br/>
<br/>

## Exercise 3: tech relevance ##

Relevant to the server: because the client doesn't need to know what is our server or database.
- **Apache:** HTTP web server
- **MySQL:** open-source relational database management system (RDBMS)
- **nGinX:** free, open-source, high-performance HTTP server, reverse proxy, and IMAP/POP3 proxy server
- **ISS:** extensible web server created by Microsoft for use with the Windows NT family

Relevant to the server and the client (web browser): because those are the languages used to communicate between server and client.
- **HTML:** HyperText Markup Language used to organise content in the web browser. The client renders the HTML and the server sends/stores it.
- **CSS:** Cascading Style Sheets used to style the HTML.
- **Javascript:** programming language used to manipulate the data in the website or server.
- **PHP:** programming language used in the server side. Communicates information to the client.

Relevant to the client (web browser): these are only relevant to the client because they use the data to display it to the user.
- **Chrome:** Google browser, a client.
- **Firefox:** Mozilla browser, a client.
- **Microsoft Edge:** Microsoft browser, a client.
- **Lynx:** Very first browser for the web, a client.

Relevant to the server and the client (web browser): these are protocols that are used to use the internet. Both need to use these to communicate between themselves.
- **DNS:** Domain Name Service, contains the corresponding IP addresses for the different domains.
- **HTTP:** HyperText Transmission Protocol.
- **TCP:** Transmission Control Protocol.

Relevant to the client: used by the client to request information from a server.
- **HTTP Request methods:** GET and POST. There are others, such as PUT (used in IE5 to allow dragging and dropping files).
<br/>

## Introduction to PHP ##

PHP was created in 1994 and released in 1995. Currently in version 7.

It's called a pre-processor because it allows us to interact with the HTML and add value to it, make it dynamic.

PHP runs for the life of a PHP request, then it "dies". Makes memory very efficient and scalable.

It has many libraries which make it easy to use features others have written before.

HTTP parses (checks the structure of the language and identifies the components) HTTP requests into data and makes it available for use.

PHP is a server-side scripting language, designed for web development. But is also used as a general-purpose programming language.
<br/>
<br/>

## PHP Documentation ##

```
http://php.net/docs.php
```

There are different ways we can organise a php file:
```php
<?php
echo "hi";
```

This is an orphaned bracket, we don't close it because it means that from there onwards everything is PHP.

```php
<?php
echo "hi";
?>
```
We can close them if we want to use different code that is not PHP in the same file.

```php
<?="hi";
?>
```
We can also omit php and echo with a PHP short output tag.


## PHP in the command line ##

REPL: Read–Eval–Program Loop

```
https://repl.it
```

This allows us to try some code without doing all the installations in our machine.


## PHP Basics ##

All PHP statements end with a semicolon.

PHP functions only do one thing (i.e. date()).

```php
The date today is <?php echo date('d-m-Y'); ?>
```

```php
The date today is <?= date('d-m-Y'); ?>
```
<br/>

## Netbeans & Apache ##

We use NetBeans as our IDE (Integrated Development Environment), a software application that provides facilities to develop software. It includes a source code editor, automation tools and a debugger. Most of them also have intelligent code completion (autocomplete help).

When creating a project in NetBeans, we need to make sure we add it to htdocs, so it's in our XAMPP server. XAMPP expects all our PHP files to be in /Applications/XAMPP/htdocs

We also need to make sure our source folder includes a folder for our project, with the same name.

![NetBeans new project](/images/NetBeansProject.png)

We can create Command Line or Web projects, depending on which type of project it is, it will run in a different place.


We will be using XAMPP to run our server.

PHP also has it’s own built-in web server that can be started from a command line / terminal using the following command:

```
php –S localhost:8080
```
<br/>


## PHP echo ##

The `echo` statement is one way to get output to the screen. It can take multiple parameters and can be used with or without brackets: echo or echo().
<br/>
<br/>

## PHP & HTML ##

PHP generates an HTML file for us, but then it's up to the browser to interpret this file, so even if we use `\n`, even if we would get the line break in our HTML file, it won't display as such in the browser, as it needs a <br> tag in order to display appropriately.

We can also use `PHP_EOL` instead of `\n` to create a new line. This creates a new line with the appropriate character for the OS where the script is running.
<br/>
<br/>

## PHP configuration ##

The PHP interpreter is configurable with an external `ini` file. This file can prevent certain operations from running, turn off features, and even inject code before and after scripts run.

Most important configuration options can now be set in the PHP script itself, using `ini_set()` (among other options). There are also specific functions like `error_reporting()` which sets how sensitive PHP will be to programming mistakes and errors.


**Questions:**
1. What does PHP_EOL behave like in the web?: \n
2. What does PHP mean?: PHP Hypertext Pre-processor
3. Mention 3 methods of the HTTP language: GET, POST, PUT
4. Who or what is the HTTP method relevant to: both
5. What is an IDE and an example? Development environment, Integrated Development Environment, NetBeans
6. What is Agile, and what is its aim?: a way of working that lets you have a functional product quicker, and make it better through iterations.
