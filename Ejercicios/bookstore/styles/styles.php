<?php
  $route = "/php-daw/Ejercicios/bookstore/index.php";
  $styles = "
    /* COLORS
      primary: {
        main: #039be5
        light: #63ccff
        dark: #006db3
        text: #000000
      }
      
      secundary: {
        main: #4caf50
        light: #80e27e
        dark: #087f23
        text: #ffffff
      }
    */

    .flex-column {
      flex-direction: column;
    }
    
    .container {
      justify-content: space-between;
      max-width: 1080px;
      height: 100vh;
      margin: auto;
      padding: 2em;
      background-color: rgb(224, 224, 224);
    }
    
    .first-form {
      max-width: 10rem;
      margin: auto;
    }
    
    .index-form {
      display: flex; 
      justify-content: space-between;
    }
    
    .first-form > * {
      margin-top: 1rem;
    }
    
    .second-form > div {
      display: flex;
      justify-content: space-between;
      max-width: 18rem;
      margin: .5rem 0;
    }
    
    .second-form > div > input {
      text-align: right;
    }
    
    input[type=radio], input[type=color], input[type=submit], .submit {
      cursor: pointer;
    }
    
    input[type=submit], .submit {
      padding: 1rem;
      border: 1px solid rgb(100, 100, 255);
      background-color: rgb(200, 200, 255);
      transition: background-color .5s ease;
    }
    
    input[type=submit]:hover, .submit:hover {
      background-color: rgb(100, 100, 255);
    }
    
    .delete {
      border: 1px solid rgb(255, 0, 0)!important;
      background-color: rgb(255, 100, 100)!important;
    }
    
    .delete:hover {
      background-color: rgb(255, 0, 0)!important;
    }
    
    .back {
      color: rgb(125, 125, 255)
    }
    
    h4 {
      margin-top: 0;
    }
    
    .operator-text {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      margin-bottom: 1rem;
    }

    *, ::after, ::before {
      box-sizing: border-box;
      cursor: default;
      font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    
    ::-webkit-scrollbar {
      display: none;
    }

    .d-flex {
      display: flex;
    }

    body, h3 {
      margin: 0!important;
      overflow: hidden;
    }

    a {
      cursor: pointer;
    }

    a {
      color: black;
      text-decoration: none;
      transition: color .25s;
    }

    a:hover {
      color: #333333;
    }

    header {
      position: sticky;
      top: 0;
      width: 100%;
      padding: 1rem;
      background-color: #039be5;
      border-top: 1rem solid #006db3;
    }

    .head-hr {
      color: #006db3;
    }

    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th {
      background-color: #63ccff;
    }

    td {
      background-color: #80e27e;
    }

    #status {
      margin: 1rem 0;
    }

    .ex, .title {
      padding: 0 3rem;
    }";
?>
