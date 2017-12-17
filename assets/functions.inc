<?PHP
  #------------------ error 처리 함수 --------------------#
  function error( $msg )
  {
    echo("
    <script language=\"javascript\">
      alert( \"$msg\" );
      history.back();
    </script>" );
  }
  
  #---------------- forwarding 처리 함수 ------------------#
  function forward( $url )
  {
    header( "Location:".$url );
    //echo( "<meta http-equiv='Refresh' content='0'; URL=list.html" );
  }

  #--------------- 링크를 만들어 주는 함수 ------------------#
  function dest_url( $link, $page, $uid=NULL )
  {
      GLOBAL $kind;
      GLOBAL $key;

      $link .= "?page=$page";
      if ( $uid )
        $link .= "&uid=$uid";
      if ( $key )
        $link .= "&kind=$kind&key=$key";
      return $link;
  }

?>
