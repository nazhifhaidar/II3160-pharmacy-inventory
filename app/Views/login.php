<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
</head>
<style>
    body {
        font-family: 'Inter';
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }

    .container-center {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .main-content {
        border: solid 2px #fff;
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .main-content button {
        margin-top: 10px;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .main-content button:last-child {
        background-color: rgba(86, 158, 137, 1);
        margin-top: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 400px;
        height: 400px;
        justify-content: space-between;
    }

    .input-field {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: stretch;
        height: 200px;
        width: 100%;
    }
    .each-label {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start; /* Align labels to the left */
        width: 100%; /* Set width to ensure labels align properly */
    }

    input {
        font-size: 24px;
        width: 100%;
        overflow: hidden;
    }

    label {
        margin-bottom: 5px;
        font-size: 24px;
    }
</style>

<body>
    <div class="container-center">
        <h1>Login Page</h1>
        <div class="main-content">
            <form action="/login_action" method="POST">
                <div class="input-field">
                    <div class="each-label">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="each-label">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password">
                    </div>


                </div>

                <button type="submit">
                    Signin</button>
            </form>
        </div>

    </div>

</body>

</html>