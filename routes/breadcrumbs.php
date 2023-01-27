<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('agenda', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Agendar', route('agendar.cita'));
});


Breadcrumbs::for('servicios', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Servicios', route('servicios.mostrar'));
});

Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog.all'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Iniciar sesion', route('login.visit'));
});


Breadcrumbs::for('registro', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Registrarse', route('register.visit'));
});

Breadcrumbs::for('nosotros', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('¿Quienes somos?', route('quienes.somos'));
});

Breadcrumbs::for('contacto', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacto', route('contacto.formulario'));
});

Breadcrumbs::for('politica', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Politica de Privacidad', route('politica.privacidad'));
});

Breadcrumbs::for('preguntas_frecuentes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Preguntas Frecuentes', route('preguntas.frecuentes'));
});

Breadcrumbs::for('terminos_condiciones', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Terminos y Condiciones', route('terminos.condiciones'));
});

// Home > Blog
/*Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});*/