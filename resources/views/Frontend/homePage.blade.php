@extends('layouts.frontend_layout')
@section('frontent')




<div class="container py-5">
    @foreach ($courses as $course)
    <section class="mb-5">
        <h1 class="display-4 fw-bold text-center mb-5 text-primary">{{ $course->title }}</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($course->modules as $module)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">{{ $module->title }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        @foreach ($module->contents as $content)
                        <article class="mb-4 p-3 bg-light rounded-3 shadow-sm flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-semibold text-secondary">{{ $content->title }}</h5>
                                <p>{{ $content->content }}</p>
                            </div>

                            @if($content->image)
                            <div class="my-3 text-center">
                                <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" class="img-fluid rounded-3" style="max-height: 150px; object-fit: cover;">
                            </div>
                            @else
                            <p class="text-muted fst-italic">No image uploaded.</p>
                            @endif

                            @if($content->video_link)
                            <a href="{{ $content->video_link }}" target="_blank" class="btn btn-outline-primary btn-sm mt-auto align-self-start d-inline-flex align-items-center gap-2">
                                <i class="bi bi-play-fill"></i> Watch Video
                            </a>
                            @endif
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endforeach
</div>

<!-- Add Bootstrap Icons CDN if not already added -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background: #f0f4ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-header {
        font-size: 1.25rem;
        font-weight: 600;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0,123,255,.3);
        transition: 0.3s ease-in-out;
    }
    article:hover {
        background-color: #e9f1ff;
        transition: background-color 0.3s ease;
    }
</style>


 
      {{-- @foreach ($courses as $course)
    <h2>{{ $course->title }}</h2>

    @foreach ($course->modules as $module)
        <h4>Module: {{ $module->title }}</h4>

        @foreach ($module->contents as $content)
            <p><strong>Title:</strong> {{ $content->title }}</p>
            <p><strong>Text:</strong> {{ $content->content }}</p>

         @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}" width="200" alt="Content Image">
            @else
                <p>No image uploaded.</p>
            @endif
            @if ($content->video_link)
                <p><strong>Video Link:</strong> <a href="{{ $content->video_link }}" target="_blank">Watch</a></p>
            @endif
        @endforeach
    @endforeach
@endforeach --}}

@endsection


   

 
 

    