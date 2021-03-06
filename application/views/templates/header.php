<html>
    <head>
        <title>Course-table</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/spacelab/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
        <link rel="icon" href="<?=base_url()?>/favicon.png" type="image/png">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animsition.min.css">
    </head>
    <body class="animsition">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <a class="navbar-brand" href="https://bloohash.com/company/">
                <img src="\banner1.png" width="120" height="80" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link animsition-link" href="<?= base_url(); ?>subjects">Subjects <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link animsition-link" data-animsition-out-class="rotate-out"
  data-animsition-out-duration="500" href="<?= base_url(); ?>courses">Courses <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>test_api">Test_api<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('firebase_sms'); ?>">Phone login<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
            <?php if(!$this->session->userdata('logged_in')): ?>
                <a class="nav-link" href="<?= base_url(); ?>send-email">E-mail</a>
                <a class="nav-link" href="<?= base_url(); ?>sign_up">Sign_up</a>
                <a class="nav-link" href="<?= base_url(); ?>login">Login</a>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in')): ?>
                <a class="nav-link" href="<?php echo base_url(); ?>subjects/create">Create Subjects</a>
                <a class="nav-link" href="<?php echo base_url(); ?>courses/create">Create Courses</a>
                <a class="nav-link" href="<?php echo base_url(); ?>students/logout">Logout</a>
            <?php endif; ?>
            </form>
        </nav>
        <div class="container">
        <?php if($this->session->flashdata('The Course already exists')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('The Course already exists').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedout')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
        <?php endif; ?>
