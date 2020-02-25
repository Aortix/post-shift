<?php

class Category
{
    public function __constructor()
    {
    }

    public function getDomainName($wp)
    {
        //Gets current URL
        $current_url = home_url(add_query_arg(array(), $wp->request));

        $length_of_url = strlen($current_url);

        //Snips off protocol portion of URL
        $indexToCut = strpos($current_url, get_bloginfo('name'));
        $current_url_no_protocol = substr($current_url, $indexToCut, $length_of_url);
        //Retrieves domain name portion of URL
        $indexToCut = strpos($current_url_no_protocol, "/");
        $current_domain_name = substr($current_url_no_protocol, 0, $indexToCut);

        return ucfirst($current_domain_name);
    }

    public function getCategories($wp)
    {
        //Gets Current URL
        $current_url = home_url(add_query_arg(array(), $wp->request));

        $length_of_url = strlen($current_url);

        //Snips off protocol portion of URL
        $indexToCut = strpos($current_url, get_bloginfo('name'));
        $current_url_no_protocol = substr($current_url, $indexToCut, $length_of_url);

        //Start working through the URL getting each section as a string
        $sections_of_url = array();
        $indexToCut = strpos($current_url_no_protocol, "/");
        $length_of_url = strlen($current_url_no_protocol);
        $current_url_no_protocol = substr($current_url_no_protocol, $indexToCut + 1, $length_of_url);
        while ($indexToCut != false) {
            $indexToCut = strpos($current_url_no_protocol, "/");
            $portion_of_url = substr($current_url_no_protocol, 0, $indexToCut);
            if ($portion_of_url != "category" and $portion_of_url != "author") {
                $cat_id = get_cat_ID($portion_of_url);
                $cat_link = get_category_link($cat_id);
                //Push name and link of category onto an array
                $sections_of_url[ucfirst($portion_of_url)] = $cat_link;
            }
            $current_url_no_protocol = substr($current_url_no_protocol, $indexToCut + 1, $length_of_url);
            $length_of_url = strlen($current_url_no_protocol);
            $indexToCut = strpos($current_url_no_protocol, "/");
        }
        return $sections_of_url;
    }

    public function getSubCategories()
    {
        $parent_term_id = get_cat_ID(single_cat_title('', false));
        $taxonomies = array('category');
        $args = array('parent' => $parent_term_id);
        $terms = get_terms($taxonomies, $args);
        return $terms;
    }
}
