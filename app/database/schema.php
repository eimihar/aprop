<?php
use Laraquent\Blueprint;

/** @var \Laraquent\Schema $schema */
$schema->table('agent', function(Blueprint $table) {
    $table->increments('id');
    $table->string('email');
    $table->string('password');
    $table->timestamps();
});

/*$schema->table('user', function(Blueprint $table) {
    $table->increments('id');
    $table->string('full_name');
    $table->string('phone_no');
    $table->string('email');
    $table->timestamps();
});*/

$schema->table('project', function(Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('slug');
    $table->text('description');
    $table->string('image');
    $table->decimal('min_net_salary');
    $table->decimal('min_basic_salary');
    $table->integer('created_agent');
    $table->integer('active');
    $table->string('main_image_path');
    $table->timestamps();
});

$schema->table('project_agent', function(Blueprint $table) {
    $table->increments('id');
    $table->integer('project_id');
    $table->integer('agent_id');
    $table->timestamps();
});

$schema->table('user', function(Blueprint $table) {
    $table->increments('id');
    $table->string('full_name');
    $table->string('phone_no');
    $table->string('email');
    $table->decimal('net_salary');
    $table->decimal('basic_salary');
    $table->string('ip_address', 15);
    $table->timestamps();
});

$schema->table('user_project', function(Blueprint $table) {
    $table->increments('id');
    $table->integer('inquiry_id');
    $table->integer('project_id');
    $table->timestamps();
});

$schema->table('image', function(Blueprint $table) {
    $table->increments('id');
    $table->string('path');
    $table->timestamps();
});

$schema->table('project_image', function(Blueprint $table) {
    $table->increments('id');
    $table->integer('project_id');
    $table->integer('image_id');
    $table->string('path');
    $table->timestamps();
});