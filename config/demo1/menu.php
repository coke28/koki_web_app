<?php

use App\Core\Adapters\Theme;

return array(
    // Refer to config/global/menu.php

    // Horizontal menu
    'horizontal' => array(
        // Dashboard
        array(
            'title'   => 'HOME',
            'path'    => 'index',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Resources
        array(
            'title'      => 'Lists & Reports',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    // Documentation
                    array(
                        'title' => 'Leads List',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotone/Files/File.svg", "svg-icon-2"),
                        'path'  => 'list/lead',
                    ),

                    // Changelog
                    array(
                        'title' => 'Account List',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotone/Files/File.svg", "svg-icon-2"),
                        'path'  => 'list/account',
                    ),
                    array(
                        'title' => 'Campaign List',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotone/Files/File.svg", "svg-icon-2"),
                        'path'  => 'list/campaign',
                    ),
                    array(
                        'title' => 'Report',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotone/Files/File.svg", "svg-icon-2"),
                        'path'  => 'list/admin',
                    ),
                ),
            ),
        ),

        // Mega menu
        array(
            'title'      => 'Administration Tools',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5',
                'view'  => 'layout/header/_mega-menu',
            ),
        ),
        array(
            'title'      => 'Misc',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    // Documentation
                    array(
                        'title' => 'Upload CSV/EXCEL',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotone/Files/File.svg", "svg-icon-2"),
                        'path'  => 'misc/uploadCSV',
                    ),
                   
                ),
            ),
        ),
    ),
);
