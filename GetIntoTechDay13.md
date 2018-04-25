# Get Into Tech: Day 13 #

## Object Oriented Programming (OOP) ##

So far, the PHP programming we have done has been sequential. PHP is a language that can combine data and behaviours into objects.

OOP allows us to encapsulate code.
<br/>
<br/>

## Objects and Classes ##

When we create a `class`, we can create an instance of that class in the form of an object.

Classes are blueprints for objects, which define what **attributes** and what **methods** the objects will have. These are known as **members**.

```php
$bluePen = new Pen('blue');
$bluePen->write('Hello');
```

The usual layout of a class in PHP is:
- First the attributes
- Then the constructor method
- The methods
- Special methods (with leading `__`)

```php
class Pen {
  private var $colour;
  public function __construct($colour) {
    $this->colour = $colour;
  }
  public function write($message) {
    echo $message, "(in $this->colour ink)";
  }
}
```
<br/>

## Constructors ##

When we create an instance of a class with the `new` keyword, we can pass information to the `constructor` function of the class. This is a special function that initialises the object using the data passed as a parameter.

A constructor is a function that is responsible for making sure that an object has the values required for its attributes.

```php
class Pen {
  private var $colour;
  public function __construct($colour) {
    $this->colour = $colour;
  }
  public function write($message) {
    echo $message;
  }
}
```
<br/>

## Visibility ##

The data in an object might be **private**, meaning that it can only be used internally. If we try to access it from outside the object we would get an error.

If they can be accessed from outside the object, then they are **public**.

Any new attributes that we add to an object will be public by default.

```php
$bluePen = new Pen('blue');

echo $bluePen->colour; // ERROR: private!

$bluePen->name = 'Bic';
echo $bluePen->name; // 'Bic'
```
<br/>

## The `$this` keyword ##

This is polymorphous keyword. That means it's different depending on the context where you use it. When we use it inside an object, `$this` refers to the object where we are.

For example, when we use `$this` inside an object's method, it references the object that owns the method.
<br/>
<br/>

## Returning data from methods ##

Methods are functions, therefore they can return data, return objects, call other functions, or simply do nothing.

You can also return `$this` inside a class, it's the same as returning the object itself.

This is something that would be used in functional programming, and is known as **fluid chaining**.

```php
class Pen {
  private var $colour;
  public function __construct($colour) {
    $this->colour = $colour;
  }
  public function write($message) {
    echo $message;
    return $this;
  }
}

$bluePen->write("Hello")->write(" ")->write("world!"); // 'Hello world!'
```
<br/>
<br/>

## Destructors ##

PHP provides a special method known as a **destructor**. It's rarely used, and is called when there are no more references to an object (for example, if it goes our of scope).

The destructor function doesn't remove the object itself, but does something before the object is removed.

```php
class Pen {
  private var $colour;
  public function __construct($colour) {
    $this->colour = $colour;
  }
  public function __destruct($message) {
    echo "The object was destructed";
  }
}
```
<br/>

## Constants ##

Classes might also have **constants**, values that are defined on creation and are not changed, they are static.

To access static data we need to use the `::` notation (known as Paamayim Nekudotayim or Scope Resolution Operator).

```php
class Pen {
  const RED = '#A00';
  const BLUE = '#00A';
  const GREEN = '#0A0';

  public function __construct($colour) {
    $this->colour = $colour;
  }
  public function __destruct($message) {
    echo "The object was destructed";
  }
}

$myPen = new Pen();
echo $myPen::RED; // '#A00'
```
<br/>

## Tips for Git ##

```
ls -a shows hidden files and folders
cd to the folder
git init
git add .
git status
git commit -m "Comment"
git status
git push origin me @reponame/github.com
```
