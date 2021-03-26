<?php

include 'header.php';
include 'database.php';

echo <<<_END
<main>
<div class="login">
            <h1>Login to Air Asia</h1>
            <form method="post" action="authenticate.php">
                <p>
                    <input type="text" name="userName" value="" placeholder="Username or Email">
                </p>
                <p>
                    <input type="password" name="password" value="" placeholder="Password">
                </p>
                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Remember me on this computer
                    </label>
                </p>
                <p class="submit">
                    <input type="submit" name="commit" value="login">
                </p>
            </form>
        </div>
        <div class="login_help">
            <p>
                New User?
                <a href="register.php">Click Here to Register</a>
            </p>
        </div>
    </body>
</main>
    </html>
_END;

?>
