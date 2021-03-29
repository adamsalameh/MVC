<?php

var_dump($_SESSION);
if(isset($_SESSION['user_id'])){
      echo "ture"; 
    } else {
      echo "false";
  }
