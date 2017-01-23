<div class="middle">
  <form name="order_form" action="<?= $base_url ?>/buy/<?= $details['itemno'] ?>" method="post">
    <div class="order">
      <div class="itemimg">
        <img src="<?= $details['itemimg'] ?>" alt="">
      </div>
      <div class="orderoption">
        <div clas="summury">
          <div class="itemname"><?= $details['itemname'] ?></div>
          <div class="itemcontent">comment</div>
        </div>
        <div class="option">
          <table>
            <tr>
              <td class="label">판매가격</td>
              <td><?= $details['itemprice'] ?></td>
            </tr>
            <tr>
              <td class="label">적립금</td>
              <td>pluspoint</td>
            </tr>
            <tr>
              <td class="label">종류</td>
              <td><?= $details['category'] ?></td>
            </tr>
            <tr>
              <td class="label">품질</td>
              <td><?= $details['itemstar'] ?></td>
            </tr>
            <tr>
              <td class="label">이름</td>
              <td><input type="text" name="name" value="양 이름을 입력해 주세요"></td>
            </tr>
          </table>
          <div class="totalprice">total: [여기 총 금액이 있음]</div>
        </div>
      </div>
    </div>
    <div class="ordermenu">
      <div class="divbtn buyitnow">
        <input type="image" src="../../img/btn_buy.jpg" name="selectmode" value="buy" onclick="check_name()">
      </div>
      <div class="divbtn addcart">장바구니</div>
      <div class="divbtn wishlist">언젠간 사고 말겠음양!</div>
    </div>
  </form>
  <div class="review">
    <div class="notice">[여기에 리뷰 관련 알림이 있음]</div>
    <div class="reviewcontents">
      <div class="minicategory"><b>REVIEW<b> | 실구입자의 사실적인 리뷰만 올라오도록 관리하고 있음양ㅎ.ㅎ</div>
      <div class="reviewlist">[여기 리뷰 게시물 리스트가 있음]</div>
      <div class="page">
        <ul>
          <li><a href="">처음으로</a></li>
          <li><a href="">이전</a></li>
          <li><a href="">1</a></li>
          <li><a href="">다음</a></li>
          <li><a href="">끝으로</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="qna">
    <div class="qnalist">[여기 qna 게시물 리스트가 있음]</div>
    <div class="page">
      <ul>
        <li><a href="">처음으로</a></li>
        <li><a href="">이전</a></li>
        <li><a href="">1</a></li>
        <li><a href="">다음</a></li>
        <li><a href="">끝으로</a></li>
      </ul>
    </div>
  </div>
</div>
