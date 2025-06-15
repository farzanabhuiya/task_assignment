

@extends('layouts.backendlayout')

@section('backend')
<section class="content-header">
    <div class="container-fluid my-4">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Course</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <form id="courseForm" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container mt-4">
            <div class="card p-4 mb-4">
                <!-- Course Info -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Course Title" required>
                        
                    </div>
                    <div class="col-md-6">
                         <input type="text" name="category" class="form-control" placeholder="Category" required>
                        
                    </div>
                    <div class="col-md-6 mt-2">
                        <textarea name="description"  class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>

                <!-- Modules Section -->
                <div class="mt-3">
                    <button type="button" id="addModule" class="btn btn-primary"  name="modules[0][title]" >Add Module </button>

                </div>
                <div id="modulesWrapper">
                    
                </div>

                <!-- Submit Buttons -->
                <div class="pt-4">
                    <button type="submit" class="btn btn-success"> Save</button>
                    <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection







@push('customJs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
let moduleCount = 0;

// Generate Module Card
function generateModuleHTML(moduleIndex) {
    return `
    
    <div class="card p-3 mt-4 module position-relative" data-module-index="${moduleIndex}">
        
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2 removeModule" aria-label="Close"></button>

        <h5 class="mb-3">Module ${moduleIndex + 1}</h5>
        <input type="text" name="modules[${moduleIndex}][title]" class="form-control mb-3" placeholder="Module Title" required>
       <button type="button" class="btn btn-primary addContent mt-3 " style="width: 150px;"> Add Content</button>
        <div class="contentsWrapper d-none"></div>

        
    </div>`;
}

// Generate Content Row
function generateContentInputs(moduleIndex, contentIndex) {
    return `
    <div class="row g-2 mb-3 mt-2 content border border-2 p-3 rounded bg-light position-relative">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2 removeContent" aria-label="Close"></button>

        <div class="col-md-6 ">
            <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][title]" class="form-control" placeholder="Content Title" required>
        </div>
        <div class="col-md-6 image-upload-field">
            <input type="file" name="modules[${moduleIndex}][contents][${contentIndex}][image]" class="form-control" accept="image/*">
        </div>
       
        <div class="col-md-6">
            <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][video_link]" class="form-control" placeholder="Video Link">
        </div>
         
        
    </div>`;
}

// Add Module
$('#addModule').on('click', function () {
    const moduleHTML = generateModuleHTML(moduleCount);
    $('#modulesWrapper').append(moduleHTML);
    moduleCount++;
});

// Add Content to Module
$(document).on('click', '.addContent', function () {
    const module = $(this).closest('.module');
    const moduleIndex = module.data('module-index');
    const contentsWrapper = module.find('.contentsWrapper');
    const contentCount = module.find('.content').length;

    if (contentsWrapper.hasClass('d-none')) {
        contentsWrapper.removeClass('d-none');
    }

    const contentHTML = generateContentInputs(moduleIndex, contentCount);
    contentsWrapper.append(contentHTML);
});

// Remove Module
$(document).on('click', '.removeModule', function () {
    $(this).closest('.module').remove();
});

// Remove Content
$(document).on('click', '.removeContent', function () {
    $(this).closest('.content').remove();
});
</script>
@endpush
