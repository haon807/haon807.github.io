<?php
add_action(
	'learn-press/after-courses-loop-item', function (){
        learn_press_courses_loop_item_students();
    }, 41
);

/**
 * Instructor 
 */
add_action( 'learn-press/before-courses-loop-item', 'learn_press_education_instructor' , 1010 );
if(!function_exists('learn_press_education_instructor')){
    function learn_press_education_instructor (){
        $course = learn_press_get_course();
        $user_id = get_the_author_meta( 'ID' );
        ?>

        <div class="course-instructor lp-education-instructor" itemscope itemtype="http://schema.org/Person">
            <?php echo get_avatar( $user_id, 50 ); ?>
            <div class="author-contain">
                <div class="value" itemprop="name">
                    <?php
                    if($course){
                        echo $course->get_instructor_html();
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

/** theme breadcrumb */
if(class_exists('LearnPress')){
    remove_action( 'learn-press/before-main-content', LP()->template( 'general' )->func( 'breadcrumb' ) );
    add_action( 'learn-press/before-main-content', function(){
        do_action( 'educenter_add_breadcrumb', 10 );
    } );
}