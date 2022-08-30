<h1><?=$category['title']?></h1>

<?php foreach ($news as $item):?>

<div style="border: 1px solid green;">
    <h2><a href="<?=route('news.show', ['id' => $item['id']])?>"><?=$item['title']?></a></h2>
    <p>Категория: <?=$category['title']?></p>
    <p><?=$item['author']?> - <?=$item['created_at']->format('d-m-Y H:i')?></p>
    <p><?=$item['description']?></p>
</div>

<?php endforeach;?>
