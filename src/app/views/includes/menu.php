<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Estudo CI</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CRUD <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('crud/create','Create'); ?></li>
                        <li><?php echo anchor('crud/retrieve','Retrieve'); ?></li>
                        <li><?php echo anchor('crud/update','Update'); ?></li>
                        <li><?php echo anchor('crud/delete','Delete'); ?></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Sobre o Estudo</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">GitHub</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>