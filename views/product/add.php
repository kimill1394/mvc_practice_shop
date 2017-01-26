<div class="middle">
  <form name="add_form" action="<?= $base_url ?>/insert" method="post" enctype='multipart/form-data'>
    <div class="option">
      <table>
        <tr>
          <td class="label">상품명</td>
          <td><input type="text" name="itemname" value="상품명"></td>
        </tr>
        <tr>
          <td class="label">가격</td>
          <td><input type="text" name="itemprice" value="가격"></td>
        </tr>
        <tr>
          <td class="label">종류</td>
          <td>
            <select class="" name="category">
              <?php foreach($categorys as $category): ?>
                <option value="<?=$category['categoryno']?>"><?=$category['category']?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="label">이미지</td>
          <td><input type='file' name='itemimg'></input></td>
        </tr>
        <tr>
          <td class="label">품질</td>
          <td><input type="text" name="itemstar" value="품질"></td>
        </tr>
      </table>
    </div>
    <input type="submit" name="" value="아이템 추가">
  </form>
</div>
