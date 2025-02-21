<div class="owt7-lms">
    <div class="owt7_library_add_bookcase">

        <div class="page-header">
            <div class="breadcrumb"> 
                <?php esc_html_e("Library System", "library-management-system"); ?> >> 
                <span class="active"><?php esc_html_e("Add New Bookcase", "library-management-system"); ?></span> 
            </div>
            <div class="page-actions">
            <?php 
                // Generate the nonce for the actions
                $page_nonce = wp_create_nonce('owt7_manage_bookcase_page_nonce');
            ?>
                <a href="admin.php?page=owt7_library_bookcases&mod=section&fn=list&_wpnonce=<?php echo esc_attr($page_nonce); ?>" class="btn"><?php esc_html_e("List Section", "library-management-system"); ?></a>
                <a href="admin.php?page=owt7_library_bookcases&mod=section&fn=add&_wpnonce=<?php echo esc_attr($page_nonce); ?>" class="btn"><?php esc_html_e("Add New Section", "library-management-system"); ?></a>
                <a href="admin.php?page=owt7_library_bookcases" class="btn"><?php esc_html_e("List Bookcase", "library-management-system"); ?></a>
            </div>
        </div>

        <div class="page-container">

            <div class="page-title">
                <?php if (isset($params['action'])) { ?> 
                    <h2><?php echo esc_html(ucfirst($params['action'])); ?> <?php esc_html_e("Bookcase", "library-management-system"); ?></h2> 
                <?php } else { ?> 
                    <h2><?php esc_html_e("Add Bookcase", "library-management-system"); ?></h2> 
                <?php } ?> 
            </div>

            <form class="owt7_lms_bookcase_form" id="owt7_lms_bookcase_form" action="javascript:void(0);" method="post">

                <?php wp_nonce_field('owt7_library_actions', 'owt7_lms_nonce'); ?>
                <input type="hidden" name="action_type" value="<?php echo isset($params['action']) && !empty($params['action']) ? esc_attr($params['action']) : 'add'; ?>">
                <?php if (isset($params['action']) && $params['action'] == 'edit') { ?>
                    <div class="form-row buttons-group">
                        <input type="hidden" name="edit_id" value="<?php echo isset($params['bookcase']['id']) ? esc_attr($params['bookcase']['id']) : ''; ?>">
                    </div>
                <?php } ?>

                <div class="form-row">
                    <!-- Bookcase name -->
                    <div class="form-group">
                        <label for="owt7_txt_bookcase_name"><?php esc_html_e("Name", "library-management-system"); ?> <span class="required">*</span></label>
                        <input type="text" <?php echo isset($params['action']) && $params['action'] == 'view' ? 'disabled' : ''; ?> value="<?php echo isset($params['bookcase']['name']) ? esc_attr($params['bookcase']['name']) : ''; ?>" required id="owt7_txt_bookcase_name" name="owt7_txt_bookcase_name" placeholder="...">
                    </div>
                    <!-- Status -->
                    <div class="form-group">
                        <label for="owt7_dd_bookcase_status"><?php esc_html_e("Status", "library-management-system"); ?> <span class="required">*</span></label>
                        <select <?php echo isset($params['action']) && $params['action'] == 'view' ? 'disabled' : ''; ?> required id="owt7_dd_bookcase_status" name="owt7_dd_bookcase_status">
                            <option value=""><?php esc_html_e("-- Select Status --", "library-management-system"); ?></option>
                            <?php 
                            if (!empty($params['statuses']) && is_array($params['statuses'])) {
                                foreach ($params['statuses'] as $key => $status) {
                                    $selected = "";
                                    if (isset($params['bookcase']['status']) && $params['bookcase']['status'] == $key) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option <?php echo esc_attr($selected); ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html(ucfirst($status)); ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <?php if (isset($params['action']) && $params['action'] == 'view') { } else { ?>                
                    <div class="form-row buttons-group">
                        <button class="btn submit-save-btn" type="submit"><?php esc_html_e("Submit & Save", "library-management-system"); ?></button>
                    </div>
                <?php } ?>

            </form>

        </div>
    </div>

</div>
