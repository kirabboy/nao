<a href="{{ route('bai-viet.show', $blog->slug) }}" class="content d-flex shadow align-items-center">
    <div class="img left">
        <img src="{{ asset($blog->feature_img) }}" alt="">
    </div>
    <div class="right d-flex flex-column">
        <p class="title">{{ $blog->name }}
        </p>
        <p class="time">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>{{ date('d/m/Y - H:i', strtotime($blog->created_at)) }}</span>
        </p>
    </div>
</a>
