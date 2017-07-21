<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  <div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
      <li>
        <a href="{{ route('dashboard') }}">
        <i class="fa fa-dashboard fa-lg"></i>
        Dashboard
        </a>
      </li>

      <li  data-toggle="collapse" data-target="#content" class="collapsed">
        <a href="#"><i class="fa fa-gift fa-lg"></i>Read more section<span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="content">
          <li ><a href="{{ route('contents.create') }}">Add New Content</a></li>
          <li><a href="{{ route('contents.index') }}">All content</a></li>
      </ul>

      <li data-toggle="collapse" data-target="#post" class="collapsed">
        <a href="#"><i class="fa fa-globe fa-lg"></i> Simple typographic section <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="post">
        <li><a href="{{ route('posts.create') }}">Add New content</a></li>
        <li><a href="{{ route('posts.index') }}">All content</a></li>
      </ul>

      <li data-toggle="collapse" data-target="#download" class="collapsed">
        <a href="#"><i class="fa fa-globe fa-lg"></i> Download section <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="download">
        <li><a href="{{ route('downloads.create') }}">Add New File</a></li>
        <li><a href="{{ route('downloads.index') }}">All Files</a></li>
      </ul>

      <li data-toggle="collapse" data-target="#category" class="collapsed">
        <a href="#"><i class="fa fa-globe fa-lg"></i> categories section <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="category">
        <li><a href="{{ route('categories.index') }}"> categories</a></li>
      </ul>

      <li data-toggle="collapse" data-target="#gallery" class="collapsed">
        <a href="#"><i class="fa fa-globe fa-lg"></i> Gallery/Slider section <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="gallery">
        <li><a href="{{ route('images.create') }}">Add New image</a></li>
        <li><a href="{{ route('images.index') }}"> All Galley/Slider</a></li>
      </ul>

    </ul>
  </div>
</div>
