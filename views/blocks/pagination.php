<?php if ($countPages > 1): ?>
<ul class="pagination pagination-sm">

    <li <?php if($page ==1):?>
        class="disabled"
        <?php endif ?> >
        <a href="<?php if($page !=1) {echo '/article/category-'.$is_category.'/city-'.$is_city.'/page-'.($page-1);} else{ echo '#'; } ?>">Назад</a>
    </li>
    <?php $countPages ?>
    <?php for($i = 1; $i<=$countPages; $i++): ?>
    <li <?php if($page==$i): ?>class="active"<?php endif ?>>
        <a  href="<?php echo '/article/category-'.$is_category.'/city-'.$is_city.'/page-'.$i ?>"><?php echo $i ?></a>
    </li>
    <?php endfor?>
    <li <?php if($page==$countPages): ?>class="disabled"<?php endif ?> >
        <a href="<?php if($page !=$countPages) { echo '/article/category-'.$is_category.'/city-'.$is_city.'/page-'.($page+1); }else{ echo '#';  } ?>">Вперед</a>
    </li>
</ul>
    <?php endif ?>