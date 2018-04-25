# Get Into Tech: Day 4 #

## CSS: Cascading Style Sheets ##

CSS is used to define styles for your web pages, including design, layout and variations in display for different devices and screen sizes.

The CSS styles are usually saved in external `.css` files.

Cascading means that styles cascade from one style sheet to another, enabling multiple style sheets (i.e. specific style sheets for Printers).

CSS syntax is made of selectors and declaration blocks that include properties and values, each ending with a semicolon.

```css
h1 {
  color: pink;
  font-size: 22px;
}
```
<br/>

## Print CSS ##

The printer layout information is in a print CSS file that specifies the layout of the website for a printer. The media needs to be `print` so the CSS is only used for the printer and not the display.

```html
<!-- Include Print CSS -->
<link rel="stylesheet" href="URL to your print.css" type="text/css" media="print" />
```
<br/>

### CSS selectors ###

**Basic Selectors**

Name               | Example | Description
------------------ | ------- | ---------------------------------
Type selector      | p {}    | Selects all elements of that type
Multiple selector  | p, a {} | Selects all elements of the types
Universal selector | * {}    | Selects all elements
Class selector     | .top {} | Selects elements with this class
id selector        | #top {} | Selects elements with this id


**Advanced Selectors**

Name                  | Example  | Description
--------------------- | -------- | ---------------------------------
Element with class | p.red {} | Selects the elements specified that have that class
Element with id | p#blue {} | Selects the elements specified that have that id
Descendant selector | p span {} | Selects the elements that are any kind of descendant of the parent (`<spans>'s` inside `<p>`'s)
Direct descendant selector | p > span {} | Selects the elements that are direct descendants of the parent (`<spans>'s` direct children of `<p>`'s)
Adjacent sibling selector | p + span {} | Selects the elements that are adjacent siblings (`<spans>'s` right next to `<p>`'s)


**Attribute Selectors**

Type                   | Example    | Description
---------------------- | ---------- | -----------------
Element with attribute | a[href] {} | Selects elements that have the attribute between []
Element with attribute and value | img[src="logo.jpg"] {} | Selects elements that have the attribute and exact value between []
Element with attribute and contains value | p[class~="red"] {} | Selects elements with the attribute and the value contains the specified content
Attribute selector | [class] {} | Selects any element with the attribute between []
<br/>


### Adding CSS to a page ###

We can add CSS stylesheets to a web page in different ways:

**External style sheet:**
Each page of a website must include a reference to the external stylesheet in a `<link>` element, inside the `<head>` section.
```html
<link rel="stylesheet" type="text/css" href="styles.css">
```
<br/>

**Imported style sheet:**
We can import a stylesheet into another stylesheet using `@import`. This rule must be the in your css file. This can be used to load external fonts.
```html
<style type="text/css">
  @import url("styles.css");
</style>
```
<br/>

**Internal style sheet:**
Internal stylesheets can be used a page with a unique style. These go inside the `<style>` element, inside the `<head>` section of an HTML file.
```html
<style type="text/css">
  p {
    color: blue;
  }
</style>
```
<br/>

**Inline style:**
It can be used to apply a unique style for a single element. This is not recommended as we lose the benefits of using stylesheets.
```html
<p style="color: blue">Hi</p>
```
<br/>

### CSS Inheritance and Specificity ###

Though CSS styles can be specified in many ways, they will all cascade into one virtual style sheet in the end.

All HTML elements inherit properties from their parent elements and pass them on to their children. This is known as **inheritance**. Not all styles are inherited (i.e. margin, border and padding styles are not inherited).

Sometimes conflicting CSS rules might happen, and the final style applied is decided by the **specificity** rules.

The simple order of style cascading is (less to more specific):
1. **External stylesheet** - overrides the browser default
2. **Imported stylesheet** – overrides the linked stylesheet
4. **Internal style** – overrides the imported stylesheet
5. **Inline style attribute** – overrides internal styles
<br/>

### CSS Colours ###

In CSS we can specify colours using:
- **Colour names:** red, crimson, indianred, firebrick...
- **RGB values:** rgb(255,0,0)
- **Hexadecimal values:** #ff0000
- **HSL values:** Hue, Saturation, and Lightness hsl(0, 100%, 50%)
- **HWB values:** Hue, Whiteness, Blackness hwb(0, 0%, 0%)
<br/>

## Responsive web design ##

The design of a website should be responsive and adapt to the screen size of the user, orientation and platform.

This is achieved with a mix of flexible grids and layouts, images and an intelligent use of CSS media queries. The aim of Responsive Web Design is to make your web page look good on all devices: desktops, tablets, and phones. The most widely used responsive framework is **Bootstrap**.
<br/>
<br/>

## Bootstrap ##

Bootstrap at Twitter and released as an open source product in 2011 on GitHub.

It's the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first web sites.
- Easy to use
- Responsive features: CSS that adjusts to phones, tablets and desktops
- Mobile-first approach: mobile-first styles are part of the core framework
- Browser compatibility: is compatible with all modern browsers
<br/>
<br/>


### Using Bootstrap ###

You can download it and include it in your website files, or reference it from a Content Delivery Network (CDN).

Bootstrap has dependencies on various JavaScript libraries so we need to reference those too. We need to add the link to the Bootstrap CSS before any other style sheet link in the `<head>` section.

It is to reference JavaScript libraries at the bottom of the file (above the closing `</body>` tag) to improve page load performance.

Links to jQuery and Popper.js need to appear first, as the JavaScript plugins depend on them.

Using **Bootstrap CDN** has the advantage that many users already have downloaded Bootstrap from MaxCDN when visiting other sites, so it will be loaded from cache when they visit your site. Also, most CDNs will make sure the file requested is served from the closest server closest, which leads to faster loading time.

Bootstrap needs the HTML5 doctype as well as the lang attribute and the correct character set.

To enable responsive design for mobile devices, add the following `<meta>` tag inside the `<head>` element:
```html
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
```
<br/>


## PHP Syntax ##

PHP files have a `.php` extension. The script is executed on the server, and the HTML result is sent back to the browser.


## Comments in PHP ##

```php
// Line Comment
# Line Comment

/*  Multi
*   Line
*   Comment */

/** This is a documentation Comment */
```
<br/>

## Variables in PHP ##

The name must start with a letter or an underscore. They only admit letters, numbers and underscores. Defined with a `$` at the beginning. They are also case-sensitive.

Their default value is `null`.

```php
$name = 'Nat';
$_age = 28;
$name2 = 'Carol';
$last_name = 'Smith';
```
<br/>

## Strings ##

PHP does **interpolation** (substitution) of variables inside strings with double quotes. The interpolation only works with double quotes.

We can print **literal** strings using single quotes. These print literally the contents of the string.

```php
$dog = 'Yoko';
$human = 'Nat';

echo "$dog and $human are friends\n";
// Yoko and Nat are friends

echo '$dog and $human are friends\n';
// $dog and $human are friends\n
```

PHP also does **concatenation** of strings using `.`.

```php
$message = 'Hi ' . 'there!';
$message = $message . ' How are you?';

echo $message;
// Hi there! How are you?
```

When this happens, PHP turns the values to be joined and converts them to strings.

```php
$colour = "red";
$message = 'I like the colour ' . $colour;

echo $message;
// I like the colour red


$colour = "red";
$message = "I like the colour $colour";

echo $message;
// I like the colour red
```

Using the comma `,` syntax is not really concatenating, it's creating a list of parameters. For this reason we can execute the sum.

```php
echo 'I use "echo" to sum: ' . 2 + 3;
// Error

echo 'I use "echo" to sum: ', 2 + 3;
// I use "echo" to sum: 5
```
<br/>

## Hoisting ##

PHP doesn't hoist variables, so it needs a variable to be declared and initialised in order to use it.
<br/>
<br/>


## Echo ##

Echo takes an argument, converts it into a string and prints it. This can be a problem as sometimes it causes unexpected results:

```php
echo true; // 1
echo false; // **nothing, an empty string ''**

echo [1, 2, 3]; // Array

echo 1, 2, 3; // 123

echo 2 * 3 + 3 * 5; // 21

echo "\t"; // **a tab**
echo '\t'; // \t
```
<br/>

## Casting ##

Casting is used to determine the data type to a specific type of data.

```php
echo (int) 1.8;
// 1

echo (float) 2;
// 2.0

echo (bool) 0;
// false
```
<br/>

## Data types ##

- **null:** value of nothing.
- **resource:** a file or image.
- **string:** can either be literal or interpolated.
- **integer:** whole numbers.
- **float:** decimal point numbers.
- **boolean:** true/false.
- **array:** must be of the same type.
- **object:** collection of key/value pairs.

The special **resource** type is not an actual data type. It stores a reference to functions or resources external to PHP (i.e. a database call).

Tip: we can use numbers to the exponent with the letter E:

```php
$big_num = 6E7;
echo $big_num; // 60000000
```
<br/>

## var_dump ##

The `var_dump()` function is used to get information about a variable. It provides the value of the variable and data type, as well as other useful information such as the length or the structure of the array.
<br/>
<br/>

## Null ##

If we assign something a value of `null`, it will eventually be dereferenced so we don't use that space in memory.
<br/>
<br/>

## Constants ##

We can also declare constants with the keyword `const`.

```php
const salutation = "hi";
```

An example of a built-in constant is `PHP_EOL`, it prints the new line character for the OS (it can be different for Mac, Windows or Linux).
<br/>
<br/>

## Operators ##

Type       | Operators                | Example
---------- | ------------------------ | -------
Arithmetic | + - * / **               | 1 + 1
Comparison | < > <= >= == === != !==  | 2 > 3
Assignment | =                        | $a = 'a'
Logical    | ! &#124;&#124; &&        | !true
Increment/Decrement  | ++ -- += -=    | $i++    
<br/>

## The $ sign ##

The $ sign has an additional use, they use a string argument and use it to find a variable with that name.

We can also use curly braces to make it easier to understand the use.

```php
$id = "A";
$A = "Lucy";

echo "${$id}\n";
// Lucy

$id = "A";
$A = "Lucy";

echo $$id;
// Lucy
```
<br/>

## Assignment and operations ##

We can assign the result of an operation to a variable in different ways:

```php
$salutation = "Hi";
$salutation = $salutation . ". How are you?"; // Hi. How are you?

$salutation = "Hi";
$salutation .= ". How are you?"; // Hi. How are you?
```

```php
$num = 3;
$num = $num + 5; // 8
$num -=4; // 4 - Known as "Compound operator"
$num++; // 5 - Known as "Increment operator"
```

**Increment** and **decrement** operators can be used as pre-fix or post-fix. The difference is that:
- **Pre-fix** operators `++$x` increment/decrement first and then return the value to be used in the current expression.
- **Post-fix** operators `$x++` return the current value to be used in the current expression and then increment/decrement it.

```php
$x = 1;

echo $x++; // 1
echo $x; // 2

$y = 1;

echo ++$y; // 2
echo $y; // 2
```
<br/>

## Conditionals ##

Conditional statements are used by programs to run different code based on a condition.

We have different conditional statements in PHP:
- **If statement:** evaluates a condition and executes some code if it's true.
```php
if (1 == 1) {
  echo 'one is equal to one'; // This code will run
}
```

- **If... Else statement:** evaluates a condition and executes some code if it's true, or another code if it's false.
```php
if (3 > 7) {
  echo 'three is greater than seven'; // This code will not run
} else {
  echo 'three is not greater than seven'; // This code will run
}
```

- **If... Elseif... Else statement:** evaluates multiple conditions and executes the block of code for the first true condition, otherwise the else block of code is executed.
```php
if (1 > 4) {
  echo 'one is greater than 4'; // This code will not run
} elseif (1 < 4) {
  echo 'one is smaller than 4'; // This code will run
} else {
  echo 'one is equal to 4'; // This code will not run
}
```

- **Switch statement:** tests a value against a list of options and executes the matching code block.
```php
$a = 'a';
switch ($a) {
  case 'a':
    echo $a, ' is equal to a'; // This code will run
    break;
  case 'b':
    echo $a, ' is equal to b'; // This code will not run
    break;

  default:
    echo $a, ' is not equal to a'; // This code will not run
}
```
<br/>

## Built-in functions ##

PHP comes with built-in functions that provide different functionality for the developers.

Functions are a named block of code that can be used repeatedly in a program. Functions can accept input and can also return an output. To execute this code we *call* the function with brackets after its name, optionally passing parameters inside these.

```php
date('D'); // Returns the current day of the week

ucwords('hello world'); // Returns a proper-cased string 'Hello World'

str_replace('.', ' ', 'Hello.World'); // Returns the same string, replacing the character in the first string with the character in the second string, in the third string passed as an argument
```

The arguments passed to a functions are known as:
**"list of formal arguments"** (parameters)
<br/>
<br/>

## Type of variables ##

The `gettype()` function in PHP can be used to get information about the data type of a variable passed as an argument.
<br/>
<br/>

## Mixing types ##

PHP will try to help you, and if you try to add up strings that contain numbers, it will disregard the letters and add the numbers.

It will also concatenate different data types.

```php
echo '12a' + '1.2b';
// 13.2

echo 'false' && true && 1;
// 1

echo true . 'hello' . null . '1.2';
// 1hello1.2
```
<br/>

## PHP Conditions ##

We can evaluate many different values in PHP to see if they are true or false. There are values which are not true or false per se, but can behave like true or false. These are known as 'truthy' and 'falsey'.

Type   | Example
------ | -------
Falsey | '', 0, '0'
Truthy | 'a', 1, '2'

It's important to know what is falsey, as everything else will be truthy. Also, the notion of something being empty is important when dealing with user data.
<br/>
<br/>

## Ternary Operator ##

We can use a **ternary operator** when we want to do a simple if/else statement:

```php
$message = $age < 18 ? 'Young' : 'Adult';
```

There is also a **short ternary operator** which takes only two parameters. In this case, if the condition is true, the expression will be the value of the condition:

```php
echo 1 ?: 2; // 1
echo 0 ?: 3; // 3
```
<br/>

## The NULL coalescing operator ##

This operator can be chained as many times as required, as opposed to the ternary operator, that is only restricted to two outcomes.

When we use this operator, the value of the expression is the first not NULL value. Note that not NULL doesn't mean falsey (i.e. '' counts as not NULL).

This operator is prefferred instead of the ternary operator sometimes because, if the first argument of a ternary operator is undefined, we will get a `NOTICE` error.

We can use the `error_reporting(E_ALL)` statement to instruct PHP to emit all errors raised by the code (except syntax errors, these will block the execution).

```php
$value = null ?? null ?? 1; // 1
$value = '' ?? 1; // ''

// If there is no 'user' element in $_GET we will get a NOTICE error
$username = $_GET['user'] ?: 'guest';

// This picks the first not null value
$username = $_GET['username'] ?? $_POST['username'] ?? 'Guest';
```
<br/>

## Optional braces ##

Curly braces are optional in PHP when we are writing if/elseif/else statements that only have one line of code per statement. However, this is not a recommended practice.

```php
if (1 < 2)
  echo "1 is less than 2";
else
  echo "1 is not less than 2";
```
<br/>

**Questions:**
1. var_dump(): returns the data type and value of a variable
2. SSH port number: 22
3. What is MIME
4. How many ports are known as well-known services: 512
5. 3 examples of metadata: title, author, link
