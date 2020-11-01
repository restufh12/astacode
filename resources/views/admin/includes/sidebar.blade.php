<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">SETTING</li>
                <li>
                    <a href="{{ url('backend/companysetting') }}"> <i class="menu-icon fa fa-cogs"></i>Company Setting</a>
                </li>
                <li>
                    <a href="{{ url('backend/companysetting') }}"> <i class="menu-icon fa fa-cogs"></i>Header Setting</a>
                </li>

                <li class="menu-title">DATA MASTER</li>
                <li>
                    <a href="{{ route('services.index') }}"> <i class="menu-icon fa fa fa-bookmark-o"></i>Services</a>
                </li>
                <li>
                    <a href="{{ route('teams.index') }}"> <i class="menu-icon fa fa-users"></i>Teams</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"> <i class="menu-icon fa fa-list"></i>Products</a>
                </li>
                <li>
                    <a href="{{ route('portfolios.index') }}"> <i class="menu-icon fa fa-archive"></i>Portfolio</a>
                </li>
                <li>
                    <a href="{{ route('portfolio-galleries.index') }}"> <i class="menu-icon fa fa-image"></i>Portfolio Gallery</a>
                </li>
                <li>
                    <a href="{{ route('clients.index') }}"> <i class="menu-icon fa fa-star"></i>Clients</a>
                </li>
                <li>
                    <a href="{{ route('testimonials.index') }}"> <i class="menu-icon fa fa-comment"></i>Testimonials</a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}"> <i class="menu-icon fa fa-rss-square"></i>Articles</a>
                </li>
                <li>
                    <a href="{{ route('faqs.index') }}"> <i class="menu-icon fa fa-tags"></i>FAQ</a>
                </li>
                <li class="menu-title">WEB VISITOR</li>
                <li>
                    <a href="{{ route('subscribers.index') }}"> <i class="menu-icon fa fa-tags"></i>Subscriber</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
<!-- /#left-panel -->