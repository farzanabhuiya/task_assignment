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
                                    <article class="mb-4 p-3 bg-light rounded-3 shadow-sm d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="fw-semibold text-secondary">{{ $content->title }}</h5>
                                            <p>{{ $content->content }}</p>

                                            @if($content->image)
                                                <div class="my-3">
                                                    <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" class="img-fluid rounded-3 img-left">
                                                </div>
                                            @else
                                                <p class="text-muted fst-italic">No image uploaded.</p>
                                            @endif
                                        </div>

                                        @if($content->video_link)
                                           <a href="{{ $content->video_link }}" target="_blank" class="btn btn-outline-primary btn-sm mt-auto d-inline-flex align-items-center gap-2">
                                                   <i class="bi bi-play-fill"></i> Watch Video</a>
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

@endsection



   

 
 

    