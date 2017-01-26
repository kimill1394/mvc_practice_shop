<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
<div class="middle">
  <div class="category">
    어떤 게시판
  </div>
    <form action='<?=$base_url?>/board/upload/<?=$board['freeno']?>' method='post' enctype='multipart/form-data'>
      <input type="hidden" name="_token" value="<?=$this->escape($_token)?>">
      <input type='text' name='title' value='<?=$board['freetitle']?>'>
      <textarea name='content' id='' cols='30' rows='10'><?=$board['freecontent']?></textarea>
      <input type='file' multiple name='upfile[]'></input>
      <input type='submit' value='write'>
    </form>
  </div>
