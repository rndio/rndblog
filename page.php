<?php

$page = htmlspecialchars($_GET['p']);
if (empty($page)) die('404 - Page not found');

if (file_exists("static/$page.html")) {
  $content = file_get_contents("static/$page.html");
} else {
  die('404 - Page not found');
}

?>

<html data-bs-theme="light" dir="ltr" lang="id">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Page Example - RND Blog</title>
  <link href="https://www.rndio.my.id/favicon.ico" rel="icon" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net" rel="dns-prefetch">
  <link href="https://cdn.jsdelivr.net" rel="preconnect">
  <link href="https://www.googletagmanager.com" rel="dns-prefetch">
  <link href="https://www.googletagmanager.com" rel="preconnect">
  <link href="https://blogger.googleusercontent.com" rel="dns-prefetch">
  <link href="https://blogger.googleusercontent.com" rel="preconnect">
  <link href="https://pagead2.googlesyndication.com" rel="dns-prefetch">
  <link href="https://pagead2.googlesyndication.com" rel="preconnect">
  <link as="style" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha256-MBffSnbbXwHCuZtgPYiwMQbfE7z+GOZ7fBPCNB06Z98=" rel="preload">
  <link as="style" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" integrity="sha256-aNslmGd22O9ZenF2YH/yIqJmpMc5HTbLYfZNb/4NHsY=" rel="preload">
  <link as="script" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" rel="preload">
  <link as="script" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js" integrity="sha256-PZEg+mIdptYTwWmLcBTsa99GIDZujyt7VHBZ9Lb2Jys=" rel="preload">
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha256-MBffSnbbXwHCuZtgPYiwMQbfE7z+GOZ7fBPCNB06Z98=" rel="stylesheet">
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" integrity="sha256-aNslmGd22O9ZenF2YH/yIqJmpMc5HTbLYfZNb/4NHsY=" rel="stylesheet">
  <style>
    /*<![CDATA[
====================================
Theme Name	: RND Blog
Designer	: Rendio Simamora
Country		: Indonesia
Website		: rndio.my.id
==================================== */

    ::-webkit-scrollbar {
      width: 6px;
      background-color: var(--bs-body-bg)
    }

    ::-webkit-scrollbar-thumb {
      background-color: #c1c1c1
    }

    ::-webkit-scrollbar-thumb:hover {
      background-color: #a8a8a8
    }

    body {
      font-family: system-ui, sans-serif;
      background-color: var(--bs-tertiary-bg)
    }

    a {
      text-decoration: none !important
    }

    .no-items.section {
      display: none
    }

    #backtotop {
      position: fixed;
      z-index: 2;
      right: 40px;
      bottom: 40px
    }

    .modal-backdrop {
      --bs-backdrop-opacity: .7
    }

    iframe#comment-editor {
      margin-left: -11px
    }

    .fadeR:not(.show) {
      opacity: 0;
      pointer-events: none;
    }

    .fadeR {
      transition: opacity .2s;
    }

    .btn-ghost {
      border-width: 1px;
      border-color: transparent;
      background-color: transparent;
      color: currentColor
    }

    .btn-ghost:hover {
      background-color: var(--bs-light-border-subtle) !important
    }

    .btn.btn-circle,
    .btn.btn-square {
      display: inline-flex;
      height: 2.5rem;
      width: 2.5rem;
      font-size: 2.5rem;
      align-items: center;
      justify-content: center;
      border: none !important;
      padding: 0
    }

    .btn-circle {
      border-radius: 50%;
    }

    .btn-square {
      border-radius: 0;
    }

    .btn-circle.btn-sm,
    .btn-square.btn-sm {
      height: 2rem;
      width: 2rem;
      font-size: 2rem
    }

    .btn-circle *,
    .btn-square * {
      font-size: .4em
    }

    .btn-circle.btn-lg,
    .btn-square.btn-lg {
      height: 3.5rem;
      width: 3.5rem;
      font-size: 3.5rem
    }

    .swap {
      position: relative;
      display: inline-grid !important;
      justify-items: center;
      user-select: none;
      place-content: center;
      cursor: pointer
    }

    .swap input {
      display: none;
    }

    .swap .swap-on {
      opacity: 0
    }

    .swap .swap-off {
      opacity: 1
    }

    .swap:has(input:checked) .swap-on {
      opacity: 1;
    }

    .swap:has(input:checked) .swap-off {
      opacity: 0;
    }

    .swap>* {
      grid-column-start: 1;
      grid-row-start: 1;
      transition: opacity .3s cubic-bezier(.4, 0, .2, 1)
    }

    #header {
      position: sticky;
      position: -webkit-sticky;
      top: 0;
      z-index: 1020;
      box-shadow: 0 2px 10px 0 rgb(0 0 0 / 7%);
      color: var(--bs-light-text);
      --bs-navbar-brand-margin-end: 0;
      --bs-nav-link-font-size: .875rem;
      --bs-navbar-toggler-border-radius: 0;
      --bs-navbar-toggler-padding-y: .25rem;
      --bs-navbar-toggler-padding-x: .5rem;
      --bs-navbar-brand-padding-y: 0;
      --bs-navbar-padding-y: .3rem;
      background-color: var(--bs-body-bg);
      transition: top linear .2s
    }

    #header.transparent {
      backdrop-filter: blur(4px) saturate(200%);
      background-color: rgba(var(--bs-body-bg-rgb), .7)
    }

    #header .btn-circle,
    #header .btn-square {
      width: 42px;
      height: 42px
    }

    #header .navbar-nav {
      --bs-nav-link-padding-x: 16px;
      --bs-nav-link-padding-y: 14px;
      --bs-nav-link-font-weight: 600
    }

    #header #main-navbar {
      margin: 0 -12px
    }

    #header #header-content {
      margin: 0 -12px
    }

    #header ul.navbar-nav>li {
      border-bottom: 1px solid var(--bs-light-text);
    }

    #header ul.navbar-nav li.nav-item.dropdown>a {
      display: flex;
      justify-content: space-between
    }

    #header li.dropdown ul.dropdown-menu {}

    #header ul.navbar-nav li.nav-item.dropdown>a.nav-link>svg {
      transform: rotate(90deg);
      transition: transform ease .2s
    }

    #header ul.navbar-nav li.nav-item.dropdown>a.nav-link.show>svg {
      transform: rotate(270deg)
    }

    body.isSingleItem #mainWrapper {
      margin-top: 2rem;
    }

    #main {
      width: 100%;
    }

    #aside {
      width: 100%;
    }

    #post-breadcrumb .breadcrumb {
      --bs-breadcrumb-divider: '\203A';
      --bs-breadcrumb-font-size: .875rem;
      --bs-breadcrumb-margin-bottom: .75rem
    }

    #post-breadcrumb .breadcrumb li a {
      text-decoration: none
    }

    #post-breadcrumb .breadcrumb .breadcrumb-item {
      display: inline-flex
    }

    #post-breadcrumb .breadcrumb .breadcrumb-item:not(.active)>a {
      color: var(--bs-light-text)
    }

    #post-breadcrumb .breadcrumb .breadcrumb-item:not(.active)>a:hover {
      color: var(--bs-light-text-emphasis)
    }

    body.isMultipleItems #main .wTitle {
      display: block;
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center
    }

    #post-header>*:last-child {
      margin-bottom: 1.25rem !important
    }

    #post-footer>*:first-child {
      margin-top: 1.25rem !important
    }

    #post-footer>*:last-child {
      margin-bottom: 0 !important
    }

    #post-body img {
      border-radius: 3%;
      max-width: 100%;
    }

    body.isSingleItem #Blog>*,
    #sidebar-top>*,
    #sidebar-bottom>* {
      padding: 1.25rem;
      background-color: var(--bs-body-bg);
      margin-bottom: 1.25rem;
      border-radius: .75rem;
      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important
    }

    body.isMultipleItems #Blog .card {
      --bs-border-radius: .5rem;
      --bs-border-color-translucent: transparent;
      --bs-card-cap-padding-y: 0;
      --bs-card-cap-padding-x: 0;
      box-shadow: 0 2px 10px 0 rgb(0 0 0 / 7%);
      transition: box-shadow linear .2s;
      position: relative
    }

    body.isMultipleItems #Blog .card a:hover {
      text-decoration: underline
    }

    #comments ul {
      padding: 0;
      margin: 0
    }

    #comments li {
      list-style-type: none
    }

    #comments .comment-reply,
    #comments .btn-reply,
    #comments li.block #comment-form {
      margin-left: 3.2rem
    }

    #footer .attribution {
      color: var(--bs-orange);
      font-weight: 500
    }

    #footer .attribution:hover {
      text-decoration: underline !important
    }

    @media (min-width:576px) {}

    @media (min-width:768px) {
      body.isMultipleItems #Blog .wContent {
        grid-template-columns: repeat(2, minmax(0, 1fr))
      }
    }

    @media (min-width:992px) {
      #header ul.navbar-nav>li {
        border-bottom: unset;
      }

      #header li.dropdown ul.dropdown-menu {
        --bs-dropdown-border-radius: unset;
        --bs-dropdown-border-width: initial
      }

      body.isPost #main {
        width: 66.666667%
      }

      body.isPost #aside {
        width: 33.333333%
      }

      body.isMultipleItems #Blog .wContent {
        grid-template-columns: repeat(3, minmax(0, 1fr))
      }
    }

    @media (min-width:1200px) {}

    @media (min-width:1400px) {}

    div#RNDToastr {
      position: fixed;
      padding: 1rem;
    }

    div#RNDToastr.top-left {
      top: 0;
      left: 0;
    }

    div#RNDToastr.top-center {
      top: 0;
      left: 50%;
      transform: translateX(-50%);
    }

    div#RNDToastr.top-right {
      top: 0;
      right: 0;
    }

    div#RNDToastr.middle-left {
      top: 50%;
      left: 0;
      transform: translateY(-50%);
    }

    div#RNDToastr.middle-center {
      top: 50%;
      bottom: 50%;
      transform: translate(-50%, -50%);
    }

    div#RNDToastr.middle-right {
      top: 50%;
      right: 0;
      transform: translateY(-50%);
    }

    div#RNDToastr.bottom-left {
      bottom: 0;
      left: 0;
    }

    div#RNDToastr.bottom-center {
      left: 50%;
      bottom: 0;
      transform: translateX(-50%);
    }

    div#RNDToastr.bottom-right {
      bottom: 0;
      right: 0;
    }

    /*]]>*/
  </style>
</head>

<body class="isSingleItem isPage">
  <div class="Panel section" id="Panel" name="Panel">
    <div aria-hidden="true" class="modal fade" id="modalSearch" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body p-3">
            <form action="https://www.rndio.my.id/search" class="w-100 input-group" method="get">
              <input class="form-control form-control-lg" name="q" placeholder="Search this blog" value="">
              <button aria-label="Search" class="btn btn-light border" type="submit"><i class="ri-search-line"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div aria-hidden="true" class="modal fade" data-bs-backdrop="static" id="modalShare" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
              <span class="h5 fw-bold" id="staticBackdropLabel">Share</span>
              <button aria-label="Close" class="btn btn-circle" data-bs-dismiss="modal" type="button">
                <i class="ri-close-line"></i>
              </button>
            </div>
            <div class="d-flex gap-2 border-top">
              <input class="form-control rounded-0" readonly="" value="https://www.rndio.my.id/p/md5-hash.html">
              <button class="btn btn-dark rounded-0" onclick="share('copy')">Copy</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div aria-hidden="true" class="fadeR" id="backtotop">
      <button tabindex="-1" class="btn btn-circle btn-dark" type="button"><i class="ri-arrow-up-s-line"></i></button>
    </div>
  </div>
  <header class="navbar navbar-expand-lg" id="header" style="top: 0px;">
    <div class="container-fluid container-lg section" id="navbar-container" name="Navbar Container">
      <div class="d-flex justify-content-between align-items-center flex-grow-1" id="navbar-header">
        <a class="navbar-brand" href="https://www.rndio.my.id/">
          <img alt="RND Blog" class="rounded-circle" height="40" loading="lazy" src="https://cdn.jsdelivr.net/gh/rndio/rndblog@latest/img/icon/favicon-100x100.webp" width="40">
        </a>
        <button aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation" class="d-lg-none btn btn-ghost btn-circle" data-bs-target="#navbar-content" data-bs-toggle="collapse" type="button">
          <i class="ri-menu-line"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse flex-grow-1 justify-content-end" id="navbar-content" role="navigation">
        <ul class="navbar-nav">
          <li>
            <a class="nav-link" href="/">Home</a>
          </li>
          <li><a class="nav-link" href="/p/about.html?utm_source=navbar">About</a></li>
          <li><a class="nav-link" href="/p/projects.html?utm_source=navbar">Projects</a></li>
          <li><a class="nav-link" href="/p/contact.html?utm_source=navbar">Contact</a></li>
          <li class="py-1 py-lg-0 ms-lg-2 d-flex gap-1 align-items-center justify-content-center">
            <button aria-label="Search" class="btn btn-ghost btn-circle" data-bs-target="#modalSearch" data-bs-toggle="modal" title="Search" type="button">
              <i class="ri-search-line"></i>
            </button>
            <label class="swap btn btn-ghost btn-circle" role="button" title="Switch Theme">
              <input id="switch-theme" type="checkbox">
              <i class="ri-sun-line swap-on"></i>
              <i class="ri-moon-fill swap-off"></i>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="container" id="mainWrapper">
    <main class="main section" id="main" name="Main">
      <div id="Blog">
        <article id="post">
          <div class="border-bottom" id="post-header">
            <nav aria-label="breadcrumb" id="post-breadcrumb">
              <ol class="breadcrumb flex-nowrap">
                <li class="breadcrumb-item"><a aria-label="Home" href="https://www.rndio.my.id/"><i class="ri-home-4-line"></i></a></li>
                <li aria-current="page" class="breadcrumb-item active user-select-none text-truncate">Example Page</li>
              </ol>
            </nav>
            <h1 class="h2 fw-bold" id="post-title">Example Page</h1>
          </div>
          <div class="my-4" id="post-body">
            <?= $content ?>
          </div>
        </article>
      </div>
    </main>
  </div>
  <footer class="my-5 section" id="footer" name="Footer">
    <div class="text-center">
      <a href="https://www.rndio.my.id/"><img alt="Logo" class="rounded-circle shadow-sm" height="40" loading="lazy" src="https://cdn.jsdelivr.net/gh/rndio/rndblog@latest/img/icon/favicon-100x100.webp" width="40"></a>
    </div>
    <div class="my-3 text-center">
      <p class="m-0">Powered by <a class="attribution" href="https://www.blogger.com" rel="nofollow">Blogger</a></p>
      <p class="m-0">Copyright © <span name="jsGetYear">2024</span> · All Rights Reserved</p>
    </div>
    <div class="d-flex justify-content-center gap-1">
      <a aria-label="facebook" class="btn btn-ghost btn-circle" href="https://www.facebook.com/rndioo" target="_blank">
        <i class="ri-facebook-fill"></i>
      </a>
      <a aria-label="twitter" class="btn btn-ghost btn-circle" href="https://twitter.com/rndio_" target="_blank">
        <i class="ri-twitter-fill"></i>
      </a>
      <a aria-label="instagram" class="btn btn-ghost btn-circle" href="https://www.instagram.com/rndio_" target="_blank">
        <i class="ri-instagram-fill"></i>
      </a>
      <a aria-label="linkedin" class="btn btn-ghost btn-circle" href="https://www.linkedin.com/in/rndio" target="_blank">
        <i class="ri-linkedin-fill"></i>
      </a>
    </div>
  </footer>
  <script crossorigin="anonymous" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <script crossorigin="anonymous" defer="defer" integrity="sha256-PZEg+mIdptYTwWmLcBTsa99GIDZujyt7VHBZ9Lb2Jys=" src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
</body>

</html>