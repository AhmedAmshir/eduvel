@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('admin/courses') }}">Courses</a>
        </li>
        <li class="breadcrumb-item active">Add Courses</li>
    </ol>

    @include('admin.layouts.message')
    <form action="{{ url('admin/course/update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" required value="{{ $course->id }}">
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Basic info</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course title</label>
                        <input type="text" class="form-control" name="course_title" required
                               value="{{ $course->course_title }}" placeholder="Course title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teacher name</label>
                        <input type="text" class="form-control" name="teacher_name" required
                               value="{{ $course->teacher_name }}" placeholder="Course teacher">
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course start</label>
                        <input type="date" class="form-control date-pick" name="course_start" required
                               value="{{ $course->course_start }}" placeholder="Course start">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course expire</label>
                        <input type="date" class="form-control date-pick" name="course_expire"
                               value="{{ $course->course_expire }}" placeholder="Course expire">
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course price</label>
                        <input type="number" class="form-control" name="course_price" required
                               value="{{ $course->course_price }}" placeholder="Course price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Discount Price</label>
                        <input type="number" class="form-control" name="course_discount_price"
                               value="{{ $course->course_discount_price }}" placeholder="Course Discount Price">
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Image</label>
                        {{-- <form action="http://www.ansonika.com/file-upload" class="dropzone" ></form> --}}
                        <input type="file" name="course_image" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Video</label>
                        {{-- <input type="file" name="course_video" class="form-control"> --}}
                        <input type="text" name="course_video" class="form-control" value="{{ $course->course_video }}"
                               required>
                    </div>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file-text"></i>Description</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Course description</label>
                        <textarea rows="5" class="form-control" id="article-ckeditor-description-course"
                                  name="course_description" style="height:100px;"
                                  placeholder="Course description">{{ $course->course_description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <?php $arr_what_will_you_learn_title = json_decode($course->what_will_you_learn_title);
            $arr_what_will_you_learn_description = json_decode($course->what_will_you_learn_description); ?>
            <div class="row my-2 mb-3">
                <div class="col-md-12">
                    <h6>What will you learn</h6>
                    <table id="pricing-list-container-what-will-you-learn" style="width:100%;">
                        @for ($i=0; $i < count($arr_what_will_you_learn_title); $i++)
                            <tr class="pricing-list-item-what-will-you-learn">
                                <td>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       name="what_will_you_learn_title[]"
                                                       value="{{ $arr_what_will_you_learn_title[$i] }}" required
                                                       placeholder="what will you learn title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       name="what_will_you_learn_description[]"
                                                       value="{{ $arr_what_will_you_learn_description[$i] }}" required
                                                       placeholder="what will you learn description">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </table>
                    <a href="#0" class="btn_1 gray add-pricing-list-item-what-will-you-learn"><i
                                class="fa fa-fw fa-plus-circle"></i>Add Item</a>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category <a href="#0" data-toggle="tooltip" data-placement="top"
                                           title="Separated by commas"><i
                                        class="fa fa-fw fa-question-circle"></i></a></label>
                        <select class="form-control" name="category_id">
                            @foreach($course_categorys as $course_category)
                                <option <?php if ($course->category_id == $course_category->id) {
                                    echo "selected";
                                } ?>  required value="{{ $course_category->id }}">{{ $course_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course Time</label>
                        <input type="text" name="course_time" class="form-control" required placeholder="e.g.: 1h 30min"
                               value="{{ $course->course_time }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Is Active <a href="#0" data-toggle="tooltip" data-placement="top" title="Is Active"><i
                                        class="fa fa-fw fa-question-circle"></i></a></label>
                        <select class="form-control" name="isActive">
                            <option <?php if ($course->isActive == 1) {
                                echo "selected";
                            } ?>  required value="1">Yes
                            </option>
                            <option <?php if ($course->isActive == 0) {
                                echo "selected";
                            } ?>  required value="0">No
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>What's includes <a href="#0" data-toggle="tooltip" data-placement="top"
                                                  title="What's includes"><i
                                        class="fa fa-fw fa-question-circle"></i></a></label>
                        <input type="text" class="form-control" id="whats_includes" name="whats_includes" required
                               value="{{ $course->whats_includes }}" placeholder="Mobile support, Lesson archive...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Add another item<a href="#0" data-toggle="tooltip" data-placement="top"
                                                  title="Add another item"><i
                                        class="fa fa-fw fa-question-circle"></i></a></label>
                        <a href="#0" class="btn_1 gray add-another-item"><i class="fa fa-fw fa-plus-circle"></i>Add Item</a>
                    </div>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".add-another-item").click(function () {
                    $("#whats_includes").append(" , ");
                });
            });
        </script>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file-text"></i>Coupon</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="coupon_code" value="{{ $course->coupon_code }}"
                               placeholder="Coupon Code">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Coupon Code Discount Price</label>
                        <input type="number" class="form-control" name="coupon_code_discount_price"
                               value="{{ $course->coupon_code_discount_price }}"
                               placeholder="Coupon Code Discount Price">
                    </div>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-video-camera"></i>Videos</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Item</h6>
                    <table id="pricing-list-container" style="width:100%;">

                        <?php $courses_files = DB::table('courses_files')->where('course_id', $course->id)->first(); ?>
                        <?php $arr_video_title = json_decode($courses_files->video_title); $arr_video_category = json_decode($courses_files->video_category); $arr_video_url = json_decode($courses_files->video_url); ?>
                        @for ($i=0; $i < count($arr_video_title); $i++)
                            <tr class="pricing-list-item">
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="video_title[]" required
                                                       value="{{ $arr_video_title[$i] }}" placeholder="Video title">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="video_category[]" required
                                                       value="{{ $arr_video_category[$i] }}"
                                                       placeholder="Video category">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="video_url[]" required
                                                       value="{{ $arr_video_url[$i] }}" placeholder="Video URL">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </table>
                    <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add
                        Item</a>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->
        <p>
            <input type="submit" class="btn_1 medium" required value="Save">
        </p>
    </form>

@endsection