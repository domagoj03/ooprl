<?php 
require_once 'core/init.php';

if (Session::exists('home')) {
    echo Session::flash('home');
};

$user = new User();

if ($user->isLoggedIn()) {
?>

<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>

<ul>
    <li><a href="logout.php">Logout</a></li>
    <li>#</li>
    <li>#</li>
</ul>

<?php 
} else {
    echo 'You need to <a href="login.php"> log in</a> or <a href="register.php"> register </a>';
}

?>
