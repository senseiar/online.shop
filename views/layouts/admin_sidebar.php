<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="/upload/images/user_admin/no-image.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo User::getUserById($_SESSION['user'])['name']; ?></p>
    </div>
  </div>

  <!-- search form (Optional) -->
  <!-- <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form> -->
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul id="sideBar" class="sidebar-menu" data-widget="tree">
    <li class="header">РАЗДЕЛ</li>
    <!-- Optionally, you can add icons to the links -->
    <li <?php if($_SERVER['REQUEST_URI'] == '/admin/product') echo 'class="active"'?>><a href="/admin/product"><i class="fa fa-shopping-bag"></i> <span>Товары</span></a></li>
    <li <?php if($_SERVER['REQUEST_URI'] == '/admin/category') echo 'class="active"'?>><a href="/admin/category"><i class="fa fa-list"></i> <span>Категории</span></a></li>
    <li <?php if($_SERVER['REQUEST_URI'] == '/admin/news') echo 'class="active"'?>><a href="/admin/news"><i class="fa fa-pencil-square-o"></i> <span>Статьи</span></a></li>
    <li <?php if($_SERVER['REQUEST_URI'] == '/admin/comments') echo 'class="active"'?>><a href="/admin/comments"><i class="fa fa-comments-o"></i> <span>Комментарии</span></a></li>
    <li <?php if($_SERVER['REQUEST_URI'] == '/admin/order') echo 'class="active"'?>><a href="/admin/order"><i class="fa fa-shopping-cart"></i> <span>Заказы</span></a></li>
  </ul>
  
  <!-- /.sidebar-menu -->
</section>
<script>

</script>
<!-- /.sidebar -->
</aside>
<div class="content-wrapper">