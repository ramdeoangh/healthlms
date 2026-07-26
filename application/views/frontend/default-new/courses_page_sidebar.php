<form action="<?php echo site_url('home/courses'); ?>" method="get" id="course_filter_form">

<?php
function updateQueryString($key, $value) {
    $query = $_GET; 
    $query[$key] = $value; 
    return site_url('home/courses') . '?' . http_build_query($query);
}
?>

    <?php if(isset($_GET['query']) && !empty($_GET['query'])): ?>
        <input type="hidden" name="query" value="<?php echo $_GET['query']; ?>">
    <?php endif; ?>

    <div class="course-all-category">
      
        <div class="accordion" id="accordion">
            <!-- Accordion -->
             <div class="accordion-item course-category">
                <div class="form-group" >
                   <input type="text" name="title" placeholder="<?php echo site_phrase('Search by keyword'); ?>" 
                      class="form-control" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">
                        <button type="submit">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.62496C0.9375 4.38746 4.3875 0.937458 8.625 0.937458C12.8625 0.937458 16.3125 4.38746 16.3125 8.62496C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.06246C5.0025 2.06246 2.0625 5.00996 2.0625 8.62496C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.62496C15.1875 5.00996 12.2475 2.06246 8.625 2.06246Z" fill="#0D0C23"></path>
                                <path d="M16.4991 17.0625C16.3566 17.0625 16.2141 17.01 16.1016 16.8975L13.4991 14.2951C13.2816 14.0776 13.2816 13.7176 13.4991 13.5001C13.7166 13.2826 14.0766 13.2826 14.2941 13.5001L16.8966 16.1025C17.1141 16.32 17.1141 16.68 16.8966 16.8975C16.7841 17.01 16.6416 17.0625 16.4991 17.0625Z" fill="#0D0C23"></path>
                            </svg>
                       </button>
                    </div>
                    <h3 class="accordion-header d-flex">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo get_phrase('Categories'); ?></button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <!--  -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="all" name="category" id="category_all" <?php if ($selected_category == 'all') echo 'checked'; ?>>
                                <label class="form-check-label <?php if ($selected_category == 'all') echo 'active'; ?>" for="category_all">
                                    <div class="category-heading">
                                        <a href="<?php echo updateQueryString('category', 'all'); ?>" class="text-13px"><?php echo get_phrase('All category'); ?></a>
                                    </div>
                                    <span>(<?php echo $this->crud_model->get_active_course()->num_rows(); ?>)</span>
                                </label>
                            </div>

                            <div class="webdesign webdesign-category less">
                                <?php $categories = $this->crud_model->get_categories()->result_array(); ?>
                                <?php foreach ($categories as $category): ?>
                                    <?php $course_number = $this->crud_model->get_active_course_by_category_id($category['id'], 'category_id')->num_rows(); ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="<?php echo $category['slug'] ?>" name="category" id="category-<?php echo $category['id']; ?>" <?php if ($selected_category == $category['slug']) echo 'checked'; ?>>
                                        <label class="form-check-label <?php if ($selected_category == $category['slug']) echo 'active'; ?>" for="category-<?php echo $category['id']; ?>">
                                            <div class="category-heading">
                                                <a href="<?php echo updateQueryString('category', $category['slug']); ?>"><?php echo $category['name']; ?></a>
                                            </div>
                                            <span>(<?php echo $course_number; ?>)</span>
                                        </label>
                                    </div>
                                    <ul>
                                        <?php foreach ($this->crud_model->get_sub_categories($category['id']) as $sub_category): ?>
                                            <?php $course_number = $this->crud_model->get_active_course_by_category_id($sub_category['id'], 'sub_category_id')->num_rows(); ?>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="<?php echo $sub_category['slug'] ?>" name="category" id="sub_category-<?php echo $sub_category['id']; ?>" <?php if ($selected_category == $sub_category['slug']) echo 'checked'; ?>>
                                                    <label class="form-check-label <?php if ($selected_category == $sub_category['slug']) echo 'active'; ?>" for="sub_category-<?php echo $sub_category['id']; ?>">
                                                        <a href="<?php echo updateQueryString('category', $sub_category['slug']); ?>"><?php echo $sub_category['name']; ?></a>
                                                        <span>(<?php echo $course_number; ?>)</span>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </div>

                            <div class="show-more">
                                <a class="show-more-less-btn" href="#" onclick="$('.course-all-category .course-category .webdesign-category').toggleClass('less'); $('.show-more-less-btn').toggleClass('d-none');"><?php echo get_phrase('Show More'); ?></a>
                                <a class="show-more-less-btn d-none" href="#" onclick="$('.course-all-category .course-category .webdesign-category').toggleClass('less'); $('.show-more-less-btn').toggleClass('d-none');"><?php echo get_phrase('Show Less'); ?></a>
                            </div>
                            
                            <!--  -->
                        </div>
                    </div>
                </div>
              <!-- Accordion -->
              <div class="accordion-item course-price course-category">
                    <h3 class="accordion-header d-flex">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><?php echo get_phrase('Price'); ?></button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <!--  -->
                            <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="all" id="price_all" onchange="filterCourse()" <?php if($selected_price== 'all') echo 'checked'; ?>>
                                    <label class="form-check-label <?php if($selected_price== 'all') echo 'active'; ?>" for="price_all">
                                        <!-- <span class="text-13px"><?php echo get_phrase('All'); ?></span> -->
                                        <a href="<?php echo updateQueryString('price', 'all'); ?>" class="text-13px"><?php echo get_phrase('All'); ?></a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="free"  id="price_free" onchange="filterCourse()" <?php if($selected_price == 'free') echo 'checked'; ?>>
                                    <label class="form-check-label <?php if($selected_price== 'free') echo 'active'; ?>" for="price_free">
                                        <a href="<?php echo updateQueryString('price', 'free'); ?>" class="text-13px"><?php echo get_phrase('Free'); ?></a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="paid" id="price_paid" onchange="filterCourse()" <?php if($selected_price == 'paid') echo 'checked'; ?>>
                                    <label class="form-check-label <?php if($selected_price== 'paid') echo 'active'; ?>" for="price_paid">
                                        <a href="<?php echo updateQueryString('price', 'paid'); ?>" class="text-13px"><?php echo get_phrase('Paid'); ?></a>
                                    </label>
                                </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
              <!-- Accordion -->
              <div class="accordion-item course-price course-category">
                    <h3 class="accordion-header d-flex">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><?php echo get_phrase('Level'); ?></button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <!--  -->
                            <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="all" id="level_all" onchange="filterCourse()" <?php if($selected_level == 'all') echo 'checked'; ?>>
                                    <label class="form-check-label" for="level_all">
                                       
                                        <a href="<?php echo updateQueryString('level', 'all'); ?>" class="text-13px"><?php echo get_phrase('All'); ?></a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="beginner" name="level" id="level_beginner" onchange="filterCourse()" <?php if($selected_level == 'beginner') echo 'checked'; ?>>
                                    <label class="form-check-label" for="level_beginner">
                                        <a href="<?php echo updateQueryString('level', 'beginner'); ?>" class="text-13px"><?php echo get_phrase('Beginner'); ?></a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="intermediate" name="level" id="level_intermediate" onchange="filterCourse()" <?php if($selected_level == 'intermediate') echo 'checked'; ?>>
                                    <label class="form-check-label" for="level_intermediate">
                                        <a href="<?php echo updateQueryString('level', 'intermediate'); ?>" class="text-13px"><?php echo get_phrase('Intermediate'); ?></a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="advanced" name="level" id="level_advanced" onchange="filterCourse()" <?php if($selected_level == 'advanced') echo 'checked'; ?>>
                                    <label class="form-check-label" for="level_advanced">
                                        <a href="<?php echo updateQueryString('level', 'advanced'); ?>" class="text-13px"><?php echo get_phrase('Advanced'); ?></a>
                                    </label>
                                </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
              <!-- Accordion -->
               <div class="accordion-item course-price course-category">
                    <h3 class="accordion-header d-flex">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><?php echo get_phrase('Language'); ?></button>
                    </h3>
                    <div id="collapseFour" class="accordion-collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <!--  -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="all" name="language" id="language_all" <?php if ($selected_language == 'all') echo 'checked'; ?>>
                                <label class="form-check-label" for="language_all">
                                    <a href="<?php echo updateQueryString('language', 'all'); ?>" class="text-13px"><?php echo get_phrase('All'); ?></a>
                                </label>
                            </div>

                            <div class="webdesign webdesign-lan less">
                                <?php
                                $languages = $this->crud_model->get_all_languages();
                                foreach ($languages as $language): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="<?php echo strtolower($language); ?>" name="language" id="language_<?php echo $language; ?>" <?php if ($selected_language == strtolower($language)) echo 'checked'; ?>>
                                        <label class="form-check-label" for="language_<?php echo $language; ?>">
                                            <a href="<?php echo updateQueryString('language', strtolower($language)); ?>" class="text-13px"><?php echo ucfirst($language); ?></a>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                                <div class="show-more">
                                    <a class="show-more-less-btn-lan" href="#" onclick="$('.course-all-category .course-category .webdesign-lan').toggleClass('less'); $('.show-more-less-btn-lan').toggleClass('d-none');"><?php echo get_phrase('Show More'); ?></a>
                                    <a class="show-more-less-btn-lan d-none" href="#" onclick="$('.course-all-category .course-category .webdesign-lan').toggleClass('less'); $('.show-more-less-btn-lan').toggleClass('d-none');"><?php echo get_phrase('Show Less'); ?></a>
                                </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
              <!-- Accordion -->
               <div class="accordion-item course-price course-category">
                    <h3 class="accordion-header d-flex">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><?php echo get_phrase('Ratings'); ?></button>
                    </h3>
                    <div id="collapseFive" class="accordion-collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <!--  -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" value="all" id="rating_all" <?php if($selected_rating == 'all') echo 'checked'; ?>>
                                <label class="form-check-label" for="rating_all">
                                    <a href="<?php echo updateQueryString('rating', 'all'); ?>" class="text-13px"><?php echo get_phrase('All'); ?></a>
                                </label>
                            </div>

                            <div class="course-icon">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="<?php echo $i; ?>" id="rating_<?php echo $i; ?>" name="rating" <?php if ($selected_rating == $i) echo 'checked'; ?>>
                                        <label class="form-check-label" for="rating_<?php echo $i; ?>">
                                            <a href="<?php echo updateQueryString('rating', $i); ?>">
                                                <div class="form-check-icon">
                                                    <ul>
                                                        <?php for ($sub_i = 1; $sub_i <= 5; $sub_i++): ?>
                                                            <li class="<?php if ($i >= $sub_i) echo 'icon-color'; ?>">
                                                                <i class="fa-solid fa-star"></i>
                                                            </li>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </a>
                                        </label>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <!--  -->
                        </div>
                    </div>
                </div>
                
            </div>
        <!--  -->
    </div>

    
    <input id="sorting_hidden_input" type="hidden" name="sort_by" value="<?php echo $selected_sorting; ?>">
    
</form>


<script>




</script>