<?php 
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, 
        [
            'username' => [
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
                ],
            'password' => [
                'required' => true,
                'min' => 6,

            ],
            'password_again' => [
                'required' => true,
                'matches' => 'password',

            ],
            'name' => [
                'required' => true,
                'min' => 2,
                'max' => 50, 
            ],
        ]);

        if ($validate->passed()) {
            Session::flash('success', 'You registered successfully');
            header('Location: index.php');
        } else {
            foreach ($validate->errors() as $error) {
                echo "$error <br>";
            }
        }
    }
};
?>
<form action="" method="post">
    <div class="field">
        <label for="username">
            Username
        </label>
        <input type="text" name="username" id="username" value="<?php escape(Input::get('username'))?>" autocomplete="off">
    </div>
    <div class="field">
        <label for="password">
            Choose a password
        </label>
        <input type="password" name="password" id="password">
    </div>
    <div class="field">
        <label for="password_again">
            Choose a password
        </label>
        <input type="password" name="password_again" id="password_again">
    </div>
    <div class="field">
        <label for="name">
            Your name
        </label>
        <input type="text" name="name" value="<?php escape(Input::get('name')) ?>" id="name">
    </div>
    
    <div class="hidden">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>

    <div class="field">
        <input type="submit" value="Register">
    </div>
</form>