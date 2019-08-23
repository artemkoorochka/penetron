<?
/**
 * @var array $arResult
 */
if(empty($arResult))
    return;
?>
<ul class="navbar-nav mr-auto">

    <?foreach ($arResult as $item):?>
        <li class="nav-item">
            <a class="nav-link" href="<?=$item[1]?>"><?=$item[0]?></a>
        </li>
    <?endforeach;?>



</ul>