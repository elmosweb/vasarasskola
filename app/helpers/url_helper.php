<?php
//funkction to redirect, after exetinging someting from Pages controller
  function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
  }