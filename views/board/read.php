<div class="middle">
  <div class="content">
    <div class="readwrap">
      <table class="readtable">
        <tr>
          <td>제목</td>
          <td colspan="2"><?= $board['freetitle'] ?></td>
        </tr>
        <tr>
          <td>작성자</td>
          <td><?= $board['freewriter'] ?></td>
          <td><?= $board['freedate'] ?></td>
        </tr>
        <tr>
          <td colspan="3"><?= $board['freecontent'] ?></td>
        </tr>
      </table>
      <div class="readfile">
        <?php if($files): foreach ($files as $file): ?>
          <a href="<?=$base_url?>/download/<?=$file['freeno']?>/<?=$file['filename']?>"><?=$file['filename']?></a>
        <?php endforeach; else: ?>
          <p>등록된 파일이 없습니다!</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if(($session->get('user')['usertype'] == 'admin') || ($board['freewriter'] == $session->get('user')['userid'])): ?>
  <div class="option">
    <div class="btn">
      <div class="modifybtn">
        <a href="<?=$base_url?>/board/write/<?= $board['freeno'] ?>">수정</a>
      </div>
      <div class="modifybtn">
        <a href="<?=$base_url?>/board/delete/<?=$board['freeno'] ?>">삭제</a>
      </div>
      <!-- <div class="deletebtn"><a href="./write.php?mode=delete&amp;no=$_GET['no'] ">삭제</a</div> -->
    </div>
  </div>
  <?php endif; ?>
</div>
