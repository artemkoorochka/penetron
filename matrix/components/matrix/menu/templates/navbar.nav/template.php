<?
/**
 * @var array $arResult
 */
if(empty($arResult))
    return;
?>
<ul class="navbar-nav mr-auto">
    <?foreach ($arResult as $item):?>
        <?if(empty($item[5])):?>
        <li class="nav-item">
            <a class="nav-link" href="<?=$item[1]?>"><?=$item[0]?></a>
        </li>
        <?else:?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="<?=$item[1]?>"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"><?=$item[0]?></a>

                <div class="dropdown-menu">
                    <?foreach ($item[5] as $subItem):?>
                        <a class="dropdown-item" href="<?=$subItem[1]?>"><?=$subItem[0]?></a>
                    <?endforeach;?>
                </div>
            </li>
        <?endif;?>
    <?endforeach;?>
</ul>