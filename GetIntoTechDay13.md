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

Classes might also have **constants**, values that are defined on creation and are not changed, they are also static.

To access static data we need to use the `::` notation (known as Paamayim Nekudotayim or Scope Resolution Operator).

```php
class Pen {
  const RED = '#A00';
  const BLUE = '#00A';
  const GREEN = '#0A0';
  private $colour;

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

## Self ##

The `self` keyword is used to refer to the class from inside the class:

```php
class Pen {
  const RED = '#A00';
  private $colour;

  public function __construct($colour = self::RED) {
    $this->colour = $colour;
  }

// Would be the same as:
/*
public function __construct($colour = Pen::RED) {
  $this->colour = $colour;
}
*/
}
```

This can be very helpful to create a new instance of a class from within the context of the class:

```php
class Pen {
  const RED = '#A00';
  private $colour;

  public function __construct($colour = self::RED) {
    $this->colour = $colour;
  }

  public function copy_pen() {
    return new self($this->colour);
  }
}
```
<br/>

## Statics ##

We can use the `static` keyword to give a class a function or variable. These are known as **static variables** and **static methods**. As they are in the class, we cannot use the `$this` keyword to access them, we need to use the class name instead or the `self` keyword.

Static properties or methods are only available at a class level, the instances of the class don't have their own copy of these.

```php
class Pen {
  public static $colour;
  public static function write($message) {
    echo $message, " in ", self::$colour;
  }
}

Pen::$colour = 'red';
Pen::write('hello!'); // hello! in red

$myPen = new Pen();
$myPen->write('hi!'); // hi! in red
```
<br/>


## Classes and types ##

It is common that in OO languages, a class is a type of object.

In php, however, a type is fixed and defined by `gettype()`. When we create an instance of a class and assign it to a variable, this will be of type `object`.

Creating a class means that that class will be a new type of data. It is a complex type, such as an array, which is defined in part by the data it contains.

The `get_class()` function gives you the class name, it accepts a variable that contains an object as a parameter.

The `instanceof` keyword allows you to know if an object belongs to a specific class.

```php
class Cat {
  var $name;
  var $age;
}

$myCat = new Cat();
echo gettype($myCat); // object
echo get_class($myCat); // Cat
echo $myCat instanceof Cat; // 1
```
<br/>

## Inheritance ##

Classes which are **parents** of **child** classes provide everything of **public** and **protected** visibility to the child.

If the child class already has a property or method with that same name, the child will use its own version.

Classes **don't provide private** attributes or methods to its child classes. They might appear in the list of attributes with `var_dump()` but we won't be able to access them or change them with setters/getters.

The parent class is known as a **parent** or **superclass**.

Through **inheritance**, an object can access the attributes of its class, but also the ones of its parent class. This means that, if we try to call a method, the object will first look at the ones available on its immediate class, if it cannot find it, it will try to find it on a parent class, and so on. Once it finds what it was looking form, it stops.

```php
class Feline {
  static $name;
  private $age;
  protected $breed;
  public $boop;

  public function speak() {
    echo 'Meow';
  }
}

class Cat extends Feline {
  public $boop = true;
}

class Lion extends Feline {
  public $boop = false;

  public function speak() {
    echo 'Roar';
  }
}

$genericFeline = new Feline();
$cat = new Cat();
$lion = new Lion();

var_dump($genericFeline);
var_dump($cat);
var_dump($lion);

/*
object(Feline)#1 (3) {
  ["age":"Feline":private]=>
  NULL
  ["breed":protected]=>
  NULL
  ["boop"]=>
  NULL
}
object(Cat)#2 (3) {
  ["boop"]=>
  bool(true)
  ["age":"Feline":private]=>
  NULL
  ["breed":protected]=>
  NULL
}
object(Lion)#3 (3) {
  ["boop"]=>
  bool(false)
  ["age":"Feline":private]=>
  NULL
  ["breed":protected]=>
  NULL
}
*/
```
<br/>

## Type hints and Type declarations ##

It is possible to use **class names** or **types** to restrict the values a function can accept as parameters.

These types are known as hints before PHP 7. From PHP 7 they have been named type declarations instead.

```php
function length(array $values) {
  return count($values);
}

function call(callable $fn) {
  return $fn();
}

function allowed(bool $condition) {
  return $condition ?? !$condition;
}

function say(string $message) {
  echo $message;
}

function exp(int $base, float $power) {
  return $base ** $power;
}
```

**Self** can also be passed as a type declaration, meaning that the type will be the class where the function is:

```php
class Cat {
  function new2(self $new_cat) {
    return new $new_cat();
  }
}

$cat1 = new Cat();
$cat2 = $cat1->new2($cat1);

var_dump($cat1);
var_dump($cat2);

/*
object(Cat)#1 (0) {
}
object(Cat)#2 (0) {
}
*/
```

Additionally, when a class is specified in a type declaration, that means that its **child** classes will also be accepted:

```php
class Feline {}
class Cat extends Feline {}
class Lion extends Feline {}

function withFeline(Feline $feline) {}
function withCat(Cat $cat) {}

$feline = new Feline();
$cat = new Cat();
$lion = new Lion();

withFeline($cat); // this works because a cat is a feline as well
withCat($feline); // this doesn't work because a feline doesn't have to be a cat
withCat($lion); // this doesn't work because a lion is not a cat
```
<br/>

## Polymorphism ##

**Polymorphism** means to have many forms. An example of this is that an object might belong to many classes at the same time, because they have been extended.

This kind of polymorphism is known as **covariance**, which implies that any object of a child class is also of the type of the parent.
<br/>
<br/>

## Visibility, getters/setters ##

With the visibility of an attribute or a method we indicate how it can be accessed:

- **Public** attributes and methods can be accessed anywhere, from inside and outside an object, as well as from child classes. As default all attributes and methods are public.

- **Private** attributes and methods can only be accessed from inside the object. They are not accessible by the children of the class.

- **Protected** attributes and methods can be accessed inside the class, but also by the children of the class.
<br/>

## Immutable objects ##

We have two principles that help us design objects in regards to their state:

1. Only the **objects methods** should change the state of an object.

2. When possible the objects should be **immutable**, they should not change their state. This makes the objects very predictable and easy to debug. An immutable object sets its data in the constructor, and they always maintain the state. If they need to change their state, a new object will be created with the new state.

```php
// Example 1
class Cat {
  private $name;

  function set_name($name) {
    $this->name = $name;
  }
}

// Example 2
class Cat {
  private $name = 'Sam';

  function __construct($name) {
    $this->name = $name;
  }
  function update_name($name) {
    return new self($name);
  }
}

$cat1 = new Cat('Sam');
$cat2 = $cat1->update_name('Cath');

var_dump($cat1);
var_dump($cat2);

/*
object(Cat)#1 (1) {
  ["name":"Cat":private]=>
  string(3) "Sam"
}
object(Cat)#2 (1) {
  ["name":"Cat":private]=>
  string(4) "Cath"
}
*/
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
