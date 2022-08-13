<?php
$host = "remotemysql.com";
$user = "YzXM4lnyVk";
$password = "NwcAHyc00f";
$database = "YzXM4lnyVk";
$ketnoisql = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
