<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Matrix</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">المشاريع</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('currencies.index') }}">العملات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('exchange') }}">تحويل عملات</a>
            </li>
        </ul>
    </div>
</nav>
