
@extends('layouts.backendlayout')
@section('backend')

				<section class="content-header">					
					<div class="container-fluid my-4">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Course</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('courses.create')}}" class="btn btn-primary">New Course</a>
							</div>
						</div>
					</div>
					
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<form action="" method="get">
							<div class="card-header">
								
							
						</form>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
											<th>Title</th>
											<th>Content</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach( $courses as $key=>$course )
											
										
										<tr>
											
											<td>{{ $key + 1 }}</td>
											<td>{{$course->title}}</td>
											<td>{!! Str::length($course->description) > 30 ? substr($course->description,0,30).'....' : $course->description !!}</td>			
											
										</tr>
										@endforeach
										
										
                                       
									</tbody>
								</table>
								
							</div>
						</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->


				

             @endsection