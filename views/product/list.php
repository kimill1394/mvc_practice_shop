<div class="middle">
  <div class="category">
    <div>카테고리</div>
  </div>
  <div class="sheeplist">
    <?php foreach($items as $item): ?>
    <li class="item">
      <div class="itembox">
        <form action="<?= $base_url."/detail/".$item['itemno'] ?>" method="POST">
          <input type="image" src="<?= $item['itemimg'] ?>">
          <div class="iteminfo">
            <div class="status"><img src="" alt=""><?= $item['itemstatus'] ?></div>
            <p class="itemname"><?= $item['itemname'] ?></p>
            <p class="star"><?= $item['itemstar'] ?></p>
            <p class="itemprice"><?= $item['itemprice']*(1-$item['itemsalerate']) ?></p>
          </div>
        </form>
      </div>
    </li>
  <?php endforeach; ?>
  </div>
  <div class="page">
    <ul>
      <?php for($i=1; $i<=$pagecount; <$i++): ?>
        <li><a href="<?= $base_url ?>/list/1">처음으로</a></li>
        <li><a href="<?= $base_url ?>/list/<?= $i-1 ?>">이전</a></li>
        <li><a href="<?= $base_url ?>/list/<?= $i ?>">1</a></li>
        <li><a href="<?= $base_url ?>/list/<?= $i+1 ?>">다음</a></li>
        <li><a href="<?= $base_url ?>/list/<?= $pagecount ?>">끝으로</a></li>
      <?php endfor; ?>
    </ul>
  </div>
</div>
