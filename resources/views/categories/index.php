<div>
    <h2>Категории</h2>
    <ul>
        <?php foreach ($categories as $category):?>
            <li><a href="<?=route('categories.show', ['id' => $category['id']])?>"><?=$category['title'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>


