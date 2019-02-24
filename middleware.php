<?php
  session_start();

  $database = mysqli_connect('localhost', 'root', '', 'system') or die('Can not connect to database');
