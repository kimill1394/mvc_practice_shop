<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>쉽팜 인 슈가랜드 </title>
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
    <script type="text/javascript">
      function gohome() {
        window.location.replace("");
      }
    </script>
  </head>
  <body>
    <div class="header">
      <div class="eventlogo">[여기 이런 이벤트가 있다고 표시함]</div>
      <div class="membermenu">
        <ul>
          <li><?php
                if($session->isAuthenticated())
                  echo "<a href='$base_url/member/modify'>".$session->get("user")['username']."</a>님";
                else
                  echo "<a href='$base_url/member/login'>로그인</a>";
              ?></li>
          <li><?php
                if($session->isAuthenticated())
                  echo "<a href='$base_url/member/logout'>로그아웃</a>";
                else
                  echo "<a href='$base_url/member/join'>회원가입</a>";
             ?></li>
          <li><a href="<?= $base_url ?>/mypage">마이페이지</a></li>
          <li><a href="">Q&amp;A</a></li>
          <li><a href=""><img src="" alt="">[여기 검색 아이콘이 있음]</a></li>
        </ul>
      </div>
      <div class="logo" onclick="gohome()">[여기 페이지 로고 이미지가 있음 -> 클릭 시 홈으로 이동합니다!]</div>
      <div class="menubar">
        <ul>
          <li><a href="<?= $base_url ?>/list/8">NEW10%</a></li>
          <li><a href="<?= $base_url ?>/list/9">BEST10</a></li>
          <li><a href="<?= $base_url ?>/list/1">플레인램</a></li>
          <li><a href="<?= $base_url ?>/list/2">슈크림램</a></li>
          <li><a href="<?= $base_url ?>/list/3">블레이징램</a></li>
          <li><a href="<?= $base_url ?>/list/4">천사양</a></li>
          <li><a href="<?= $base_url ?>/list/5">악마양</a></li>
          <li><a href="<?= $base_url ?>/list/7">SALE</a></li>
          <li><a href="<?= $base_url ?>/list/6">작물</a></li>
          <li><a href="<?= $base_url ?>/board/list">게시판</a></li>
        </ul>
      </div>
    </div>




    <div id="main">
        <?php print $_content; ?>
    </div>



    <div class="footer">
      <div class="footer-A">
        <div class="centerinfo">
          <ul classs="center">
            <li class="bold">CUSTOMER CENTER</li>
            <li class="bold">053-0001-1000</li>
            <li>OPEN: 08:45am - 10:00pm</li>
            <li>LUNCH: 11:00am - 02:00pm</li>
            <li>OFF: HOLIDAY</li>
          </ul>
        </div>
        <div class="community">
          <li class="bold">COMMUNITY</li>
          <li><a href="">NOTICE</a></li>
          <li><a href="">EVENT</a></li>
          <li><a href="">SHOPPING GUIDE</a></li>
        </div>
      </div>
      <div class="footer-B">
        <div class="companyinfo">
          <div class="companyinfo_link">
            <ul>
              <li><a href="">회사소개</a></li>
              <li><a href="">개인정보취급방침</a></li>
              <li><a href="">채용정보</a></li>
            </ul>
          </div>
          <div class="companyinfo_text">
            <div>COMPANY: <b>쉽팜</b> ADDRESS: 대구북구복현동영진전문대학 TEL: 053-0001-1000 OWNER: 이진아 E-MAIL: wlsdk640@daum.net <b>반품주소</b>: 반품안받음</div>
          </div>
        </div>
        <div class="copyright">
          <div>COPYRIGHT(C) JINA ALL RIGHT RESERVED</div>
        </div>
      </div>
    </div>
    </body>
  </html>
