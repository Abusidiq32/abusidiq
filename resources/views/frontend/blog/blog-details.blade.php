@extends('frontend.layouts.layout')
@section('content')

<header class="site-header parallax-bg py-5 text-center text-white">
    <div class="container">
        {{-- <h2 class="fw-bold blogpage" style="margin-left: 20rem;margin-right: 20rem; color: var(--color-1)">{{ $blog->title }}</h2> --}}
        <h2 class="fw-bold blogpage">{{ $blog->title }}</h2>

    </div>
</header>

<section class="py-5 text-light">
    <div class="container">
        <div class="row gx-5">

            <!-- MAIN BLOG -->
            <div class="col-lg-8">
                <div class="blog-meta mb-1 d-flex justify-content-between">
                    <div>
                        <div class="meta-title small text-secondary">Published</div>
                        <h5 class="meta-value mt-0">{{ date('d M, Y', strtotime($blog->created_at)) }}</h5>
                    </div>
                    <div style="margin-right: 5rem;">
                        <div class="meta-title small text-secondary">Category</div>
                        <h5 class="meta-value mt-0">{{ $blog->category->name }}</h5>
                    </div>

                </div>

                <figure class="mb-4">
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                </figure>

                <div class="description mb-5">
                    {!! $blog->description !!}
                </div>


            </div>

            <!-- RELATED POSTS ASIDE -->
            <div class="col-lg-4">
                <aside class="sticky-top" style="top:80px;">
                    @if ($relatedPosts->count() > 0)
                        
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Related Notes</h5>
                        <div class="blog-links">
                            @foreach ($relatedPosts->take(3) as $related)
                                <a href="{{ route('blog.details', $related->slug) }}"
                                class="list-group-item list-group-item-action d-flex gap-2 align-items-start p-2 rounded mb-2 border-bottom border-secondary">
                                    <img src="{{ asset($related->image) }}" alt="{{ $related->title }}"
                                        style="width:60px; height: 50px; object-fit: cover; border-radius:4px;">
                                    <div class="flex-grow-1 small px-2 py-0">
                                        <div class="fw-semibold" style="margin-top: -9px;">{{ Str::limit($related->title, 50) }}</div>
                                        <div class="text-secondary small" style="margin-top: -9px;">{{ date('d M, Y', strtotime($related->created_at)) }}</div>
                                        {{-- <span class="badge bg-secondary mt-1">{{ $related->category->name ?? 'Uncategorized' }}</span> --}}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- categories as badges below -->
                    @if ($blogCategories->count() > 1)
                        <h5 class="fw-bold mb-3 pb-2">Categories</h5>
                        <div class="d-flex flex-wrap gap-2 mt-4 p-2 border-bottom">
                            @foreach ($blogCategories as $blogCategory)
                                @if ($blogCategory->id !== $currentCategory->id)
                                    <a href="{{ route('blog.category', $blogCategory->slug) }}" class="badge bg-secondary">
                                        {{ $blogCategory->name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif


                </aside>
            </div>

            

        </div>
    </div>
</section>
@endsection
