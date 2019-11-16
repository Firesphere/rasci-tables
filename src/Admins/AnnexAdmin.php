<?php


namespace Firesphere\ISO27001Compliance\Admins;

use Firesphere\ISO27001Compliance\Models\AnnexSet;
use Firesphere\ISO27001Compliance\Models\Team;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \Firesphere\ISO27001Compliance\Admins\AnnexAdmin
 *
 */
class AnnexAdmin extends ModelAdmin
{
    private static $menu_title = 'ISO27k1 Compliance';

    private static $url_segment = 'ISO27001Compliance';

    private static $menu_icon_class = 'font-icon-block-file-list';

    private static $managed_models = [
        AnnexSet::class,
        Team::class,
    ];
}
