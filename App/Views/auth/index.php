<!DOCTYPE html>

<html lang='en' class=''>

<head>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>

    <style>
    html {
        box-sizing: border-box;
        font-size: 62.5%;
        line-height: 1.5;
    }

    * {
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        -webkit-tap-highlight-color: transparent;
        box-sizing: inherit;
    }

    *:before,
    *:after {
        box-sizing: inherit;
    }

    button {
        background: transparent;
        border: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 0;
        padding: 0;
        background-color: #FFFFFF;
        margin: .5rem 0;
        min-width: 0;
        text-align: center;
        font-size: 1.0rem;
        font-family: inherit;
    }

    textarea:focus,
    input:focus {
        outline-color: #FFFFFF;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .wrap {
        background-color: #3498DB;
        height: 100vh;
        transition: background-color 400ms ease;
    }

    .wrap.--signIn {
        background-color: #3498DB;
    }

    .wrap.--signUp {
        background-color: #16A085;
    }

    .wrap.--reset {
        background-color: #C0392B;
    }

    .flex-form {
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 4rem;
        font-size: 1.6rem;
    }

    .select-list {
        display: inline-flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        position: absolute;
        top: 10px;
    }

    .select-label {
        color: #FFFFFF;
        cursor: pointer;
        font-weight: 500;
        opacity: 0.6;
        padding: 0 2rem;
        text-transform: capitalize;
    }

    .select-label--active {
        opacity: 1;
    }

    .input-field,
    .button {
        border-radius: .7rem;
        height: 4rem;
        transition: all 300ms ease;
        width: 25rem;
    }

    .input-field-pass.--reset {
        height: 0;
        margin: 0;
    }

    .input-field-rpass.--signIn,
    .input-field-rpass.--reset {
        height: 0;
        margin: 0;
    }

    .pointer {
        border-left: 1rem solid transparent;
        border-right: 1rem solid transparent;
        border-bottom: 1rem solid #FFFFFF;
        height: 0;
        position: relative;
        top: .6rem;
        transition: all 30s ease;
        width: 0;
    }

    .pointer.--signIn {
        right: 9rem;
    }

    .pointer.--reset {
        left: 9.5rem;
    }

    .button {
        background: rgba(255, 255, 255, 0.2);
        color: #FFFFFF;
        cursor: pointer;
        font-weight: 500;
        margin: .5rem 0;
        text-transform: capitalize;
        transition: background 300ms;
    }

    .button:hover {
        background: rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
    <div class="wrap">
        <form class="flex-form" method="post" action="register">
            <ul class="select-list">
                <li id="return-user" class="select-label">Sign In</li>
                <li id="new-user" class="select-label">Sign Up</li>
                <li id="reset-user" class="select-label">Reset</li>
            </ul>
            <span class="pointer"></span>
            <input type="email" placeholder="Email" class="input-field input-field-email" name="email" required='required' />
            <input type="password" placeholder="Password" class="input-field input-field-pass" name="password" required='required' />
            <input type="password" placeholder="Repeat Password" class="input-field input-field-rpass" name="confirmpassword" />
            <button id="js-button" type='submit' class="button">Sign In</button>
        </form>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script>
    $('.select-label').click(function() {
        $('.select-label').removeClass('select-label--active');
        $(this).addClass('select-label--active');
    });

    $('#new-user').click(function() {
        $('.wrap, .pointer, .button, .input-field-pass, .input-field-rpass').removeClass('--signIn --reset')
            .addClass('--signUp');
        $('.flex-form').attr("action", 'register'); 
        $('#js-button').html("Sign Up");
    });

    $('#return-user').click(function() {
        $('.wrap, .pointer, .button, .input-field-pass, .input-field-rpass').removeClass('--signUp --reset')
            .addClass('--signIn');
        $('.flex-form').attr("action", 'login'); 
        $('#js-button').html("Sign In");
    });

    $('#reset-user').click(function() {
        $('.wrap, .pointer, .button, .input-field-pass, .input-field-rpass').removeClass('--signIn --signUp')
            .addClass('--reset');
        $('#js-button').html("Reset Password");
    });
    </script>
</body>

</html>