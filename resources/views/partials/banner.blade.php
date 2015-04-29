@unless(Auth::check() || Request::path() != '/')
    <div class="container">
        <div class="banner-main text-center">
            <h1>The Future of Innovation <br/>
                <small>“The new innovative methodology and interactive crowd sourced platform”</small>
            </h1>
            <button class="btn btn-purple">Search Challenge</button>
            <button class="btn btn-green">Create Challenge</button>
            <button class="btn btn-blue">Discover Project</button>
        </div>
    </div>
@endunless