<div class="middle">
  <div class="mymenutitle">
    <div> MEMBER LOGIN </div>
  </div>
  <div class="loginpannel">
    <form class="" action="<?= $base_url ?>/member/authenticate" method="post">
      <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
      <table class="logintable">
        <tr>
          <td>
            <div class="trtitle">ID</div>
          </td>
          <td>
            <div><input type="text" name="id" value="jina"></div>
          </td>
          <td rowspan="2">
            <div><input type="image" name="login" src="../../img/ryan.jpg"></div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="trtitle">PASSWORD</div>
          </td>
          <td>
            <div><input type="password" name="passwd" value="jina"></div>
          </td>
        </tr>
      </table>
    </form>
    <table class="loginoptiontable">
      <tr>
        <td class="question">아직 회원이 아님양?</td>
        <td class="menulink"><b>회원가입</b></td>
      </tr>
      <tr>
        <td class="question">로그인 정보를 잊음양?</td>
        <td class="menulink"><b>아이디/비밀번호찾기</b></td>
      </tr>
    </table>
  </div>
</div>
