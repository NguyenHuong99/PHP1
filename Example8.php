<?php
include 'CodeSnippetSS3.php';
use Day1\{Boston, NewYork};
use function Day1\{foo1, foo2};
$d = new Boston();
$d->say();
$n = new NewYork();
$n->say();
foo1();
foo2();
?>

