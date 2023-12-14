<?php

class Form{
    public static function buildForm() : string{

      session_start(); 
      $form='';
      
      if (isset($_SESSION['username'])) {
          
          return $form;
      }



        $form=' <form action="/processa_form.php" method="post">
        <fieldset>
          <legend>Accesso</legend>
    
          <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required aria-required="true">
          </div>
    
          <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required aria-required="true">
          </div>
    
        </fieldset>
    
        <div>
          <button type="submit" name="accedi" role="button" aria-label="Accedi al tuo account">Accedi</button>
          <button type="submit" name="registrati" role="button" aria-label="Registrati per un nuovo account">Registrati</button>
        </div>
      </form>';
      return $form;
    }
}



?>