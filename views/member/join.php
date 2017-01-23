<script type="text/javascript">

       function check_input()
       {
          if (!document.member_form.userid.value)
          {
              alert("id를 입력하지 않은 것 같은데욥");
              document.member_form.userid.focus();
              return;
          }
          if (!document.member_form.userpw.value)
          {
              alert("패스워드를 입력하지 않은 것 같은데욥");
              document.member_form.userpw.focus();
              return;
          }
          if (!document.member_form.userpwcheck.value)
          {
              alert("패스워드를 확인하지 않은 것 같은데욥");
              document.member_form.userpwcheck.focus();
              return;
          }
          if (!document.member_form.username.value)
          {
              alert("이름이 없으신가욥?");
              document.member_form.username.focus();
              return;
          }
          if (document.member_form.userpw.value !=
                document.member_form.userpwcheck.value)
          {
              alert("에헤이~ 비밀번호 틀린 것 같은데욥");
              document.member_form.userpw.focus();
              document.member_form.userpw.select();
              return;
          }
          document.member_form.submit();
       }

    </script>
<div class="middle">
  <div class="mymenutitle">
    <div> JOIN </div>
  </div>
  <div class="joinpannel">
    <form class="" action="<?= $base_url ?>/member/register" method="post" name="member_form">
      <input type="hidden" name="_token" value="<?php print $this->escape($_token);?>">
      <div class="jointitle">회원정보입력</div>
      <div class="table">
        <table class="jointable">
          <tr>
            <td>이름</td>
            <td><input type="text" name="username" value="jina"></td>
          </tr>
          <tr>
            <td>아이디</td>
            <td><input type="text" name="userid" value="jina"></td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td><input type="password" name="userpw" value="jina"></td>
          </tr>
          <tr>
            <td>비밀번호 확인</td>
            <td><input type="password" name="userpwcheck" value="jina"></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" name="email1" value="jina">@<input type="text" name="email2" value="jina"></td>
          </tr>
        </table>
      </div>
      <div class="btn">
        <input type="button" value="JOIN" onClick="check_input()">
      </div>
    </form>
  </div>
</div>
