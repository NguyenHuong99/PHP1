// Session 3
// Code Snippet 1
<?php
// Code Snippet 1
echo 8/3, "\n";
echo intdiv(8,3), "\n";
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 2
<?php
// Code Snippet 2
$x = 1;
$y = 2;
echo $x.'<=>'.$y,' Returns ', $x <=> $y;
// This will output -1
echo '</br>';
$x = 10;
$y = 10;
echo $x.'<=>'.$y,' Returns ', $x <=> $y;
// This will output 0
echo '</br>';
$x = 10;
$y = 5;
echo $x.'<=>'.$y,' Returns ', $x <=> $y;
// This will output 1
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 3
<?php
// Code Snippet 3
$x = "Cat";
$y = "Dog";
echo $x.'<=>'.$y,' // Returns ', $x <=> $y;
// This will output -1 because Cat is less than Dog.
echo '</br>';
$x = "PHP";
$y = "PHP";
echo $x.'<=>'.$y,' // Returns ', $x <=> $y;
// This will output 0 because both strings have same value.
echo '</br>';
$x = "COMPUTE";
$y = "APPLE";
echo $x.'<=>'.$y,' // Returns ', $x <=> $y;
// This will output 1 because "COMPUTE" is greater than APPlE.
echo '</br>';
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 4
<?php
// Code Snippet 4
$x = array();
$y = array();
echo 'array()'.'<=>'.'array()'.' Returns ', $x <=> $y;
// This will output 0
echo '</br>';
$m = array(1,2, 3);
$n = array(1,2, 3);
$p = array(1,2, 1);
$q = array(1,2, 4);
echo 'array(1,2,3)'.'<=>'.'array(1,2,3)'.' Returns ', $m <=> $n;
// This will output 0
echo '</br>';
echo 'array(1,2,3)'.'<=>'.'array()'.' Returns ', $m <=> $x;
// This will output 1
echo '</br>';
echo 'array(1,2,3)'.'<=>'.'array(1,2,4)'.' Returns ', $m <=> $q;
// This will output -1
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 5
<?php
// Code Snippet 5
$name = $first_name ?? "Guest";
echo $name;
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 6
<?php
// Code Snippet 6
function e() {
    echo "This is e() \n";
};
function f() {
    echo "This is f() \n";
    return e;
};
function g() {
    echo "This is g()\n";
    return f;
};
g();
echo "**********\n";
g()();
echo "**********\n";
g()()();
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 9
<?php
// Code Snippet 9
class Greetings{
    private $word = "Hello";
}
$closure = function ($whom) {
    echo "$this->word $whom\n";
};
$obj = new Greetings();
$closure->call($obj, 'John');
$closure->call($obj, 'Kenvin');
?>

<?php
echo '</br>';
echo '</br>';
?>

// Code Snippet 10
<?php
// Code Snippet 10
srand();
function random_numbers($k) {
    for ($i=0; $i<$k; $i++){
        $r = rand(1, 10);
        yield $r;
    }
    return -1;
}
$rns = random_numbers(10);
foreach ($rns as $r){
    echo "$r";
    echo '</br>';
}
echo $rns->getReturn() . PHP_EOL;
?>
