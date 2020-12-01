<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.7
*/error_reporting(6135);$pc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($pc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Gg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Gg)$$X=$Gg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($t){$_d=substr($t,-1);return
str_replace($_d.$_d,$_d,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Pe,$pc=false){if(get_magic_quotes_gpc()){while(list($x,$X)=each($Pe)){foreach($X
as$rd=>$W){unset($Pe[$x][$rd]);if(is_array($W)){$Pe[$x][stripslashes($rd)]=$W;$Pe[]=&$Pe[$x][stripslashes($rd)];}else$Pe[$x][stripslashes($rd)]=($pc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Ha=false){static$sg=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($t,($Ha?array_flip($sg):$sg));}function
min_version($Tg,$Ld="",$h=null){global$g;if(!$h)$h=$g;$zf=$h->server_info;if($Ld&&preg_match('~([\d.]+)-MariaDB~',$zf,$_)){$zf=$_[1];$Tg=$Ld;}return(version_compare($zf,$Tg)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($Hf,$rg="\n"){return"<script".nonce().">$Hf</script>$rg";}function
script_src($Lg){return"<script src='".h($Lg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($A,$Y,$Wa,$xd="",$ne="",$ab="",$yd=""){$J="<input type='checkbox' name='$A' value='".h($Y)."'".($Wa?" checked":"").($yd?" aria-labelledby='$yd'":"").">".($ne?script("qsl('input').onclick = function () { $ne };",""):"");return($xd!=""||$ab?"<label".($ab?" class='$ab'":"").">$J".h($xd)."</label>":$J);}function
optionlist($B,$tf=null,$Pg=false){$J="";foreach($B
as$rd=>$W){$se=array($rd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($rd).'">';$se=$W;}foreach($se
as$x=>$X)$J.='<option'.($Pg||is_string($x)?' value="'.h($x).'"':'').(($Pg||is_string($x)?(string)$x:$X)===$tf?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($A,$B,$Y="",$me=true,$yd=""){if($me)return"<select name='".h($A)."'".($yd?" aria-labelledby='$yd'":"").">".optionlist($B,$Y)."</select>".(is_string($me)?script("qsl('select').onchange = function () { $me };",""):"");$J="";foreach($B
as$x=>$X)$J.="<label><input type='radio' name='".h($A)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ca,$B,$Y="",$me="",$Ge=""){$ag=($B?"select":"input");return"<$ag$Ca".($B?"><option value=''>$Ge".optionlist($B,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Ge'>").($me?script("qsl('$ag').onchange = $me;",""):"");}function
confirm($Td="",$uf="qsl('input')"){return
script("$uf.onclick = function () { return confirm('".($Td?js_escape($Td):'Are you sure?')."'); };","");}function
print_fieldset($s,$Bd,$Wg=false){echo"<fieldset><legend>","<a href='#fieldset-$s'>$Bd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$s');",""),"</legend>","<div id='fieldset-$s'".($Wg?"":" class='hidden'").">\n";}function
bold($Pa,$ab=""){return($Pa?" class='active $ab'":($ab?" class='$ab'":""));}function
odd($J=' class="odd"'){static$r=0;if(!$J)$r=-1;return($r++%2?$J:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($x,$X=null){static$qc=true;if($qc)echo"{";if($x!=""){echo($qc?"":",")."\n\t\"".addcslashes($x,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$qc=false;}else{echo"\n}\n";$qc=true;}}function
ini_bool($hd){$X=ini_get($hd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Sg,$O,$V,$F){$_SESSION["pwds"][$Sg][$O][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($Q){global$g;return$g->quote($Q);}function
get_vals($G,$e=0){global$g;$J=array();$I=$g->query($G);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$e];}return$J;}function
get_key_vals($G,$h=null,$Bf=true){global$g;if(!is_object($h))$h=$g;$J=array();$I=$h->query($G);if(is_object($I)){while($K=$I->fetch_row()){if($Bf)$J[$K[0]]=$K[1];else$J[]=$K[0];}}return$J;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$lb=(is_object($h)?$h:$g);$J=array();$I=$lb->query($G);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$J;}function
unique_array($K,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$J=array();foreach($u["columns"]as$x){if(!isset($K[$x]))continue
2;$J[$x]=$K[$x];}return$J;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$_))return$_[1].idf_escape(idf_unescape($_[2])).$_[3];return
idf_escape($x);}function
where($Z,$p=array()){global$g,$w;$J=array();foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=escape_key($x);$J[]=$e.($w=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($w=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$x],q($X))));if($w=="sql"&&preg_match('~char|text~',$p[$x]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$x)$J[]=escape_key($x)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$p=array()){parse_str($X,$Ua);remove_slashes(array(&$Ua));return
where($Ua,$p);}function
where_link($r,$e,$Y,$pe="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($e)."&where%5B$r%5D%5Bop%5D=".urlencode(($Y!==null?$pe:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$M=array()){$J="";foreach($f
as$x=>$X){if($M&&!in_array(idf_escape($x),$M))continue;$za=convert_field($p[$x]);if($za)$J.=", $za AS ".idf_escape($x);}return$J;}function
cookie($A,$Y,$Ed=2592000){global$aa;return
header("Set-Cookie: $A=".urlencode($Y).($Ed?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ed)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($vc=false){$Og=ini_bool("session.use_cookies");if(!$Og||$vc){session_write_close();if($Og&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Sg,$O,$V,$l=null){global$Ib;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Ib))."|username|".($l!==null?"db|":"").session_name()),$_);return"$_[1]?".(sid()?SID."&":"").($Sg!="server"||$O!=""?urlencode($Sg)."=".urlencode($O)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($_[2]?"&$_[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Gd,$Td=null){if($Td!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Gd!==null?$Gd:$_SERVER["REQUEST_URI"]))][]=$Td;}if($Gd!==null){if($Gd=="")$Gd=".";header("Location: $Gd");exit;}}function
query_redirect($G,$Gd,$Td,$Ze=true,$bc=true,$ic=false,$hg=""){global$g,$n,$b;if($bc){$Nf=microtime(true);$ic=!$g->query($G);$hg=format_time($Nf);}$Kf="";if($G)$Kf=$b->messageQuery($G,$hg,$ic);if($ic){$n=error().$Kf.script("messagesPrint();");return
false;}if($Ze)redirect($Gd,$Td.$Kf);return
true;}function
queries($G){global$g;static$Te=array();static$Nf;if(!$Nf)$Nf=microtime(true);if($G===null)return
array(implode("\n",$Te),format_time($Nf));$Te[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$T,$Yb='table'){foreach($T
as$R){if(!queries("$G ".$Yb($R)))return
false;}return
true;}function
queries_redirect($Gd,$Td,$Ze){list($Te,$hg)=queries(null);return
query_redirect($Te,$Gd,$Td,$Ze,false,!$Ze,$hg);}function
format_time($Nf){return
sprintf('%.3f s',max(0,microtime(true)-$Nf));}function
relative_uri(){return
preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]);}function
remove_from_uri($ze=""){return
substr(preg_replace("~(?<=[?&])($ze".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$vb){return" ".($D==$vb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($x,$zb=false){$nc=$_FILES[$x];if(!$nc)return
null;foreach($nc
as$x=>$X)$nc[$x]=(array)$X;$J='';foreach($nc["error"]as$x=>$n){if($n)return$n;$A=$nc["name"][$x];$og=$nc["tmp_name"][$x];$ob=file_get_contents($zb&&preg_match('~\.gz$~',$A)?"compress.zlib://$og":$og);if($zb){$Nf=substr($ob,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Nf,$af))$ob=iconv("utf-16","utf-8",$ob);elseif($Nf=="\xEF\xBB\xBF")$ob=substr($ob,3);$J.=$ob."\n\n";}else$J.=$ob;}return$J;}function
upload_error($n){$Qd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($Qd?" ".sprintf('Maximum allowed file size is %sB.',$Qd):""):'File does not exist.');}function
repeat_pattern($Ee,$Cd){return
str_repeat("$Ee{0,65535}",$Cd/65535)."$Ee{0,".($Cd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$Cd=80,$Uf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cd).")($)?)u",$Q,$_))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cd).")($)?)",$Q,$_);return
h($_[1]).$Uf.(isset($_[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Pe,$Yc=array()){$J=false;while(list($x,$X)=each($Pe)){if(!in_array($x,$Yc)){if(is_array($X)){foreach($X
as$rd=>$W)$Pe[$x."[$rd]"]=$W;}else{$J=true;echo'<input type="hidden" name="'.h($x).'" value="'.h($X).'">';}}}return$J;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$jc=false){$J=table_status($R,$jc);return($J?$J:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$J=array();foreach($b->foreignKeys($R)as$zc){foreach($zc["source"]as$X)$J[$X][]=$zc;}return$J;}function
enum_input($U,$Ca,$o,$Y,$Tb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);$J=($Tb!==null?"<label><input type='$U'$Ca value='$Tb'".((is_array($Y)?in_array($Tb,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Nd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Wa=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ca value='".($r+1)."'".($Wa?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$J;}function
input($o,$Y,$Ec){global$Bg,$b,$w;$A=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Ec){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$Ec="json";}$ff=($w=="mssql"&&$o["auto_increment"]);if($ff&&!$_POST["save"])$Ec=null;$Fc=(isset($_GET["select"])||$ff?array("orig"=>'original'):array())+$b->editFunctions($o);$Ca=" name='fields[$A]'";if($o["type"]=="enum")echo
h($Fc[""])."<td>".$b->editInput($_GET["edit"],$o,$Ca,$Y);else{$Mc=(in_array($Ec,$Fc)||isset($Fc[$Ec]));echo(count($Fc)>1?"<select name='function[$A]'>".optionlist($Fc,$Ec===null||$Mc?$Ec:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Fc))).'<td>';$jd=$b->editInput($_GET["edit"],$o,$Ca,$Y);if($jd!="")echo$jd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ca value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ca value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);foreach($Nd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Wa=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$A][$r]' value='".(1<<$r)."'".($Wa?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$A'>";elseif(($eg=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($eg&&$w!="sqlite")$Ca.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ca.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ca>".h($Y).'</textarea>';}elseif($Ec=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ca cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Sd=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$_)?((preg_match("~binary~",$o["type"])?2:1)*$_[1]+($_[3]?1:0)+($_[2]&&!$o["unsigned"]?1:0)):($Bg[$o["type"]]?$Bg[$o["type"]]+($o["unsigned"]?0:1):0));if($w=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Sd+=7;echo"<input".((!$Mc||$Ec==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Sd?" data-maxlength='$Sd'":"").(preg_match('~char|binary~',$o["type"])&&$Sd>20?" size='40'":"")."$Ca>";}echo$b->editHint($_GET["edit"],$o,$Y);$qc=0;foreach($Fc
as$x=>$X){if($x===""||!$X)break;$qc++;}if($qc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $qc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$t=bracket_escape($o["field"]);$Ec=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($Ec=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($Ec=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($Ec=="json"){$Ec="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$nc=get_file("fields-$t");if(!is_string($nc))return
false;return$m->quoteBinary($nc);}return$b->processInput($o,$Y,$Ec);}function
fields_from_edit(){global$m;$J=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$A=bracket_escape($x,1);$J[$A]=array("field"=>$A,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$m->primary),);}return$J;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$wf="<ul>\n";foreach(table_status('',true)as$R=>$S){$A=$b->tableName($S);if(isset($S["Engine"])&&$A!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$I=$g->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$I||$I->fetch_row()){$Ne="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$A</a>";echo"$wf<li>".($I?$Ne:"<p class='error'>$Ne: ".error())."\n";$wf="";}}}echo($wf?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Vc,$Yd=false){global$b;$J=$b->dumpHeaders($Vc,$Yd);$we=$_POST["output"];if($we!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Vc).".$J".($we!="file"&&!preg_match('~[^0-9a-z]~',$we)?".$we":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$x=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($Ec,$e){return($Ec?($Ec=="unixepoch"?"DATETIME($e, '$Ec')":($Ec=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Ec("))."$e)"):$e);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$J=dirname($q);unlink($q);}}return$J;}function
file_open_lock($q){$Cc=@fopen($q,"r+");if(!$Cc){$Cc=@fopen($q,"w");if(!$Cc)return;chmod($q,0660);}flock($Cc,LOCK_EX);return$Cc;}function
file_write_unlock($Cc,$wb){rewind($Cc);fwrite($Cc,$wb);ftruncate($Cc,strlen($wb));flock($Cc,LOCK_UN);fclose($Cc);}function
password_file($rb){$q=get_temp_dir()."/adminer.key";$J=@file_get_contents($q);if($J||!$rb)return$J;$Cc=@fopen($q,"w");if($Cc){chmod($q,0660);$J=rand_string();fwrite($Cc,$J);fclose($Cc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$z,$o,$fg){global$b;if(is_array($X)){$J="";foreach($X
as$rd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($rd):"")."<td>".select_value($W,$z,$o,$fg);return"<table cellspacing='0'>$J</table>";}if(!$z)$z=$b->selectLink($X,$o);if($z===null){if(is_mail($X))$z="mailto:$X";if(is_url($X))$z=$X;}$J=$b->editVal($X,$o);if($J!==null){if(!is_utf8($J))$J="\0";elseif($fg!=""&&is_shortable($o))$J=shorten_utf8($J,max(0,+$fg));else$J=h($J);}return$b->selectVal($J,$z,$o,$X);}function
is_mail($Qb){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Hb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Ee="$_a+(\\.$_a+)*@($Hb?\\.)+$Hb";return
is_string($Qb)&&preg_match("(^$Ee(,\\s*$Ee)*\$)i",$Qb);}function
is_url($Q){$Hb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Hb?\\.)+$Hb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($R,$Z,$od,$Gc){global$w;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($od&&($w=="sql"||count($Gc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Gc).")$G":"SELECT COUNT(*)".($od?" FROM (SELECT 1$G GROUP BY ".implode(", ",$Gc).") x":$G));}function
slow_query($G){global$b,$qg,$m;$l=$b->database();$ig=$b->queryTimeout();$Ef=$m->slowQuery($G,$ig);if(!$Ef&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$wd=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$wd,'&token=',$qg,'\');
}, ',1000*$ig,');
</script>
';}else$h=null;ob_flush();flush();$J=@get_key_vals(($Ef?$Ef:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$J;}function
get_token(){$Ve=rand(1,1e6);return($Ve^$_SESSION["token"]).":$Ve";}function
verify_token(){list($qg,$Ve)=explode(":",$_POST["token"]);return($Ve^$_SESSION["token"])==$qg;}function
lzw_decompress($Ma){$Fb=256;$Na=8;$cb=array();$hf=0;$if=0;for($r=0;$r<strlen($Ma);$r++){$hf=($hf<<8)+ord($Ma[$r]);$if+=8;if($if>=$Na){$if-=$Na;$cb[]=$hf>>$if;$hf&=(1<<$if)-1;$Fb++;if($Fb>>$Na)$Na++;}}$Eb=range("\0","\xFF");$J="";foreach($cb
as$r=>$bb){$Pb=$Eb[$bb];if(!isset($Pb))$Pb=$fh.$fh[0];$J.=$Pb;if($r)$Eb[]=$fh.$Pb[0];$fh=$Pb;}return$J;}function
on_help($hb,$Cf=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $hb, $Cf) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$K,$Jg){global$b,$w,$qg,$n;$Yf=$b->tableName(table_status1($a,true));page_header(($Jg?'Edit':'Insert'),$n,array("select"=>array($a,$Yf)),$Yf);if($K===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$A=>$o){echo"<tr><th>".$b->fieldName($o);$_b=$_GET["set"][bracket_escape($A)];if($_b===null){$_b=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$_b,$af))$_b=$af[1];}$Y=($K!==null?($K[$A]!=""&&$w=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($K[$A])?array_sum($K[$A]):+$K[$A]):$K[$A]):(!$Jg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$_b)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$Ec=($_POST["save"]?(string)$_POST["function"][$A]:($Jg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Ec="now";}input($o,$Y,$Ec);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Jg?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Jg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Jg?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$qg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7�����t4���y�Zf4��i�AT�VV��f:Ϧ,:1�Qݼ�b2`�#�>:7G�1���s��L�XD*bv<܌#�e@�:4�!fo���t:<��咾�o��\ni���',�a_�:�i�Bv�|N�4.5Nf�i�vp�h��l��֚�O����= �OFQ��k\$��i����d2T�p��6�����-�Z�����6����h:�a�,����2�#8А�#��6n����J��h�t�����4O42��ok��*r���@p@�!������?�6��r[��L���:2B�j�!Hb��P�=!1V�\"��0��\nS���D7��Dڛ�C!�!��Gʌ� �+�=tC�.C��:+��=�������%�c�1MR/�EȒ4���2�䱠�`�8(�ӹ[W��=�yS�b�=�-ܹBS+ɯ�����@pL4Yd��q�����6�3Ĭ��Ac܌�Ψ�k�[&>���Z�pkm]�u-c:���Nt�δpҝ��8�=�#��[.��ޯ�~���m�y�PP�|I֛���Q�9v[�Q��\n��r�'g�+��T�2��V��z�4��8��(	�Ey*#j�2]��R����)��[N�R\$�<>:�>\$;�>��\r���H��T�\nw�N �wأ��<��Gw����\\Y�_�Rt^�>�\r}��S\rz�4=�\nL�%J��\",Z�8����i�0u�?�����s3#�ى�:���㽖��E]x���s^8��K^��*0��w����~���:��i���v2w����^7���7�c��u+U%�{P�*4̼�LX./!��1C��qx!H��Fd��L���Ġ�`6��5��f��Ć�=H�l �V1��\0a2�;��6����_ه�\0&�Z�S�d)KE'��n��[X��\0ZɊ�F[P�ޘ@��!��Y�,`�\"ڷ��0Ee9yF>��9b����F5:���\0}Ĵ��(\$����37H��� M�A��6R��{Mq�7G��C�C�m2�(�Ct>[�-t�/&C�]�etG�̬4@r>���<�Sq�/���Q�hm���������L��#��K�|���6fKP�\r%t��V=\"�SH\$�} ��)w�,W\0F��u@�b�9�\rr�2�#�D��X���yOI�>��n��Ǣ%���'��_��t\rτz�\\1�hl�]Q5Mp6k���qh�\$�H~�|��!*4����`S���S t�PP\\g��7�\n-�:袪p����l�B���7Өc�(wO0\\:��w���p4���{T��jO�6HÊ�r���q\n��%%�y']\$��a�Z�.fc�q*-�FW��k��z���j���lg�:�\$\"�N�\r#�d�Â���sc�̠��\"j�\r�����Ւ�Ph�1/��DA)���[�kn�p76�Y��R{�M�P���@\n-�a�6��[�zJH,�dl�B�h�o�����+�#Dr^�^��e��E��� ĜaP���JG�z��t�2�X�����V�����ȳ��B_%K=E��b弾�§kU(.!ܮ8����I.@�K�xn���:�P�32��m�H		C*�:v�T�\nR�����0u�����ҧ]�����P/�JQd�{L�޳:Y��2b��T ��3�4���c�V=���L4��r�!�B�Y�6��MeL������i�o�9< G��ƕЙMhm^�U�N����Tr5HiM�/�n�흳T��[-<__�3/Xr(<���������uҖGNX20�\r\$^��:'9�O��;�k����f��N'a����b�,�V��1��HI!%6@��\$�EGڜ�1�(mU��rս���`��iN+Ü�)���0l��f0��[U��V��-:I^��\$�s�b\re��ug�h�~9�߈�b�����f�+0�� hXrݬ�!\$�e,�w+����3��_�A�k��\nk�r�ʛcuWdY�\\�={.�č���g��p8�t\rRZ�v�J:�>��Y|+�@����C�t\r��jt��6��%�?��ǎ�>�/�����9F`ו��v~K�����R�W��z��lm�wL�9Y�*q�x�z��Se�ݛ����~�D�����x���ɟi7�2���Oݻ��_{��53��t���_��z�3�d)�C��\$?KӪP�%��T&��&\0P�NA�^�~���p� �Ϝ���\r\$�����b*+D6궦ψ��J\$(�ol��h&��KBS>���;z��x�oz>��o�Z�\nʋ[�v���Ȝ��2�OxِV�0f�����2Bl�bk�6Zk�hXcd�0*�KT�H=��π�p0�lV����\r���n�m��)(� �");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO�G#�X�VC��s��Z1.�hp8,�[�H�~Cz���2�l�c3���s���I�b�4\n�F8T��I���U*fz��r0�E����y���f�Y.:��I��(�c��΋!�_l��^�^(��N{S��)r�q�Y��l٦3�3�\n�+G���y���i���xV3w�uh�^r����a۔���c��\r���(.��Ch�<\r)�ѣ�`�7���43'm5���\n�P�:2�P����q ���C�}ī�����38�B�0�hR��r(�0��b\\0�Hr44��B�!�p�\$�rZZ�2܉.Ƀ(\\�5�|\nC(�\"��P���.��N�RT�Γ��>�HN��8HP�\\�7Jp~���2%��OC�1�.��C8·H��*�j����S(�/��6KU����<2�pOI���`���ⳈdO�H��5�-��4��pX25-Ң�ۈ�z7��\"(�P�\\32:]U����߅!]�<�A�ۤ���iڰ�l\r�\0v��#J8��wm��ɤ�<�ɠ��%m;p#�`X�D���iZ��N0����9��占��`��wJ�D��2�9t��*��y��NiIh\\9����:����xﭵyl*�Ȉ��Y�����8�W��?���ޛ3���!\"6�n[��\r�*\$�Ƨ�nzx�9\r�|*3ףp�ﻶ�:(p\\;��mz���9����8N���j2����\r�H�H&��(�z��7i�k� ����c��e���t���2:SH�Ƞ�/)�x�@��t�ri9����8����yҷ���V�+^Wڦ��kZ�Y�l�ʣ���4��Ƌ������\\E�{�7\0�p���D��i�-T����0l�%=���˃9(�5�\n\n�n,4�\0�a}܃.��Rs\02B\\�b1�S�\0003,�XPHJsp�d�K� CA!�2*W����2\$�+�f^\n�1����zE� Iv�\\�2��.*A���E(d���b��܄��9����Dh�&��?�H�s�Q�2�x~nÁJ�T2�&��eR���G�Q��Tw�ݑ��P���\\�)6�����sh\\3�\0R	�'\r+*;R�H�.�!�[�'~�%t< �p�K#�!�l���Le����,���&�\$	��`��CX��ӆ0֭����:M�h	�ڜG��!&3�D�<!�23��?h�J�e ��h�\r�m���Ni�������N�Hl7��v��WI�.��-�5֧ey�\rEJ\ni*�\$@�RU0,\$U�E����ªu)@(t�SJk�p!�~���d`�>��\n�;#\rp9�jɹ�]&Nc(r���TQU��S��\08n`��y�b���L�O5��,��>���x���f䴒���+��\"�I�{kM�[\r%�[	�e�a�1! ���Ԯ�F@�b)R��72��0�\nW���L�ܜҮtd�+���0wgl�0n@��ɢ�i�M��\nA�M5n�\$E�ױN��l�����%�1 A������k�r�iFB���ol,muNx-�_�֤C( ��f�l\r1p[9x(i�BҖ��zQl��8C�	��XU Tb��I�`�p+V\0��;�Cb��X�+ϒ�s��]H��[�k�x�G*�]�awn�!�6�����mS�I��K�~/�ӥ7��eeN��S�/;d�A�>}l~��� �%^�f�آpڜDE��a��t\nx=�kЎ�*d���T����j2��j��\n��� ,�e=��M84���a�j@�T�s���nf��\n�6�\rd��0���Y�'%ԓ��~	�Ҩ�<���AH�G��8���΃\$z��{���u2*��a��>�(w�K.bP�{��o��´�z�#�2�8=�8>���A,�e���+�C�x�*���-b=m���,�a��lzk���\$W�,�m�Ji�ʧ���+���0�[��.R�sK���X��ZL��2�`�(�C�vZ������\$�׹,�D?H��NxX��)��M��\$�,��*\nѣ\$<q�şh!��S����xsA!�:�K��}�������R��A2k�X�p\n<�����l���3�����VV�}�g&Yݍ!�+�;<�Y��YE3r�َ��C�o5����ճ�kk�����ۣ��t��U���)�[����}��u��l�:D��+Ϗ _o��h140���0��b�K�㬒�����lG��#��������|Ud�IK���7�^��@��O\0H��Hi�6\r����\\cg\0���2�B�*e��\n��	�zr�!�nWz&� {H��'\$X �w@�8�DGr*���H�'p#�Į���\nd���,���,�;g~�\0�#����E��\r�I`��'��%E�.�]`�Л��%&��m��\r��%4S�v�#\n��fH\$%�-�#���qB�����Q-�c2���&���]�� �qh\r�l]�s���h�7�n#����-�jE�Fr�l&d����z�F6����\"���|���s@����z)0rpڏ\0�X\0���|DL<!��o�*�D�{.B<E���0nB(� �|\r\n�^���� h�!���r\$��(^�~����/p�q��B��O����,\\��#RR��%���d�Hj�`����̭ V� bS�d�i�E���oh�r<i/k\$-�\$o��+�ŋ��l��O�&evƒ�i�jMPA'u'���( M(h/+��WD�So�.n�.�n���(�(\"���h�&p��/�/1D̊�j娸E��&⦀�,'l\$/.,�d���W�bbO3�B�sH�:J`!�.���������,F��7(��Կ��1�l�s �Ҏ���Ţq�X\r����~R鰱`�Ҟ�Y*�:R��rJ��%L�+n�\"��\r��͇H!qb�2�Li�%����Wj#9��ObE.I:�6�7\0�6+�%�.����a7E8VS�?(DG�ӳB�%;���/<�����\r ��>�M��@���H�Ds��Z[tH�Enx(���R�x��@��GkjW�>���#T/8�c8�Q0��_�IIGII�!���YEd�E�^�td�th�`DV!C�8��\r���b�3�!3�@�33N}�ZB�3	�3�30��M(�>��}�\\�t�f�f���I\r���337 X�\"td�,\nbtNO`P�;�ܕҭ���\$\n����Zѭ5U5WU�^ho���t�PM/5K4Ej�KQ&53GX�Xx)�<5D��\r�V�\n�r�5b܀\\J\">��1S\r[-��Du�\r���)00�Y��ˢ�k{\n��#��\r�^��|�uܻU�_n�U4�U�~Yt�\rI��@䏳�R �3:�uePMS�0T�wW�X���D��KOU����;U�\n�OY��Y�Q,M[\0�_�D���W��J*�\rg(]�\r\"ZC��6u�+�Y��Y6ô�0�q�(��8}��3AX3T�h9j�j�f�Mt�PJbqMP5>������Y�k%&\\�1d��E4� �Yn���\$<�U]Ӊ1�mbֶ�^�����\"NV��p��p��eM���W�ܢ�\\�)\n �\nf7\n�2��r8��=Ek7tV����7P��L��a6��v@'�6i��j&>��;��`��a	\0pڨ(�J��)�\\��n��Ĭm\0��2��eqJ��P��t��fj��\"[\0����X,<\\������+md��~�����s%o��mn�),ׄ�ԇ�\r4��8\r����mE�H]�����HW�M0D�߀��~�ˁ�K��E}����|f�^���\r>�-z]2s�xD�d[s�t�S��\0Qf-K`���t���wT�9��Z��	�\nB�9 Nb��<�B�I5o�oJ�p��JNd��\r�hލ��2�\"�x�HC�ݍ�:���9Yn16��zr+z���\\�����m ��T ���@Y2lQ<2O+�%��.Ӄh�0A���Z��2R��1��/�hH\r�X��aNB&� �M@�[x��ʮ���8&L�V͜v�*�j�ۚGH��\\ٮ	���&s�\0Q��\\\"�b��	��\rBs��w��	���BN`�7�Co(���\nè���1�9�*E� �S��U�0U� t�'|�m���?h[�\$.#�5	 �	p��yB�@R�]���@|��{���P\0x�/� w�%�EsBd���CU�~O׷�P�@X�]����Z3��1��{�eLY���ڐ�\\�(*R`�	�\n������QCF�*�����霬�p�X|`N���\$�[���@�U������Z�`Zd\"\\\"����)��I�:�t��oD�\0[�����-���g���*`hu%�,����I�7ī�H�m�6�}��N�ͳ\$�M�UYf&1����e]pz���I��m�G/� �w �!�\\#5�4I�d�E�hq���Ѭk�x|�k�qD�b�z?���>���:��[�L�ƬZ�X��:�������j�w5	�Y��0 ���\$\0C��dSg����{�@�\n`�	���C ���M�����# t}x�N����{�۰)��C��FKZ�j��\0PFY�B�pFk��0<�>�D<JE��g\r�.�2��8�U@*�5fk��JD���4��TDU76�/��@��K+���J�����@�=��WIOD�85M��N�\$R�\0�5�\r��_���E���I�ϳN�l���y\\����qU��Q���\n@���ۺ�p���P۱�7ԽN\r�R{*�qm�\$\0R��ԓ���q�È+U@�B��Of*�Cˬ�MC��`_ ���˵N��T�5٦C׻� ��\\W�e&_X�_؍h���B�3���%�FW���|�Gޛ'�[�ł����V��#^\r��GR����P��Fg�����Yi ���z\n��+�^/�������\\�6��b�dmh��@q���Ah�),J��W��cm�em]�ӏe�kZb0�����Y�]ym��f�e�B;���O��w�apDW�����{�\0��-2/bN�sֽ޾Ra�Ϯh&qt\n\"�i�Rm�hz�e����FS7��PP�䖤��:B����sm��Y d���7}3?*�t����lT�}�~�����=c������	��3�;T�L�5*	�~#�A����s�x-7��f5`�#\"N�b��G����@�e�[�����s����-��M6��qq� h�e5�\0Ң���*�b�IS���Fή9}�p�-��`{��ɖkP�0T<��Z9�0<՚\r��;!��g�\r\nK�\n��\0��*�\nb7(�_�@,�e2\r�]�K�+\0��p C\\Ѣ,0�^�MЧ����@�;X\r��?\$\r�j�+�/��B��P�����J{\"a�6�䉜�|�\n\0��\\5���	156�� .�[�Uد\0d��8Y�:!���=��X.�uC����!S���o�p�B���7��ů�Rh�\\h�E=�y:< :u��2�80�si��TsB�@\$ ��@�u	�Q���.��T0M\\/�d+ƃ\n��=��d���A���)\r@@�h3���8.eZa|.�7�Yk�c���'D#��Y�@X�q�=M��44�B AM��dU\"�Hw4�(>��8���C�?e_`��X:�A9ø���p�G��Gy6��F�Xr��l�1��ػ�B�Å9Rz��hB�{����\0��^��-�0�%D�5F\"\"�����i�`��nAf� \"tDZ\"_�V\$��!/�D�ᚆ������٦�̀F,25�j�T��y\0�N�x\r�Yl��#��Eq\n��B2�\n��6���4���!/�\n��Q��*�;)bR�Z0\0�CDo�˞�48������e�\n�S%\\�PIk��(0��u/��G������\\�}�4Fp��G�_�G?)g�ot��[v��\0��?b�;��`(�ی�NS)\n�x=��+@��7��j�0��,�1Åz����>0��Gc��L�VX�����%����Q+���o�F���ܶ�>Q-�c���l����w��z5G��@(h�c�H��r?��Nb�@�������lx3�U`�rw���U���t�8�=�l#���l�䨉8�E\"����O6\n��1e�`\\hKf�V/зPaYK�O�� ��x�	�Oj���r7�F;��B����̒��>�Ц�V\rĖ�|�'J�z����#�PB��Y5\0NC�^\n~LrR��[̟Rì�g�eZ\0x�^�i<Q�/)�%@ʐ��fB�Hf�{%P�\"\"���@���)���DE(iM2�S�*�y�S�\"���e̒1��ט\n4`ʩ>��Q*��y�n����T�u�����~%�+W��XK���Q�[ʔ��l�PYy#D٬D<�FL���@�6']Ƌ��\rF�`�!�%\n�0�c���˩%c8WrpG�.T�Do�UL2�*�|\$�:�r��@���&�4��H�> ���%0*�Zc(@�]��Q:*���(&\"x�'JO�1��`>7	#�\"O4PX���|B4��[���٘\$n�1`��GSA���AH��\"�)���S��f�ɦ��-\"�W�+ɖ�\0s-[�fo٧�D��x����=C�.��9���f��c�\07�?Ó95�֦Z�0��f�����H?R'q>o��@aD���G[;G�D�BBdġ�q���2�|1��q������w<�#��EY�^����Q\\�[X����>?v�[ ��I��� ����g\0�)���g�u��g42jú'�T�����vy,u��D�=p�H\\��^b��q���it���X���FP�@P��T��i2#�g��Dᮙ�%9�@�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Cc=file_open_lock(get_temp_dir()."/adminer.version");if($Cc)file_write_unlock($Cc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$Ib,$Nb,$Vb,$n,$Fc,$Jc,$aa,$id,$w,$ba,$zd,$le,$Fe,$Rf,$Nc,$qg,$ug,$Bg,$Ig,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$E=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$E[]=true;call_user_func_array('session_set_cookie_params',$E);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$pc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($tg,$he=null){if(is_array($tg)){$Ie=($he==1?0:1);$tg=$tg[$Ie];}$tg=str_replace("%d","%s",$tg);$he=format_number($he);return
sprintf($tg,$he);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Ie=array_search("SQL",$b->operators);if($Ie!==false)unset($b->operators[$Ie]);}function
dsn($Lb,$V,$F,$B=array()){try{parent::__construct($Lb,$V,$F,$B);}catch(Exception$Zb){auth_error(h($Zb->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$Cg=false){$I=parent::query($G);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($I);return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch();return$K[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Ib=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Ne=false){global$b,$w;$od=(count($Gc)<count($M));$G=$b->selectQueryBuild($M,$Z,$Gc,$C,$y,$D);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$y!=""&&$Gc&&$od&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Gc&&$od?"\nGROUP BY ".implode(", ",$Gc):"").($C?"\nORDER BY ".implode(", ",$C):""),($y!=""?+$y:null),($D?$y*$D:0),"\n");$Nf=microtime(true);$J=$this->_conn->query($G);if($Ne)echo$b->selectQuery($G,$Nf,!$J);return$J;}function
delete($R,$H,$y=0){$G="FROM ".table($R);return
queries("DELETE".($y?limit1($R,$G,$H):" $G$H"));}function
update($R,$P,$H,$y=0,$N="\n"){$Rg=array();foreach($P
as$x=>$X)$Rg[]="$x = $X";$G=table($R)." SET$N".implode(",$N",$Rg);return
queries("UPDATE".($y?limit1($R,$G,$H,$N):" $G$H"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$L,$Le){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$ig){}function
convertSearch($t,$X,$o){return$t;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($nf){return
q($nf);}function
warnings(){return'';}function
tableHelp($A){}}$Ib["sqlite"]="SQLite 3";$Ib["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Je=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Tg=$this->_link->version();$this->server_info=$Tg["versionString"];}function
query($G){$I=@$this->_link->query($G);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($G,$Cg=false){$Wd=($Cg?"unbufferedQuery":"query");$I=@$this->_link->$Wd($G,SQLITE_BOTH,$n);$this->error="";if(!$I){$this->error=$n;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$x=>$X)$J[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$A=$this->_result->fieldName($this->_offset++);$Ee='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Ee\\.)?$Ee\$~",$A,$_)){$R=($_[3]!=""?$_[3]:idf_unescape($_[2]));$A=($_[5]!=""?$_[5]:idf_unescape($_[4]));}return(object)array("name"=>$A,"orgname"=>$A,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Le){$Rg=array();foreach($L
as$P)$Rg[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Rg));}function
tableHelp($A){if($A=="sqlite_sequence")return"fileformat2.html#seqtab";if($A=="sqlite_master")return"fileformat2.html#$A";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$N):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($l,$eb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($A=""){global$g;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$K){$K["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($A!=""?$J[$A]:$J);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$g;$J=array();$Le="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$K){$A=$K["name"];$U=strtolower($K["type"]);$_b=$K["dflt_value"];$J[$A]=array("field"=>$A,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$_b,$_)?str_replace("''","'",$_[1]):($_b=="NULL"?null:$_b)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Le!="")$J[$Le]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$A]["auto_increment"]=true;$Le=$A;}}$Kf=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Kf,$Nd,PREG_SET_ORDER);foreach($Nd
as$_){$A=str_replace('""','"',preg_replace('~^"|"$~','',$_[1]));if($J[$A])$J[$A]["collation"]=trim($_[3],"'");}return$J;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$Kf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Kf,$_)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$_[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$_){$J[""]["columns"][]=idf_unescape($_[2]).$_[4];$J[""]["descs"][]=(preg_match('~DESC~i',$_[5])?'1':null);}}if(!$J){foreach(fields($R)as$A=>$o){if($o["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($A),"lengths"=>array(),"descs"=>array(null));}}$Lf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$h);foreach(get_rows("PRAGMA index_list(".table($R).")",$h)as$K){$A=$K["name"];$u=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($A).")",$h)as$mf){$u["columns"][]=$mf["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($A).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Lf[$A],$af)){preg_match_all('/("[^"]*+")+( DESC)?/',$af[2],$Nd);foreach($Nd[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$J[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$J[""]["columns"]||$u["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$A))$J[$A]=$u;}return$J;}function
foreign_keys($R){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$K){$zc=&$J[$K["id"]];if(!$zc)$zc=$K;$zc["source"][]=$K["from"];$zc["target"][]=$K["to"];}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($A))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($A){global$g;$gc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($gc)\$~",$A)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$gc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$z=new
Min_SQLite($l);}catch(Exception$Zb){$g->error=$Zb->getMessage();return
false;}$z->query('PRAGMA encoding = "UTF-8"');$z->query('CREATE TABLE adminer (i)');$z->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($A,$d){global$g;if(!check_sqlite_name($A))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$A);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;$Ng=($R==""||$wc);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ng=true;break;}}$c=array();$ve=array();foreach($p
as$o){if($o[1]){$c[]=($Ng?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$ve[$o[0]]=$o[1][0];}}if(!$Ng){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$A&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)))return
false;}elseif(!recreate_table($R,$A,$c,$ve,$wc,$Fa))return
false;if($Fa){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Fa WHERE name = ".q($A));if(!$g->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($A).", $Fa)");queries("COMMIT");}return
true;}function
recreate_table($R,$A,$p,$ve,$wc,$Fa,$v=array()){global$g;if($R!=""){if(!$p){foreach(fields($R)as$x=>$o){if($v)$o["auto_increment"]=0;$p[]=process_field($o,$o);$ve[$x]=idf_escape($x);}}$Me=false;foreach($p
as$o){if($o[6])$Me=true;}$Kb=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$Kb[$X[1]]=true;unset($v[$x]);}}foreach(indexes($R)as$ud=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$ve[$e])continue
2;$f[]=$ve[$e].($u["descs"][$x]?" DESC":"");}if(!$Kb[$ud]){if($u["type"]!="PRIMARY"||!$Me)$v[]=array($u["type"],$ud,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$wc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$ud=>$zc){foreach($zc["source"]as$x=>$e){if(!$ve[$e])continue
2;$zc["source"][$x]=idf_unescape($ve[$e]);}if(!isset($wc[" $ud"]))$wc[]=" ".format_foreign_key($zc);}queries("BEGIN");}foreach($p
as$x=>$o)$p[$x]="  ".implode($o);$p=array_merge($p,array_filter($wc));$cg=($R==$A?"adminer_$A":$A);if(!queries("CREATE TABLE ".table($cg)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($ve&&!queries("INSERT INTO ".table($cg)." (".implode(", ",$ve).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ve)))." FROM ".table($R)))return
false;$_g=array();foreach(triggers($R)as$yg=>$jg){$xg=trigger($yg);$_g[]="CREATE TRIGGER ".idf_escape($yg)." ".implode(" ",$jg)." ON ".table($A)."\n$xg[Statement]";}$Fa=$Fa?0:$g->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($R));if(!queries("DROP TABLE ".table($R))||($R==$A&&!queries("ALTER TABLE ".table($cg)." RENAME TO ".table($A)))||!alter_indexes($A,$v))return
false;if($Fa)queries("UPDATE sqlite_sequence SET seq = $Fa WHERE name = ".q($A));foreach($_g
as$xg){if(!queries($xg))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$A,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($A!=""?$A:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$Le){if($Le[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Vg,$bg){return
false;}function
trigger($A){global$g;if($A=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$zg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$zg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($A)),$_);$ie=$_[3];return
array("Timing"=>strtoupper($_[1]),"Event"=>strtoupper($_[2]).($ie?" OF":""),"Of"=>($ie[0]=='`'||$ie[0]=='"'?idf_unescape($ie):$ie),"Trigger"=>$A,"Statement"=>$_[4],);}function
triggers($R){$J=array();$zg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$K){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$zg["Timing"]).')\s*(.*?)\s+ON\b~i',$K["sql"],$_);$J[$K["name"]]=array($_[1],$_[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($pf){return
true;}function
create_sql($R,$Fa,$Sf){global$g;$J=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$A=>$u){if($A=='')continue;$J.=";\n\n".index_sql($R,$u['type'],$A,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$J;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$g;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$J[$x]=$g->result("PRAGMA $x");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$re){list($x,$X)=explode("=",$re,2);$J[$x]=$X;}return$J;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$kc);}$w="sqlite";$Bg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Rf=array_keys($Bg);$Ig=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Fc=array("hex","length","lower","round","unixepoch","upper");$Jc=array("avg","count","count distinct","group_concat","max","min","sum");$Nb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Ib["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Je=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Xb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Tg=pg_version($this->_link);$this->server_info=$Tg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Cg=false){$I=@pg_query($this->_link,$G);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);$J=false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);$J=true;}else$J=new
Min_Result($I);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$e);$J->name=pg_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$e);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($O,$V,$F){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($nf){return
q($nf);}function
query($G,$Cg=false){$J=parent::query($G,$Cg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$J;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Le){global$g;foreach($L
as$P){$Jg=array();$Z=array();foreach($P
as$x=>$X){$Jg[]="$x = $X";if(isset($Le[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Jg)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}function
slowQuery($G,$ig){$this->_conn->query("SET statement_timeout = ".(1000*$ig));$this->_conn->timeout=1000*$ig;return$G;}function
convertSearch($t,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$t:"CAST($t AS text)");}function
quoteBinary($nf){return$this->_conn->quoteBinary($nf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($A){$Fd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$z=$Fd[$_GET["ns"]];if($z)return"$z-".str_replace("_","-",$A).".html";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Bg,$Rf;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Rf['Strings'][]="json";$Bg["json"]=4294967295;if(min_version(9.4,0,$g)){$Rf['Strings'][]="jsonb";$Bg["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$N):" $G".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$N."LIMIT 1)"));}function
db_collation($l,$eb){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($A=""){$J=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($A!=""?"AND relname = ".q($A):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($A!=""?$J[$A]:$J);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$J=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Wc=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Wc AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$_);list(,$U,$Cd,$K["length"],$ra,$ya)=$_;$K["length"].=$ya;$Va=$U.$ra;if(isset($wa[$Va])){$K["type"]=$wa[$Va];$K["full_type"]=$K["type"].$Cd.$ya;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$Cd.$ra.$ya;}if($K['identity'])$K['default']='GENERATED BY DEFAULT AS IDENTITY';$K["null"]=!$K["attnotnull"];$K["auto_increment"]=$K['identity']||preg_match('~^nextval\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$_))$K["default"]=($_[1]=="NULL"?null:(($_[1][0]=="'"?idf_unescape($_[1]):$_[1]).$_[2]));$J[$K["field"]]=$K;}return$J;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$Zf=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Zf AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Zf AND ci.oid = i.indexrelid",$h)as$K){$bf=$K["relname"];$J[$bf]["type"]=($K["indispartial"]?"INDEX":($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX")));$J[$bf]["columns"]=array();foreach(explode(" ",$K["indkey"])as$ed)$J[$bf]["columns"][]=$f[$ed];$J[$bf]["descs"]=array();foreach(explode(" ",$K["indoption"])as$fd)$J[$bf]["descs"][]=($fd&1?'1':null);$J[$bf]["lengths"]=array();}return$J;}function
foreign_keys($R){global$le;$J=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$_)){$K['source']=array_map('trim',explode(',',$_[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$_[2],$Md)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Md[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Md[4]));}$K['target']=array_map('trim',explode(',',$_[3]));$K['on_delete']=(preg_match("~ON DELETE ($le)~",$_[4],$Md)?$Md[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($le)~",$_[4],$Md)?$Md[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($A){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relname = ".q($A)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$J=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$J,$_))$J=$_[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($_[3]).'})(.*)~','\1<b>\2</b>',$_[2]).$_[4];return
nl_br($J);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($A,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($A));}function
auto_increment(){return"";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();$Te=array();if($R!=""&&$R!=$A)$Te[]="ALTER TABLE ".table($R)." RENAME TO ".table($A);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Qg=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$Te[]="ALTER TABLE ".table($A)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Qg!="")$Te[]="COMMENT ON COLUMN ".table($A).".$X[0] IS ".($Qg!=""?substr($Qg,9):"''");}}$c=array_merge($c,$wc);if($R=="")array_unshift($Te,"CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Te,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""||$ib!="")$Te[]="COMMENT ON TABLE ".table($A)." IS ".q($ib);if($Fa!=""){}foreach($Te
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$rb=array();$Jb=array();$Te=array();foreach($c
as$X){if($X[0]!="INDEX")$rb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Jb[]=idf_escape($X[1]);else$Te[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($rb)array_unshift($Te,"ALTER TABLE ".table($R).implode(",",$rb));if($Jb)array_unshift($Te,"DROP INDEX ".implode(", ",$Jb));foreach($Te
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Vg){return
drop_tables($Vg);}function
drop_tables($T){foreach($T
as$R){$Pf=table_status($R);if(!queries("DROP ".strtoupper($Pf["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Vg,$bg){foreach(array_merge($T,$Vg)as$R){$Pf=table_status($R);if(!queries("ALTER ".strtoupper($Pf["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($bg)))return
false;}return
true;}function
trigger($A,$R=null){if($A=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$L=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($A));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$K)$J[$K["trigger_name"]]=array($K["action_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($A,$U){$L=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($A));$J=$L[0];$J["returns"]=array("type"=>$J["type_udt_name"]);$J["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($A).'
ORDER BY ordinal_position');return$J;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($A,$K){$J=array();foreach($K["fields"]as$o)$J[]=$o["type"];return
idf_escape($A)."(".implode(", ",$J).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($S,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$af))return$af[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($of,$h=null){global$g,$Bg,$Rf;if(!$h)$h=$g;$J=$h->query("SET search_path TO ".idf_escape($of));foreach(types()as$U){if(!isset($Bg[$U])){$Bg[$U]=0;$Rf['User types'][]=$U;}}return$J;}function
create_sql($R,$Fa,$Sf){global$g;$J='';$kf=array();$yf=array();$Pf=table_status($R);if(is_view($Pf)){$Ug=view($R);return
rtrim("CREATE VIEW ".idf_escape($R)." AS $Ug[select]",";");}$p=fields($R);$v=indexes($R);ksort($v);$tc=foreign_keys($R);ksort($tc);if(!$Pf||empty($p))return
false;$J="CREATE TABLE ".idf_escape($Pf['nspname']).".".idf_escape($Pf['Name'])." (\n    ";foreach($p
as$lc=>$o){$Ae=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$kf[]=$Ae;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Nd)){$xf=$Nd[1];$Jf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($xf):"SELECT * FROM $xf"));$yf[]=($Sf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $xf;\n":"")."CREATE SEQUENCE $xf INCREMENT $Jf[increment_by] MINVALUE $Jf[min_value] MAXVALUE $Jf[max_value] START ".($Fa?$Jf['last_value']:1)." CACHE $Jf[cache_value];";}}if(!empty($yf))$J=implode("\n\n",$yf)."\n\n$J";foreach($v
as$Zc=>$u){switch($u['type']){case'UNIQUE':$kf[]="CONSTRAINT ".idf_escape($Zc)." UNIQUE (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;case'PRIMARY':$kf[]="CONSTRAINT ".idf_escape($Zc)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;}}foreach($tc
as$sc=>$rc)$kf[]="CONSTRAINT ".idf_escape($sc)." $rc[definition] ".($rc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$J.=implode(",\n    ",$kf)."\n) WITH (oids = ".($Pf['Oid']?'true':'false').");";foreach($v
as$Zc=>$u){if($u['type']=='INDEX'){$f=array();foreach($u['columns']as$x=>$X)$f[]=idf_escape($X).($u['descs'][$x]?" DESC":"");$J.="\n\nCREATE INDEX ".idf_escape($Zc)." ON ".idf_escape($Pf['nspname']).".".idf_escape($Pf['Name'])." USING btree (".implode(', ',$f).");";}}if($Pf['Comment'])$J.="\n\nCOMMENT ON TABLE ".idf_escape($Pf['nspname']).".".idf_escape($Pf['Name'])." IS ".q($Pf['Comment']).";";foreach($p
as$lc=>$o){if($o['comment'])$J.="\n\nCOMMENT ON COLUMN ".idf_escape($Pf['nspname']).".".idf_escape($Pf['Name']).".".idf_escape($lc)." IS ".q($o['comment']).";";}return
rtrim($J,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$Pf=table_status($R);$J="";foreach(triggers($R)as$wg=>$vg){$xg=trigger($wg,$Pf['Name']);$J.="\nCREATE TRIGGER ".idf_escape($xg['Trigger'])." $xg[Timing] $xg[Events] ON ".idf_escape($Pf["nspname"]).".".idf_escape($Pf['Name'])." $xg[Type] $xg[Statement];;\n";}return$J;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$kc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$w="pgsql";$Bg=array();$Rf=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}$Ig=array();$qe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Fc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Ib["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Je=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Xb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$F){$this->_link=@oci_new_connect($V,$F,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($G,$Cg=false){$I=oci_parse($this->_link,$G);$this->error="";if(!$I){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$I=$this->query($G);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'OCI-Lob'))$K[$x]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$e);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$F){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$y,$je=0,$N=" "){return($je?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($y+$je).") WHERE rnum > $je":($y!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($y+$je):" $G$Z"));}function
limit1($R,$G,$Z,$N="\n"){return" $G$Z";}function
db_collation($l,$eb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($A=""){$J=array();$qf=q($A);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($A!=""?" AND table_name = $qf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($A!=""?" WHERE view_name = $qf":"")."
ORDER BY 1")as$K){if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$Cd="$K[DATA_PRECISION],$K[DATA_SCALE]";if($Cd==",")$Cd=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($Cd?"($Cd)":""),"type"=>strtolower($U),"length"=>$Cd,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$K){$Zc=$K["INDEX_NAME"];$J[$Zc]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$Zc]["columns"][]=$K["COLUMN_NAME"];$J[$Zc]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$Zc]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($A){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($A));return
reset($L);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=$Jb=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Jb[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Jb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Jb).")"))&&($R==$A||queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)));}function
foreign_keys($R){$J=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($pf,$h=null){global$g;if(!$h)$h=$g;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($pf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$kc);}$w="oracle";$Bg=array();$Rf=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}$Ig=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Fc=array("length","lower","round","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Ib["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Je=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$F){global$b;$l=$b->database();$mb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($l!="")$mb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$O),$mb);if($this->_link){$gd=sqlsrv_server_info($this->_link);$this->server_info=$gd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Cg=false){$I=sqlsrv_query($this->_link,$G);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'DateTime'))$K[$x]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$o["Name"];$J->orgname=$o["Name"];$J->type=($o["Type"]==1?254:0);return$J;}function
seek($je){for($r=0;$r<$je;$r++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$F){$this->_link=@mssql_connect($O,$V,$F);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($I){$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$Cg=false){$I=@mssql_query($G,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($je){mssql_data_seek($this->_result,$je);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($O,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Le){foreach($L
as$P){$Jg=array();$Z=array();foreach($P
as$x=>$X){$Jg[]="$x = $X";if(isset($Le[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Jg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$y,$je=0,$N=" "){return($y!==null?" TOP (".($y+$je).")":"")." $G$Z";}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$J=array();foreach($k
as$l){$g->select_db($l);$J[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($A=""){$J=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$K){if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$jb=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($R).", 'column', NULL)");$J=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$K){$U=$K["type"];$Cd=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($Cd?"($Cd)":""),"type"=>$U,"length"=>$Cd,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],"comment"=>$jb[$K["name"]],);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$h)as$K){$A=$K["name"];$J[$A]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$A]["lengths"]=array();$J[$A]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$A]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($A))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$J[preg_replace('~_.*~','',$d)][]=$d;return$J;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($A,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($A));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();$jb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$jb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($wc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($A)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$A)queries("EXEC sp_rename ".q(table($R)).", ".q($A));if($wc)$c[""]=$wc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($A)." $x".implode(",",$X)))return
false;}foreach($jb
as$x=>$X){$ib=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$ib.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));}return
true;}function
alter_indexes($R,$c){$u=array();$Jb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Jb[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Jb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Jb)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$J=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($S,$Z){}function
foreign_keys($R){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$K){$zc=&$J[$K["FK_NAME"]];$zc["db"]=$K["PKTABLE_QUALIFIER"];$zc["table"]=$K["PKTABLE_NAME"];$zc["source"][]=$K["FKCOLUMN_NAME"];$zc["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Vg,$bg){return
apply_queries("ALTER SCHEMA ".idf_escape($bg)." TRANSFER",array_merge($T,$Vg));}function
trigger($A){if($A=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($A));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$J["text"]);return$J;}function
triggers($R){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($of){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$kc);}$w="mssql";$Bg=array();$Rf=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}$Ig=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Fc=array("len","lower","round","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Ib['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Je=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){$this->_link=ibase_connect($O,$V,$F);if($this->_link){$Mg=explode(':',$O);$this->service_link=ibase_service_attach($Mg[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($G,$Cg=false){$I=ibase_query($G,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases($uc){return
array("domain");}function
limit($G,$Z,$y,$je=0,$N=" "){$J='';$J.=($y!==null?$N."FIRST $y".($je?" SKIP $je":""):"");$J.=" $G$Z";return$J;}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){}function
engines(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){global$g;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($g->_link,$G);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($k){return
array();}function
table_status($A="",$jc=false){global$g;$J=array();$wb=tables_list();foreach($wb
as$u=>$X){$u=trim($u);$J[$u]=array('Name'=>$u,'Engine'=>'standard',);if($A==$u)return$J[$u];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$g;$J=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($g->_link,$G);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($R,$h=null){$J=array();return$J;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($of){return
true;}function
support($kc){return
preg_match("~^(columns|sql|status|table)$~",$kc);}$w="firebird";$qe=array("=");$Fc=array();$Jc=array();$Nb=array();}$Ib["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Je=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$Cg=false){$E=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$E['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$E,$this->timeout);$this->timeout=0;if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Vf=0;foreach($I
as$qd)$Vf+=$qd->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Vf,))));}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$qd){$K=array();if($qd->Name!='')$K['itemName()']=(string)$qd->Name;foreach($qd->Attribute
as$Ba){$A=$this->_processValue($Ba->Name);$Y=$this->_processValue($Ba->Value);if(isset($K[$A])){$K[$A]=(array)$K[$A];$K[$A][]=$Y;}else$K[$A]=$Y;}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Pb){return(is_object($Pb)&&$Pb['encoding']=='base64'?base64_decode($Pb):(string)$Pb);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);return(object)array('name'=>$vd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Le="itemName()";function
_chunkRequest($Xc,$qa,$E,$cc=array()){global$g;foreach(array_chunk($Xc,25)as$Ya){$_e=$E;foreach($Ya
as$r=>$s){$_e["Item.$r.ItemName"]=$s;foreach($cc
as$x=>$X)$_e["Item.$r.$x"]=$X;}if(!sdb_request($qa,$_e))return
false;}$g->affected_rows=count($Xc);return
true;}function
_extractIds($R,$H,$y){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$H,$Nd))$J=array_map('idf_unescape',$Nd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$H.($y?" LIMIT 1":"")))as$qd)$J[]=$qd->Name;}return$J;}function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Ne=false){global$g;$g->next=$_GET["next"];$J=parent::select($R,$M,$Z,$Gc,$C,$y,$D,$Ne);$g->next=0;return$J;}function
delete($R,$H,$y=0){return$this->_chunkRequest($this->_extractIds($R,$H,$y),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$H,$y=0,$N="\n"){$Ab=array();$kd=array();$r=0;$Xc=$this->_extractIds($R,$H,$y);$s=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($s!=""&&array($s)!=$Xc))$Ab["Attribute.".count($Ab).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$rd=>$W){$kd["Attribute.$r.Name"]=$x;$kd["Attribute.$r.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$rd)$kd["Attribute.$r.Replace"]="true";$r++;}}}$E=array('DomainName'=>$R);return(!$kd||$this->_chunkRequest(($s!=""?array($s):$Xc),'BatchPutAttributes',$E,$kd))&&(!$Ab||$this->_chunkRequest($Xc,'BatchDeleteAttributes',$E,$Ab));}function
insert($R,$P){$E=array("DomainName"=>$R);$r=0;foreach($P
as$A=>$Y){if($Y!="NULL"){$A=idf_unescape($A);if($A=="itemName()")$E["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$E["Attribute.$r.Name"]=$A;$E["Attribute.$r.Value"]=(is_array($Y)?$X:idf_unescape($Y));$r++;}}}}return
sdb_request('PutAttributes',$E);}function
insertUpdate($R,$L,$Le){foreach($L
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$ig){$this->_conn->timeout=$ig;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
support($kc){return
preg_match('~sql~',$kc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$eb){}function
tables_list(){global$g;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$J[(string)$R]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($A="",$jc=false){$J=array();foreach(($A!=""?array($A=>true):tables_list())as$R=>$U){$K=array("Name"=>$R,"Auto_increment"=>"");if(!$jc){$Vd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Vd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$K[$x]=(string)$Vd->$X;}}if($A!="")return$K;$J[$R]=$K;}return$J;}function
explain($g,$G){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y":"");}function
unconvert_field($o,$J){return$J;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$A)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($va,$wb,$x,$Xe=false){$Oa=64;if(strlen($x)>$Oa)$x=pack("H*",$va($x));$x=str_pad($x,$Oa,"\0");$sd=$x^str_repeat("\x36",$Oa);$td=$x^str_repeat("\x5C",$Oa);$J=$va($td.pack("H*",$va($sd.$wb)));if($Xe)$J=pack("H*",$J);return$J;}function
sdb_request($qa,$E=array()){global$b,$g;list($Tc,$E['AWSAccessKeyId'],$rf)=$b->credentials();$E['Action']=$qa;$E['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$E['Version']='2009-04-15';$E['SignatureVersion']=2;$E['SignatureMethod']='HmacSHA1';ksort($E);$G='';foreach($E
as$x=>$X)$G.='&'.rawurlencode($x).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Tc)."\n/\n$G",$rf,true)));@ini_set('track_errors',1);$nc=@file_get_contents((preg_match('~^https?://~',$Tc)?$Tc:"http://$Tc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$nc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$gh=simplexml_load_string($nc);if(!$gh){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($gh->Errors){$n=$gh->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$ag=$qa."Result";return($gh->$ag?$gh->$ag:true);}function
sdb_request_all($qa,$ag,$E=array(),$ig=0){$J=array();$Nf=($ig?microtime(true):0);$y=(preg_match('~LIMIT\s+(\d+)\s*$~i',$E['SelectExpression'],$_)?$_[1]:0);do{$gh=sdb_request($qa,$E);if(!$gh)break;foreach($gh->$ag
as$Pb)$J[]=$Pb;if($y&&count($J)>=$y){$_GET["next"]=$gh->NextToken;break;}if($ig&&microtime(true)-$Nf>$ig)return
false;$E['NextToken']=$gh->NextToken;if($y)$E['SelectExpression']=preg_replace('~\d+\s*$~',$y-count($J),$E['SelectExpression']);}while($gh->NextToken);return$J;}$w="simpledb";$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Fc=array();$Jc=array("count");$Nb=array(array("json"));}$Ib["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Je=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Kg,$B){return@new
MongoClient($Kg,$B);}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Zb){$this->error=$Zb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$qd){$K=array();foreach($qd
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);$A=$vd[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Le="_id";function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Ne=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Gf=array();foreach($C
as$X){$X=preg_replace('~ DESC$~','',$X,1,$qb);$Gf[$X]=($qb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$M)->sort($Gf)->limit($y!=""?+$y:0)->skip($D*$y));}function
insert($R,$P){try{$J=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$P['_id'];return!$J['err'];}catch(Exception$Zb){$this->_conn->error=$Zb->getMessage();return
false;}}}function
get_databases($uc){global$g;$J=array();$yb=$g->_link->listDBs();foreach($yb['databases']as$l)$J[]=$l['name'];return$J;}function
count_tables($k){global$g;$J=array();foreach($k
as$l)$J[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$J;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$gf=$g->_link->selectDB($l)->drop();if(!$gf['ok'])return
false;}return
true;}function
indexes($R,$h=null){global$g;$J=array();foreach($g->_db->selectCollection($R)->getIndexInfo()as$u){$Db=array();foreach($u["key"]as$e=>$U)$Db[]=($U==-1?'1':null);$J[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"lengths"=>array(),"descs"=>$Db,);}return$J;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$qe=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Kg,$B){$ab='MongoDB\Driver\Manager';return
new$ab($Kg,$B);}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$qd){$K=array();foreach($qd
as$x=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=$I->count;}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);$A=$vd[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Le="_id";function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Ne=false){global$g;$M=($M==array("*")?array():array_fill_keys($M,1));if(count($M)&&!isset($M['_id']))$M['_id']=0;$Z=where_to_query($Z);$Gf=array();foreach($C
as$X){$X=preg_replace('~ DESC$~','',$X,1,$qb);$Gf[$X]=($qb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$y=$_GET['limit'];$y=min(200,max(1,(int)$y));$Df=$D*$y;$ab='MongoDB\Driver\Query';$G=new$ab($Z,array('projection'=>$M,'limit'=>$y,'skip'=>$Df,'sort'=>$Gf));$jf=$g->_link->executeQuery("$g->_db_name.$R",$G);return
new
Min_Result($jf);}function
update($R,$P,$H,$y=0,$N="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($H);$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());if(isset($P['_id']))unset($P['_id']);$cf=array();foreach($P
as$x=>$Y){if($Y=='NULL'){$cf[$x]=1;unset($P[$x]);}}$Jg=array('$set'=>$P);if(count($cf))$Jg['$unset']=$cf;$Sa->update($Z,$Jg,array('upsert'=>false));$jf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$jf->getModifiedCount();return
true;}function
delete($R,$H,$y=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($H);$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());$Sa->delete($Z,array('limit'=>$y));$jf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$jf->getDeletedCount();return
true;}function
insert($R,$P){global$g;$l=$g->_db_name;$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());if(isset($P['_id'])&&empty($P['_id']))unset($P['_id']);$Sa->insert($P);$jf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$jf->getInsertedCount();return
true;}}function
get_databases($uc){global$g;$J=array();$ab='MongoDB\Driver\Command';$hb=new$ab(array('listDatabases'=>1));$jf=$g->_link->executeCommand('admin',$hb);foreach($jf
as$yb){foreach($yb->databases
as$l)$J[]=$l->name;}return$J;}function
count_tables($k){$J=array();return$J;}function
tables_list(){global$g;$ab='MongoDB\Driver\Command';$hb=new$ab(array('listCollections'=>1));$jf=$g->_link->executeCommand($g->_db_name,$hb);$fb=array();foreach($jf
as$I)$fb[$I->name]='table';return$fb;}function
drop_databases($k){return
false;}function
indexes($R,$h=null){global$g;$J=array();$ab='MongoDB\Driver\Command';$hb=new$ab(array('listIndexes'=>$R));$jf=$g->_link->executeCommand($g->_db_name,$hb);foreach($jf
as$u){$Db=array();$f=array();foreach(get_object_vars($u->key)as$e=>$U){$Db[]=($U==-1?'1':null);$f[]=$e;}$J[$u->name]=array("type"=>($u->name=="_id_"?"PRIMARY":(isset($u->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Db,);}return$J;}function
fields($R){$p=fields_from_edit();if(!count($p)){global$m;$I=$m->select($R,array("*"),null,null,array(),10);while($K=$I->fetch_assoc()){foreach($K
as$x=>$X){$K[$x]=null;$p[$x]=array("field"=>$x,"type"=>"string","null"=>($x!=$m->primary),"auto_increment"=>($x==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($S,$Z){global$g;$Z=where_to_query($Z);$ab='MongoDB\Driver\Command';$hb=new$ab(array('count'=>$S['Name'],'query'=>$Z));$jf=$g->_link->executeCommand($g->_db_name,$hb);$pg=$jf->toArray();return$pg[0]->n;}function
sql_query_where_parser($H){$H=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$H));$H=preg_replace('/\)\)\)$/',')',$H);$dh=explode(' AND ',$H);$eh=explode(') OR (',$H);$Z=array();foreach($dh
as$bh)$Z[]=trim($bh);if(count($eh)==1)$eh=array();elseif(count($eh)>1)$Z=array();return
where_to_query($Z,$eh);}function
where_to_query($Zg=array(),$ah=array()){global$b;$wb=array();foreach(array('and'=>$Zg,'or'=>$ah)as$U=>$Z){if(is_array($Z)){foreach($Z
as$dc){list($db,$oe,$X)=explode(" ",$dc,3);if($db=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$ab='MongoDB\BSON\ObjectID';$X=new$ab($X);}if(!in_array($oe,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$oe,$_)){$X=(float)$X;$oe=$_[1];}elseif(preg_match('~^\(date\)(.+)~',$oe,$_)){$xb=new
DateTime($X);$ab='MongoDB\BSON\UTCDatetime';$X=new$ab($xb->getTimestamp()*1000);$oe=$_[1];}switch($oe){case'=':$oe='$eq';break;case'!=':$oe='$ne';break;case'>':$oe='$gt';break;case'<':$oe='$lt';break;case'>=':$oe='$gte';break;case'<=':$oe='$lte';break;case'regex':$oe='$regex';break;default:continue
2;}if($U=='and')$wb['$and'][]=array($db=>array($oe=>$X));elseif($U=='or')$wb['$or'][]=array($db=>array($oe=>$X));}}}return$wb;}$qe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($t){return$t;}function
idf_escape($t){return$t;}function
table_status($A="",$jc=false){$J=array();foreach(tables_list()as$R=>$U){$J[$R]=array("Name"=>$R);if($A==$R)return$J[$R];}return$J;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
connect(){global$b;$g=new
Min_DB;list($O,$V,$F)=$b->credentials();$B=array();if($V.$F!=""){$B["username"]=$V;$B["password"]=$F;}$l=$b->database();if($l!="")$B["db"]=$l;if(($Ea=getenv("MONGO_AUTH_SOURCE")))$B["authSource"]=$Ea;try{$g->_link=$g->connect("mongodb://$O",$B);if($F!=""){$B["password"]="";try{$g->connect("mongodb://$O",$B);return'Database does not support password.';}catch(Exception$Zb){}}return$g;}catch(Exception$Zb){return$Zb->getMessage();}}function
alter_indexes($R,$c){global$g;foreach($c
as$X){list($U,$A,$P)=$X;if($P=="DROP")$J=$g->_db->command(array("deleteIndexes"=>$R,"index"=>$A));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$qb);$f[$e]=($qb?-1:1);}$J=$g->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$A,));}if($J['errmsg']){$g->error=$J['errmsg'];return
false;}}return
true;}function
support($kc){return
preg_match("~database|indexes|descidx~",$kc);}function
db_collation($l,$eb){}function
information_schema(){}function
is_view($S){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;if($R==""){$g->_db->createCollection($A);return
true;}}function
drop_tables($T){global$g;foreach($T
as$R){$gf=$g->_db->selectCollection($R)->drop();if(!$gf['ok'])return
false;}return
true;}function
truncate_tables($T){global$g;foreach($T
as$R){$gf=$g->_db->selectCollection($R)->remove();if(!$gf['ok'])return
false;}return
true;}$w="mongo";$Fc=array();$Jc=array();$Nb=array(array("json"));}$Ib["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Je=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($De,$ob=array(),$Wd='GET'){@ini_set('track_errors',1);$nc=@file_get_contents("$this->_url/".ltrim($De,'/'),false,stream_context_create(array('http'=>array('method'=>$Wd,'content'=>$ob===null?$ob:json_encode($ob),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$nc){$this->error=$php_errormsg;return$nc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$nc;return
false;}$J=json_decode($nc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$nb=get_defined_constants(true);foreach($nb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return$J;}function
query($De,$ob=array(),$Wd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($De,'/'),$ob,$Wd);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$F@$_[2]";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($L);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Ne=false){global$b;$wb=array();$G="$R/_search";if($M!=array("*"))$wb["fields"]=$M;if($C){$Gf=array();foreach($C
as$db){$db=preg_replace('~ DESC$~','',$db,1,$qb);$Gf[]=($qb?array($db=>"desc"):$db);}$wb["sort"]=$Gf;}if($y){$wb["size"]=+$y;if($D)$wb["from"]=($D*$y);}foreach($Z
as$X){list($db,$oe,$X)=explode(" ",$X,3);if($db=="_id")$wb["query"]["ids"]["values"][]=$X;elseif($db.$X!=""){$dg=array("term"=>array(($db!=""?$db:"_all")=>$X));if($oe=="=")$wb["query"]["filtered"]["filter"]["and"][]=$dg;else$wb["query"]["filtered"]["query"]["bool"]["must"][]=$dg;}}if($wb["query"]&&!$wb["query"]["filtered"]["query"]&&!$wb["query"]["ids"])$wb["query"]["filtered"]["query"]=array("match_all"=>array());$Nf=microtime(true);$qf=$this->_conn->query($G,$wb);if($Ne)echo$b->selectQuery("$G: ".json_encode($wb),$Nf,!$qf);if(!$qf)return
false;$J=array();foreach($qf['hits']['hits']as$Sc){$K=array();if($M==array("*"))$K["_id"]=$Sc["_id"];$p=$Sc['_source'];if($M!=array("*")){$p=array();foreach($M
as$x)$p[$x]=$Sc['fields'][$x];}foreach($p
as$x=>$X){if($wb["fields"])$X=$X[0];$K[$x]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}function
update($U,$Ye,$H,$y=0,$N="\n"){$Ce=preg_split('~ *= *~',$H);if(count($Ce)==2){$s=trim($Ce[1]);$G="$U/$s";return$this->_conn->query($G,$Ye,'POST');}return
false;}function
insert($U,$Ye){$s="";$G="$U/$s";$gf=$this->_conn->query($G,$Ye,'POST');$this->_conn->last_id=$gf['_id'];return$gf['created'];}function
delete($U,$H,$y=0){$Xc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Xc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Ua){$Ce=preg_split('~ *= *~',$Ua);if(count($Ce)==2)$Xc[]=trim($Ce[1]);}}$this->_conn->affected_rows=0;foreach($Xc
as$s){$G="{$U}/{$s}";$gf=$this->_conn->query($G,'{}','DELETE');if(is_array($gf)&&$gf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($O,$V,$F)=$b->credentials();if($F!=""&&$g->connect($O,$V,""))return'Database does not support password.';if($g->connect($O,$V,$F))return$g;return$g->error;}function
support($kc){return
preg_match("~database|table|columns~",$kc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$g;$J=$g->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($l,$eb){}function
engines(){return
array();}function
count_tables($k){global$g;$J=array();$I=$g->query('_stats');if($I&&$I['indices']){$dd=$I['indices'];foreach($dd
as$cd=>$Of){$bd=$Of['total']['indexing'];$J[$cd]=$bd['index_total'];}}return$J;}function
tables_list(){global$g;$J=$g->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$g->_db]["mappings"]),'table');return$J;}function
table_status($A="",$jc=false){global$g;$qf=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$J=array();if($qf){$T=$qf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$J[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($A!=""&&$A==$R["key"])return$J[$A];}}return$J;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$g;$I=$g->query("$R/_mapping");$J=array();if($I){$Jd=$I[$R]['properties'];if(!$Jd)$Jd=$I[$g->_db]['mappings'][$R]['properties'];if($Jd){foreach($Jd
as$A=>$o){$J[$A]=array("field"=>$A,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($J[$A]["privileges"]["insert"]);unset($J[$A]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($R){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;$Qe=array();foreach($p
as$hc){$lc=trim($hc[1][0]);$mc=trim($hc[1][1]?$hc[1][1]:"text");$Qe[$lc]=array('type'=>$mc);}if(!empty($Qe))$Qe=array('properties'=>$Qe);return$g->query("_mapping/{$A}",$Qe,'PUT');}function
drop_tables($T){global$g;$J=true;foreach($T
as$R)$J=$J&&$g->query(urlencode($R),array(),'DELETE');return$J;}function
last_id(){global$g;return$g->last_id;}$w="elastic";$qe=array("=","query");$Fc=array();$Jc=array();$Nb=array(array("json"));$Bg=array();$Rf=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}}$Ib["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($l,$G){@ini_set('track_errors',1);$nc=@file_get_contents("$this->_url/?database=$l",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($G)?"$G FORMAT JSONCompact":$G,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($nc===false){$this->error=$php_errormsg;return$nc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$nc;return
false;}$J=json_decode($nc,true);if($J===null){if(!$this->isQuerySelectLike($G)&&$nc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$nb=get_defined_constants(true);foreach($nb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return
new
Min_Result($J);}function
isQuerySelectLike($G){return(bool)preg_match('~^(select|show)~i',$G);}function
query($G){return$this->rootQuery($this->_db,$G);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$F@$_[2]";$J=$this->query('SELECT 1');return(bool)$J;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);return$I['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($I){$this->num_rows=$I['rows'];$this->_rows=$I['data'];$this->meta=$I['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K===false?false:array_combine($this->columns,$K);}function
fetch_row(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if($e<count($this->columns)){$J->name=$this->meta[$e]['name'];$J->orgname=$J->name;$J->type=$this->meta[$e]['type'];}return$J;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$H,$y=0){if($H==='')$H='WHERE 1=1';return
queries("ALTER TABLE ".table($R)." DELETE $H");}function
update($R,$P,$H,$y=0,$N="\n"){$Rg=array();foreach($P
as$x=>$X)$Rg[]="$x = $X";$G=$N.implode(",$N",$Rg);return
queries("ALTER TABLE ".table($R)." UPDATE $G$H");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
explain($g,$G){return'';}function
found_rows($S,$Z){$L=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($L)?false:$L[0];}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=$C=array();foreach($p
as$o){if($o[1][2]===" NULL")$o[1][1]=" Nullable({$o[1][1]})";elseif($o[1][2]===' NOT NULL')$o[1][2]='';if($o[1][3])$o[1][3]='';$c[]=($o[1]?($R!=""?($o[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($o[1]):"DROP COLUMN ".idf_escape($o[0]));$C[]=$o[1][0];}$c=array_merge($c,$wc);$Pf=($Ub?" ENGINE ".$Ub:"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$Pf$Be".' ORDER BY ('.implode(',',$C).')');if($R!=$A){$I=queries("RENAME TABLE ".table($R)." TO ".table($A));if($c)$R=$A;else
return$I;}if($Pf)$c[]=ltrim($Pf);return($c||$Be?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Be):true);}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Vg){return
drop_tables($Vg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases($uc){global$g;$I=get_rows('SHOW DATABASES');$J=array();foreach($I
as$K)$J[]=$K['name'];sort($J);return$J;}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?", $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){$I=get_rows('SHOW TABLES');$J=array();foreach($I
as$K)$J[$K['name']]='table';ksort($J);return$J;}function
count_tables($k){return
array();}function
table_status($A="",$jc=false){global$g;$J=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($g->_db));foreach($T
as$R){$J[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($A===$R['name'])return$J[$R['name']];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($o){}function
unconvert_field($o,$J){if(in_array($o['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$o[type]($J)";return$J;}function
fields($R){$J=array();$I=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($I
as$K){$U=trim($K['type']);$fe=strpos($U,'Nullable(')===0;$J[trim($K['name'])]=array("field"=>trim($K['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($K['default_expression']),"null"=>$fe,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$J;}function
indexes($R,$h=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($of){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($kc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$kc);}$w="clickhouse";$Bg=array();$Rf=array();foreach(array('Numbers'=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),'Date and time'=>array("Date"=>13,"DateTime"=>20),'Strings'=>array("String"=>0),'Binary'=>array("FixedString"=>0),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}$Ig=array();$qe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Fc=array();$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array();}$Ib=array("server"=>"MySQL")+$Ib;if(!defined("DRIVER")){$Je=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($O="",$V="",$F="",$j=null,$He=null,$Ff=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Tc,$He)=explode(":",$O,2);$Mf=$b->connectSsl();if($Mf)$this->ssl_set($Mf['key'],$Mf['cert'],$Mf['ca'],'','');$J=@$this->real_connect(($O!=""?$Tc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($He)?$He:ini_get("mysqli.default_port")),(!is_numeric($He)?$He:$Ff),($Mf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$J;}function
set_charset($Ta){if(parent::set_charset($Ta))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ta");}function
result($G,$o=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch_array();return$K[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ta){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ta,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ta");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$Cg=false){$I=@($Cg?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$F){global$b;$B=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Mf=$b->connectSsl();if($Mf){if(!empty($Mf['key']))$B[PDO::MYSQL_ATTR_SSL_KEY]=$Mf['key'];if(!empty($Mf['cert']))$B[PDO::MYSQL_ATTR_SSL_CERT]=$Mf['cert'];if(!empty($Mf['ca']))$B[PDO::MYSQL_ATTR_SSL_CA]=$Mf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F,$B);return
true;}function
set_charset($Ta){$this->query("SET NAMES $Ta");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Cg=false){$this->setAttribute(1000,!$Cg);return
parent::query($G,$Cg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$L,$Le){$f=array_keys(reset($L));$Ke="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Rg=array();foreach($f
as$x)$Rg[$x]="$x = VALUES($x)";$Uf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Rg);$Rg=array();$Cd=0;foreach($L
as$P){$Y="(".implode(", ",$P).")";if($Rg&&(strlen($Ke)+$Cd+strlen($Y)+strlen($Uf)>1e6)){if(!queries($Ke.implode(",\n",$Rg).$Uf))return
false;$Rg=array();$Cd=0;}$Rg[]=$Y;$Cd+=strlen($Y)+2;}return
queries($Ke.implode(",\n",$Rg).$Uf);}function
slowQuery($G,$ig){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$ig FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$_))return"$_[1] /*+ MAX_EXECUTION_TIME(".($ig*1000).") */ $_[2]";}}function
convertSearch($t,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($t USING ".charset($this->_conn).")":$t);}function
warnings(){$I=$this->_conn->query("SHOW WARNINGS");if($I&&$I->num_rows){ob_start();select($I);return
ob_get_clean();}}function
tableHelp($A){$Kd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Kd?"information-schema-$A-table/":str_replace("_","-",$A)."-table.html"));if(DB=="mysql")return($Kd?"mysql$A-table/":"system-database.html");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Bg,$Rf;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Rf['Strings'][]="json";$Bg["json"]=4294967295;}return$g;}$J=$g->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($nf=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$nf;return$J;}function
get_databases($uc){$J=get_session("dbs");if($J===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$J=($uc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){global$g;$J=null;$rb=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$rb,$_))$J=$_[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$rb,$_))$J=$eb[$_[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$J=array();foreach($k
as$l)$J[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$J;}function
table_status($A="",$jc=false){$J=array();foreach(get_rows($jc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($A!=""?"AND TABLE_NAME = ".q($A):"ORDER BY Name"):"SHOW TABLE STATUS".($A!=""?" LIKE ".q(addcslashes($A,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$K){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$K["Type"],$_);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$_[1],"length"=>$_[2],"unsigned"=>ltrim($_[3].$_[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$_[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$_)?$_[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$K["Extra"]),);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$h)as$K){$A=$K["Key_name"];$J[$A]["type"]=($A=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?($K["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$J[$A]["columns"][]=$K["Column_name"];$J[$A]["lengths"][]=($K["Index_type"]=="SPATIAL"?null:$K["Sub_part"]);$J[$A]["descs"][]=null;}return$J;}function
foreign_keys($R){global$g,$le;static$Ee='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$J=array();$sb=$g->result("SHOW CREATE TABLE ".table($R),1);if($sb){preg_match_all("~CONSTRAINT ($Ee) FOREIGN KEY ?\\(((?:$Ee,? ?)+)\\) REFERENCES ($Ee)(?:\\.($Ee))? \\(((?:$Ee,? ?)+)\\)(?: ON DELETE ($le))?(?: ON UPDATE ($le))?~",$sb,$Nd,PREG_SET_ORDER);foreach($Nd
as$_){preg_match_all("~$Ee~",$_[2],$Hf);preg_match_all("~$Ee~",$_[5],$bg);$J[idf_unescape($_[1])]=array("db"=>idf_unescape($_[4]!=""?$_[3]:$_[4]),"table"=>idf_unescape($_[4]!=""?$_[4]:$_[3]),"source"=>array_map('idf_unescape',$Hf[0]),"target"=>array_map('idf_unescape',$bg[0]),"on_delete"=>($_[6]?$_[6]:"RESTRICT"),"on_update"=>($_[7]?$_[7]:"RESTRICT"),);}}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($A),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$x=>$X)asort($J[$x]);return$J;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$J=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($A,$d){$J=false;if(create_database($A,$d)){$df=array();foreach(tables_list()as$R=>$U)$df[]=table($R)." TO ".idf_escape($A).".".table($R);$J=(!$df||queries("RENAME TABLE ".implode(", ",$df)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Ga=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ga="";break;}if($u["type"]=="PRIMARY")$Ga=" UNIQUE";}}return" AUTO_INCREMENT$Ga";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$wc);$Pf=($ib!==null?" COMMENT=".q($ib):"").($Ub?" ENGINE=".q($Ub):"").($d?" COLLATE ".q($d):"").($Fa!=""?" AUTO_INCREMENT=$Fa":"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$Pf$Be");if($R!=$A)$c[]="RENAME TO ".table($A);if($Pf)$c[]=ltrim($Pf);return($c||$Be?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Be):true);}function
alter_indexes($R,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Vg,$bg){$df=array();foreach(array_merge($T,$Vg)as$R)$df[]=table($R)." TO ".idf_escape($bg).".".table($R);return
queries("RENAME TABLE ".implode(", ",$df));}function
copy_tables($T,$Vg,$bg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$A=($bg==DB?table("copy_$R"):idf_escape($bg).".".table($R));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $A"))||!queries("CREATE TABLE $A LIKE ".table($R))||!queries("INSERT INTO $A SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K){$xg=$K["Trigger"];if(!queries("CREATE TRIGGER ".($bg==DB?idf_escape("copy_$xg"):idf_escape($bg).".".idf_escape($xg))." $K[Timing] $K[Event] ON $A FOR EACH ROW\n$K[Statement];"))return
false;}}foreach($Vg
as$R){$A=($bg==DB?table("copy_$R"):idf_escape($bg).".".table($R));$Ug=view($R);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $A"))||!queries("CREATE VIEW $A AS $Ug[select]"))return
false;}return
true;}function
trigger($A){if($A=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($A));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($A,$U){global$g,$Vb,$id,$Bg;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$If="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ag="((".implode("|",array_merge(array_keys($Bg),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Vb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Ee="$If*(".($U=="FUNCTION"?"":$id).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ag";$rb=$g->result("SHOW CREATE $U ".idf_escape($A),2);preg_match("~\\(((?:$Ee\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Ag\\s+":"")."(.*)~is",$rb,$_);$p=array();preg_match_all("~$Ee\\s*,?~is",$_[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$ze)$p[]=array("field"=>str_replace("``","`",$ze[2]).$ze[3],"type"=>strtolower($ze[5]),"length"=>preg_replace_callback("~$Vb~s",'normalize_enum',$ze[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$ze[8] $ze[7]"))),"null"=>1,"full_type"=>$ze[4],"inout"=>strtoupper($ze[1]),"collation"=>strtolower($ze[9]),);if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$_[11]);return
array("fields"=>$p,"returns"=>array("type"=>$_[12],"length"=>$_[13],"unsigned"=>$_[15],"collation"=>$_[16]),"definition"=>$_[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($A,$K){return
idf_escape($A);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($of,$h=null){return
true;}function
create_sql($R,$Fa,$Sf){global$g;$J=$g->result("SHOW CREATE TABLE ".table($R),1);if(!$Fa)$J=preg_replace('~ AUTO_INCREMENT=\d+~','',$J);return$J;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$K)$J.="\nCREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$J){if(preg_match("~binary~",$o["type"]))$J="UNHEX($J)";if($o["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$J=(min_version(8)?"ST_":"")."GeomFromText($J, SRID($o[field]))";return$J;}function
support($kc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$kc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$w="sql";$Bg=array();$Rf=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Bg+=$X;$Rf[$x]=array_keys($X);}$Ig=array("unsigned","zerofill","unsigned zerofill");$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Fc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Jc=array("avg","count","count distinct","group_concat","max","min","sum");$Nb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",str_replace(":","%3a",preg_replace('~\?.*~','',relative_uri())).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.7";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($rb=false){return
password_file($rb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($O){}function
database(){global$g;if($g){$k=$this->databases(false);return(!$k?$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($uc=true){return
get_databases($uc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$J=array();$q="adminer.css";if(file_exists($q))$J[]=$q;return$J;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($A,$Qc,$Y){return$Qc.$Y;}function
login($Hd,$F){return
true;}function
tableName($Xf){return
h($Xf["Comment"]!=""?$Xf["Comment"]:$Xf["Name"]);}function
fieldName($o,$C=0){return
h(preg_replace('~\s+\[.*\]$~','',($o["comment"]!=""?$o["comment"]:$o["field"])));}function
selectLinks($Xf,$P=""){$a=$Xf["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'New item'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Wf){$J=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$K)$J[$K["TABLE_NAME"]]["keys"][$K["CONSTRAINT_NAME"]][$K["COLUMN_NAME"]]=$K["REFERENCED_COLUMN_NAME"];foreach($J
as$x=>$X){$A=$this->tableName(table_status($x,true));if($A!=""){$qf=preg_quote($Wf);$N="(:|\\s*-)?\\s+";$J[$x]["name"]=(preg_match("(^$qf$N(.+)|^(.+?)$N$qf\$)iu",$A,$_)?$_[2].$_[3]:$A);}else
unset($J[$x]);}return$J;}function
backwardKeysPrint($Ja,$K){foreach($Ja
as$R=>$Ia){foreach($Ia["keys"]as$gb){$z=ME.'select='.urlencode($R);$r=0;foreach($gb
as$e=>$X)$z.=where_link($r++,$e,$K[$X]);echo"<a href='".h($z)."'>".h($Ia["name"])."</a>";$z=ME.'edit='.urlencode($R);foreach($gb
as$e=>$X)$z.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($K[$X]);echo"<a href='".h($z)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($G,$Nf,$ic=false){return"<!--\n".str_replace("--","--><!-- ",$G)."\n(".format_time($Nf).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($L,$yc){$J=$L;foreach($L[0]as$x=>$X){if(list($R,$s,$A)=$this->_foreignColumn($yc,$x)){$Xc=array();foreach($L
as$K)$Xc[$K[$x]]=q($K[$x]);$Cb=$this->_values[$R];if(!$Cb)$Cb=get_key_vals("SELECT $s, $A FROM ".table($R)." WHERE $s IN (".implode(", ",$Xc).")");foreach($L
as$ae=>$K){if(isset($K[$x]))$J[$ae][$x]=(string)$Cb[$K[$x]];}}}return$J;}function
selectLink($X,$o){}function
selectVal($X,$z,$o,$ue){$J=$X;$z=h($z);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$J=lang(array('%d byte','%d bytes'),strlen($ue));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$ue))$J="<img src='$z' alt='$J'>";}if(like_bool($o)&&$J!="")$J=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?'yes':'no');if($z)$J="<a href='$z'".(is_url($z)?target_blank():"").">$J</a>";if(!$z&&!like_bool($o)&&preg_match(number_type(),$o["type"]))$J="<div class='number'>$J</div>";elseif(preg_match('~date~',$o["type"]))$J="<div class='datetime'>$J</div>";return$J;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~','$1-$3-$5',$X);return$X;}function
selectColumnsPrint($M,$f){}function
selectSearchPrint($Z,$f,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$vd=array();foreach($Z
as$x=>$X)$vd[$X["col"]]=$x;$r=0;$p=fields($_GET["select"]);foreach($f
as$A=>$Bb){$o=$p[$A];if(preg_match("~enum~",$o["type"])||like_bool($o)){$x=$vd[$A];$r--;echo"<div>".h($Bb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'>:",(like_bool($o)?" <select name='where[$r][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$r][val][]'",$o,(array)$Z[$x]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$A]);}elseif(is_array($B=$this->_foreignKeyOptions($_GET["select"],$A))){if($p[$A]["null"])$B[0]='('.'empty'.')';$x=$vd[$A];$r--;echo"<div>".h($Bb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'><input type='hidden' name='where[$r][op]' value='='>: <select name='where[$r][val]'>".optionlist($B,$Z[$x]["val"],true)."</select></div>\n";unset($f[$A]);}}$r=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($f,$X["col"],true)."</select>",html_select("where[$r][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$r][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$r++;}}echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$r][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$r][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($C,$f,$v){$te=array();foreach($v
as$x=>$u){$C=array();foreach($u["columns"]as$X)$C[]=$f[$X];if(count(array_filter($C,'strlen'))>1&&$x!="PRIMARY")$te[$x]=implode(", ",$C);}if($te){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$te,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($fg){}function
selectActionPrint($v){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Rb,$f){if($Rb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Rb)==1?'<input type="hidden" name="email_field" value="'.h(key($Rb)).'">':html_select("email_field",$Rb)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$v){return
array(array(),array());}function
selectSearchProcess($p,$v){$J=array();foreach((array)$_GET["where"]as$x=>$Z){$db=$Z["col"];$oe=$Z["op"];$X=$Z["val"];if(($x<0?"":$db).$X!=""){$kb=array();foreach(($db!=""?array($db=>$p[$db]):$p)as$A=>$o){if($db!=""||is_numeric($X)||!preg_match(number_type(),$o["type"])){$A=idf_escape($A);if($db!=""&&$o["type"]=="enum")$kb[]=(in_array(0,$X)?"$A IS NULL OR ":"")."$A IN (".implode(", ",array_map('intval',$X)).")";else{$gg=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$oe&&$gg&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$kb[]=$A.($Y=="NULL"?" IS".($oe==">="?" NOT":"")." $Y":(in_array($oe,$this->operators)||$oe=="="?" $oe $Y":($gg?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($x<0&&$X=="0")$kb[]="$A IS NULL";}}}$J[]=($kb?"(".implode(" OR ",$kb).")":"1 = 0");}}return$J;}function
selectOrderProcess($p,$v){$ad=$_GET["index_order"];if($ad!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($ad!=""?array($v[$ad]):$v)as$u){if($ad!=""||$u["type"]=="INDEX"){$Lc=array_filter($u["descs"]);$Bb=false;foreach($u["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$Bb=true;break;}}$J=array();foreach($u["columns"]as$x=>$X)$J[]=idf_escape($X).(($Lc?$u["descs"][$x]:$Bb)?" DESC":"");return$J;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$yc){if($_POST["email_append"])return
true;if($_POST["email"]){$vf=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$Tf=$_POST["email_subject"];$Td=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Tf.$Td",$Nd);$L=get_rows("SELECT DISTINCT $o".($Nd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Nd[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($L,$yc)as$K){$ef=array('{\\'=>'{');foreach($Nd[1]as$X)$ef['{$'."$X}"]=$this->editVal($K[$X],$p[$X]);$Qb=$K[$_POST["email_field"]];if(is_mail($Qb)&&send_mail($Qb,strtr($Tf,$ef),strtr($Td,$ef),$_POST["email_from"],$_FILES["email_files"]))$vf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$vf));}return
false;}function
selectQueryBuild($M,$Z,$Gc,$C,$y,$D){return"";}function
messageQuery($G,$hg,$ic=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$G)."\n".($hg?"($hg)\n":"")."-->";}function
editFunctions($o){$J=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$J["NULL"]='empty';$J[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$J["now"]='now';if(preg_match('~_(md5|sha1)$~i',$o["field"],$_))$J[]=strtolower($_[1]);return$J;}function
editInput($R,$o,$Ca,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$Ca,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$B=$this->_foreignKeyOptions($R,$o["field"],$Y);if($B!==null)return(is_array($B)?"<select$Ca>".optionlist($B,$Y,true)."</select>":"<input value='".h($Y)."'$Ca class='hidden'>"."<input value='".h($B)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($o["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($o))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ca>";$Rc="";if(preg_match('~time~',$o["type"]))$Rc='HH:MM:SS';if(preg_match('~date|timestamp~',$o["type"]))$Rc='[yyyy]-mm-dd'.($Rc?" [$Rc]":"");if($Rc)return"<input value='".h($Y)."'$Ca> ($Rc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ca>";return'';}function
editHint($R,$o,$Y){return(preg_match('~\s+(\[.*\])$~',($o["comment"]!=""?$o["comment"]:$o["field"]),$_)?h(" $_[1]"):'');}function
processInput($o,$Y,$Ec=""){if($Ec=="now")return"$Ec()";$J=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$Y,$_))$J=($_["p1"]!=""?$_["p1"]:($_["p2"]!=""?($_["p2"]<70?20:19).$_["p2"]:gmdate("Y")))."-$_[p3]$_[p4]-$_[p5]$_[p6]".end($_);$J=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$J:q($J));if($Y==""&&like_bool($o))$J="'0'";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$J="NULL";elseif(preg_match('~^(md5|sha1)$~',$Ec))$J="$Ec($J)";return
unconvert_field($o,$J);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($R,$Sf,$pd=0){echo"\xef\xbb\xbf";}function
dumpData($R,$Sf,$G){global$g;$I=$g->query($G,1);if($I){while($K=$I->fetch_assoc()){if($Sf=="table"){dump_csv(array_keys($K));$Sf="INSERT";}dump_csv($K);}}}function
dumpFilename($Vc){return
friendly_url($Vc);}function
dumpHeaders($Vc,$Yd=false){$ec="csv";header("Content-Type: text/csv; charset=utf-8");return$ec;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Xd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Xd=="auth"){$qc=true;foreach((array)$_SESSION["pwds"]as$Sg=>$_f){foreach($_f[""]as$V=>$F){if($F!==null){if($qc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$qc=false;}echo"<li><a href='".h(auth_url($Sg,"",$V))."'>".($V!=""?h($V):"<i>".'empty'."</i>")."</a>\n";}}}}else{$this->databasesPrint($Xd);if($Xd!="db"&&$Xd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Xd){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$K){echo'<li>';$A=$this->tableName($K);if(isset($K["Engine"])&&$A!="")echo"<a href='".h(ME).'select='.urlencode($K["Name"])."'".bold($_GET["select"]==$K["Name"]||$_GET["edit"]==$K["Name"],"select")." title='".'Select data'."'>$A</a>\n";}echo"</ul>\n";}function
_foreignColumn($yc,$e){foreach((array)$yc[$e]as$xc){if(count($xc["source"])==1){$A=$this->rowDescription($xc["table"]);if($A!=""){$s=idf_escape($xc["target"][0]);return
array($xc["table"],$s,$A);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$g;if(list($bg,$s,$A)=$this->_foreignColumn(column_foreign_keys($R),$e)){$J=&$this->_values[$bg];if($J===null){$S=table_status($bg);$J=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $s, $A FROM ".table($bg)." ORDER BY 2"));}if(!$J&&$Y!==null)return$g->result("SELECT $A FROM ".table($bg)." WHERE $s = ".q($Y));return$J;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($kg,$n="",$Ra=array(),$lg=""){global$ba,$ca,$b,$Ib,$w;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$mg=$kg.($lg!=""?": $lg":"");$ng=strip_tags($mg.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$ng,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.7"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.7");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
';foreach($b->css()as$ub){echo'<link rel="stylesheet" type="text/css" href="',h($ub),'">
';}}echo'
<body class="ltr nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Tg=unserialize(file_get_contents($q));$Re="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Tg["version"],base64_decode($Tg["signature"]),$Re)==1)$_COOKIE["adminer_version"]=$Tg["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ra!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$Ib[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=$b->serverName(SERVER);$O=($O!=""?$O:'Server');if($Ra===false)echo"$O\n";else{echo"<a href='".($z?h($z):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ra)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ra)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ra
as$x=>$X){$Bb=(is_array($X)?$X[1]:h($X));if($Bb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Bb</a> &raquo; ";}}echo"$kg\n";}}echo"<h2>$mg</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$tb){$Oc=array();foreach($tb
as$x=>$X)$Oc[]="$x $X";header("Content-Security-Policy: ".implode("; ",$Oc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ee;if(!$ee)$ee=base64_encode(rand_string());return$ee;}function
page_messages($n){$Kg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ud=$_SESSION["messages"][$Kg];if($Ud){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ud)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Kg]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Xd=""){global$b,$qg;echo'</div>

';if($Xd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$qg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Xd);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($ae){while($ae>=2147483648)$ae-=4294967296;while($ae<=-2147483649)$ae+=4294967296;return(int)$ae;}function
long2str($W,$Xg){$nf='';foreach($W
as$X)$nf.=pack('V',$X);if($Xg)return
substr($nf,0,end($W));return$nf;}function
str2long($nf,$Xg){$W=array_values(unpack('V*',str_pad($nf,4*ceil(strlen($nf)/4),"\0")));if($Xg)$W[]=strlen($nf);return$W;}function
xxtea_mx($ih,$hh,$Vf,$rd){return
int32((($ih>>5&0x7FFFFFF)^$hh<<2)+(($hh>>3&0x1FFFFFFF)^$ih<<4))^int32(($Vf^$hh)+($rd^$ih));}function
encrypt_string($Qf,$x){if($Qf=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Qf,true);$ae=count($W)-1;$ih=$W[$ae];$hh=$W[0];$Se=floor(6+52/($ae+1));$Vf=0;while($Se-->0){$Vf=int32($Vf+0x9E3779B9);$Mb=$Vf>>2&3;for($xe=0;$xe<$ae;$xe++){$hh=$W[$xe+1];$Zd=xxtea_mx($ih,$hh,$Vf,$x[$xe&3^$Mb]);$ih=int32($W[$xe]+$Zd);$W[$xe]=$ih;}$hh=$W[0];$Zd=xxtea_mx($ih,$hh,$Vf,$x[$xe&3^$Mb]);$ih=int32($W[$ae]+$Zd);$W[$ae]=$ih;}return
long2str($W,false);}function
decrypt_string($Qf,$x){if($Qf=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Qf,false);$ae=count($W)-1;$ih=$W[$ae];$hh=$W[0];$Se=floor(6+52/($ae+1));$Vf=int32($Se*0x9E3779B9);while($Vf){$Mb=$Vf>>2&3;for($xe=$ae;$xe>0;$xe--){$ih=$W[$xe-1];$Zd=xxtea_mx($ih,$hh,$Vf,$x[$xe&3^$Mb]);$hh=int32($W[$xe]-$Zd);$W[$xe]=$hh;}$ih=$W[$ae];$Zd=xxtea_mx($ih,$hh,$Vf,$x[$xe&3^$Mb]);$hh=int32($W[0]-$Zd);$W[0]=$hh;$Vf=int32($Vf-0x9E3779B9);}return
long2str($W,true);}$g='';$Nc=$_SESSION["token"];if(!$Nc)$_SESSION["token"]=rand(1,1e6);$qg=get_token();$Fe=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$Fe[$x]=$X;}}function
add_invalid_login(){global$b;$Cc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Cc)return;$md=unserialize(stream_get_contents($Cc));$hg=time();if($md){foreach($md
as$nd=>$X){if($X[0]<$hg)unset($md[$nd]);}}$ld=&$md[$b->bruteForceKey()];if(!$ld)$ld=array($hg+30*60,0);$ld[1]++;file_write_unlock($Cc,serialize($md));}function
check_invalid_login(){global$b;$md=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$ld=$md[$b->bruteForceKey()];$de=($ld[1]>29?$ld[0]-time():0);if($de>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($de/60)));}$Da=$_POST["auth"];if($Da){session_regenerate_id();$Sg=$Da["driver"];$O=$Da["server"];$V=$Da["username"];$F=(string)$Da["password"];$l=$Da["db"];set_password($Sg,$O,$V,$F);$_SESSION["db"][$Sg][$O][$V][$l]=true;if($Da["permanent"]){$x=base64_encode($Sg)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($l);$Oe=$b->permanentLogin(true);$Fe[$x]="$x:".base64_encode($Oe?encrypt_string($F,$Oe):"");cookie("adminer_permanent",implode(" ",$Fe));}if(count($_POST)==1||DRIVER!=$Sg||SERVER!=$O||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Sg,$O,$V,$l));}elseif($_POST["logout"]){if($Nc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}}elseif($Fe&&!$_SESSION["pwds"]){session_regenerate_id();$Oe=$b->permanentLogin();foreach($Fe
as$x=>$X){list(,$Za)=explode(":",$X);list($Sg,$O,$V,$l)=array_map('base64_decode',explode("-",$x));set_password($Sg,$O,$V,decrypt_string(base64_decode($Za),$Oe));$_SESSION["db"][$Sg][$O][$V][$l]=true;}}function
unset_permanent(){global$Fe;foreach($Fe
as$x=>$X){list($Sg,$O,$V,$l)=array_map('base64_decode',explode("-",$x));if($Sg==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Fe[$x]);}cookie("adminer_permanent",implode(" ",$Fe));}function
auth_error($n){global$b,$Nc;$Af=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Af]||$_GET[$Af])&&!$Nc)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Af]&&$_GET[$Af]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$E=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$E["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$Je)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Tc,$He)=explode(":",SERVER,2);if(is_numeric($He)&&($He<1024||$He>65535))auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$Hd=null;if(!is_object($g)||($Hd=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($Hd)?$Hd:'Invalid credentials.'));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($Da&&$_POST["token"])$_POST["token"]=$qg;$n='';if($_POST){if(!verify_token()){$hd="max_input_vars";$Rd=ini_get($hd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$Rd||$X<$Rd)){$hd=$x;$Rd=$X;}}}$n=(!$_POST["token"]&&$Rd?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$hd'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
email_header($Oc){return"=?UTF-8?B?".base64_encode($Oc)."?=";}function
send_mail($Qb,$Tf,$Td,$Dc="",$oc=array()){$Wb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Td=str_replace("\n",$Wb,wordwrap(str_replace("\r","","$Td\n")));$Qa=uniqid("boundary");$Aa="";foreach((array)$oc["error"]as$x=>$X){if(!$X)$Aa.="--$Qa$Wb"."Content-Type: ".str_replace("\n","",$oc["type"][$x]).$Wb."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$oc["name"][$x])."\"$Wb"."Content-Transfer-Encoding: base64$Wb$Wb".chunk_split(base64_encode(file_get_contents($oc["tmp_name"][$x])),76,$Wb).$Wb;}$La="";$Pc="Content-Type: text/plain; charset=utf-8$Wb"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Qa--$Wb";$La="--$Qa$Wb$Pc$Wb$Wb";$Pc="Content-Type: multipart/mixed; boundary=\"$Qa\"";}$Pc.=$Wb."MIME-Version: 1.0$Wb"."X-Mailer: Adminer Editor".($Dc?$Wb."From: ".str_replace("\n","",$Dc):"");return
mail($Qb,email_header($Tf),$La.$Td.$Aa,$Pc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$g->select_db($b->database());$le="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Ib[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$m->select($a,$M,array(where($_GET,$p)),$M);$K=($I?$I->fetch_row():array());echo$m->value($K[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Jg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$A=>$o){if(!isset($o["privileges"][$Jg?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$A]);}if($_POST&&!$n&&!isset($_GET["select"])){$Gd=$_POST["referer"];if($_POST["insert"])$Gd=($Jg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Gd))$Gd=ME."select=".urlencode($a);$v=indexes($a);$Eg=unique_array($_GET["where"],$v);$Ue="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Gd,'Item has been deleted.',$m->delete($a,$Ue,!$Eg));else{$P=array();foreach($p
as$A=>$o){$X=process_input($o);if($X!==false&&$X!==null)$P[idf_escape($A)]=$X;}if($Jg){if(!$P)redirect($Gd);queries_redirect($Gd,'Item has been updated.',$m->update($a,$P,$Ue,!$Eg));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$I=$m->insert($a,$P);$Ad=($I?last_id():0);queries_redirect($Gd,sprintf('Item%s has been inserted.',($Ad?" $Ad":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($p
as$A=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($w=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($A);$M[]=($za?"$za AS ":"").idf_escape($A);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$m->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));if(!$I)$n=error();else{$K=$I->fetch_assoc();if(!$K)$K=false;}if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$p){if(!$Z){$I=$m->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($m->primary=>"");}if($K){foreach($K
as$x=>$X){if(!$Z)$K[$x]=null;$p[$x]=array("field"=>$x,"null"=>($x!=$m->primary),"auto_increment"=>($x==$m->primary));}}}edit_form($a,$p,$K,$Jg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$v=indexes($a);$p=fields($a);$_c=column_foreign_keys($a);$ke=$S["Oid"];parse_str($_COOKIE["adminer_import"],$sa);$lf=array();$f=array();$fg=null;foreach($p
as$x=>$o){$A=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$A!=""){$f[$x]=html_entity_decode(strip_tags($A),ENT_QUOTES);if(is_shortable($o))$fg=$b->selectLengthProcess();}$lf+=$o["privileges"];}list($M,$Gc)=$b->selectColumnsProcess($f,$v);$od=count($Gc)<count($M);$Z=$b->selectSearchProcess($p,$v);$C=$b->selectOrderProcess($p,$v);$y=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Fg=>$K){$za=convert_field($p[key($K)]);$M=array($za?$za:idf_escape(key($K)));$Z[]=where_check($Fg,$p);$J=$m->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}$Le=$Hg=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Le=array_flip($u["columns"]);$Hg=($M?$Le:array());foreach($Hg
as$x=>$X){if(in_array(idf_escape($x),$M))unset($Hg[$x]);}break;}}if($ke&&!$Le){$Le=$Hg=array($ke=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($ke));}if($_POST&&!$n){$ch=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Xa=array();foreach($_POST["check"]as$Ua)$Xa[]=where_check($Ua,$p);$ch[]="((".implode(") OR (",$Xa)."))";}$ch=($ch?"\nWHERE ".implode(" AND ",$ch):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Dc=($M?implode(", ",$M):"*").convert_fields($f,$p,$M)."\nFROM ".table($a);$Ic=($Gc&&$od?"\nGROUP BY ".implode(", ",$Gc):"").($C?"\nORDER BY ".implode(", ",$C):"");if(!is_array($_POST["check"])||$Le)$G="SELECT $Dc$ch$Ic";else{$Dg=array();foreach($_POST["check"]as$X)$Dg[]="(SELECT".limit($Dc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Ic,1).")";$G=implode(" UNION ALL ",$Dg);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$_c)){if($_POST["save"]||$_POST["delete"]){$I=true;$ta=0;$P=array();if(!$_POST["delete"]){foreach($f
as$A=>$X){$X=process_input($p[$A]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($A)]=($X!==false?$X:idf_escape($A));}}if($_POST["delete"]||$P){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Le&&is_array($_POST["check"]))||$od){$I=($_POST["delete"]?$m->delete($a,$ch):($_POST["clone"]?queries("INSERT $G$ch"):$m->update($a,$P,$ch)));$ta=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Yg="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$I=($_POST["delete"]?$m->delete($a,$Yg,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Yg)):$m->update($a,$P,$Yg,1)));if(!$I)break;$ta+=$g->affected_rows;}}}$Td=lang(array('%d item has been affected.','%d items have been affected.'),$ta);if($_POST["clone"]&&$I&&$ta==1){$Ad=last_id();if($Ad)$Td=sprintf('Item%s has been inserted.'," $Ad");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Td,$I);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$I=true;$ta=0;foreach($_POST["val"]as$Fg=>$K){$P=array();foreach($K
as$x=>$X){$x=bracket_escape($x,1);$P[idf_escape($x)]=(preg_match('~char|text~',$p[$x]["type"])||$X!=""?$b->processInput($p[$x],$X):"NULL");}$I=$m->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Fg,$p),!$od&&!$Le," ");if(!$I)break;$ta+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ta),$I);}}elseif(!is_string($nc=get_file("csv_file",true)))$n=upload_error($nc);elseif(!preg_match('~~u',$nc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($sa["output"])."&format=".urlencode($_POST["separator"]));$I=true;$gb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$nc,$Nd);$ta=count($Nd[0]);$m->begin();$N=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Nd[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$N]*)$N~",$X.$N,$Od);if(!$x&&!array_diff($Od[1],$gb)){$gb=$Od[1];$ta--;}else{$P=array();foreach($Od[1]as$r=>$db)$P[idf_escape($gb[$r])]=($db==""&&$p[$gb[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$db))));$L[]=$P;}}$I=(!$L||$m->insertUpdate($a,$L,$Le));if($I)$I=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ta),$I);$m->rollback();}}}$Yf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Yf",$n);$P=null;if(isset($lf["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if($_c[$X["col"]]&&count($_c[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($C,$f,$v);$b->selectLimitPrint($y);$b->selectLengthPrint($fg);$b->selectActionPrint($v);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Bc=$g->result(count_rows($a,$Z,$od,$Gc));$D=floor(max(0,$Bc-1)/$y);}$sf=$M;$Hc=$Gc;if(!$sf){$sf[]="*";$pb=convert_fields($f,$p,$M);if($pb)$sf[]=substr($pb,2);}foreach($M
as$x=>$X){$o=$p[idf_unescape($X)];if($o&&($za=convert_field($o)))$sf[$x]="$za AS $X";}if(!$od&&$Hg){foreach($Hg
as$x=>$X){$sf[]=idf_escape($x);if($Hc)$Hc[]=idf_escape($x);}}$I=$m->select($a,$sf,$Z,$Hc,$C,$y,$D,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$D)$I->seek($y*$D);$Sb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($D&&$w=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&$y!=""&&$Gc&&$od&&$w=="sql")$Bc=$g->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".'No rows.'."\n";else{$Ka=$b->backwardKeys($a,$Yf);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Gc&&$M?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$be=array();$Fc=array();reset($M);$We=1;foreach($L[0]as$x=>$X){if(!isset($Hg[$x])){$X=$_GET["columns"][key($M)];$o=$p[$M?($X?$X["col"]:current($M)):$x];$A=($o?$b->fieldName($o,$We):($X["fun"]?"*":$x));if($A!=""){$We++;$be[$x]=$A;$e=idf_escape($x);$Uc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Bb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Uc.($C[0]==$e||$C[0]==$x||(!$C&&$od&&$Gc[0]==$e)?$Bb:'')).'">';echo
apply_sql_function($X["fun"],$A)."</a>";echo"<span class='column hidden'>","<a href='".h($Uc.$Bb)."' title='".'descending'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($x)."');");}echo"</span>";}$Fc[$x]=$X["fun"];next($M);}}$Dd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$x=>$X)$Dd[$x]=max($Dd[$x],min(40,strlen(utf8_decode($X))));}}echo($Ka?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($y%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$_c)as$ae=>$K){$Eg=unique_array($L[$ae],$v);if(!$Eg){$Eg=array();foreach($L[$ae]as$x=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$x))$Eg[$x]=$X;}}$Fg="";foreach($Eg
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&preg_match('~char|text|enum|set~',$p[$x]["type"])&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w!='sql'||preg_match("~^utf8~",$p[$x]["collation"])?$x:"CONVERT($x USING ".charset($g).")").")";$X=md5($X);}$Fg.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Gc&&$M?"":"<td>".checkbox("check[]",substr($Fg,1),in_array(substr($Fg,1),(array)$_POST["check"])).($od||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Fg)."' class='edit'>".'edit'."</a>"));foreach($K
as$x=>$X){if(isset($be[$x])){$o=$p[$x];$X=$m->value($X,$o);if($X!=""&&(!isset($Sb[$x])||$Sb[$x]!=""))$Sb[$x]=(is_mail($X)?$be[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$Fg;if(!$z&&$X!==null){foreach((array)$_c[$x]as$zc){if(count($_c[$x])==1||end($zc["source"])==$x){$z="";foreach($zc["source"]as$r=>$Hf)$z.=where_link($r,$zc["target"][$r],$L[$ae][$Hf]);$z=($zc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($zc["db"]),ME):ME).'select='.urlencode($zc["table"]).$z;if($zc["ns"])$z=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($zc["ns"]),$z);if(count($zc["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Eg))$z.=where_link($r++,$W["col"],$W["val"],$W["op"]);}foreach($Eg
as$rd=>$W)$z.=where_link($r++,$rd,$W);}$X=select_value($X,$z,$o,$fg);$s=h("val[$Fg][".bracket_escape($x)."]");$Y=$_POST["val"][$Fg][bracket_escape($x)];$Ob=!is_array($K[$x])&&is_utf8($X)&&$L[$ae][$x]==$K[$x]&&!$Fc[$x];$eg=preg_match('~text|lob~',$o["type"]);echo"<td id='$s'";if(($_GET["modify"]&&$Ob)||$Y!==null){$Kc=h($Y!==null?$Y:$K[$x]);echo">".($eg?"<textarea name='$s' cols='30' rows='".(substr_count($K[$x],"\n")+1)."'>$Kc</textarea>":"<input name='$s' value='$Kc' size='$Dd[$x]'>");}else{$Id=strpos($X,"<i>…</i>");echo" data-text='".($Id?2:($eg?1:0))."'".($Ob?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Ka)echo"<td>";$b->backwardKeysPrint($Ka,$L[$ae]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($L||$D){$ac=true;if($_GET["page"]!="last"){if($y==""||(count($L)<$y&&($L||!$D)))$Bc=($D?$D*$y:0)+count($L);elseif($w!="sql"||!$od){$Bc=($od?false:found_rows($S,$Z));if($Bc<max(1e4,2*($D+1)*$y))$Bc=reset(slow_query(count_rows($a,$Z,$od,$Gc)));else$ac=false;}}$ye=($y!=""&&($Bc===false||$Bc>$y||$D));if($ye){echo(($Bc===false?count($L)+1:$Bc-$D*$y)>$y?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$y).", '".'Loading'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($L||$D){if($ye){$Pd=($Bc===false?$D+(count($L)>=$y?2:1):floor(($Bc-1)/$y));echo"<fieldset>";if($w!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" …":"");for($r=max(1,$D-4);$r<min($Pd,$D+5);$r++)echo
pagination($r,$D);if($Pd>0){echo($D+5<$Pd?" …":""),($ac&&$Bc!==false?pagination($Pd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Pd'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$D).($D>1?" …":""),($D?pagination($D,$D):""),($Pd>$D?pagination($D+1,$D).($Pd>$D+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$Gb=($ac?"":"~ ").$Bc;echo
checkbox("all",1,0,($Bc!==false?($ac?"":"~ ").lang(array('%d row','%d rows'),$Bc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Gb' : checked); selectCount('selected2', this.checked || !checked ? '$Gb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$Ac=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ac['sql']);break;}}if($Ac){print_fieldset("export",'Export'." <span id='selected2'></span>");$we=$b->dumpOutput();echo($we?html_select("output",$we,$sa["output"])." ":""),html_select("format",$Ac,$sa["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Sb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$sa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$qg'>\n","</form>\n",(!$Gc&&$M?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));elseif(list($R,$s,$A)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$I=$g->query("SELECT $s, $A FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$s = $_GET[value] OR ":"")."$A LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($r=1;($K=$I->fetch_row())&&$r<$y;$r++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($s))."]")."=".urlencode($K[0]))."'>".h($K[1])."</a><br>\n";if($K)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$R=>$K){$A=$b->tableName($K);if(isset($K["Engine"])&&$A!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$A</a>";$X=format_number($K["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($K["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();