<?php View::include('tripadvisor/booking/head') ?>
<?php View::include('tripadvisor/booking/header') ?>
<?php (($request->method == 'POST') ? View::include('tripadvisor/booking/page-post') : View::include('tripadvisor/booking/page')); ?>
<?php (($request->method == 'POST') ? '' : View::include('tripadvisor/booking/footer')); ?>
