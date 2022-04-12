<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\ModuleStore\Util; use Chumper\Zipper\Zipper; use Illuminate\Support\Facades\Cache; use ModStart\Core\Exception\BizException; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use ModStart\Core\Util\CurlUtil; use ModStart\Core\Util\FileUtil; use ModStart\Core\Util\VersionUtil; use ModStart\ModStart; use ModStart\Module\ModuleManager; class ModuleStoreUtil { const REMOTE_BASE = 'https://modstart.com'; public static function remoteModuleData() { goto qY0m_; FOmJL: $nz4Mr = $HoLMG->getTrimString('apiToken'); goto sRoRr; sRoRr: return Cache::remember('ModuleStore_Modules:' . $H7GUl, 60, function () use($nz4Mr) { $R6xGd = 'cms'; if (class_exists('\\App\\Constant\\AppConstant')) { $R6xGd = \App\Constant\AppConstant::APP; } $mW7Vi = CurlUtil::getJSONData(self::REMOTE_BASE . '/api/store/module', array('app' => $R6xGd, 'api_token' => $nz4Mr)); return $mW7Vi; }); goto iiECa; qY0m_: $HoLMG = InputPackage::buildFromInput(); goto cpSGt; cpSGt: $H7GUl = $HoLMG->getInteger('memberUserId'); goto FOmJL; iiECa: } public static function all() { goto zTIK_; PiVAr: $HAEvk = array(); goto MfPjq; d_Unu: if (!empty($FKDin['data']['modules'])) { foreach ($FKDin['data']['modules'] as $GVtnz) { goto A1t9X; XrSjt: $GVtnz['_isInstalled'] = false; goto rfHsk; A1t9X: $GVtnz['_isLocal'] = false; goto XrSjt; fEAsl: $GVtnz['_hasConfig'] = false; goto ksGjF; ksGjF: $g7MAA[$GVtnz['name']] = $GVtnz; goto PQG8U; Om_hY: $GVtnz['_localVersion'] = null; goto dkSYg; dkSYg: $GVtnz['_isSystem'] = false; goto fEAsl; rfHsk: $GVtnz['_isEnabled'] = false; goto Om_hY; PQG8U: } } goto oTGwy; KqKlJ: $FKDin = self::remoteModuleData(); goto fLl07; fLl07: $l2muQ = array(); goto Tkjp4; MfPjq: if (!empty($FKDin['data']['types'])) { $HAEvk = $FKDin['data']['types']; } goto w8V2Q; oTGwy: foreach (ModuleManager::listModules() as $avQLM => $tu0B0) { $iNjgR = ModuleManager::getModuleBasic($avQLM); if (isset($g7MAA[$avQLM])) { goto QESXI; xxbEB: $g7MAA[$avQLM]['_localVersion'] = $iNjgR['version']; goto AuJ5E; QESXI: $g7MAA[$avQLM]['_isInstalled'] = $tu0B0['isInstalled']; goto faBT7; AuJ5E: $g7MAA[$avQLM]['_isSystem'] = $tu0B0['isSystem']; goto xYfVZ; xYfVZ: $g7MAA[$avQLM]['_hasConfig'] = !empty($iNjgR['config']); goto wGLM_; faBT7: $g7MAA[$avQLM]['_isEnabled'] = $tu0B0['enable']; goto xxbEB; wGLM_: } else { $g7MAA[$avQLM] = array('id' => 0, 'name' => $avQLM, 'title' => $iNjgR['title'], 'cover' => null, 'categoryId' => null, 'latestVersion' => $iNjgR['version'], 'releases' => array(), 'url' => null, 'isFee' => false, 'priceSuper' => null, 'priceSuperEnable' => false, 'priceYear' => null, 'priceYearEnable' => false, 'description' => $iNjgR['description'], '_isLocal' => true, '_isInstalled' => $tu0B0['isInstalled'], '_isEnabled' => $tu0B0['enable'], '_localVersion' => $iNjgR['version'], '_isSystem' => $tu0B0['isSystem'], '_hasConfig' => !empty($iNjgR['config'])); } } goto ww6dQ; ww6dQ: return array('storeConfig' => $pWg1q, 'categories' => $l2muQ, 'types' => $HAEvk, 'modules' => array_values($g7MAA)); goto p2VkA; w8V2Q: $g7MAA = array(); goto d_Unu; Tkjp4: if (!empty($FKDin['data']['categories'])) { $l2muQ = $FKDin['data']['categories']; } goto PiVAr; zTIK_: $pWg1q = array('disable' => config('env.MS_MODULE_STORE_DISABLE', false)); goto KqKlJ; p2VkA: } private static function baseRequest($A9IXn, $hRWBB, $Vhd2R) { return CurlUtil::postJSONBody(self::REMOTE_BASE . $A9IXn, $hRWBB, array('header' => array('api-token' => $Vhd2R, 'X-Requested-With' => 'XMLHttpRequest'))); } public static function checkPackage($Vhd2R, $VLCiR, $k8iQn) { goto Tl0Cj; LFK9Y: $p5UI1 = $mW7Vi['data']['packageSize']; goto W2Ns1; cZEsh: return Response::generateSuccessData(array('requires' => $G43Uw, 'errorCount' => count(array_filter($G43Uw, function ($M76WG) { return !$M76WG['success']; })), 'packageSize' => $p5UI1)); goto tiYtr; j_3FN: if (method_exists(ModuleManager::class, 'getEnv')) { $Bjq3O = ModuleManager::getEnv(); BizException::throwsIf(L('Module %s:%s compatible with env %s, current is %s', $VLCiR, $tu0B0['version'], join(',', $tu0B0['env']), $Bjq3O), !in_array($Bjq3O, $tu0B0['env'])); } goto cZEsh; TagTE: if (!empty($tu0B0['modstartVersion'])) { goto LLtKl; LLtKl: $Wd2lc = array('name' => '<a href=\'https://modstart.com/download\' class=\'ub-text-white tw-underline\' target=\'_blank\'>MSCore</a>:' . htmlspecialchars($tu0B0['modstartVersion']), 'success' => VersionUtil::match(ModStart::$version, $tu0B0['modstartVersion']), 'resolve' => null); goto eFSnI; LEfzk: $G43Uw[] = $Wd2lc; goto BR0Hv; eFSnI: if (!$Wd2lc['success']) { $Wd2lc['resolve'] = '请使用 MSCore' . $tu0B0['modstartVersion'] . ' 的版本'; } goto LEfzk; BR0Hv: } goto lnw5_; m5Ske: if (empty($tu0B0['env'])) { $tu0B0['env'] = array('laravel5'); } goto j_3FN; W2Ns1: $G43Uw = array(); goto TagTE; lnw5_: if (!empty($tu0B0['require'])) { foreach ($tu0B0['require'] as $Wd2lc) { goto JSq7C; ZhZIO: $Wd2lc = array('name' => "<a href='https://modstart.com/m/{$avQLM}' class='ub-text-white tw-underline' target='_blank'>{$avQLM}</a>:" . htmlspecialchars($aEiYS), 'success' => true, 'resolve' => null); goto CfK_Q; JSq7C: list($avQLM, $aEiYS) = VersionUtil::parse($Wd2lc); goto ZhZIO; CfK_Q: if (ModuleManager::isModuleInstalled($avQLM)) { goto oRmvF; JGTVW: if (!$Wd2lc['success']) { $Wd2lc['resolve'] = '请使用版本 ' . htmlspecialchars($aEiYS) . " 的模块 <a href='https://modstart.com/m/{$avQLM}' class='ub-text-white tw-underline' target='_blank'>{$avQLM}</a>"; } goto KaDPa; Ox2SV: $Wd2lc['success'] = VersionUtil::match($jGWP8['version'], $aEiYS); goto JGTVW; JYtVV: BizException::throwsIfEmpty("获取模块 {$avQLM} 信息失败", $jGWP8); goto Ox2SV; oRmvF: $jGWP8 = ModuleManager::getModuleBasic($avQLM); goto JYtVV; KaDPa: } else { $Wd2lc['success'] = false; $Wd2lc['resolve'] = "请先安装 {$Wd2lc['name']} <a href='https://modstart.com/m/{$avQLM}' class='ub-text-white tw-underline' target='_blank'>[点击查看]</a>"; } goto Aa8Ed; Aa8Ed: $G43Uw[] = $Wd2lc; goto mXzmJ; mXzmJ: } } goto m5Ske; Tl0Cj: $mW7Vi = self::baseRequest('/api/store/module_info', array('module' => $VLCiR, 'version' => $k8iQn), $Vhd2R); goto VmW1X; VmW1X: BizException::throwsIfResponseError($mW7Vi); goto C2I4l; C2I4l: $tu0B0 = $mW7Vi['data']['config']; goto LFK9Y; tiYtr: } public static function downloadPackage($Vhd2R, $VLCiR, $k8iQn) { goto ep7uJ; IRiTW: $ltbk8 = $mW7Vi['data']['packageMd5']; goto hu3pe; k69Hl: BizException::throwsIfResponseError($mW7Vi); goto Otn2v; v1K8N: file_put_contents($eIkLN, $hRWBB); goto MyuGO; Otn2v: $vgCwG = $mW7Vi['data']['package']; goto IRiTW; hu3pe: $YMy49 = $mW7Vi['data']['licenseKey']; goto XJEYE; VEEcF: BizException::throwsIfEmpty('安装包获取失败', $hRWBB); goto eBucW; eBucW: $eIkLN = FileUtil::generateLocalTempPath('zip'); goto v1K8N; paznI: return Response::generateSuccessData(array('package' => $eIkLN, 'licenseKey' => $YMy49, 'packageSize' => filesize($eIkLN))); goto I8uEZ; MyuGO: BizException::throwsIf('文件MD5校验失败', md5_file($eIkLN) != $ltbk8); goto paznI; XJEYE: $hRWBB = CurlUtil::getRaw($vgCwG); goto VEEcF; ep7uJ: $mW7Vi = self::baseRequest('/api/store/module_package', array('module' => $VLCiR, 'version' => $k8iQn), $Vhd2R); goto k69Hl; I8uEZ: } public static function cleanDownloadedPackage($vgCwG) { FileUtil::safeCleanLocalTemp($vgCwG); } public static function unpackModule($VLCiR, $vgCwG, $YMy49) { goto Q99jD; Q99jD: $nChni = array(); goto iezIN; BFyf2: file_put_contents($vrSXB . '/license.json', json_encode(array('licenseKey' => $YMy49))); goto A2WIM; sv9IY: BizException::throwsIf('解压失败', !file_exists($vrSXB . '/config.json')); goto BFyf2; Dmt9q: $Er_Mh->extractTo($vrSXB); goto G8LxI; UtAdL: if ($Er_Mh->contains($VLCiR . '/config.json')) { $Er_Mh->folder($VLCiR . ''); } goto Dmt9q; G8LxI: $Er_Mh->close(); goto sv9IY; BUfFJ: $Er_Mh->make($vgCwG); goto UtAdL; k7jyd: BizException::throwsIf('模块目录 module/' . $VLCiR . ' 不正常，请手动删除', file_exists($vrSXB)); goto bgE28; A2WIM: self::cleanDownloadedPackage($vgCwG); goto TwIwG; bgE28: $Er_Mh = new Zipper(); goto BUfFJ; L4Ebz: $vrSXB = base_path('module/' . $VLCiR); goto s9XHH; iezIN: BizException::throwsIf('文件不存在 ' . $vgCwG, empty($vgCwG) || !file_exists($vgCwG)); goto L4Ebz; TwIwG: return Response::generateSuccessData($nChni); goto DhN6a; s9XHH: if (file_exists($vrSXB)) { goto sk7Kc; K8b5L: $nChni[] = "备份模块 {$VLCiR} 到 {$PH0z3}"; goto nEFES; P7kQF: BizException::throwsIf('模块目录 module/' . $VLCiR . ' 不正常，请手动删除', !is_dir($vrSXB)); goto QMP5e; QMP5e: $ZiH4N = base_path("module/{$PH0z3}"); goto pJSp1; sk7Kc: $PH0z3 = '_delete_.' . date('Ymd_His') . '.' . $VLCiR; goto P7kQF; qsIOn: BizException::throwsIf('备份模块旧文件失败', !file_exists($ZiH4N)); goto K8b5L; pJSp1: try { rename($vrSXB, $ZiH4N); } catch (\Exception $Dnvff) { BizException::throws("备份模块 {$VLCiR} 到 {$PH0z3} 失败（确保模块中所有文件和目录已关闭）"); } goto qsIOn; nEFES: } goto k7jyd; DhN6a: } public static function removeModule($VLCiR, $k8iQn) { goto oDvT6; ypEyJ: BizException::throwsIf('模块目录备份失败', !file_exists($ZiH4N)); goto UcK3z; mWPEl: BizException::throwsIf('模块目录不存在 ', !file_exists($vrSXB)); goto u7R04; cfzvE: $PH0z3 = '_delete_.' . date('Ymd_His') . '.' . $VLCiR; goto VxiJi; u7R04: BizException::throwsIf('模块目录 module/' . $VLCiR . ' 不正常，请手动删除', !is_dir($vrSXB)); goto cfzvE; IhEIe: try { rename($vrSXB, $ZiH4N); } catch (\Exception $Dnvff) { BizException::throws("移除模块 {$VLCiR} 到 {$PH0z3} 失败，请确保模块 {$VLCiR} 中没有文件正在被使用"); } goto ypEyJ; VxiJi: $ZiH4N = base_path("module/{$PH0z3}"); goto IhEIe; UcK3z: return Response::generateSuccessData(array()); goto Dbj1M; oDvT6: $vrSXB = base_path('module/' . $VLCiR); goto mWPEl; Dbj1M: } }