<!DOCTYPE html>

    <head>
        <title>New User</title>
        <style>
            html, body {
                background-color: SlateGrey ;
                color: #F5F5F5;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                align-items: center;
                text-align: center;
                justify-content: center;
                padding: 40px 0;
            }


          a {
                color: DarkSlateGrey;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            a:hover {
          color: #F5F5F5;
      }
        </style>
    </head>
    <body>
        <h2>Welcome to Foostagram</h2>
        <br>
      <form method='GET' action='/createUser'>

         <label for='user'>User:</label>
         <input type='text' name='user' id='user'>
         <br>
         <br>
         <label for='password'>Password:</label>
         <input type='password' name='password'>
         <br>
         <br>
         <label for='password'>Repeat password:</label>
         <input type='password' name='passwordRepeat'>
         <br>
         <br>
         <input type='submit' value = 'Submit'>
     </form>

    </body>
