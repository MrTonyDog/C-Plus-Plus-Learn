<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Vendor\Provider\ContentVerify; use Illuminate\Support\Str; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Input\Response; use ModStart\Core\Util\HtmlUtil; use ModStart\Form\Form; use Module\Vendor\Provider\CensorImage\CensorImageProvider; use Module\Vendor\Provider\CensorText\CensorTextProvider; use Module\Vendor\Provider\Notifier\NotifierProvider; abstract class AbstractContentVerifyProvider { public abstract function name(); public abstract function title(); public abstract function verifyAutoProcess($HAqS9); public abstract function verifyCount(); public abstract function verifyRule(); public abstract function buildForm(Form $mUGak, $HAqS9); public function verifyUrl() { return action($this->verifyRule()); } public function verifyAutoProcessedNotify() { return true; } public function run($HAqS9, $IIIcx = null, $gKSAy = null) { goto dCIXB; dCIXB: if (null === $gKSAy) { $gKSAy = array('内容' => $IIIcx); $QNLYI = Str::substr(HtmlUtil::text2html($IIIcx), 0, 100); } else { $QNLYI = $IIIcx; } goto OSPzT; AiJKr: $QNLYI = $this->title() . ($QNLYI ? '(' . $QNLYI . ')' : ''); goto a3o28; a3o28: if ($this->verifyAutoProcess($HAqS9)) { if ($this->verifyAutoProcessedNotify()) { NotifierProvider::notify($this->name(), '[自动审核]' . $QNLYI, $gKSAy); } return; } goto D0YrP; D0YrP: NotifierProvider::notifyNoneLoginOperateProcessUrl($this->name(), '[审核]' . $QNLYI, $gKSAy, 'content_verify/' . $this->name(), $HAqS9); goto xmsPk; OSPzT: $QNLYI = HtmlUtil::text($QNLYI); goto AiJKr; xmsPk: } protected function parseRichHtml($HvAUu) { goto Jn0bI; zPpgK: $iXl9h = $mW7Vi['text']; goto ZgJtt; ZgJtt: foreach ($mW7Vi['images'] as $Pe32p) { $MJvM4[] = AssetsUtil::fixFullInJob($Pe32p); } goto Mh5oh; uy2Bz: $MJvM4 = array(); goto zPpgK; Mh5oh: return array($iXl9h, $MJvM4); goto Yh73T; Jn0bI: $mW7Vi = HtmlUtil::extractTextAndImages($HvAUu); goto uy2Bz; Yh73T: } protected function censorRichHtmlSuccess($y_uKP, $HvAUu) { goto gmmVa; gmmVa: list($iXl9h, $MJvM4) = $this->parseRichHtml($HvAUu); goto SEtNW; SEtNW: if (!empty($iXl9h)) { $Y2SRS = CensorTextProvider::get(modstart_config($y_uKP . '_Text', 'default')); if ($Y2SRS) { goto Ti_nI; Ti_nI: $mW7Vi = $Y2SRS->verify($iXl9h); goto hTfub; vX_DB: if (!$mW7Vi['data']['pass']) { return false; } goto q3Iaf; hTfub: if (Response::isError($mW7Vi)) { return false; } goto vX_DB; q3Iaf: } } goto QlVk2; I3D3U: return true; goto oITVu; QlVk2: if (!empty($MJvM4)) { $Y2SRS = CensorImageProvider::get(modstart_config($y_uKP . '_Image', 'default')); if ($Y2SRS) { foreach ($MJvM4 as $Pe32p) { goto YqcEI; Vzuwb: if (!$mW7Vi['data']['pass']) { return false; } goto LUBen; YqcEI: $mW7Vi = $Y2SRS->verify($Pe32p); goto MUKNP; MUKNP: if (Response::isError($mW7Vi)) { return false; } goto Vzuwb; LUBen: } } } goto I3D3U; oITVu: } }