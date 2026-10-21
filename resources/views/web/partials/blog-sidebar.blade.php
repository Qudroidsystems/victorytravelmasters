@php $allPosts = config('site.posts'); @endphp
<div class="sisf-page-sidebar sis-comman-background">
    <div class="sidebar-widget widget_categories">
        <h3 class="sidebar-title text-white">Categories</h3>
        <div class="sis-blog-categories">
            <ul class="sis-blog-categories-list">
                @foreach (collect($allPosts)->pluck('category')->unique() as $category)
                    <li class="sis-blog-categories-list-item">
                        <a href="{{ route('web.blog') }}" class="text-white"><span>{{ $category }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-separator">
        <hr class="separator sidebar-line">
    </div>
    <div class="sidebar-widget widget_popular_blog">
        <h3 class="sidebar-title text-white">Recent Guides</h3>
        <div class="sidebar_content-list">
            <ul class="content_list_widget">
                @foreach (array_slice($allPosts, 0, 4) as $p)
                    <li>
                        <div class="sisf-image">
                            <a href="{{ route('web.post', $p['slug']) }}">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset($p['thumb']) }}" class="image-fluid" alt="{{ $p['title'] }}">
                                </figure>
                            </a>
                        </div>
                        <div class="sisf-blog-content">
                            <div class="sisf-date mb-1">
                                <span class="publish-date text-white">{{ \Carbon\Carbon::parse($p['date'])->format('F j, Y') }}</span>
                            </div>
                            <h3 class="sisf-blog-title sisf-page-text-line mb-0"><a href="{{ route('web.post', $p['slug']) }}" class="text-white">{{ $p['title'] }}</a></h3>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
