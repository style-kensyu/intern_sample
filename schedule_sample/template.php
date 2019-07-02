<?php
class template{

  /**
   * スケジュールのテンプレート
   * @param $s[] time 時間
   *          　  sid  ID
   *             text 予定
   * @param $i 順番
   */
  function schedule_plan($s,$i){
    $text = htmlspecialchars($s['text']);
    $html = <<<HTML
      <li class='list-count'>
      <input type="text" value="{$s['time']}" class="timepicker" name="change_time[]" data-time-format="H:i"/>
      <input type="hidden" value="{$s['sid']}" name="sid[]">
      <div>
        <input type='text' name='change_plan[]' size='35' value='{$text}' style='font-size:20px'>
        <button class='button2' type='submit' value={$i} name='change'>変更</button>
        <button class='button1' type='submit' value={$i} name='delete'>削除</button>
      </div>
      </li>
HTML;

  echo $html;
  }

  /**
   * 休日のテンプレート
   * @param $holiday 休日
   */
  function schedule_holiday($holiday){
    $html = <<<HTML
<li class='list-count'><font color='red' style='font-size:15px'>{$holiday}</font>
HTML;

    echo $html;
  }

}

?>
