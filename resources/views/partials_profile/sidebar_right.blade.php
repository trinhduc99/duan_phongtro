<header class="page-header">
    <h2>{{$title}}</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{route('profile.index')}}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><a href="{{route('profile.index')}}"><span>Quản lý</span></a></li>
            @isset($link)
                <li><a href="{{route($path)}}"><span>{{$link}}</span></a></li>
            @endisset
        </ol>
    </div>
</header>
