<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Vendor\Provider\HomePage; use ModStart\Core\Exception\BizException; use ModStart\Core\Util\AgentUtil; class HomePageProvider { private static $instances = array(DefaultHomePageProvider::class, DefaultMobileHomePageProvider::class); public static function register($Y2SRS) { self::$instances[] = $Y2SRS; } public static function all() { foreach (self::$instances as $Zc0iK => $aEiYS) { if ($aEiYS instanceof \Closure) { self::$instances[$Zc0iK] = call_user_func($aEiYS); } else { if (is_string($aEiYS)) { self::$instances[$Zc0iK] = app($aEiYS); } } } return self::$instances; } public static function call($CQ6xH, $iQ1Xd) { goto V5Qgv; peu0o: BizException::throwsIfEmpty('首页不存在', $ADkeY); goto oif_E; K6PCv: if (!starts_with($IqUHH, '\\')) { $IqUHH = '\\' . $IqUHH; } goto v2cbl; ZIrek: if (modstart_config('HomePage_Enable', false)) { if (AgentUtil::isMobile()) { $ADkeY = modstart_config('HomePage_HomeMobile'); } if (empty($ADkeY)) { $ADkeY = modstart_config('HomePage_Home'); } } goto sNZgq; v2cbl: if ($IqUHH == $gaJSW && $KF98L == $cGnks) { list($gaJSW, $cGnks) = explode('@', $iQ1Xd); } goto gyQxy; sNZgq: if (empty($ADkeY)) { $ADkeY = $iQ1Xd; } goto peu0o; PNujH: return app()->call(array($gaJSW, $cGnks)); goto bV2w3; gyQxy: $gaJSW = app($gaJSW); goto PNujH; oif_E: list($gaJSW, $cGnks) = explode('@', $ADkeY); goto hXKI2; hXKI2: list($IqUHH, $KF98L) = explode('::', $CQ6xH); goto K6PCv; V5Qgv: $ADkeY = null; goto ZIrek; bV2w3: } }