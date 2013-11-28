# PhpRestDoc

## What is PhpRestDoc ?

PhpRestDoc is a simple-to-install and simple-to-use REST API Documentation generator written in PHP. This is a manual generator, which means that you need to manually create and update the documentation.

## Prerequisites

* PHP 5 or greater
* PHP MySQLi Extension
* Writable include/ directory (but you can also manually write include/config.php file)

## Intallation

Just copy/paste all files in your PhpRestDoc directory and type the URL (i.e. http://example.com/phprestdoc/) to launch the One-Step-Installation.

If you can't make /include writable, here is what your /include/config.php file must look like :
```php
<?php
	$mysql_server = "<the address of your MySQL server>";
	$mysql_username = "<your MySQL username>";
	$mysql_password = "<your MySQL password>";
	$mysql_database = "<the name of MySQL database you want to user for PhpRestDoc>";
	$mysql_prefix = "<a unique prefix for PhpRestDoc MySQL tables>";
	$key_password = "<a unique passphrase>";
	$key_session = "<another unique passphrase (different from $key_password)>"";
?>
```
Once you've written it, you just have to reload the PhpRestDoc page.

## License

(The MIT License)

Copyright (c) 2013 [Hunear] (https://hunear.com)  
Copyright (c) 2013 [Ivan Gabriele] (https://twitter.com/ivan_gabriele)  

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.