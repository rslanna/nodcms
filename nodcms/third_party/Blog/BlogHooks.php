<?php
/**
 * Created by Mojtaba Khodakhah.
 * Date: 20-May-19
 * Time: 2:37 PM
 * Project: NodCMS
 * Website: http://www.nodcms.com
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class BlogHooks extends NodcmsHooks
{
    function backend()
    {
        define('BLOG_ADMIN_URL',base_url().'admin-blog/');
        $this->CI->load->add_package_path(APPPATH."third_party/Blog");
        $this->CI->load->model("Blog_posts_model");
        $this->CI->load->model("Blog_category_model");

        if($this->CI->userdata["group_id"]==1){
            $addon_sidebar = array(
                'blog' => array(
                    'url'=>'javascript:;',
                    'icon'=>'far fa-window-maximize',
                    'title'=>_l("Blog", $this->CI),
                    'sub_menu'=>array(
                        'blog_posts' => array(
                            'url'=>BLOG_ADMIN_URL.'posts',
                            'title'=>_l("Posts", $this->CI),
                        ),
                        'blog_categories' => array(
                            'url'=>BLOG_ADMIN_URL.'categories',
                            'title'=>_l("Categories", $this->CI),
                        ),
                    )
                ),
            );
            $this->CI->addToAdminSidebar($addon_sidebar);
        }
    }
}