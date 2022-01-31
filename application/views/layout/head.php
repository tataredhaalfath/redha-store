<?php
//load konfigurasi website
$site = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/all.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <!-- style css -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/style.css">

  <title><?= $title; ?></title>
  <style>
    .figure-img {
      position: relative;
    }

    .figure-img a {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 8px;
      left: 0;
      background-color: transparent;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .figure a:hover {
      opacity: 1;
    }

    ul.pagination {
      padding: 0 10px;
      background-color: #F9B234;
      border-radius: 10px;
    }

    .pagination a,
    .pagination b {
      padding: 10px 20px;

      text-decoration: none;
      float: left;
    }

    .pagination a {
      background-color: #F9B234;
      color: black;
    }

    .pagination b {
      background-color: #c99336;
      color: black;
    }

    .pagination a:hover {
      background-color: #c99336;
    }
  </style>

</head>

<body>